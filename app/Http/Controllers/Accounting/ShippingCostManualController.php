<?php

namespace App\Http\Controllers\Accounting;

use App\DataTables\Accounting\ShippingCostManualDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Accounting\CreateShippingCostManualRequest;
use App\Http\Requests\Accounting\UpdateShippingCostManualRequest;
use App\Repositories\Accounting\ShippingCostManualRepository;
use App\Repositories\Base\DmsSmBranchRepository;
use App\Repositories\Inventory\DmsInvCarrierRepository;
use Flash;
use Response;

class ShippingCostManualController extends AppBaseController
{
    /** @var ShippingCostManualRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = ShippingCostManualRepository::class;
    }

    /**
     * Display a listing of the ShippingCostManual.
     *
     * @return Response
     */
    public function index(ShippingCostManualDataTable $shippingCostManualDataTable)
    {
        return $shippingCostManualDataTable->render('accounting.shipping_cost_manuals.index');
    }

    /**
     * Show the form for creating a new ShippingCostManual.
     *
     * @return Response
     */
    public function create()
    {
        return view('accounting.shipping_cost_manuals.create')->with($this->getOptionItems())->with('details', []);
    }

    /**
     * Store a newly created ShippingCostManual in storage.
     *
     * @return Response
     */
    public function store(CreateShippingCostManualRequest $request)
    {
        $input = $request->all();

        $shippingCostManual = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/shippingCostManuals.singular')]));

        return redirect(route('accounting.shippingCostManuals.index'));
    }

    /**
     * Display the specified ShippingCostManual.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shippingCostManual = $this->getRepositoryObj()->find($id);

        if (empty($shippingCostManual)) {
            Flash::error(__('models/shippingCostManuals.singular').' '.__('messages.not_found'));

            return redirect(route('accounting.shippingCostManuals.index'));
        }

        return view('accounting.shipping_cost_manuals.show')->with('shippingCostManual', $shippingCostManual);
    }

    /**
     * Show the form for editing the specified ShippingCostManual.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $shippingCostManual = $this->getRepositoryObj()->find($id);

        if (empty($shippingCostManual)) {
            Flash::error(__('messages.not_found', ['model' => __('models/shippingCostManuals.singular')]));

            return redirect(route('accounting.shippingCostManuals.index'));
        }

        return view('accounting.shipping_cost_manuals.edit')->with(['shippingCostManual' => $shippingCostManual, 'details' => $shippingCostManual->details])->with($this->getOptionItems());
    }

    /**
     * Update the specified ShippingCostManual in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateShippingCostManualRequest $request)
    {
        $shippingCostManual = $this->getRepositoryObj()->find($id);

        if (empty($shippingCostManual)) {
            Flash::error(__('messages.not_found', ['model' => __('models/shippingCostManuals.singular')]));

            return redirect(route('accounting.shippingCostManuals.index'));
        }

        $shippingCostManual = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/shippingCostManuals.singular')]));

        return redirect(route('accounting.shippingCostManuals.index'));
    }

    /**
     * Remove the specified ShippingCostManual from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $shippingCostManual = $this->getRepositoryObj()->find($id);

        if (empty($shippingCostManual)) {
            Flash::error(__('messages.not_found', ['model' => __('models/shippingCostManuals.singular')]));

            return redirect(route('accounting.shippingCostManuals.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/shippingCostManuals.singular')]));

        return redirect(route('accounting.shippingCostManuals.index'));
    }

    /**
     * Provide options item based on relationship model ShippingCostManual from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        $branch = new DmsSmBranchRepository(app());
        $carrier = new DmsInvCarrierRepository(app());

        return [
            'originBranchItems' => $branch->pluck([], null, null, 'szId', 'szName'),
            'destinationBranchItems' => $branch->pluck([], null, null, 'szId', 'szName'),
            'carrierItems' => $carrier->pluck([], null, null, 'szId', 'szName'),
        ];
    }
}
