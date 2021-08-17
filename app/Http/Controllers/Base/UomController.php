<?php

namespace App\Http\Controllers\Base;

use App\DataTables\Base\UomDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Base\CreateUomRequest;
use App\Http\Requests\Base\UpdateUomRequest;
use App\Repositories\Base\UomCategoryRepository;
use App\Repositories\Base\UomRepository;
use Flash;
use Response;

class UomController extends AppBaseController
{
    /** @var UomRepository */
    private $uomRepository;

    public function __construct(UomRepository $uomRepo)
    {
        $this->uomRepository = $uomRepo;
    }

    /**
     * Display a listing of the Uom.
     *
     * @return Response
     */
    public function index(UomDataTable $uomDataTable)
    {
        return $uomDataTable->render('base.uoms.index');
    }

    /**
     * Show the form for creating a new Uom.
     *
     * @return Response
     */
    public function create()
    {
        return view('base.uoms.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created Uom in storage.
     *
     * @return Response
     */
    public function store(CreateUomRequest $request)
    {
        $input = $request->all();

        $uom = $this->uomRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/uoms.singular')]));

        return redirect(route('base.uoms.index'));
    }

    /**
     * Display the specified Uom.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $uom = $this->uomRepository->find($id);

        if (empty($uom)) {
            Flash::error(__('models/uoms.singular').' '.__('messages.not_found'));

            return redirect(route('base.uoms.index'));
        }

        return view('base.uoms.show')->with('uom', $uom);
    }

    /**
     * Show the form for editing the specified Uom.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $uom = $this->uomRepository->find($id);

        if (empty($uom)) {
            Flash::error(__('messages.not_found', ['model' => __('models/uoms.singular')]));

            return redirect(route('base.uoms.index'));
        }

        return view('base.uoms.edit')->with('uom', $uom)->with($this->getOptionItems());
    }

    /**
     * Update the specified Uom in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateUomRequest $request)
    {
        $uom = $this->uomRepository->find($id);

        if (empty($uom)) {
            Flash::error(__('messages.not_found', ['model' => __('models/uoms.singular')]));

            return redirect(route('base.uoms.index'));
        }

        $uom = $this->uomRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/uoms.singular')]));

        return redirect(route('base.uoms.index'));
    }

    /**
     * Remove the specified Uom from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $uom = $this->uomRepository->find($id);

        if (empty($uom)) {
            Flash::error(__('messages.not_found', ['model' => __('models/uoms.singular')]));

            return redirect(route('base.uoms.index'));
        }

        $this->uomRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/uoms.singular')]));

        return redirect(route('base.uoms.index'));
    }

    /**
     * Provide options item based on relationship model Uom from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        $uomCategory = new UomCategoryRepository(app());

        return [
            'uomCategoryItems' => ['' => __('crud.option.uomCategory_placeholder')] + $uomCategory->pluck(),
            'uomTypeItems' => ['references' => 'references', 'smaller' => 'smaller', 'bigger' => 'bigger']
        ];
    }
}
