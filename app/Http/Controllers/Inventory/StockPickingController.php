<?php

namespace App\Http\Controllers\Inventory;

use App\DataTables\Inventory\StockPickingDataTable;
use App\Http\Requests\Inventory;
use App\Http\Requests\Inventory\CreateStockPickingRequest;
use App\Http\Requests\Inventory\UpdateStockPickingRequest;
use App\Repositories\Inventory\StockPickingRepository;
use App\Repositories\Inventory\StockPickingTypeRepository;
use App\Repositories\Inventory\WarehouseRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class StockPickingController extends AppBaseController
{
    /** @var  StockPickingRepository */
    private $stockPickingRepository;

    public function __construct(StockPickingRepository $stockPickingRepo)
    {
        $this->stockPickingRepository = $stockPickingRepo;
    }

    /**
     * Display a listing of the StockPicking.
     *
     * @param StockPickingDataTable $stockPickingDataTable
     * @return Response
     */
    public function index(StockPickingDataTable $stockPickingDataTable)
    {
        return $stockPickingDataTable->render('inventory.stock_pickings.index');
    }

    /**
     * Show the form for creating a new StockPicking.
     *
     * @return Response
     */
    public function create()
    {
        return view('inventory.stock_pickings.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created StockPicking in storage.
     *
     * @param CreateStockPickingRequest $request
     *
     * @return Response
     */
    public function store(CreateStockPickingRequest $request)
    {
        $input = $request->all();

        $stockPicking = $this->stockPickingRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/stockPickings.singular')]));

        return redirect(route('inventory.stockPickings.index'));
    }

    /**
     * Display the specified StockPicking.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $stockPicking = $this->stockPickingRepository->find($id);

        if (empty($stockPicking)) {
            Flash::error(__('models/stockPickings.singular').' '.__('messages.not_found'));

            return redirect(route('inventory.stockPickings.index'));
        }

        return view('inventory.stock_pickings.show')->with('stockPicking', $stockPicking);
    }

    /**
     * Show the form for editing the specified StockPicking.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $stockPicking = $this->stockPickingRepository->find($id);

        if (empty($stockPicking)) {
            Flash::error(__('messages.not_found', ['model' => __('models/stockPickings.singular')]));

            return redirect(route('inventory.stockPickings.index'));
        }

        return view('inventory.stock_pickings.edit')->with('stockPicking', $stockPicking)->with($this->getOptionItems());
    }

    /**
     * Update the specified StockPicking in storage.
     *
     * @param  int              $id
     * @param UpdateStockPickingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStockPickingRequest $request)
    {
        $stockPicking = $this->stockPickingRepository->find($id);

        if (empty($stockPicking)) {
            Flash::error(__('messages.not_found', ['model' => __('models/stockPickings.singular')]));

            return redirect(route('inventory.stockPickings.index'));
        }

        $stockPicking = $this->stockPickingRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/stockPickings.singular')]));

        return redirect(route('inventory.stockPickings.index'));
    }

    /**
     * Remove the specified StockPicking from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $stockPicking = $this->stockPickingRepository->find($id);

        if (empty($stockPicking)) {
            Flash::error(__('messages.not_found', ['model' => __('models/stockPickings.singular')]));

            return redirect(route('inventory.stockPickings.index'));
        }

        $this->stockPickingRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/stockPickings.singular')]));

        return redirect(route('inventory.stockPickings.index'));
    }

    /**
     * Provide options item based on relationship model StockPicking from storage.         
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems(){        
        $stockPickingType = new StockPickingTypeRepository(app());
        $warehouse = new WarehouseRepository(app());
        return [
            'stockPickingTypeItems' => ['' => __('crud.option.stockPickingType_placeholder')] + $stockPickingType->pluck(),
            'warehouseItems' => ['' => __('crud.option.warehouse_placeholder')] + $warehouse->pluck()            
        ];
    }
}
