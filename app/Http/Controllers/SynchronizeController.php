<?php

namespace App\Http\Controllers;

use App\Console\Commands\DatabaseSynchronizer;
use App\DataTables\SynchronizeDataTable;
use App\Http\Requests\CreateSynchronizeRequest;
use App\Models\LogSynchronize;
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
        ini_set('max_execution_time', 180);
        $user = Auth::user();
        $connectionStr = config('entity.entityConnection')[$user->entity_id];

        $from = $connectionStr.'_origin';
        $to = $connectionStr;
        // $to = $connectionStr.'_origin';
        // $from = $connectionStr;
        $cacheIdentity = $this->getCacheIdentity($connectionStr);
        $synchronize = Synchronize::max('updated_at') ?? '2021-09-01 01:01:01';
        $lastSinkron = $synchronize;
        $lastSinkron = '2021-09-01 01:01:01';

        try {
            (new DatabaseSynchronizer(
                $from,
                $to,
                $cacheIdentity
            ))
                ->setTables($this->getTables())
                ->setSkipTables($this->getSkipTables())
                //->setLimit((int) $this->getLimit())
                ->setFilter($this->getTableConditions($lastSinkron))
                ->run()
            ;
            foreach ($this->getTables() as $table) {
                Synchronize::updateOrCreate(['table_name' => $table]);
                LogSynchronize::Create(['table_name' => $table]);
            }

            // set last sinkron
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
            $caches[$table] = Cache::tags($tagName.$this->getCacheIdentity())->get($table, ['progress' => 0]);
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

    private function getTableConditions(string $lastSinkron): array
    {
        $resultCondition = [];
        $columnCondition = config('database-synchronizer.conditions', []);
        if (!empty($columnCondition)) {
            foreach ($columnCondition as $table => $column) {
                $resultCondition[$table] = $column.' >= \''.$lastSinkron.'\'';
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
