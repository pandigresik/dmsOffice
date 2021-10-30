<?php

namespace App\Http\Controllers\API\Accounting;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\Accounting\CreateAccountMoveAPIRequest;
use App\Http\Requests\API\Accounting\UpdateAccountMoveAPIRequest;
use App\Http\Resources\Accounting\AccountMoveResource;
use App\Models\Accounting\AccountMove;
use App\Repositories\Accounting\AccountMoveRepository;
use Illuminate\Http\Request;
use Response;

/**
 * Class AccountMoveController.
 */
class AccountMoveAPIController extends AppBaseController
{
    /** @var AccountMoveRepository */
    private $accountMoveRepository;

    public function __construct(AccountMoveRepository $accountMoveRepo)
    {
        $this->accountMoveRepository = $accountMoveRepo;
    }

    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/accountMoves",
     *      summary="Get a listing of the AccountMoves.",
     *      tags={"AccountMove"},
     *      description="Get all AccountMoves",
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
     *                  @SWG\Items(ref="#/definitions/AccountMove")
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
        $accountMoves = $this->accountMoveRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(AccountMoveResource::collection($accountMoves), 'Account Moves retrieved successfully');
    }

    /**
     * @return Response
     *
     * @SWG\Post(
     *      path="/accountMoves",
     *      summary="Store a newly created AccountMove in storage",
     *      tags={"AccountMove"},
     *      description="Store AccountMove",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="AccountMove that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/AccountMove")
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
     *                  ref="#/definitions/AccountMove"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateAccountMoveAPIRequest $request)
    {
        $input = $request->all();

        $accountMove = $this->accountMoveRepository->create($input);

        return $this->sendResponse(new AccountMoveResource($accountMove), 'Account Move saved successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Get(
     *      path="/accountMoves/{id}",
     *      summary="Display the specified AccountMove",
     *      tags={"AccountMove"},
     *      description="Get AccountMove",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of AccountMove",
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
     *                  ref="#/definitions/AccountMove"
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
        /** @var AccountMove $accountMove */
        $accountMove = $this->accountMoveRepository->find($id);

        if (empty($accountMove)) {
            return $this->sendError('Account Move not found');
        }

        return $this->sendResponse(new AccountMoveResource($accountMove), 'Account Move retrieved successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Put(
     *      path="/accountMoves/{id}",
     *      summary="Update the specified AccountMove in storage",
     *      tags={"AccountMove"},
     *      description="Update AccountMove",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of AccountMove",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="AccountMove that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/AccountMove")
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
     *                  ref="#/definitions/AccountMove"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateAccountMoveAPIRequest $request)
    {
        $input = $request->all();

        /** @var AccountMove $accountMove */
        $accountMove = $this->accountMoveRepository->find($id);

        if (empty($accountMove)) {
            return $this->sendError('Account Move not found');
        }

        $accountMove = $this->accountMoveRepository->update($input, $id);

        return $this->sendResponse(new AccountMoveResource($accountMove), 'AccountMove updated successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Delete(
     *      path="/accountMoves/{id}",
     *      summary="Remove the specified AccountMove from storage",
     *      tags={"AccountMove"},
     *      description="Delete AccountMove",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of AccountMove",
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
        /** @var AccountMove $accountMove */
        $accountMove = $this->accountMoveRepository->find($id);

        if (empty($accountMove)) {
            return $this->sendError('Account Move not found');
        }

        $accountMove->delete();

        return $this->sendSuccess('Account Move deleted successfully');
    }
}
