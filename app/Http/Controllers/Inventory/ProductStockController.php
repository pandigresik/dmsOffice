<?php

namespace App\Http\Controllers\Inventory;

use App\DataTables\Inventory\ProductStockDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Inventory\CreateProductStockRequest;
use App\Http\Requests\Inventory\UpdateProductStockRequest;
use App\Models\Inventory\ProductStock;
use App\Repositories\Base\DmsSmBranchRepository;
use App\Repositories\Inventory\ProductStockRepository;
use Carbon\Carbon;
use Exception;
use Flash;
use Response;

class ProductStockController extends AppBaseController
{
    /** @var ProductStockRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = ProductStockRepository::class;
    }

    /**
     * Display a listing of the ProductStock.
     *
     * @return Response
     */
    public function index(ProductStockDataTable $productStockDataTable)
    {
        return $productStockDataTable->render('inventory.product_stocks.index');
    }

    /**
     * Show the form for creating a new ProductStock.
     *
     * @return Response
     */
    public function create()
    {
        return view('inventory.product_stocks.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created ProductStock in storage.
     *
     * @return Response
     */
    public function store(CreateProductStockRequest $request)
    {
        $input = $request->all();
        $productStock = $this->getRepositoryObj()->create($input);
        if($productStock instanceof Exception){
            return redirect()->back()->withInput()->withErrors(['error', $productStock->getMessage()]);
        }
        
        return redirect(route('inventory.productStocks.index'));
    }

    /**
     * Display the specified ProductStock.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show(CreateProductStockRequest $request, $id)
    {
        $input = $request->all();
        $productStock = $this->getRepositoryObj()->generate($input);

        $period = Carbon::createFromFormat('Y-m', $input['period'])->subMonth();
        $startDate = $input['period'].'-01';
        $endDate = Carbon::createFromFormat('Y-m-d', $startDate)->endOfMonth()->format('Y-m-d');

        return view('inventory.product_stocks.list')->with(['collection' => $productStock]);
    }

    /**
     * Show the form for editing the specified ProductStock.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productStock = $this->getRepositoryObj()->find($id);

        if (empty($productStock)) {
            Flash::error(__('messages.not_found', ['model' => __('models/productStocks.singular')]));

            return redirect(route('inventory.productStocks.index'));
        }

        return view('inventory.product_stocks.edit')->with('productStock', $productStock)->with($this->getOptionItems());
    }

    /**
     * Update the specified ProductStock in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateProductStockRequest $request)
    {
        $productStock = $this->getRepositoryObj()->find($id);

        if (empty($productStock)) {
            Flash::error(__('messages.not_found', ['model' => __('models/productStocks.singular')]));

            return redirect(route('inventory.productStocks.index'));
        }

        $productStock = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/productStocks.singular')]));

        return redirect(route('inventory.productStocks.index'));
    }

    /**
     * Remove the specified ProductStock from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productStock = $this->getRepositoryObj()->find($id);

        if (empty($productStock)) {
            Flash::error(__('messages.not_found', ['model' => __('models/productStocks.singular')]));

            return redirect(route('inventory.productStocks.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/productStocks.singular')]));

        return redirect(route('inventory.productStocks.index'));
    }

    /**
     * Provide options item based on relationship model ProductStock from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        $branch = new DmsSmBranchRepository(app());
        $user = \Auth::user();
        return [
            'branchItems' => ['' => 'Pilih depo'] + config('entity.gudangPusat')[$user->entity_id] + $branch->pluck([], null, null, 'szId', 'szName'),
        ];
    }
}
