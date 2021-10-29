<?php

namespace App\Http\Controllers\Inventory;

use App\DataTables\Inventory\DmsInvProductitemcategoryDataTable;
use App\Http\Requests\Inventory;
use App\Http\Requests\Inventory\CreateDmsInvProductitemcategoryRequest;
use App\Http\Requests\Inventory\UpdateDmsInvProductitemcategoryRequest;
use App\Repositories\Inventory\DmsInvProductitemcategoryRepository;

use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DmsInvProductitemcategoryController extends AppBaseController
{
    /** @var  DmsInvProductitemcategoryRepository */
    private $dmsInvProductitemcategoryRepository;

    public function __construct(DmsInvProductitemcategoryRepository $dmsInvProductitemcategoryRepo)
    {
        $this->dmsInvProductitemcategoryRepository = $dmsInvProductitemcategoryRepo;
    }

    /**
     * Display a listing of the DmsInvProductitemcategory.
     *
     * @param DmsInvProductitemcategoryDataTable $dmsInvProductitemcategoryDataTable
     * @return Response
     */
    public function index(DmsInvProductitemcategoryDataTable $dmsInvProductitemcategoryDataTable)
    {
        return $dmsInvProductitemcategoryDataTable->render('inventory.dms_inv_productitemcategories.index');
    }

    /**
     * Show the form for creating a new DmsInvProductitemcategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('inventory.dms_inv_productitemcategories.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created DmsInvProductitemcategory in storage.
     *
     * @param CreateDmsInvProductitemcategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateDmsInvProductitemcategoryRequest $request)
    {
        $input = $request->all();

        $dmsInvProductitemcategory = $this->dmsInvProductitemcategoryRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/dmsInvProductitemcategories.singular')]));

        return redirect(route('inventory.dmsInvProductitemcategories.index'));
    }

    /**
     * Display the specified DmsInvProductitemcategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmsInvProductitemcategory = $this->dmsInvProductitemcategoryRepository->find($id);

        if (empty($dmsInvProductitemcategory)) {
            Flash::error(__('models/dmsInvProductitemcategories.singular').' '.__('messages.not_found'));

            return redirect(route('inventory.dmsInvProductitemcategories.index'));
        }

        return view('inventory.dms_inv_productitemcategories.show')->with('dmsInvProductitemcategory', $dmsInvProductitemcategory);
    }

    /**
     * Show the form for editing the specified DmsInvProductitemcategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmsInvProductitemcategory = $this->dmsInvProductitemcategoryRepository->find($id);

        if (empty($dmsInvProductitemcategory)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsInvProductitemcategories.singular')]));

            return redirect(route('inventory.dmsInvProductitemcategories.index'));
        }

        return view('inventory.dms_inv_productitemcategories.edit')->with('dmsInvProductitemcategory', $dmsInvProductitemcategory)->with($this->getOptionItems());
    }

    /**
     * Update the specified DmsInvProductitemcategory in storage.
     *
     * @param  int              $id
     * @param UpdateDmsInvProductitemcategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDmsInvProductitemcategoryRequest $request)
    {
        $dmsInvProductitemcategory = $this->dmsInvProductitemcategoryRepository->find($id);

        if (empty($dmsInvProductitemcategory)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsInvProductitemcategories.singular')]));

            return redirect(route('inventory.dmsInvProductitemcategories.index'));
        }

        $dmsInvProductitemcategory = $this->dmsInvProductitemcategoryRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/dmsInvProductitemcategories.singular')]));

        return redirect(route('inventory.dmsInvProductitemcategories.index'));
    }

    /**
     * Remove the specified DmsInvProductitemcategory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmsInvProductitemcategory = $this->dmsInvProductitemcategoryRepository->find($id);

        if (empty($dmsInvProductitemcategory)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsInvProductitemcategories.singular')]));

            return redirect(route('inventory.dmsInvProductitemcategories.index'));
        }

        $this->dmsInvProductitemcategoryRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/dmsInvProductitemcategories.singular')]));

        return redirect(route('inventory.dmsInvProductitemcategories.index'));
    }

    /**
     * Provide options item based on relationship model DmsInvProductitemcategory from storage.         
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