<?php

namespace App\Http\Controllers\API\Base;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\Base\CreateVendorExpeditionAPIRequest;
use App\Http\Requests\API\Base\UpdateVendorExpeditionAPIRequest;
use App\Http\Resources\Base\VendorExpeditionResource;
use App\Models\Base\VendorExpedition;
use App\Repositories\Base\VendorExpeditionRepository;
use Illuminate\Http\Request;
use Response;

/**
 * Class VendorExpeditionController.
 */
class VendorExpeditionAPIController extends AppBaseController
{
    /** @var VendorExpeditionRepository */
    private $vendorExpeditionRepository;

    public function __construct(VendorExpeditionRepository $vendorExpeditionRepo)
    {
        $this->vendorExpeditionRepository = $vendorExpeditionRepo;
    }

    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/vendorExpeditions",
     *      summary="Get a listing of the VendorExpeditions.",
     *      tags={"VendorExpedition"},
     *      description="Get all VendorExpeditions",
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
     *                  @SWG\Items(ref="#/definitions/VendorExpedition")
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
        $vendorExpeditions = $this->vendorExpeditionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(VendorExpeditionResource::collection($vendorExpeditions), 'Vendor Expeditions retrieved successfully');
    }

    /**
     * @return Response
     *
     * @SWG\Post(
     *      path="/vendorExpeditions",
     *      summary="Store a newly created VendorExpedition in storage",
     *      tags={"VendorExpedition"},
     *      description="Store VendorExpedition",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="VendorExpedition that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/VendorExpedition")
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
     *                  ref="#/definitions/VendorExpedition"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateVendorExpeditionAPIRequest $request)
    {
        $input = $request->all();

        $vendorExpedition = $this->vendorExpeditionRepository->create($input);

        return $this->sendResponse(new VendorExpeditionResource($vendorExpedition), 'Vendor Expedition saved successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Get(
     *      path="/vendorExpeditions/{id}",
     *      summary="Display the specified VendorExpedition",
     *      tags={"VendorExpedition"},
     *      description="Get VendorExpedition",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of VendorExpedition",
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
     *                  ref="#/definitions/VendorExpedition"
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
        /** @var VendorExpedition $vendorExpedition */
        $vendorExpedition = $this->vendorExpeditionRepository->find($id);

        if (empty($vendorExpedition)) {
            return $this->sendError('Vendor Expedition not found');
        }

        return $this->sendResponse(new VendorExpeditionResource($vendorExpedition), 'Vendor Expedition retrieved successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Put(
     *      path="/vendorExpeditions/{id}",
     *      summary="Update the specified VendorExpedition in storage",
     *      tags={"VendorExpedition"},
     *      description="Update VendorExpedition",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of VendorExpedition",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="VendorExpedition that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/VendorExpedition")
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
     *                  ref="#/definitions/VendorExpedition"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateVendorExpeditionAPIRequest $request)
    {
        $input = $request->all();

        /** @var VendorExpedition $vendorExpedition */
        $vendorExpedition = $this->vendorExpeditionRepository->find($id);

        if (empty($vendorExpedition)) {
            return $this->sendError('Vendor Expedition not found');
        }

        $vendorExpedition = $this->vendorExpeditionRepository->update($input, $id);

        return $this->sendResponse(new VendorExpeditionResource($vendorExpedition), 'VendorExpedition updated successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Delete(
     *      path="/vendorExpeditions/{id}",
     *      summary="Remove the specified VendorExpedition from storage",
     *      tags={"VendorExpedition"},
     *      description="Delete VendorExpedition",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of VendorExpedition",
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
        /** @var VendorExpedition $vendorExpedition */
        $vendorExpedition = $this->vendorExpeditionRepository->find($id);

        if (empty($vendorExpedition)) {
            return $this->sendError('Vendor Expedition not found');
        }

        $vendorExpedition->delete();

        return $this->sendSuccess('Vendor Expedition deleted successfully');
    }
}
