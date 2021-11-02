<?php

namespace App\Http\Controllers\Inventory;

use App\DataTables\Inventory\DmsInvProductcategoryDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Inventory\CreateDmsInvProductcategoryRequest;
use App\Http\Requests\Inventory\UpdateDmsInvProductcategoryRequest;
use App\Repositories\Inventory\DmsInvProductcategoryRepository;
use Flash;
use Response;

class DmsInvProductcategoryController extends AppBaseController
{
    /** @var DmsInvProductcategoryRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = DmsInvProductcategoryRepository::class;
    }

    /**
     * Display a listing of the DmsInvProductcategory.
     *
     * @return Response
     */
    public function index(DmsInvProductcategoryDataTable $dmsInvProductcategoryDataTable)
    {
        return $dmsInvProductcategoryDataTable->render('inventory.dms_inv_productcategories.index');
    }

    /**
     * Show the form for creating a new DmsInvProductcategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('inventory.dms_inv_productcategories.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created DmsInvProductcategory in storage.
     *
     * @return Response
     */
    public function store(CreateDmsInvProductcategoryRequest $request)
    {
        $input = $request->all();

        $dmsInvProductcategory = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/dmsInvProductcategories.singular')]));

        return redirect(route('inventory.dmsInvProductcategories.index'));
    }

    /**
     * Display the specified DmsInvProductcategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmsInvProductcategory = $this->getRepositoryObj()->find($id);

        if (empty($dmsInvProductcategory)) {
            Flash::error(__('models/dmsInvProductcategories.singular').' '.__('messages.not_found'));

            return redirect(route('inventory.dmsInvProductcategories.index'));
        }

        return view('inventory.dms_inv_productcategories.show')->with('dmsInvProductcategory', $dmsInvProductcategory);
    }

    /**
     * Show the form for editing the specified DmsInvProductcategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmsInvProductcategory = $this->getRepositoryObj()->find($id);

        if (empty($dmsInvProductcategory)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsInvProductcategories.singular')]));

            return redirect(route('inventory.dmsInvProductcategories.index'));
        }

        return view('inventory.dms_inv_productcategories.edit')->with('dmsInvProductcategory', $dmsInvProductcategory)->with($this->getOptionItems());
    }

    /**
     * Update the specified DmsInvProductcategory in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateDmsInvProductcategoryRequest $request)
    {
        $dmsInvProductcategory = $this->getRepositoryObj()->find($id);

        if (empty($dmsInvProductcategory)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsInvProductcategories.singular')]));

            return redirect(route('inventory.dmsInvProductcategories.index'));
        }

        $dmsInvProductcategory = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/dmsInvProductcategories.singular')]));

        return redirect(route('inventory.dmsInvProductcategories.index'));
    }

    /**
     * Remove the specified DmsInvProductcategory from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmsInvProductcategory = $this->getRepositoryObj()->find($id);

        if (empty($dmsInvProductcategory)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsInvProductcategories.singular')]));

            return redirect(route('inventory.dmsInvProductcategories.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/dmsInvProductcategories.singular')]));

        return redirect(route('inventory.dmsInvProductcategories.index'));
    }

    /**
     * Provide options item based on relationship model DmsInvProductcategory from storage.
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
