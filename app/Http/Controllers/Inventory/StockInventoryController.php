<?php

namespace App\Http\Controllers\Inventory;

use App\DataTables\Inventory\StockInventoryDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Inventory\CreateStockInventoryRequest;
use App\Http\Requests\Inventory\UpdateStockInventoryRequest;
use App\Repositories\Inventory\StockInventoryRepository;
use App\Repositories\Inventory\WarehouseRepository;
use Flash;
use Illuminate\Http\Request;
use Response;

class StockInventoryController extends AppBaseController
{
    /** @var StockInventoryRepository */
    private $stockInventoryRepository;

    public function __construct(StockInventoryRepository $stockInventoryRepo)
    {
        $this->stockInventoryRepository = $stockInventoryRepo;
    }

    /**
     * Display a listing of the StockInventory.
     *
     * @return Response
     */
    public function index(StockInventoryDataTable $stockInventoryDataTable)
    {
        return $stockInventoryDataTable->render('inventory.stock_inventories.index');
    }

    /**
     * Show the form for creating a new StockInventory.
     *
     * @return Response
     */
    public function create()
    {
        return view('inventory.stock_inventories.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created StockInventory in storage.
     *
     * @return Response
     */
    public function store(CreateStockInventoryRequest $request)
    {
        $input = $request->all();

        $stockInventory = $this->stockInventoryRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/stockInventories.singular')]));

        return redirect(route('inventory.stockInventories.index'));
    }

    /**
     * Display the specified StockInventory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $stockInventory = $this->stockInventoryRepository->find($id);

        if (empty($stockInventory)) {
            Flash::error(__('models/stockInventories.singular').' '.__('messages.not_found'));

            return redirect(route('inventory.stockInventories.index'));
        }

        return view('inventory.stock_inventories.show')->with('stockInventory', $stockInventory);
    }

    /**
     * Show the form for editing the specified StockInventory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $stockInventory = $this->stockInventoryRepository->find($id);

        if (empty($stockInventory)) {
            Flash::error(__('messages.not_found', ['model' => __('models/stockInventories.singular')]));

            return redirect(route('inventory.stockInventories.index'));
        }

        return view('inventory.stock_inventories.edit')->with('stockInventory', $stockInventory)->with($this->getOptionItems());
    }

    /**
     * Update the specified StockInventory in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateStockInventoryRequest $request)
    {
        $stockInventory = $this->stockInventoryRepository->find($id);

        if (empty($stockInventory)) {
            Flash::error(__('messages.not_found', ['model' => __('models/stockInventories.singular')]));

            return redirect(route('inventory.stockInventories.index'));
        }

        $stockInventory = $this->stockInventoryRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/stockInventories.singular')]));

        return redirect(route('inventory.stockInventories.index'));
    }

    /**
     * Remove the specified StockInventory from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $stockInventory = $this->stockInventoryRepository->find($id);

        if (empty($stockInventory)) {
            Flash::error(__('messages.not_found', ['model' => __('models/stockInventories.singular')]));

            return redirect(route('inventory.stockInventories.index'));
        }

        $this->stockInventoryRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/stockInventories.singular')]));

        return redirect(route('inventory.stockInventories.index'));
    }

    /**
     * Display a listing of the StockQuant Warehouse.
     *
     * @return Response
     */
    public function stockWarehouse()
    {
        $warehouseId = request('id');
        $stockQuant = \App\Models\Inventory\StockQuant::with(['product', 'uom'])->whereWarehouseId($warehouseId)->get();

        return view('inventory.stock_inventories.detail_stock')->with('stockQuant', $stockQuant);
    }

    /**
     * Provide options item based on relationship model StockInventory from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        $warehouse = new WarehouseRepository(app());

        return [
            'warehouseItems' => ['' => __('crud.option.warehouse_placeholder')] + $warehouse->pluck(),
        ];
    }
}
