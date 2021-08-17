<?php

namespace App\Http\Controllers\API\Inventory;

use App\Http\Requests\API\Inventory\CreateStockInventoryAPIRequest;
use App\Http\Requests\API\Inventory\UpdateStockInventoryAPIRequest;
use App\Models\Inventory\StockInventory;
use App\Repositories\Inventory\StockInventoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\Inventory\StockInventoryResource;
use Response;

/**
 * Class StockInventoryController
 * @package App\Http\Controllers\API\Inventory
 */

class StockInventoryAPIController extends AppBaseController
{
    /** @var  StockInventoryRepository */
    private $stockInventoryRepository;

    public function __construct(StockInventoryRepository $stockInventoryRepo)
    {
        $this->stockInventoryRepository = $stockInventoryRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/stockInventories",
     *      summary="Get a listing of the StockInventories.",
     *      tags={"StockInventory"},
     *      description="Get all StockInventories",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/StockInventory")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $stockInventories = $this->stockInventoryRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(StockInventoryResource::collection($stockInventories), 'Stock Inventories retrieved successfully');
    }

    /**
     * @param CreateStockInventoryAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/stockInventories",
     *      summary="Store a newly created StockInventory in storage",
     *      tags={"StockInventory"},
     *      description="Store StockInventory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="StockInventory that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/StockInventory")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/StockInventory"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateStockInventoryAPIRequest $request)
    {
        $input = $request->all();

        $stockInventory = $this->stockInventoryRepository->create($input);

        return $this->sendResponse(new StockInventoryResource($stockInventory), 'Stock Inventory saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/stockInventories/{id}",
     *      summary="Display the specified StockInventory",
     *      tags={"StockInventory"},
     *      description="Get StockInventory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of StockInventory",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/StockInventory"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var StockInventory $stockInventory */
        $stockInventory = $this->stockInventoryRepository->find($id);

        if (empty($stockInventory)) {
            return $this->sendError('Stock Inventory not found');
        }

        return $this->sendResponse(new StockInventoryResource($stockInventory), 'Stock Inventory retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateStockInventoryAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/stockInventories/{id}",
     *      summary="Update the specified StockInventory in storage",
     *      tags={"StockInventory"},
     *      description="Update StockInventory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of StockInventory",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="StockInventory that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/StockInventory")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/StockInventory"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateStockInventoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var StockInventory $stockInventory */
        $stockInventory = $this->stockInventoryRepository->find($id);

        if (empty($stockInventory)) {
            return $this->sendError('Stock Inventory not found');
        }

        $stockInventory = $this->stockInventoryRepository->update($input, $id);

        return $this->sendResponse(new StockInventoryResource($stockInventory), 'StockInventory updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/stockInventories/{id}",
     *      summary="Remove the specified StockInventory from storage",
     *      tags={"StockInventory"},
     *      description="Delete StockInventory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of StockInventory",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var StockInventory $stockInventory */
        $stockInventory = $this->stockInventoryRepository->find($id);

        if (empty($stockInventory)) {
            return $this->sendError('Stock Inventory not found');
        }

        $stockInventory->delete();

        return $this->sendSuccess('Stock Inventory deleted successfully');
    }
}
