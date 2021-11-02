<?php

namespace App\Http\Controllers\API\Base;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\Base\CreateRouteTripAPIRequest;
use App\Http\Requests\API\Base\UpdateRouteTripAPIRequest;
use App\Http\Resources\Base\RouteTripResource;
use App\Models\Base\RouteTrip;
use App\Repositories\Base\RouteTripRepository;
use Illuminate\Http\Request;
use Response;

/**
 * Class RouteTripController.
 */
class RouteTripAPIController extends AppBaseController
{
    /** @var RouteTripRepository */
    protected $repository;

    public function __construct()
    {
    }

    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/routeTrips",
     *      summary="Get a listing of the RouteTrips.",
     *      tags={"RouteTrip"},
     *      description="Get all RouteTrips",
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
     *                  @SWG\Items(ref="#/definitions/RouteTrip")
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
        $routeTrips = $this->getRepositoryObj()->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(RouteTripResource::collection($routeTrips), 'Route Trips retrieved successfully');
    }

    /**
     * @return Response
     *
     * @SWG\Post(
     *      path="/routeTrips",
     *      summary="Store a newly created RouteTrip in storage",
     *      tags={"RouteTrip"},
     *      description="Store RouteTrip",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="RouteTrip that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/RouteTrip")
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
     *                  ref="#/definitions/RouteTrip"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateRouteTripAPIRequest $request)
    {
        $input = $request->all();

        $routeTrip = $this->getRepositoryObj()->create($input);

        return $this->sendResponse(new RouteTripResource($routeTrip), 'Route Trip saved successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Get(
     *      path="/routeTrips/{id}",
     *      summary="Display the specified RouteTrip",
     *      tags={"RouteTrip"},
     *      description="Get RouteTrip",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of RouteTrip",
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
     *                  ref="#/definitions/RouteTrip"
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
        /** @var RouteTrip $routeTrip */
        $routeTrip = $this->getRepositoryObj()->find($id);

        if (empty($routeTrip)) {
            return $this->sendError('Route Trip not found');
        }

        return $this->sendResponse(new RouteTripResource($routeTrip), 'Route Trip retrieved successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Put(
     *      path="/routeTrips/{id}",
     *      summary="Update the specified RouteTrip in storage",
     *      tags={"RouteTrip"},
     *      description="Update RouteTrip",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of RouteTrip",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="RouteTrip that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/RouteTrip")
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
     *                  ref="#/definitions/RouteTrip"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateRouteTripAPIRequest $request)
    {
        $input = $request->all();

        /** @var RouteTrip $routeTrip */
        $routeTrip = $this->getRepositoryObj()->find($id);

        if (empty($routeTrip)) {
            return $this->sendError('Route Trip not found');
        }

        $routeTrip = $this->getRepositoryObj()->update($input, $id);

        return $this->sendResponse(new RouteTripResource($routeTrip), 'RouteTrip updated successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Delete(
     *      path="/routeTrips/{id}",
     *      summary="Remove the specified RouteTrip from storage",
     *      tags={"RouteTrip"},
     *      description="Delete RouteTrip",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of RouteTrip",
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
        /** @var RouteTrip $routeTrip */
        $routeTrip = $this->getRepositoryObj()->find($id);

        if (empty($routeTrip)) {
            return $this->sendError('Route Trip not found');
        }

        $routeTrip->delete();

        return $this->sendSuccess('Route Trip deleted successfully');
    }
}
