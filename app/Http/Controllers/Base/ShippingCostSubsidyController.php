<?php

namespace App\Http\Controllers\Base;

use App\DataTables\Base\ShippingCostSubsidyDataTable;
use App\Http\Requests\Base;
use App\Http\Requests\Base\CreateShippingCostSubsidyRequest;
use App\Http\Requests\Base\UpdateShippingCostSubsidyRequest;
use App\Repositories\Base\ShippingCostSubsidyRepository;

use Flash;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Base\DmsApSupplierRepository;
use App\Repositories\Inventory\DmsInvProductRepository;
use Response;
use Exception;

class ShippingCostSubsidyController extends AppBaseController
{
    /** @var  ShippingCostSubsidyRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = ShippingCostSubsidyRepository::class;
    }

    /**
     * Display a listing of the ShippingCostSubsidy.
     *
     * @param ShippingCostSubsidyDataTable $shippingCostSubsidyDataTable
     * @return Response
     */
    public function index(ShippingCostSubsidyDataTable $shippingCostSubsidyDataTable)
    {
        return $shippingCostSubsidyDataTable->render('base.shipping_cost_subsidies.index');
    }

    /**
     * Show the form for creating a new ShippingCostSubsidy.
     *
     * @return Response
     */
    public function create()
    {
        return view('base.shipping_cost_subsidies.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created ShippingCostSubsidy in storage.
     *
     * @param CreateShippingCostSubsidyRequest $request
     *
     * @return Response
     */
    public function store(CreateShippingCostSubsidyRequest $request)
    {
        $input = $request->all();

        $shippingCostSubsidy = $this->getRepositoryObj()->create($input);
        if($shippingCostSubsidy instanceof Exception){
            return redirect()->back()->withInput()->withErrors(['error', $shippingCostSubsidy->getMessage()]);
        }
        
        Flash::success(__('messages.saved', ['model' => __('models/shippingCostSubsidies.singular')]));

        return redirect(route('base.shippingCostSubsidies.index'));
    }

    /**
     * Display the specified ShippingCostSubsidy.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shippingCostSubsidy = $this->getRepositoryObj()->find($id);

        if (empty($shippingCostSubsidy)) {
            Flash::error(__('models/shippingCostSubsidies.singular').' '.__('messages.not_found'));

            return redirect(route('base.shippingCostSubsidies.index'));
        }

        return view('base.shipping_cost_subsidies.show')->with('shippingCostSubsidy', $shippingCostSubsidy);
    }

    /**
     * Show the form for editing the specified ShippingCostSubsidy.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $shippingCostSubsidy = $this->getRepositoryObj()->find($id);

        if (empty($shippingCostSubsidy)) {
            Flash::error(__('messages.not_found', ['model' => __('models/shippingCostSubsidies.singular')]));

            return redirect(route('base.shippingCostSubsidies.index'));
        }
        
        return view('base.shipping_cost_subsidies.edit')->with('shippingCostSubsidy', $shippingCostSubsidy)->with($this->getOptionItems());
    }

    /**
     * Update the specified ShippingCostSubsidy in storage.
     *
     * @param  int              $id
     * @param UpdateShippingCostSubsidyRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateShippingCostSubsidyRequest $request)
    {
        $shippingCostSubsidy = $this->getRepositoryObj()->find($id);

        if (empty($shippingCostSubsidy)) {
            Flash::error(__('messages.not_found', ['model' => __('models/shippingCostSubsidies.singular')]));

            return redirect(route('base.shippingCostSubsidies.index'));
        }

        $shippingCostSubsidy = $this->getRepositoryObj()->update($request->all(), $id);
        if($shippingCostSubsidy instanceof Exception){
            return redirect()->back()->withInput()->withErrors(['error', $shippingCostSubsidy->getMessage()]);
        }

        Flash::success(__('messages.updated', ['model' => __('models/shippingCostSubsidies.singular')]));

        return redirect(route('base.shippingCostSubsidies.index'));
    }

    /**
     * Remove the specified ShippingCostSubsidy from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $shippingCostSubsidy = $this->getRepositoryObj()->find($id);

        if (empty($shippingCostSubsidy)) {
            Flash::error(__('messages.not_found', ['model' => __('models/shippingCostSubsidies.singular')]));

            return redirect(route('base.shippingCostSubsidies.index'));
        }

        $delete = $this->getRepositoryObj()->delete($id);
        
        if($delete instanceof Exception){
            return redirect()->back()->withErrors(['error', $delete->getMessage()]);
        }

        Flash::success(__('messages.deleted', ['model' => __('models/shippingCostSubsidies.singular')]));

        return redirect(route('base.shippingCostSubsidies.index'));
    }

    /**
     * Provide options item based on relationship model ShippingCostSubsidy from storage.         
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems(){                
        $dmsInvProduct = new DmsInvProductRepository(app());        
        $dmsApSupplier = new DmsApSupplierRepository(app());
        return [            
            'productItems' => ['' => __('crud.option.dmsInvProduct_placeholder')] + $dmsInvProduct->allQuery()->disableModelCaching()->where('dtmEndDate','>=', \Carbon\Carbon::now()->addMonth(-1))->get()->pluck('szName', 'szId')->toArray(),            
            'originPlantItems' => ['' => __('crud.option.dmsApSupplier_placeholder')] + $dmsApSupplier->allQuery()->get()->pluck('szName', 'szId')->toArray(),
        ];
    }
}
