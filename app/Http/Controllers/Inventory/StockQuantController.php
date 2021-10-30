<?php

namespace App\Http\Controllers\Inventory;

use App\DataTables\Inventory\StockQuantDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Inventory\CreateStockQuantRequest;
use App\Http\Requests\Inventory\UpdateStockQuantRequest;
use App\Repositories\Base\ProductRepository;
use App\Repositories\Base\UomRepository;
use App\Repositories\Inventory\StockQuantRepository;
use App\Repositories\Inventory\WarehouseRepository;
use Flash;
use Response;

class StockQuantController extends AppBaseController
{
    /** @var StockQuantRepository */
    private $stockQuantRepository;

    public function __construct(StockQuantRepository $stockQuantRepo)
    {
        $this->stockQuantRepository = $stockQuantRepo;
    }

    /**
     * Display a listing of the StockQuant.
     *
     * @return Response
     */
    public function index(StockQuantDataTable $stockQuantDataTable)
    {
        return $stockQuantDataTable->render('inventory.stock_quants.index');
    }

    /**
     * Show the form for creating a new StockQuant.
     *
     * @return Response
     */
    public function create()
    {
        return view('inventory.stock_quants.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created StockQuant in storage.
     *
     * @return Response
     */
    public function store(CreateStockQuantRequest $request)
    {
        $input = $request->all();

        $stockQuant = $this->stockQuantRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/stockQuants.singular')]));

        return redirect(route('inventory.stockQuants.index'));
    }

    /**
     * Display the specified StockQuant.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $stockQuant = $this->stockQuantRepository->find($id);

        if (empty($stockQuant)) {
            Flash::error(__('models/stockQuants.singular').' '.__('messages.not_found'));

            return redirect(route('inventory.stockQuants.index'));
        }

        return view('inventory.stock_quants.show')->with('stockQuant', $stockQuant);
    }

    /**
     * Show the form for editing the specified StockQuant.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $stockQuant = $this->stockQuantRepository->find($id);

        if (empty($stockQuant)) {
            Flash::error(__('messages.not_found', ['model' => __('models/stockQuants.singular')]));

            return redirect(route('inventory.stockQuants.index'));
        }

        return view('inventory.stock_quants.edit')->with('stockQuant', $stockQuant)->with($this->getOptionItems());
    }

    /**
     * Update the specified StockQuant in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateStockQuantRequest $request)
    {
        $stockQuant = $this->stockQuantRepository->find($id);

        if (empty($stockQuant)) {
            Flash::error(__('messages.not_found', ['model' => __('models/stockQuants.singular')]));

            return redirect(route('inventory.stockQuants.index'));
        }

        $stockQuant = $this->stockQuantRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/stockQuants.singular')]));

        return redirect(route('inventory.stockQuants.index'));
    }

    /**
     * Remove the specified StockQuant from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $stockQuant = $this->stockQuantRepository->find($id);

        if (empty($stockQuant)) {
            Flash::error(__('messages.not_found', ['model' => __('models/stockQuants.singular')]));

            return redirect(route('inventory.stockQuants.index'));
        }

        $this->stockQuantRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/stockQuants.singular')]));

        return redirect(route('inventory.stockQuants.index'));
    }

    /**
     * Provide options item based on relationship model StockQuant from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        $product = new ProductRepository(app());
        $uom = new UomRepository(app());
        $warehouse = new WarehouseRepository(app());

        return [
            'productItems' => ['' => __('crud.option.product_placeholder')] + $product->pluck(),
            'uomItems' => ['' => __('crud.option.uom_placeholder')] + $uom->pluck(),
            'warehouseItems' => ['' => __('crud.option.warehouse_placeholder')] + $warehouse->pluck(),
        ];
    }
}
