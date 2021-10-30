<?php

namespace App\Http\Controllers\Inventory;

use App\DataTables\Inventory\StockPickingTypeDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Inventory\CreateStockPickingTypeRequest;
use App\Http\Requests\Inventory\UpdateStockPickingTypeRequest;
use App\Repositories\Inventory\StockPickingTypeRepository;
use Flash;
use Response;

class StockPickingTypeController extends AppBaseController
{
    /** @var StockPickingTypeRepository */
    private $stockPickingTypeRepository;

    public function __construct(StockPickingTypeRepository $stockPickingTypeRepo)
    {
        $this->stockPickingTypeRepository = $stockPickingTypeRepo;
    }

    /**
     * Display a listing of the StockPickingType.
     *
     * @return Response
     */
    public function index(StockPickingTypeDataTable $stockPickingTypeDataTable)
    {
        return $stockPickingTypeDataTable->render('inventory.stock_picking_types.index');
    }

    /**
     * Show the form for creating a new StockPickingType.
     *
     * @return Response
     */
    public function create()
    {
        return view('inventory.stock_picking_types.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created StockPickingType in storage.
     *
     * @return Response
     */
    public function store(CreateStockPickingTypeRequest $request)
    {
        $input = $request->all();

        $stockPickingType = $this->stockPickingTypeRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/stockPickingTypes.singular')]));

        return redirect(route('inventory.stockPickingTypes.index'));
    }

    /**
     * Display the specified StockPickingType.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $stockPickingType = $this->stockPickingTypeRepository->find($id);

        if (empty($stockPickingType)) {
            Flash::error(__('models/stockPickingTypes.singular').' '.__('messages.not_found'));

            return redirect(route('inventory.stockPickingTypes.index'));
        }

        return view('inventory.stock_picking_types.show')->with('stockPickingType', $stockPickingType);
    }

    /**
     * Show the form for editing the specified StockPickingType.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $stockPickingType = $this->stockPickingTypeRepository->find($id);

        if (empty($stockPickingType)) {
            Flash::error(__('messages.not_found', ['model' => __('models/stockPickingTypes.singular')]));

            return redirect(route('inventory.stockPickingTypes.index'));
        }

        return view('inventory.stock_picking_types.edit')->with('stockPickingType', $stockPickingType)->with($this->getOptionItems());
    }

    /**
     * Update the specified StockPickingType in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateStockPickingTypeRequest $request)
    {
        $stockPickingType = $this->stockPickingTypeRepository->find($id);

        if (empty($stockPickingType)) {
            Flash::error(__('messages.not_found', ['model' => __('models/stockPickingTypes.singular')]));

            return redirect(route('inventory.stockPickingTypes.index'));
        }

        $stockPickingType = $this->stockPickingTypeRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/stockPickingTypes.singular')]));

        return redirect(route('inventory.stockPickingTypes.index'));
    }

    /**
     * Remove the specified StockPickingType from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $stockPickingType = $this->stockPickingTypeRepository->find($id);

        if (empty($stockPickingType)) {
            Flash::error(__('messages.not_found', ['model' => __('models/stockPickingTypes.singular')]));

            return redirect(route('inventory.stockPickingTypes.index'));
        }

        $this->stockPickingTypeRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/stockPickingTypes.singular')]));

        return redirect(route('inventory.stockPickingTypes.index'));
    }

    /**
     * Provide options item based on relationship model StockPickingType from storage.
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
