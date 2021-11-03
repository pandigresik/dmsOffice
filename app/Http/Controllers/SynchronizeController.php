<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\DataTables\SynchronizeDataTable;
use App\Repositories\SynchronizeRepository;
use App\Http\Requests\CreateSynchronizeRequest;
use App\Http\Requests\UpdateSynchronizeRequest;

class SynchronizeController extends AppBaseController
{
    /** @var SynchronizeRepository */
    protected $repository;

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
        $listTables = config('synchronize-table.dms.table');
        $filter = config('synchronize-table.dms.filter');

        return view('synchronizes.create')
            ->with(['listTables' => $listTables, 'filter' => $filter])
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
        if(! defined('STDIN')) define('STDIN', fopen("php://stdin","r"));
        $input = $request->all();
        Artisan::call('db:syncCustom',['--from' => 'mysql_sejati', '--to' => 'mysql_sejati_origin', '--tables' => $input['tables'], '--filter' => $input['filter']]);
        return Artisan::output();
        Flash::success(__('messages.saved', ['model' => __('models/synchronizes.singular')]));

        //return redirect(route('synchronizes.index'));
    }

    /**
     * Display the specified Synchronize.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $synchronize = $this->getRepositoryObj()->find($id);

        if (empty($synchronize)) {
            Flash::error(__('models/synchronizes.singular').' '.__('messages.not_found'));

            return redirect(route('synchronizes.index'));
        }

        return view('synchronizes.show')->with('synchronize', $synchronize);
    }

    /**
     * Show the form for editing the specified Synchronize.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $synchronize = $this->getRepositoryObj()->find($id);

        if (empty($synchronize)) {
            Flash::error(__('messages.not_found', ['model' => __('models/synchronizes.singular')]));

            return redirect(route('synchronizes.index'));
        }

        return view('synchronizes.edit')->with('synchronize', $synchronize)->with($this->getOptionItems());
    }

    /**
     * Update the specified Synchronize in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateSynchronizeRequest $request)
    {
        $synchronize = $this->getRepositoryObj()->find($id);

        if (empty($synchronize)) {
            Flash::error(__('messages.not_found', ['model' => __('models/synchronizes.singular')]));

            return redirect(route('synchronizes.index'));
        }

        $synchronize = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/synchronizes.singular')]));

        return redirect(route('synchronizes.index'));
    }

    /**
     * Remove the specified Synchronize from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $synchronize = $this->getRepositoryObj()->find($id);

        if (empty($synchronize)) {
            Flash::error(__('messages.not_found', ['model' => __('models/synchronizes.singular')]));

            return redirect(route('synchronizes.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/synchronizes.singular')]));

        return redirect(route('synchronizes.index'));
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
}
