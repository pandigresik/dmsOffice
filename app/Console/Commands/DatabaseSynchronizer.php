<?php

namespace App\Console\Commands;

use App\Models\LogSynchronize;
use App\Models\Synchronize;
use Exception;
use Illuminate\Database\ConnectionInterface;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use PDOException;

class DatabaseSynchronizer
{
    public const DEFAULT_LIMIT = 5000;
    public const CACHE_NAME = 'synchronize-table_';
    public $limit = self::DEFAULT_LIMIT;
    public $tables;
    public $skipTables;
    public $migrate;
    public $from;
    public $to;
    public $truncate;
    public $filter = [];
    private $cacheIdentity;

    private $fromDB;
    private $toDB;

    public function __construct(string $from, string $to, string $cacheIdentity)
    {
        $this->from = $from;
        $this->to = $to;
        $this->cacheIdentity = $cacheIdentity;

        try {
            $this->fromDB = DB::connection($this->from);
            $this->toDB = DB::connection($this->to);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function run(): void
    {
        $originHost = $this->fromDB->getConfig()['host'];
        $targetHost = $this->toDB->getConfig()['host'];

        if ($this->migrate) {
            Artisan::call('migrate'.($this->truncate ? ':refresh' : ''), [
                '--database' => $this->to,
            ]);
        }
        Cache::tags(self::CACHE_NAME.$this->cacheIdentity)->put('state', 'progress');
        foreach ($this->getTables() as $table) {
            $tableName = $table['name'];
            $this->updateProgress($tableName, 100, 0);
        }

        foreach ($this->getTables() as $table) {
            $tableName = $table['name'];
            $this->feedback(PHP_EOL.PHP_EOL."Table: {$tableName}", 'line');
            \Log::error('prepare sinkronisasi table '.$tableName);
            if (!Schema::connection($this->from)->hasTable($tableName)) {
                $this->feedback("Table '{$tableName}' does not exist in {$this->from}", 'error');

                continue;
            }

            //$this->syncTable($table);
            \Log::error('sinkronisasi table '.$tableName);
            $this->syncRows($table, $this->getFilterTable($tableName));
            LogSynchronize::create(['table_name' => $tableName]);
            Synchronize::updateOrCreate(['table_name' => $tableName]);
        }
        Cache::tags(self::CACHE_NAME.$this->cacheIdentity)->put('state', 'done');
        $this->feedback('Synchronization done!', 'info');
    }

    public function setSkipTables(array $skipTables)
    {
        $this->skipTables = $skipTables;

        return $this;
    }

    public function setTables(array $tables)
    {
        $this->tables = $tables;

        return $this;
    }

    public function setLimit(int $limit)
    {
        $this->limit = $limit;

        return $this;
    }

    public function setOptions(array $options)
    {
        foreach ($options as $option => $value) {
            if (!isset($this->{$option})) {
                $this->{$option} = $value;
            }
        }

        return $this;
    }

    public function getTables(): array
    {
        if (empty($this->tables)) {
            $this->tables = $this->getFromDb()->getDoctrineSchemaManager()->listTableNames();
        }

        return array_filter($this->tables, function ($table) {
            return !in_array($table, $this->skipTables, true);
        });
    }

    /**
     * Check if tables and columns are present
     * Create or update them if not.
     */
    public function syncTable(string $table): void
    {
        $schema = Schema::connection($this->to);
        $columns = Schema::connection($this->from)->getColumnListing($table);

        if ($schema->hasTable($table)) {
            foreach ($columns as $column) {
                if ($schema->hasColumn($table, $column)) {
                    continue;
                }

                $this->updateTable($table, $column);
            }

            return;
        }

        $this->createTable($table, $columns);
    }

    /**
     * Fetch all rows in $this->from and insert or update $this->to.
     *
     * @todo need to get the real primary key
     * @todo add limit offset setup
     * @todo investigate: insert into on duplicate key update
     */
    public function syncRows(array $table, ?string $condition): void
    {
        //$queryColumn = Schema::connection($this->from)->getColumnListing($table)[0];
        $queryColumn = $table['key'];
        $tableName = $table['name'];
        $this->updateProgress($tableName, 100, 0);
        $prepare = $this->prepareForInserts($table, $condition);
        $statement = $prepare['statement'];
        $amount = $prepare['amount'];
        $counter = 0;
        if (!empty($amount)) {
            while ($row = $statement->fetch(\PDO::FETCH_OBJ)) {
                $tmp = $this->getToDb()->table($tableName);
                if (is_array($queryColumn)) {
                    foreach ($queryColumn as $qc) {
                        $tmp->where($qc, $row->{$qc});
                    }
                } else {
                    $tmp->where($queryColumn, $row->{$queryColumn});
                }
                $exists = $tmp->first();
                // remove iiInternalId because auto increment column
                if (isset($row->iInternalId)) {
                    unset($row->iInternalId);
                }

                if (!$exists) {
                    $this->getToDb()->table($tableName)->insert((array) $row);
                } else {
                    $tmpUpdate = $this->getToDb()->table($tableName);
                    if (is_array($queryColumn)) {
                        foreach ($queryColumn as $qc) {
                            $tmpUpdate->where($qc, $row->{$qc});
                        }
                    } else {
                        $tmpUpdate->where($queryColumn, $row->{$queryColumn});
                    }
                    $tmpUpdate->update((array) $row);
                }
                ++$counter;

                if (0 == $counter % 10) {
                    $this->updateProgress($tableName, $amount, $counter);
                }
            }
            $this->updateProgress($tableName, $amount, $counter);
        } else {
            $this->updateProgress($tableName, 100, 100);
        }
    }

    /**
     * Get the value of filter.
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * Get the value of filter.
     *
     * @param mixed $table
     */
    public function getFilterTable($table)
    {
        return $this->filter[$table] ?? null;
    }

    /**
     * Set the value of filter.
     *
     * @param mixed $filter
     *
     * @return self
     */
    public function setFilter($filter)
    {
        $this->filter = $filter;

        return $this;
    }

    protected function getFromDb(): ConnectionInterface
    {
        if (null === $this->fromDB) {
            $this->fromDB = DB::connection($this->from);
        }

        return $this->fromDB;
    }

    protected function getToDb(): ConnectionInterface
    {
        if (null === $this->toDB) {
            $this->toDB = DB::connection($this->to);
        }

        return $this->toDB;
    }

    private function createTable(string $table, array $columns): void
    {
        $this->feedback("Creating '{$this->to}.{$table}' table", 'warn');

        Schema::connection($this->to)->create($table, function (Blueprint $table_bp) use ($table, $columns) {
            foreach ($columns as $column) {
                $type = Schema::connection($this->from)->getColumnType($table, $column);

                $table_bp->{$type}($column)->nullable();

                $this->feedback("Added {$type}('{$column}')->nullable()");
            }
        });
    }

    private function updateTable(string $table, string $column): void
    {
        Schema::connection($this->to)->table($table, function (Blueprint $table_bp) use ($table, $column) {
            $type = Schema::connection($this->from)->getColumnType($table, $column);

            $table_bp->{$type}($column)->nullable();

            $this->feedback("Added {$type}('{$column}')->nullable()");
        });
    }

    /**
     * @return \PDOStatement
     */
    private function prepareForInserts(array $table, ?string $condition): array
    {
        $pdo = $this->getFromDb()->getPdo();
        $tableName = $table['name'];
        $builder = $this->fromDB->table($tableName);

        $statement = $condition ? $pdo->prepare($builder->whereRaw($condition)->toSql()) : $pdo->prepare($builder->toSql());

        if (!$statement instanceof \PDOStatement) {
            throw new PDOException("Could not prepare PDOStatement for {$tableName}");
        }

        $statement->execute($builder->getBindings());
        $amount = $statement->rowCount();

        if ($this->truncate) {
            $this->getToDb()->table($tableName)->truncate();
        }

        return ['statement' => $statement, 'amount' => $amount];
    }

    private function updateProgress(string $table, int $amount, int $counter)
    {
        Cache::tags(self::CACHE_NAME.$this->cacheIdentity)->put($table, ['progress' => ((int) ($counter / $amount) * 100)]);
    }

    private function feedback(string $msg, $type = 'info'): void
    {
        // echo PHP_EOL.$msg.PHP_EOL;
    }
}
