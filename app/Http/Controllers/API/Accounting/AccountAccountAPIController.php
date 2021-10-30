<?php

namespace App\Http\Controllers\API\Accounting;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\Accounting\CreateAccountAccountAPIRequest;
use App\Http\Requests\API\Accounting\UpdateAccountAccountAPIRequest;
use App\Http\Resources\Accounting\AccountAccountResource;
use App\Models\Accounting\AccountAccount;
use App\Repositories\Accounting\AccountAccountRepository;
use Illuminate\Http\Request;
use Response;

/**
 * Class AccountAccountController.
 */
class AccountAccountAPIController extends AppBaseController
{
    /** @var AccountAccountRepository */
    private $accountAccountRepository;

    public function __construct(AccountAccountRepository $accountAccountRepo)
    {
        $this->accountAccountRepository = $accountAccountRepo;
    }

    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/accountAccounts",
     *      summary="Get a listing of the AccountAccounts.",
     *      tags={"AccountAccount"},
     *      description="Get all AccountAccounts",
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
     *                  @SWG\Items(ref="#/definitions/AccountAccount")
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
        $accountAccounts = $this->accountAccountRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(AccountAccountResource::collection($accountAccounts), 'Account Accounts retrieved successfully');
    }

    /**
     * @return Response
     *
     * @SWG\Post(
     *      path="/accountAccounts",
     *      summary="Store a newly created AccountAccount in storage",
     *      tags={"AccountAccount"},
     *      description="Store AccountAccount",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="AccountAccount that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/AccountAccount")
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
     *                  ref="#/definitions/AccountAccount"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateAccountAccountAPIRequest $request)
    {
        $input = $request->all();

        $accountAccount = $this->accountAccountRepository->create($input);

        return $this->sendResponse(new AccountAccountResource($accountAccount), 'Account Account saved successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Get(
     *      path="/accountAccounts/{id}",
     *      summary="Display the specified AccountAccount",
     *      tags={"AccountAccount"},
     *      description="Get AccountAccount",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of AccountAccount",
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
     *                  ref="#/definitions/AccountAccount"
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
        /** @var AccountAccount $accountAccount */
        $accountAccount = $this->accountAccountRepository->find($id);

        if (empty($accountAccount)) {
            return $this->sendError('Account Account not found');
        }

        return $this->sendResponse(new AccountAccountResource($accountAccount), 'Account Account retrieved successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Put(
     *      path="/accountAccounts/{id}",
     *      summary="Update the specified AccountAccount in storage",
     *      tags={"AccountAccount"},
     *      description="Update AccountAccount",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of AccountAccount",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="AccountAccount that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/AccountAccount")
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
     *                  ref="#/definitions/AccountAccount"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateAccountAccountAPIRequest $request)
    {
        $input = $request->all();

        /** @var AccountAccount $accountAccount */
        $accountAccount = $this->accountAccountRepository->find($id);

        if (empty($accountAccount)) {
            return $this->sendError('Account Account not found');
        }

        $accountAccount = $this->accountAccountRepository->update($input, $id);

        return $this->sendResponse(new AccountAccountResource($accountAccount), 'AccountAccount updated successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Delete(
     *      path="/accountAccounts/{id}",
     *      summary="Remove the specified AccountAccount from storage",
     *      tags={"AccountAccount"},
     *      description="Delete AccountAccount",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of AccountAccount",
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
        /** @var AccountAccount $accountAccount */
        $accountAccount = $this->accountAccountRepository->find($id);

        if (empty($accountAccount)) {
            return $this->sendError('Account Account not found');
        }

        $accountAccount->delete();

        return $this->sendSuccess('Account Account deleted successfully');
    }
}
