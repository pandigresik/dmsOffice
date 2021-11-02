<?php

namespace App\Http\Controllers\API\Inventory;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\Inventory\CreateStockPickingAPIRequest;
use App\Http\Requests\API\Inventory\UpdateStockPickingAPIRequest;
use App\Http\Resources\Inventory\StockPickingResource;
use App\Models\Inventory\StockPicking;
use App\Repositories\Inventory\StockPickingRepository;
use Illuminate\Http\Request;
use Response;

/**
 * Class StockPickingController.
 */
class StockPickingAPIController extends AppBaseController
{
    /** @var StockPickingRepository */
    protected $repository;

    public function __construct()
    {
    }

    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/stockPickings",
     *      summary="Get a listing of the StockPickings.",
     *      tags={"StockPicking"},
     *      description="Get all StockPickings",
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
     *                  @SWG\Items(ref="#/definitions/StockPicking")
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
        $stockPickings = $this->getRepositoryObj()->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(StockPickingResource::collection($stockPickings), 'Stock Pickings retrieved successfully');
    }

    /**
     * @return Response
     *
     * @SWG\Post(
     *      path="/stockPickings",
     *      summary="Store a newly created StockPicking in storage",
     *      tags={"StockPicking"},
     *      description="Store StockPicking",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="StockPicking that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/StockPicking")
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
     *                  ref="#/definitions/StockPicking"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateStockPickingAPIRequest $request)
    {
        $input = $request->all();

        $stockPicking = $this->getRepositoryObj()->create($input);

        return $this->sendResponse(new StockPickingResource($stockPicking), 'Stock Picking saved successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Get(
     *      path="/stockPickings/{id}",
     *      summary="Display the specified StockPicking",
     *      tags={"StockPicking"},
     *      description="Get StockPicking",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of StockPicking",
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
     *                  ref="#/definitions/StockPicking"
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
        /** @var StockPicking $stockPicking */
        $stockPicking = $this->getRepositoryObj()->find($id);

        if (empty($stockPicking)) {
            return $this->sendError('Stock Picking not found');
        }

        return $this->sendResponse(new StockPickingResource($stockPicking), 'Stock Picking retrieved successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Put(
     *      path="/stockPickings/{id}",
     *      summary="Update the specified StockPicking in storage",
     *      tags={"StockPicking"},
     *      description="Update StockPicking",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of StockPicking",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="StockPicking that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/StockPicking")
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
     *                  ref="#/definitions/StockPicking"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateStockPickingAPIRequest $request)
    {
        $input = $request->all();

        /** @var StockPicking $stockPicking */
        $stockPicking = $this->getRepositoryObj()->find($id);

        if (empty($stockPicking)) {
            return $this->sendError('Stock Picking not found');
        }

        $stockPicking = $this->getRepositoryObj()->update($input, $id);

        return $this->sendResponse(new StockPickingResource($stockPicking), 'StockPicking updated successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Delete(
     *      path="/stockPickings/{id}",
     *      summary="Remove the specified StockPicking from storage",
     *      tags={"StockPicking"},
     *      description="Delete StockPicking",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of StockPicking",
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
        /** @var StockPicking $stockPicking */
        $stockPicking = $this->getRepositoryObj()->find($id);

        if (empty($stockPicking)) {
            return $this->sendError('Stock Picking not found');
        }

        $stockPicking->delete();

        return $this->sendSuccess('Stock Picking deleted successfully');
    }
}
