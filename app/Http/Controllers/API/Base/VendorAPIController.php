<?php

namespace App\Http\Controllers\API\Base;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\Base\CreateVendorAPIRequest;
use App\Http\Requests\API\Base\UpdateVendorAPIRequest;
use App\Http\Resources\Base\VendorResource;
use App\Models\Base\Vendor;
use App\Repositories\Base\VendorRepository;
use Illuminate\Http\Request;
use Response;

/**
 * Class VendorController.
 */
class VendorAPIController extends AppBaseController
{
    /** @var VendorRepository */
    protected $repository;

    public function __construct()
    {
    }

    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/vendors",
     *      summary="Get a listing of the vendors.",
     *      tags={"Vendor"},
     *      description="Get all vendors",
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
     *                  @SWG\Items(ref="#/definitions/Vendor")
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
        $vendors = $this->getRepositoryObj()->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(VendorResource::collection($vendors), 'Vendor Expeditions retrieved successfully');
    }

    /**
     * @return Response
     *
     * @SWG\Post(
     *      path="/vendors",
     *      summary="Store a newly created Vendor in storage",
     *      tags={"Vendor"},
     *      description="Store Vendor",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Vendor that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Vendor")
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
     *                  ref="#/definitions/Vendor"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateVendorAPIRequest $request)
    {
        $input = $request->all();

        $Vendor = $this->getRepositoryObj()->create($input);

        return $this->sendResponse(new VendorResource($Vendor), 'Vendor Expedition saved successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Get(
     *      path="/vendors/{id}",
     *      summary="Display the specified Vendor",
     *      tags={"Vendor"},
     *      description="Get Vendor",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Vendor",
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
     *                  ref="#/definitions/Vendor"
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
        /** @var Vendor $Vendor */
        $Vendor = $this->getRepositoryObj()->find($id);

        if (empty($Vendor)) {
            return $this->sendError('Vendor Expedition not found');
        }

        return $this->sendResponse(new VendorResource($Vendor), 'Vendor Expedition retrieved successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Put(
     *      path="/vendors/{id}",
     *      summary="Update the specified Vendor in storage",
     *      tags={"Vendor"},
     *      description="Update Vendor",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Vendor",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Vendor that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Vendor")
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
     *                  ref="#/definitions/Vendor"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateVendorAPIRequest $request)
    {
        $input = $request->all();

        /** @var Vendor $Vendor */
        $Vendor = $this->getRepositoryObj()->find($id);

        if (empty($Vendor)) {
            return $this->sendError('Vendor Expedition not found');
        }

        $Vendor = $this->getRepositoryObj()->update($input, $id);

        return $this->sendResponse(new VendorResource($Vendor), 'Vendor updated successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Delete(
     *      path="/vendors/{id}",
     *      summary="Remove the specified Vendor from storage",
     *      tags={"Vendor"},
     *      description="Delete Vendor",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Vendor",
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
        /** @var Vendor $Vendor */
        $Vendor = $this->getRepositoryObj()->find($id);

        if (empty($Vendor)) {
            return $this->sendError('Vendor Expedition not found');
        }

        $Vendor->delete();

        return $this->sendSuccess('Vendor Expedition deleted successfully');
    }
}
