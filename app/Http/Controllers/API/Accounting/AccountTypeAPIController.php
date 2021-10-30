<?php

namespace App\Http\Controllers\API\Accounting;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\Accounting\CreateAccountTypeAPIRequest;
use App\Http\Requests\API\Accounting\UpdateAccountTypeAPIRequest;
use App\Http\Resources\Accounting\AccountTypeResource;
use App\Models\Accounting\AccountType;
use App\Repositories\Accounting\AccountTypeRepository;
use Illuminate\Http\Request;
use Response;

/**
 * Class AccountTypeController.
 */
class AccountTypeAPIController extends AppBaseController
{
    /** @var AccountTypeRepository */
    private $accountTypeRepository;

    public function __construct(AccountTypeRepository $accountTypeRepo)
    {
        $this->accountTypeRepository = $accountTypeRepo;
    }

    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/accountTypes",
     *      summary="Get a listing of the AccountTypes.",
     *      tags={"AccountType"},
     *      description="Get all AccountTypes",
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
     *                  @SWG\Items(ref="#/definitions/AccountType")
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
        $accountTypes = $this->accountTypeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(AccountTypeResource::collection($accountTypes), 'Account Types retrieved successfully');
    }

    /**
     * @return Response
     *
     * @SWG\Post(
     *      path="/accountTypes",
     *      summary="Store a newly created AccountType in storage",
     *      tags={"AccountType"},
     *      description="Store AccountType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="AccountType that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/AccountType")
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
     *                  ref="#/definitions/AccountType"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateAccountTypeAPIRequest $request)
    {
        $input = $request->all();

        $accountType = $this->accountTypeRepository->create($input);

        return $this->sendResponse(new AccountTypeResource($accountType), 'Account Type saved successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Get(
     *      path="/accountTypes/{id}",
     *      summary="Display the specified AccountType",
     *      tags={"AccountType"},
     *      description="Get AccountType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of AccountType",
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
     *                  ref="#/definitions/AccountType"
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
        /** @var AccountType $accountType */
        $accountType = $this->accountTypeRepository->find($id);

        if (empty($accountType)) {
            return $this->sendError('Account Type not found');
        }

        return $this->sendResponse(new AccountTypeResource($accountType), 'Account Type retrieved successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Put(
     *      path="/accountTypes/{id}",
     *      summary="Update the specified AccountType in storage",
     *      tags={"AccountType"},
     *      description="Update AccountType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of AccountType",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="AccountType that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/AccountType")
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
     *                  ref="#/definitions/AccountType"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateAccountTypeAPIRequest $request)
    {
        $input = $request->all();

        /** @var AccountType $accountType */
        $accountType = $this->accountTypeRepository->find($id);

        if (empty($accountType)) {
            return $this->sendError('Account Type not found');
        }

        $accountType = $this->accountTypeRepository->update($input, $id);

        return $this->sendResponse(new AccountTypeResource($accountType), 'AccountType updated successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Delete(
     *      path="/accountTypes/{id}",
     *      summary="Remove the specified AccountType from storage",
     *      tags={"AccountType"},
     *      description="Delete AccountType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of AccountType",
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
        /** @var AccountType $accountType */
        $accountType = $this->accountTypeRepository->find($id);

        if (empty($accountType)) {
            return $this->sendError('Account Type not found');
        }

        $accountType->delete();

        return $this->sendSuccess('Account Type deleted successfully');
    }
}
