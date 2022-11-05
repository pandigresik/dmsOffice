<?php

namespace App\Http\Controllers\API\Base;

use App\Http\Requests\API\Base\CreateShippingCostSubsidyAPIRequest;
use App\Http\Requests\API\Base\UpdateShippingCostSubsidyAPIRequest;
use App\Models\Base\ShippingCostSubsidy;
use App\Repositories\Base\ShippingCostSubsidyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\Base\ShippingCostSubsidyResource;
use Response;

/**
 * Class ShippingCostSubsidyController
 * @package App\Http\Controllers\API\Base
 */

class ShippingCostSubsidyAPIController extends AppBaseController
{
    /** @var  ShippingCostSubsidyRepository */
    private $shippingCostSubsidyRepository;

    public function __construct(ShippingCostSubsidyRepository $shippingCostSubsidyRepo)
    {
        $this->shippingCostSubsidyRepository = $shippingCostSubsidyRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/shippingCostSubsidies",
     *      summary="Get a listing of the ShippingCostSubsidies.",
     *      tags={"ShippingCostSubsidy"},
     *      description="Get all ShippingCostSubsidies",
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
     *                  @SWG\Items(ref="#/definitions/ShippingCostSubsidy")
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
        $shippingCostSubsidies = $this->shippingCostSubsidyRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(ShippingCostSubsidyResource::collection($shippingCostSubsidies), 'Shipping Cost Subsidies retrieved successfully');
    }

    /**
     * @param CreateShippingCostSubsidyAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/shippingCostSubsidies",
     *      summary="Store a newly created ShippingCostSubsidy in storage",
     *      tags={"ShippingCostSubsidy"},
     *      description="Store ShippingCostSubsidy",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ShippingCostSubsidy that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ShippingCostSubsidy")
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
     *                  ref="#/definitions/ShippingCostSubsidy"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateShippingCostSubsidyAPIRequest $request)
    {
        $input = $request->all();

        $shippingCostSubsidy = $this->shippingCostSubsidyRepository->create($input);

        return $this->sendResponse(new ShippingCostSubsidyResource($shippingCostSubsidy), 'Shipping Cost Subsidy saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/shippingCostSubsidies/{id}",
     *      summary="Display the specified ShippingCostSubsidy",
     *      tags={"ShippingCostSubsidy"},
     *      description="Get ShippingCostSubsidy",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ShippingCostSubsidy",
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
     *                  ref="#/definitions/ShippingCostSubsidy"
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
        /** @var ShippingCostSubsidy $shippingCostSubsidy */
        $shippingCostSubsidy = $this->shippingCostSubsidyRepository->find($id);

        if (empty($shippingCostSubsidy)) {
            return $this->sendError('Shipping Cost Subsidy not found');
        }

        return $this->sendResponse(new ShippingCostSubsidyResource($shippingCostSubsidy), 'Shipping Cost Subsidy retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateShippingCostSubsidyAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/shippingCostSubsidies/{id}",
     *      summary="Update the specified ShippingCostSubsidy in storage",
     *      tags={"ShippingCostSubsidy"},
     *      description="Update ShippingCostSubsidy",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ShippingCostSubsidy",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ShippingCostSubsidy that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ShippingCostSubsidy")
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
     *                  ref="#/definitions/ShippingCostSubsidy"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateShippingCostSubsidyAPIRequest $request)
    {
        $input = $request->all();

        /** @var ShippingCostSubsidy $shippingCostSubsidy */
        $shippingCostSubsidy = $this->shippingCostSubsidyRepository->find($id);

        if (empty($shippingCostSubsidy)) {
            return $this->sendError('Shipping Cost Subsidy not found');
        }

        $shippingCostSubsidy = $this->shippingCostSubsidyRepository->update($input, $id);

        return $this->sendResponse(new ShippingCostSubsidyResource($shippingCostSubsidy), 'ShippingCostSubsidy updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/shippingCostSubsidies/{id}",
     *      summary="Remove the specified ShippingCostSubsidy from storage",
     *      tags={"ShippingCostSubsidy"},
     *      description="Delete ShippingCostSubsidy",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ShippingCostSubsidy",
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
        /** @var ShippingCostSubsidy $shippingCostSubsidy */
        $shippingCostSubsidy = $this->shippingCostSubsidyRepository->find($id);

        if (empty($shippingCostSubsidy)) {
            return $this->sendError('Shipping Cost Subsidy not found');
        }

        $shippingCostSubsidy->delete();

        return $this->sendSuccess('Shipping Cost Subsidy deleted successfully');
    }
}
