<?php

namespace App\Http\Controllers\Base;

use App\DataTables\Base\DmsSmBranchDataTable;
use App\Http\Requests\Base;
use App\Http\Requests\Base\CreateDmsSmBranchRequest;
use App\Http\Requests\Base\UpdateDmsSmBranchRequest;
use App\Repositories\Base\DmsSmBranchRepository;

use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DmsSmBranchController extends AppBaseController
{
    /** @var  DmsSmBranchRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = DmsSmBranchRepository::class;
    }

    /**
     * Display a listing of the DmsSmBranch.
     *
     * @param DmsSmBranchDataTable $dmsSmBranchDataTable
     * @return Response
     */
    public function index(DmsSmBranchDataTable $dmsSmBranchDataTable)
    {
        return $dmsSmBranchDataTable->render('base.dms_sm_branches.index');
    }

    /**
     * Show the form for creating a new DmsSmBranch.
     *
     * @return Response
     */
    public function create()
    {
        return view('base.dms_sm_branches.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created DmsSmBranch in storage.
     *
     * @param CreateDmsSmBranchRequest $request
     *
     * @return Response
     */
    public function store(CreateDmsSmBranchRequest $request)
    {
        $input = $request->all();

        $dmsSmBranch = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/dmsSmBranches.singular')]));

        return redirect(route('base.dmsSmBranches.index'));
    }

    /**
     * Display the specified DmsSmBranch.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmsSmBranch = $this->getRepositoryObj()->find($id);

        if (empty($dmsSmBranch)) {
            Flash::error(__('models/dmsSmBranches.singular').' '.__('messages.not_found'));

            return redirect(route('base.dmsSmBranches.index'));
        }

        return view('base.dms_sm_branches.show')->with('dmsSmBranch', $dmsSmBranch);
    }

    /**
     * Show the form for editing the specified DmsSmBranch.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmsSmBranch = $this->getRepositoryObj()->find($id);

        if (empty($dmsSmBranch)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsSmBranches.singular')]));

            return redirect(route('base.dmsSmBranches.index'));
        }

        return view('base.dms_sm_branches.edit')->with('dmsSmBranch', $dmsSmBranch)->with($this->getOptionItems());
    }

    /**
     * Update the specified DmsSmBranch in storage.
     *
     * @param  int              $id
     * @param UpdateDmsSmBranchRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDmsSmBranchRequest $request)
    {
        $dmsSmBranch = $this->getRepositoryObj()->find($id);

        if (empty($dmsSmBranch)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsSmBranches.singular')]));

            return redirect(route('base.dmsSmBranches.index'));
        }

        $dmsSmBranch = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/dmsSmBranches.singular')]));

        return redirect(route('base.dmsSmBranches.index'));
    }

    /**
     * Remove the specified DmsSmBranch from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmsSmBranch = $this->getRepositoryObj()->find($id);

        if (empty($dmsSmBranch)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsSmBranches.singular')]));

            return redirect(route('base.dmsSmBranches.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/dmsSmBranches.singular')]));

        return redirect(route('base.dmsSmBranches.index'));
    }

    /**
     * Provide options item based on relationship model DmsSmBranch from storage.         
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems(){        
        
        return [
                        
        ];
    }
}
