<?php

namespace App\Http\Controllers\API\Accounting;

use App\Http\Requests\API\Accounting\CreateIfrsAccountsAPIRequest;
use App\Http\Requests\API\Accounting\UpdateIfrsAccountsAPIRequest;
use App\Models\Accounting\IfrsAccounts;
use App\Repositories\Accounting\IfrsAccountsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\Accounting\IfrsAccountsResource;
use Response;

/**
 * Class IfrsAccountsController
 * @package App\Http\Controllers\API\Accounting
 */

class IfrsAccountsAPIController extends AppBaseController
{
    /** @var  IfrsAccountsRepository */
    private $ifrsAccountsRepository;

    public function __construct(IfrsAccountsRepository $ifrsAccountsRepo)
    {
        $this->ifrsAccountsRepository = $ifrsAccountsRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/ifrsAccounts",
     *      summary="Get a listing of the IfrsAccounts.",
     *      tags={"IfrsAccounts"},
     *      description="Get all IfrsAccounts",
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
     *                  @SWG\Items(ref="#/definitions/IfrsAccounts")
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
        $ifrsAccounts = $this->ifrsAccountsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(IfrsAccountsResource::collection($ifrsAccounts), 'Ifrs Accounts retrieved successfully');
    }

    /**
     * @param CreateIfrsAccountsAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/ifrsAccounts",
     *      summary="Store a newly created IfrsAccounts in storage",
     *      tags={"IfrsAccounts"},
     *      description="Store IfrsAccounts",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="IfrsAccounts that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/IfrsAccounts")
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
     *                  ref="#/definitions/IfrsAccounts"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateIfrsAccountsAPIRequest $request)
    {
        $input = $request->all();

        $ifrsAccounts = $this->ifrsAccountsRepository->create($input);

        return $this->sendResponse(new IfrsAccountsResource($ifrsAccounts), 'Ifrs Accounts saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/ifrsAccounts/{id}",
     *      summary="Display the specified IfrsAccounts",
     *      tags={"IfrsAccounts"},
     *      description="Get IfrsAccounts",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of IfrsAccounts",
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
     *                  ref="#/definitions/IfrsAccounts"
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
        /** @var IfrsAccounts $ifrsAccounts */
        $ifrsAccounts = $this->ifrsAccountsRepository->find($id);

        if (empty($ifrsAccounts)) {
            return $this->sendError('Ifrs Accounts not found');
        }

        return $this->sendResponse(new IfrsAccountsResource($ifrsAccounts), 'Ifrs Accounts retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateIfrsAccountsAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/ifrsAccounts/{id}",
     *      summary="Update the specified IfrsAccounts in storage",
     *      tags={"IfrsAccounts"},
     *      description="Update IfrsAccounts",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of IfrsAccounts",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="IfrsAccounts that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/IfrsAccounts")
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
     *                  ref="#/definitions/IfrsAccounts"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateIfrsAccountsAPIRequest $request)
    {
        $input = $request->all();

        /** @var IfrsAccounts $ifrsAccounts */
        $ifrsAccounts = $this->ifrsAccountsRepository->find($id);

        if (empty($ifrsAccounts)) {
            return $this->sendError('Ifrs Accounts not found');
        }

        $ifrsAccounts = $this->ifrsAccountsRepository->update($input, $id);

        return $this->sendResponse(new IfrsAccountsResource($ifrsAccounts), 'IfrsAccounts updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/ifrsAccounts/{id}",
     *      summary="Remove the specified IfrsAccounts from storage",
     *      tags={"IfrsAccounts"},
     *      description="Delete IfrsAccounts",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of IfrsAccounts",
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
        /** @var IfrsAccounts $ifrsAccounts */
        $ifrsAccounts = $this->ifrsAccountsRepository->find($id);

        if (empty($ifrsAccounts)) {
            return $this->sendError('Ifrs Accounts not found');
        }

        $ifrsAccounts->delete();

        return $this->sendSuccess('Ifrs Accounts deleted successfully');
    }
}
