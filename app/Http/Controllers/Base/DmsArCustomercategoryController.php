<?php

namespace App\Http\Controllers\Base;

use App\DataTables\Base\DmsArCustomercategoryDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Base\CreateDmsArCustomercategoryRequest;
use App\Http\Requests\Base\UpdateDmsArCustomercategoryRequest;
use App\Repositories\Base\DmsArCustomercategoryRepository;
use Flash;
use Response;

class DmsArCustomercategoryController extends AppBaseController
{
    /** @var DmsArCustomercategoryRepository */
    private $dmsArCustomercategoryRepository;

    public function __construct(DmsArCustomercategoryRepository $dmsArCustomercategoryRepo)
    {
        $this->dmsArCustomercategoryRepository = $dmsArCustomercategoryRepo;
    }

    /**
     * Display a listing of the DmsArCustomercategory.
     *
     * @return Response
     */
    public function index(DmsArCustomercategoryDataTable $dmsArCustomercategoryDataTable)
    {
        return $dmsArCustomercategoryDataTable->render('base.dms_ar_customercategories.index');
    }

    /**
     * Show the form for creating a new DmsArCustomercategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('base.dms_ar_customercategories.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created DmsArCustomercategory in storage.
     *
     * @return Response
     */
    public function store(CreateDmsArCustomercategoryRequest $request)
    {
        $input = $request->all();

        $dmsArCustomercategory = $this->dmsArCustomercategoryRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/dmsArCustomercategories.singular')]));

        return redirect(route('base.dmsArCustomercategories.index'));
    }

    /**
     * Display the specified DmsArCustomercategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmsArCustomercategory = $this->dmsArCustomercategoryRepository->find($id);

        if (empty($dmsArCustomercategory)) {
            Flash::error(__('models/dmsArCustomercategories.singular').' '.__('messages.not_found'));

            return redirect(route('base.dmsArCustomercategories.index'));
        }

        return view('base.dms_ar_customercategories.show')->with('dmsArCustomercategory', $dmsArCustomercategory);
    }

    /**
     * Show the form for editing the specified DmsArCustomercategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmsArCustomercategory = $this->dmsArCustomercategoryRepository->find($id);

        if (empty($dmsArCustomercategory)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsArCustomercategories.singular')]));

            return redirect(route('base.dmsArCustomercategories.index'));
        }

        return view('base.dms_ar_customercategories.edit')->with('dmsArCustomercategory', $dmsArCustomercategory)->with($this->getOptionItems());
    }

    /**
     * Update the specified DmsArCustomercategory in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateDmsArCustomercategoryRequest $request)
    {
        $dmsArCustomercategory = $this->dmsArCustomercategoryRepository->find($id);

        if (empty($dmsArCustomercategory)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsArCustomercategories.singular')]));

            return redirect(route('base.dmsArCustomercategories.index'));
        }

        $dmsArCustomercategory = $this->dmsArCustomercategoryRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/dmsArCustomercategories.singular')]));

        return redirect(route('base.dmsArCustomercategories.index'));
    }

    /**
     * Remove the specified DmsArCustomercategory from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmsArCustomercategory = $this->dmsArCustomercategoryRepository->find($id);

        if (empty($dmsArCustomercategory)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsArCustomercategories.singular')]));

            return redirect(route('base.dmsArCustomercategories.index'));
        }

        $this->dmsArCustomercategoryRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/dmsArCustomercategories.singular')]));

        return redirect(route('base.dmsArCustomercategories.index'));
    }

    /**
     * Provide options item based on relationship model DmsArCustomercategory from storage.
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
