<?php

namespace App\Http\Controllers\API\Accounting;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\Accounting\CreateAccountJournalAPIRequest;
use App\Http\Requests\API\Accounting\UpdateAccountJournalAPIRequest;
use App\Http\Resources\Accounting\AccountJournalResource;
use App\Models\Accounting\AccountJournal;
use App\Repositories\Accounting\AccountJournalRepository;
use Illuminate\Http\Request;
use Response;

/**
 * Class AccountJournalController.
 */
class AccountJournalAPIController extends AppBaseController
{
    /** @var AccountJournalRepository */
    protected $repository;

    public function __construct()
    {
    }

    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/accountJournals",
     *      summary="Get a listing of the AccountJournals.",
     *      tags={"AccountJournal"},
     *      description="Get all AccountJournals",
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
     *                  @SWG\Items(ref="#/definitions/AccountJournal")
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
        $accountJournals = $this->getRepositoryObj()->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(AccountJournalResource::collection($accountJournals), 'Account Journals retrieved successfully');
    }

    /**
     * @return Response
     *
     * @SWG\Post(
     *      path="/accountJournals",
     *      summary="Store a newly created AccountJournal in storage",
     *      tags={"AccountJournal"},
     *      description="Store AccountJournal",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="AccountJournal that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/AccountJournal")
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
     *                  ref="#/definitions/AccountJournal"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateAccountJournalAPIRequest $request)
    {
        $input = $request->all();

        $accountJournal = $this->getRepositoryObj()->create($input);

        return $this->sendResponse(new AccountJournalResource($accountJournal), 'Account Journal saved successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Get(
     *      path="/accountJournals/{id}",
     *      summary="Display the specified AccountJournal",
     *      tags={"AccountJournal"},
     *      description="Get AccountJournal",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of AccountJournal",
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
     *                  ref="#/definitions/AccountJournal"
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
        /** @var AccountJournal $accountJournal */
        $accountJournal = $this->getRepositoryObj()->find($id);

        if (empty($accountJournal)) {
            return $this->sendError('Account Journal not found');
        }

        return $this->sendResponse(new AccountJournalResource($accountJournal), 'Account Journal retrieved successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Put(
     *      path="/accountJournals/{id}",
     *      summary="Update the specified AccountJournal in storage",
     *      tags={"AccountJournal"},
     *      description="Update AccountJournal",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of AccountJournal",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="AccountJournal that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/AccountJournal")
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
     *                  ref="#/definitions/AccountJournal"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateAccountJournalAPIRequest $request)
    {
        $input = $request->all();

        /** @var AccountJournal $accountJournal */
        $accountJournal = $this->getRepositoryObj()->find($id);

        if (empty($accountJournal)) {
            return $this->sendError('Account Journal not found');
        }

        $accountJournal = $this->getRepositoryObj()->update($input, $id);

        return $this->sendResponse(new AccountJournalResource($accountJournal), 'AccountJournal updated successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Delete(
     *      path="/accountJournals/{id}",
     *      summary="Remove the specified AccountJournal from storage",
     *      tags={"AccountJournal"},
     *      description="Delete AccountJournal",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of AccountJournal",
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
        /** @var AccountJournal $accountJournal */
        $accountJournal = $this->getRepositoryObj()->find($id);

        if (empty($accountJournal)) {
            return $this->sendError('Account Journal not found');
        }

        $accountJournal->delete();

        return $this->sendSuccess('Account Journal deleted successfully');
    }
}
