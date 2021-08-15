<?php

namespace App\Http\Controllers\API\Base;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\Base\CreateVehicleGroupAPIRequest;
use App\Http\Requests\API\Base\UpdateVehicleGroupAPIRequest;
use App\Http\Resources\Base\VehicleGroupResource;
use App\Models\Base\VehicleGroup;
use App\Repositories\Base\VehicleGroupRepository;
use Illuminate\Http\Request;
use Response;

/**
 * Class VehicleGroupController.
 */
class VehicleGroupAPIController extends AppBaseController
{
    /** @var VehicleGroupRepository */
    private $vehicleGroupRepository;

    public function __construct(VehicleGroupRepository $vehicleGroupRepo)
    {
        $this->vehicleGroupRepository = $vehicleGroupRepo;
    }

    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/vehicleGroups",
     *      summary="Get a listing of the VehicleGroups.",
     *      tags={"VehicleGroup"},
     *      description="Get all VehicleGroups",
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
     *                  @SWG\Items(ref="#/definitions/VehicleGroup")
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
        $vehicleGroups = $this->vehicleGroupRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(VehicleGroupResource::collection($vehicleGroups), 'Vehicle Groups retrieved successfully');
    }

    /**
     * @return Response
     *
     * @SWG\Post(
     *      path="/vehicleGroups",
     *      summary="Store a newly created VehicleGroup in storage",
     *      tags={"VehicleGroup"},
     *      description="Store VehicleGroup",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="VehicleGroup that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/VehicleGroup")
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
     *                  ref="#/definitions/VehicleGroup"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateVehicleGroupAPIRequest $request)
    {
        $input = $request->all();

        $vehicleGroup = $this->vehicleGroupRepository->create($input);

        return $this->sendResponse(new VehicleGroupResource($vehicleGroup), 'Vehicle Group saved successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Get(
     *      path="/vehicleGroups/{id}",
     *      summary="Display the specified VehicleGroup",
     *      tags={"VehicleGroup"},
     *      description="Get VehicleGroup",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of VehicleGroup",
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
     *                  ref="#/definitions/VehicleGroup"
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
        /** @var VehicleGroup $vehicleGroup */
        $vehicleGroup = $this->vehicleGroupRepository->find($id);

        if (empty($vehicleGroup)) {
            return $this->sendError('Vehicle Group not found');
        }

        return $this->sendResponse(new VehicleGroupResource($vehicleGroup), 'Vehicle Group retrieved successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Put(
     *      path="/vehicleGroups/{id}",
     *      summary="Update the specified VehicleGroup in storage",
     *      tags={"VehicleGroup"},
     *      description="Update VehicleGroup",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of VehicleGroup",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="VehicleGroup that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/VehicleGroup")
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
     *                  ref="#/definitions/VehicleGroup"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateVehicleGroupAPIRequest $request)
    {
        $input = $request->all();

        /** @var VehicleGroup $vehicleGroup */
        $vehicleGroup = $this->vehicleGroupRepository->find($id);

        if (empty($vehicleGroup)) {
            return $this->sendError('Vehicle Group not found');
        }

        $vehicleGroup = $this->vehicleGroupRepository->update($input, $id);

        return $this->sendResponse(new VehicleGroupResource($vehicleGroup), 'VehicleGroup updated successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Delete(
     *      path="/vehicleGroups/{id}",
     *      summary="Remove the specified VehicleGroup from storage",
     *      tags={"VehicleGroup"},
     *      description="Delete VehicleGroup",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of VehicleGroup",
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
        /** @var VehicleGroup $vehicleGroup */
        $vehicleGroup = $this->vehicleGroupRepository->find($id);

        if (empty($vehicleGroup)) {
            return $this->sendError('Vehicle Group not found');
        }

        $vehicleGroup->delete();

        return $this->sendSuccess('Vehicle Group deleted successfully');
    }
}
