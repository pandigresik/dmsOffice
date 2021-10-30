<?php

namespace App\Http\Controllers\API\Accounting;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\Accounting\CreateIfrsEntitiesAPIRequest;
use App\Http\Requests\API\Accounting\UpdateIfrsEntitiesAPIRequest;
use App\Http\Resources\Accounting\IfrsEntitiesResource;
use App\Models\Accounting\IfrsEntities;
use App\Repositories\Accounting\IfrsEntitiesRepository;
use Illuminate\Http\Request;
use Response;

/**
 * Class IfrsEntitiesController.
 */
class IfrsEntitiesAPIController extends AppBaseController
{
    /** @var IfrsEntitiesRepository */
    private $ifrsEntitiesRepository;

    public function __construct(IfrsEntitiesRepository $ifrsEntitiesRepo)
    {
        $this->ifrsEntitiesRepository = $ifrsEntitiesRepo;
    }

    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/ifrsEntities",
     *      summary="Get a listing of the IfrsEntities.",
     *      tags={"IfrsEntities"},
     *      description="Get all IfrsEntities",
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
     *                  @SWG\Items(ref="#/definitions/IfrsEntities")
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
        $ifrsEntities = $this->ifrsEntitiesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(IfrsEntitiesResource::collection($ifrsEntities), 'Ifrs Entities retrieved successfully');
    }

    /**
     * @return Response
     *
     * @SWG\Post(
     *      path="/ifrsEntities",
     *      summary="Store a newly created IfrsEntities in storage",
     *      tags={"IfrsEntities"},
     *      description="Store IfrsEntities",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="IfrsEntities that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/IfrsEntities")
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
     *                  ref="#/definitions/IfrsEntities"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateIfrsEntitiesAPIRequest $request)
    {
        $input = $request->all();

        $ifrsEntities = $this->ifrsEntitiesRepository->create($input);

        return $this->sendResponse(new IfrsEntitiesResource($ifrsEntities), 'Ifrs Entities saved successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Get(
     *      path="/ifrsEntities/{id}",
     *      summary="Display the specified IfrsEntities",
     *      tags={"IfrsEntities"},
     *      description="Get IfrsEntities",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of IfrsEntities",
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
     *                  ref="#/definitions/IfrsEntities"
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
        /** @var IfrsEntities $ifrsEntities */
        $ifrsEntities = $this->ifrsEntitiesRepository->find($id);

        if (empty($ifrsEntities)) {
            return $this->sendError('Ifrs Entities not found');
        }

        return $this->sendResponse(new IfrsEntitiesResource($ifrsEntities), 'Ifrs Entities retrieved successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Put(
     *      path="/ifrsEntities/{id}",
     *      summary="Update the specified IfrsEntities in storage",
     *      tags={"IfrsEntities"},
     *      description="Update IfrsEntities",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of IfrsEntities",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="IfrsEntities that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/IfrsEntities")
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
     *                  ref="#/definitions/IfrsEntities"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateIfrsEntitiesAPIRequest $request)
    {
        $input = $request->all();

        /** @var IfrsEntities $ifrsEntities */
        $ifrsEntities = $this->ifrsEntitiesRepository->find($id);

        if (empty($ifrsEntities)) {
            return $this->sendError('Ifrs Entities not found');
        }

        $ifrsEntities = $this->ifrsEntitiesRepository->update($input, $id);

        return $this->sendResponse(new IfrsEntitiesResource($ifrsEntities), 'IfrsEntities updated successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Delete(
     *      path="/ifrsEntities/{id}",
     *      summary="Remove the specified IfrsEntities from storage",
     *      tags={"IfrsEntities"},
     *      description="Delete IfrsEntities",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of IfrsEntities",
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
        /** @var IfrsEntities $ifrsEntities */
        $ifrsEntities = $this->ifrsEntitiesRepository->find($id);

        if (empty($ifrsEntities)) {
            return $this->sendError('Ifrs Entities not found');
        }

        $ifrsEntities->delete();

        return $this->sendSuccess('Ifrs Entities deleted successfully');
    }
}
