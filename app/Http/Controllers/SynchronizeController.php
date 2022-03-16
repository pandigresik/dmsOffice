<?php

namespace App\Http\Controllers;

use App\Console\Commands\DatabaseSynchronizer;
use App\DataTables\SynchronizeDataTable;
use App\Http\Requests\CreateSynchronizeRequest;
use App\Models\Synchronize;
use App\Repositories\SynchronizeRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Response;

class SynchronizeController extends AppBaseController
{
    /** @var SynchronizeRepository */
    protected $repository;
    private $cacheIdentity;

    public function __construct()
    {
        $this->repository = SynchronizeRepository::class;
    }

    /**
     * Display a listing of the Synchronize.
     *
     * @return Response
     */
    public function index(SynchronizeDataTable $synchronizeDataTable)
    {
        return $synchronizeDataTable->render('synchronizes.index');
    }

    /**
     * Show the form for creating a new Synchronize.
     *
     * @return Response
     */
    public function create()
    {
        $listTables = $this->getTables();

        return view('synchronizes.create')
            ->with(['listTables' => $listTables])
            ->with($this->getOptionItems())
        ;
    }

    /**
     * Store a newly created Synchronize in storage.
     *
     * @param CreateSynchronizeRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        ini_set('max_execution_time', 1800);
        $user = Auth::user();
        $connectionStr = config('entity.entityConnection')[$user->entity_id];

        $from = $connectionStr.'_origin';
        $to = $connectionStr;
        // $to = $connectionStr.'_origin';
        // $from = $connectionStr;
        $cacheIdentity = $this->getCacheIdentity($connectionStr);

        try {
            (new DatabaseSynchronizer(
                $from,
                $to,
                $cacheIdentity
            ))
                ->setTables($this->getTables())
                ->setSkipTables($this->getSkipTables())
                //->setLimit((int) $this->getLimit())
                ->setFilter($this->getTableConditions())
                ->run()
            ;
            // foreach ($this->getTables() as $table) {
            //     $tableName = $table['name'];
            //     \Log::error($tableName);

            // }
        } catch (Exception $e) {
            \Log::error($e->getMessage());

            return;
        }

        return new JsonResponse(['state' => 'done']);
    }

    /**
     * Display the specified Synchronize.
     *
     * @param int $id
     *
     * @return Response
     */
    public function progress()
    {
        $tagName = DatabaseSynchronizer::CACHE_NAME;
        $caches = [];
        foreach ($this->getTables() as $table) {
            $tableName = $table['name'];
            $caches[$tableName] = Cache::tags($tagName.$this->getCacheIdentity())->get($tableName, ['progress' => 0]);
        }
        $state = Cache::tags($tagName.$this->getCacheIdentity())->get('state');

        return new JsonResponse(['state' => $state, 'caches' => $caches]);
    }

    /**
     * Provide options item based on relationship model Synchronize from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        return [
        ];
    }

    private function getTables()
    {
        return config('database-synchronizer.tables');
    }

    private function getSkipTables()
    {
        return config('database-synchronizer.skip_tables');
    }

    private function getLimit()
    {
        return config('database-synchronizer.limit', DatabaseSynchronizer::DEFAULT_LIMIT);
    }

    private function getTableConditions(): array
    {
        $user = Auth::user();
        $connectionStr = config('entity.entityConnection')[$user->entity_id];
        $resultCondition = [];
        $columnCondition = config('database-synchronizer.tables', []);
        $tables = $this->getTables();
        $tableReferences = [];
        $cutOff = '2021-11-01';
        foreach ($tables as $table) {
            //$synchronize = Synchronize::whereTableName($table)->max('updated_at') ?? '2021-10-01 01:01:01';
            $tableName = $table['name'];
            $tableReferences[$tableName] = $table;
            $references = $table['references'];
            if (empty($references)) {
                $synchronize = \DB::connection($connectionStr)->table($tableName)->max($table['filter']);
                $lastSinkron = (\Carbon\Carbon::parse($synchronize))->subHour(1);
                $lastSinkron = $lastSinkron < $cutOff ? $cutOff : $lastSinkron;
                $resultCondition[$tableName] = $table['filter'].' >= \''.$lastSinkron.'\'';
            } else {
                \Log::error($tableReferences[$references['table']]['filter']);
                $synchronize = \DB::connection($connectionStr)->table($references['table'])->max($tableReferences[$references['table']]['filter']);
                $lastSinkron = (\Carbon\Carbon::parse($synchronize))->subHour(1);
                $lastSinkron = $lastSinkron < $cutOff ? $cutOff : $lastSinkron;
                $resultCondition[$tableName] = $references['column'].' in (select '.$references['column'].' from '.$references['table'].' where '.$tableReferences[$references['table']]['filter'].' >= \''.$lastSinkron.'\')';
            }
        }

        return $resultCondition;
    }

    private function getCacheIdentity(string $connectionStr = null)
    {
        if (empty($connectionStr)) {
            $user = Auth::user();
            $connectionStr = $connectionStr ?? config('entity.entityConnection')[$user->entity_id];
        }

        $to = $connectionStr;

        $this->cacheIdentity = $this->cacheIdentity ?? 'progress_'.$to;

        return $this->cacheIdentity;
    }
}
