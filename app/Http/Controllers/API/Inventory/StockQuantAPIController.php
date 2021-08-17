<?php

namespace App\Http\Controllers\API\Inventory;

use App\Http\Requests\API\Inventory\CreateStockQuantAPIRequest;
use App\Http\Requests\API\Inventory\UpdateStockQuantAPIRequest;
use App\Models\Inventory\StockQuant;
use App\Repositories\Inventory\StockQuantRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\Inventory\StockQuantResource;
use Response;

/**
 * Class StockQuantController
 * @package App\Http\Controllers\API\Inventory
 */

class StockQuantAPIController extends AppBaseController
{
    /** @var  StockQuantRepository */
    private $stockQuantRepository;

    public function __construct(StockQuantRepository $stockQuantRepo)
    {
        $this->stockQuantRepository = $stockQuantRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/stockQuants",
     *      summary="Get a listing of the StockQuants.",
     *      tags={"StockQuant"},
     *      description="Get all StockQuants",
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
     *                  @SWG\Items(ref="#/definitions/StockQuant")
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
        $stockQuants = $this->stockQuantRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(StockQuantResource::collection($stockQuants), 'Stock Quants retrieved successfully');
    }

    /**
     * @param CreateStockQuantAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/stockQuants",
     *      summary="Store a newly created StockQuant in storage",
     *      tags={"StockQuant"},
     *      description="Store StockQuant",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="StockQuant that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/StockQuant")
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
     *                  ref="#/definitions/StockQuant"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateStockQuantAPIRequest $request)
    {
        $input = $request->all();

        $stockQuant = $this->stockQuantRepository->create($input);

        return $this->sendResponse(new StockQuantResource($stockQuant), 'Stock Quant saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/stockQuants/{id}",
     *      summary="Display the specified StockQuant",
     *      tags={"StockQuant"},
     *      description="Get StockQuant",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of StockQuant",
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
     *                  ref="#/definitions/StockQuant"
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
        /** @var StockQuant $stockQuant */
        $stockQuant = $this->stockQuantRepository->find($id);

        if (empty($stockQuant)) {
            return $this->sendError('Stock Quant not found');
        }

        return $this->sendResponse(new StockQuantResource($stockQuant), 'Stock Quant retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateStockQuantAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/stockQuants/{id}",
     *      summary="Update the specified StockQuant in storage",
     *      tags={"StockQuant"},
     *      description="Update StockQuant",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of StockQuant",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="StockQuant that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/StockQuant")
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
     *                  ref="#/definitions/StockQuant"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateStockQuantAPIRequest $request)
    {
        $input = $request->all();

        /** @var StockQuant $stockQuant */
        $stockQuant = $this->stockQuantRepository->find($id);

        if (empty($stockQuant)) {
            return $this->sendError('Stock Quant not found');
        }

        $stockQuant = $this->stockQuantRepository->update($input, $id);

        return $this->sendResponse(new StockQuantResource($stockQuant), 'StockQuant updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/stockQuants/{id}",
     *      summary="Remove the specified StockQuant from storage",
     *      tags={"StockQuant"},
     *      description="Delete StockQuant",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of StockQuant",
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
        /** @var StockQuant $stockQuant */
        $stockQuant = $this->stockQuantRepository->find($id);

        if (empty($stockQuant)) {
            return $this->sendError('Stock Quant not found');
        }

        $stockQuant->delete();

        return $this->sendSuccess('Stock Quant deleted successfully');
    }
}
