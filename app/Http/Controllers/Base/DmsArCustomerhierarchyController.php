<?php

namespace App\Http\Controllers\Base;

use App\DataTables\Base\DmsArCustomerhierarchyDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Base\CreateDmsArCustomerhierarchyRequest;
use App\Http\Requests\Base\UpdateDmsArCustomerhierarchyRequest;
use App\Repositories\Base\DmsArCustomerhierarchyRepository;
use Flash;
use Response;

class DmsArCustomerhierarchyController extends AppBaseController
{
    /** @var DmsArCustomerhierarchyRepository */
    private $dmsArCustomerhierarchyRepository;

    public function __construct(DmsArCustomerhierarchyRepository $dmsArCustomerhierarchyRepo)
    {
        $this->dmsArCustomerhierarchyRepository = $dmsArCustomerhierarchyRepo;
    }

    /**
     * Display a listing of the DmsArCustomerhierarchy.
     *
     * @return Response
     */
    public function index(DmsArCustomerhierarchyDataTable $dmsArCustomerhierarchyDataTable)
    {
        return $dmsArCustomerhierarchyDataTable->render('base.dms_ar_customerhierarchies.index');
    }

    /**
     * Show the form for creating a new DmsArCustomerhierarchy.
     *
     * @return Response
     */
    public function create()
    {
        return view('base.dms_ar_customerhierarchies.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created DmsArCustomerhierarchy in storage.
     *
     * @return Response
     */
    public function store(CreateDmsArCustomerhierarchyRequest $request)
    {
        $input = $request->all();

        $dmsArCustomerhierarchy = $this->dmsArCustomerhierarchyRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/dmsArCustomerhierarchies.singular')]));

        return redirect(route('base.dmsArCustomerhierarchies.index'));
    }

    /**
     * Display the specified DmsArCustomerhierarchy.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmsArCustomerhierarchy = $this->dmsArCustomerhierarchyRepository->find($id);

        if (empty($dmsArCustomerhierarchy)) {
            Flash::error(__('models/dmsArCustomerhierarchies.singular').' '.__('messages.not_found'));

            return redirect(route('base.dmsArCustomerhierarchies.index'));
        }

        return view('base.dms_ar_customerhierarchies.show')->with('dmsArCustomerhierarchy', $dmsArCustomerhierarchy);
    }

    /**
     * Show the form for editing the specified DmsArCustomerhierarchy.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmsArCustomerhierarchy = $this->dmsArCustomerhierarchyRepository->find($id);

        if (empty($dmsArCustomerhierarchy)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsArCustomerhierarchies.singular')]));

            return redirect(route('base.dmsArCustomerhierarchies.index'));
        }

        return view('base.dms_ar_customerhierarchies.edit')->with('dmsArCustomerhierarchy', $dmsArCustomerhierarchy)->with($this->getOptionItems());
    }

    /**
     * Update the specified DmsArCustomerhierarchy in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateDmsArCustomerhierarchyRequest $request)
    {
        $dmsArCustomerhierarchy = $this->dmsArCustomerhierarchyRepository->find($id);

        if (empty($dmsArCustomerhierarchy)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsArCustomerhierarchies.singular')]));

            return redirect(route('base.dmsArCustomerhierarchies.index'));
        }

        $dmsArCustomerhierarchy = $this->dmsArCustomerhierarchyRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/dmsArCustomerhierarchies.singular')]));

        return redirect(route('base.dmsArCustomerhierarchies.index'));
    }

    /**
     * Remove the specified DmsArCustomerhierarchy from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmsArCustomerhierarchy = $this->dmsArCustomerhierarchyRepository->find($id);

        if (empty($dmsArCustomerhierarchy)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsArCustomerhierarchies.singular')]));

            return redirect(route('base.dmsArCustomerhierarchies.index'));
        }

        $this->dmsArCustomerhierarchyRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/dmsArCustomerhierarchies.singular')]));

        return redirect(route('base.dmsArCustomerhierarchies.index'));
    }

    /**
     * Provide options item based on relationship model DmsArCustomerhierarchy from storage.
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
