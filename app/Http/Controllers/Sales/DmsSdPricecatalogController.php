<?php

namespace App\Http\Controllers\Sales;

use App\DataTables\Sales\DmsSdPricecatalogDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Sales\CreateDmsSdPricecatalogRequest;
use App\Http\Requests\Sales\UpdateDmsSdPricecatalogRequest;
use App\Repositories\Sales\DmsSdPricecatalogRepository;
use Flash;
use Response;

class DmsSdPricecatalogController extends AppBaseController
{
    /** @var DmsSdPricecatalogRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = DmsSdPricecatalogRepository::class;
    }

    /**
     * Display a listing of the DmsSdPricecatalog.
     *
     * @return Response
     */
    public function index(DmsSdPricecatalogDataTable $dmsSdPricecatalogDataTable)
    {
        return $dmsSdPricecatalogDataTable->render('sales.dms_sd_pricecatalogs.index');
    }

    /**
     * Show the form for creating a new DmsSdPricecatalog.
     *
     * @return Response
     */
    public function create()
    {
        return view('sales.dms_sd_pricecatalogs.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created DmsSdPricecatalog in storage.
     *
     * @return Response
     */
    public function store(CreateDmsSdPricecatalogRequest $request)
    {
        $input = $request->all();

        $dmsSdPricecatalog = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/dmsSdPricecatalogs.singular')]));

        return redirect(route('sales.dmsSdPricecatalogs.index'));
    }

    /**
     * Display the specified DmsSdPricecatalog.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dmsSdPricecatalog = $this->getRepositoryObj()->find($id);

        if (empty($dmsSdPricecatalog)) {
            Flash::error(__('models/dmsSdPricecatalogs.singular').' '.__('messages.not_found'));

            return redirect(route('sales.dmsSdPricecatalogs.index'));
        }

        return view('sales.dms_sd_pricecatalogs.show')->with('dmsSdPricecatalog', $dmsSdPricecatalog);
    }

    /**
     * Show the form for editing the specified DmsSdPricecatalog.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dmsSdPricecatalog = $this->getRepositoryObj()->find($id);

        if (empty($dmsSdPricecatalog)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsSdPricecatalogs.singular')]));

            return redirect(route('sales.dmsSdPricecatalogs.index'));
        }

        return view('sales.dms_sd_pricecatalogs.edit')->with('dmsSdPricecatalog', $dmsSdPricecatalog)->with($this->getOptionItems());
    }

    /**
     * Update the specified DmsSdPricecatalog in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateDmsSdPricecatalogRequest $request)
    {
        $dmsSdPricecatalog = $this->getRepositoryObj()->find($id);

        if (empty($dmsSdPricecatalog)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsSdPricecatalogs.singular')]));

            return redirect(route('sales.dmsSdPricecatalogs.index'));
        }

        $dmsSdPricecatalog = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/dmsSdPricecatalogs.singular')]));

        return redirect(route('sales.dmsSdPricecatalogs.index'));
    }

    /**
     * Remove the specified DmsSdPricecatalog from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dmsSdPricecatalog = $this->getRepositoryObj()->find($id);

        if (empty($dmsSdPricecatalog)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dmsSdPricecatalogs.singular')]));

            return redirect(route('sales.dmsSdPricecatalogs.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/dmsSdPricecatalogs.singular')]));

        return redirect(route('sales.dmsSdPricecatalogs.index'));
    }

    /**
     * Provide options item based on relationship model DmsSdPricecatalog from storage.
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
