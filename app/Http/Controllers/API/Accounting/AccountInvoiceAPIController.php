<?php

namespace App\Http\Controllers\API\Accounting;

use App\Http\Requests\API\Accounting\CreateAccountInvoiceAPIRequest;
use App\Http\Requests\API\Accounting\UpdateAccountInvoiceAPIRequest;
use App\Models\Accounting\AccountInvoice;
use App\Repositories\Accounting\AccountInvoiceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\Accounting\AccountInvoiceResource;
use Response;

/**
 * Class AccountInvoiceController
 * @package App\Http\Controllers\API\Accounting
 */

class AccountInvoiceAPIController extends AppBaseController
{
    /** @var  AccountInvoiceRepository */
    private $accountInvoiceRepository;

    public function __construct(AccountInvoiceRepository $accountInvoiceRepo)
    {
        $this->accountInvoiceRepository = $accountInvoiceRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/accountInvoices",
     *      summary="Get a listing of the AccountInvoices.",
     *      tags={"AccountInvoice"},
     *      description="Get all AccountInvoices",
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
     *                  @SWG\Items(ref="#/definitions/AccountInvoice")
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
        $accountInvoices = $this->accountInvoiceRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(AccountInvoiceResource::collection($accountInvoices), 'Account Invoices retrieved successfully');
    }

    /**
     * @param CreateAccountInvoiceAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/accountInvoices",
     *      summary="Store a newly created AccountInvoice in storage",
     *      tags={"AccountInvoice"},
     *      description="Store AccountInvoice",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="AccountInvoice that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/AccountInvoice")
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
     *                  ref="#/definitions/AccountInvoice"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateAccountInvoiceAPIRequest $request)
    {
        $input = $request->all();

        $accountInvoice = $this->accountInvoiceRepository->create($input);

        return $this->sendResponse(new AccountInvoiceResource($accountInvoice), 'Account Invoice saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/accountInvoices/{id}",
     *      summary="Display the specified AccountInvoice",
     *      tags={"AccountInvoice"},
     *      description="Get AccountInvoice",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of AccountInvoice",
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
     *                  ref="#/definitions/AccountInvoice"
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
        /** @var AccountInvoice $accountInvoice */
        $accountInvoice = $this->accountInvoiceRepository->find($id);

        if (empty($accountInvoice)) {
            return $this->sendError('Account Invoice not found');
        }

        return $this->sendResponse(new AccountInvoiceResource($accountInvoice), 'Account Invoice retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateAccountInvoiceAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/accountInvoices/{id}",
     *      summary="Update the specified AccountInvoice in storage",
     *      tags={"AccountInvoice"},
     *      description="Update AccountInvoice",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of AccountInvoice",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="AccountInvoice that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/AccountInvoice")
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
     *                  ref="#/definitions/AccountInvoice"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateAccountInvoiceAPIRequest $request)
    {
        $input = $request->all();

        /** @var AccountInvoice $accountInvoice */
        $accountInvoice = $this->accountInvoiceRepository->find($id);

        if (empty($accountInvoice)) {
            return $this->sendError('Account Invoice not found');
        }

        $accountInvoice = $this->accountInvoiceRepository->update($input, $id);

        return $this->sendResponse(new AccountInvoiceResource($accountInvoice), 'AccountInvoice updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/accountInvoices/{id}",
     *      summary="Remove the specified AccountInvoice from storage",
     *      tags={"AccountInvoice"},
     *      description="Delete AccountInvoice",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of AccountInvoice",
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
        /** @var AccountInvoice $accountInvoice */
        $accountInvoice = $this->accountInvoiceRepository->find($id);

        if (empty($accountInvoice)) {
            return $this->sendError('Account Invoice not found');
        }

        $accountInvoice->delete();

        return $this->sendSuccess('Account Invoice deleted successfully');
    }
}
