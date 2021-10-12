<?php

namespace App\Http\Controllers\API\Accounting;

use App\Http\Requests\API\Accounting\CreateIfrsVatsAPIRequest;
use App\Http\Requests\API\Accounting\UpdateIfrsVatsAPIRequest;
use App\Models\Accounting\IfrsVats;
use App\Repositories\Accounting\IfrsVatsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\Accounting\IfrsVatsResource;
use Response;

/**
 * Class IfrsVatsController
 * @package App\Http\Controllers\API\Accounting
 */

class IfrsVatsAPIController extends AppBaseController
{
    /** @var  IfrsVatsRepository */
    private $ifrsVatsRepository;

    public function __construct(IfrsVatsRepository $ifrsVatsRepo)
    {
        $this->ifrsVatsRepository = $ifrsVatsRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/ifrsVats",
     *      summary="Get a listing of the IfrsVats.",
     *      tags={"IfrsVats"},
     *      description="Get all IfrsVats",
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
     *                  @SWG\Items(ref="#/definitions/IfrsVats")
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
        $ifrsVats = $this->ifrsVatsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(IfrsVatsResource::collection($ifrsVats), 'Ifrs Vats retrieved successfully');
    }

    /**
     * @param CreateIfrsVatsAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/ifrsVats",
     *      summary="Store a newly created IfrsVats in storage",
     *      tags={"IfrsVats"},
     *      description="Store IfrsVats",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="IfrsVats that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/IfrsVats")
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
     *                  ref="#/definitions/IfrsVats"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateIfrsVatsAPIRequest $request)
    {
        $input = $request->all();

        $ifrsVats = $this->ifrsVatsRepository->create($input);

        return $this->sendResponse(new IfrsVatsResource($ifrsVats), 'Ifrs Vats saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/ifrsVats/{id}",
     *      summary="Display the specified IfrsVats",
     *      tags={"IfrsVats"},
     *      description="Get IfrsVats",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of IfrsVats",
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
     *                  ref="#/definitions/IfrsVats"
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
        /** @var IfrsVats $ifrsVats */
        $ifrsVats = $this->ifrsVatsRepository->find($id);

        if (empty($ifrsVats)) {
            return $this->sendError('Ifrs Vats not found');
        }

        return $this->sendResponse(new IfrsVatsResource($ifrsVats), 'Ifrs Vats retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateIfrsVatsAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/ifrsVats/{id}",
     *      summary="Update the specified IfrsVats in storage",
     *      tags={"IfrsVats"},
     *      description="Update IfrsVats",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of IfrsVats",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="IfrsVats that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/IfrsVats")
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
     *                  ref="#/definitions/IfrsVats"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateIfrsVatsAPIRequest $request)
    {
        $input = $request->all();

        /** @var IfrsVats $ifrsVats */
        $ifrsVats = $this->ifrsVatsRepository->find($id);

        if (empty($ifrsVats)) {
            return $this->sendError('Ifrs Vats not found');
        }

        $ifrsVats = $this->ifrsVatsRepository->update($input, $id);

        return $this->sendResponse(new IfrsVatsResource($ifrsVats), 'IfrsVats updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/ifrsVats/{id}",
     *      summary="Remove the specified IfrsVats from storage",
     *      tags={"IfrsVats"},
     *      description="Delete IfrsVats",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of IfrsVats",
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
        /** @var IfrsVats $ifrsVats */
        $ifrsVats = $this->ifrsVatsRepository->find($id);

        if (empty($ifrsVats)) {
            return $this->sendError('Ifrs Vats not found');
        }

        $ifrsVats->delete();

        return $this->sendSuccess('Ifrs Vats deleted successfully');
    }
}
