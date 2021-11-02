<?php

namespace App\Http\Controllers\API\Inventory;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\Inventory\CreateStockPickingTypeAPIRequest;
use App\Http\Requests\API\Inventory\UpdateStockPickingTypeAPIRequest;
use App\Http\Resources\Inventory\StockPickingTypeResource;
use App\Models\Inventory\StockPickingType;
use App\Repositories\Inventory\StockPickingTypeRepository;
use Illuminate\Http\Request;
use Response;

/**
 * Class StockPickingTypeController.
 */
class StockPickingTypeAPIController extends AppBaseController
{
    /** @var StockPickingTypeRepository */
    protected $repository;

    public function __construct()
    {
    }

    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/stockPickingTypes",
     *      summary="Get a listing of the StockPickingTypes.",
     *      tags={"StockPickingType"},
     *      description="Get all StockPickingTypes",
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
     *                  @SWG\Items(ref="#/definitions/StockPickingType")
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
        $stockPickingTypes = $this->getRepositoryObj()->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(StockPickingTypeResource::collection($stockPickingTypes), 'Stock Picking Types retrieved successfully');
    }

    /**
     * @return Response
     *
     * @SWG\Post(
     *      path="/stockPickingTypes",
     *      summary="Store a newly created StockPickingType in storage",
     *      tags={"StockPickingType"},
     *      description="Store StockPickingType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="StockPickingType that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/StockPickingType")
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
     *                  ref="#/definitions/StockPickingType"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateStockPickingTypeAPIRequest $request)
    {
        $input = $request->all();

        $stockPickingType = $this->getRepositoryObj()->create($input);

        return $this->sendResponse(new StockPickingTypeResource($stockPickingType), 'Stock Picking Type saved successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Get(
     *      path="/stockPickingTypes/{id}",
     *      summary="Display the specified StockPickingType",
     *      tags={"StockPickingType"},
     *      description="Get StockPickingType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of StockPickingType",
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
     *                  ref="#/definitions/StockPickingType"
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
        /** @var StockPickingType $stockPickingType */
        $stockPickingType = $this->getRepositoryObj()->find($id);

        if (empty($stockPickingType)) {
            return $this->sendError('Stock Picking Type not found');
        }

        return $this->sendResponse(new StockPickingTypeResource($stockPickingType), 'Stock Picking Type retrieved successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Put(
     *      path="/stockPickingTypes/{id}",
     *      summary="Update the specified StockPickingType in storage",
     *      tags={"StockPickingType"},
     *      description="Update StockPickingType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of StockPickingType",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="StockPickingType that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/StockPickingType")
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
     *                  ref="#/definitions/StockPickingType"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateStockPickingTypeAPIRequest $request)
    {
        $input = $request->all();

        /** @var StockPickingType $stockPickingType */
        $stockPickingType = $this->getRepositoryObj()->find($id);

        if (empty($stockPickingType)) {
            return $this->sendError('Stock Picking Type not found');
        }

        $stockPickingType = $this->getRepositoryObj()->update($input, $id);

        return $this->sendResponse(new StockPickingTypeResource($stockPickingType), 'StockPickingType updated successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Delete(
     *      path="/stockPickingTypes/{id}",
     *      summary="Remove the specified StockPickingType from storage",
     *      tags={"StockPickingType"},
     *      description="Delete StockPickingType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of StockPickingType",
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
        /** @var StockPickingType $stockPickingType */
        $stockPickingType = $this->getRepositoryObj()->find($id);

        if (empty($stockPickingType)) {
            return $this->sendError('Stock Picking Type not found');
        }

        $stockPickingType->delete();

        return $this->sendSuccess('Stock Picking Type deleted successfully');
    }
}
