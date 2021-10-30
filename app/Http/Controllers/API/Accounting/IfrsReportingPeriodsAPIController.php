<?php

namespace App\Http\Controllers\API\Accounting;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\Accounting\CreateIfrsReportingPeriodsAPIRequest;
use App\Http\Requests\API\Accounting\UpdateIfrsReportingPeriodsAPIRequest;
use App\Http\Resources\Accounting\IfrsReportingPeriodsResource;
use App\Models\Accounting\IfrsReportingPeriods;
use App\Repositories\Accounting\IfrsReportingPeriodsRepository;
use Illuminate\Http\Request;
use Response;

/**
 * Class IfrsReportingPeriodsController.
 */
class IfrsReportingPeriodsAPIController extends AppBaseController
{
    /** @var IfrsReportingPeriodsRepository */
    private $ifrsReportingPeriodsRepository;

    public function __construct(IfrsReportingPeriodsRepository $ifrsReportingPeriodsRepo)
    {
        $this->ifrsReportingPeriodsRepository = $ifrsReportingPeriodsRepo;
    }

    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/ifrsReportingPeriods",
     *      summary="Get a listing of the IfrsReportingPeriods.",
     *      tags={"IfrsReportingPeriods"},
     *      description="Get all IfrsReportingPeriods",
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
     *                  @SWG\Items(ref="#/definitions/IfrsReportingPeriods")
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
        $ifrsReportingPeriods = $this->ifrsReportingPeriodsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(IfrsReportingPeriodsResource::collection($ifrsReportingPeriods), 'Ifrs Reporting Periods retrieved successfully');
    }

    /**
     * @return Response
     *
     * @SWG\Post(
     *      path="/ifrsReportingPeriods",
     *      summary="Store a newly created IfrsReportingPeriods in storage",
     *      tags={"IfrsReportingPeriods"},
     *      description="Store IfrsReportingPeriods",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="IfrsReportingPeriods that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/IfrsReportingPeriods")
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
     *                  ref="#/definitions/IfrsReportingPeriods"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateIfrsReportingPeriodsAPIRequest $request)
    {
        $input = $request->all();

        $ifrsReportingPeriods = $this->ifrsReportingPeriodsRepository->create($input);

        return $this->sendResponse(new IfrsReportingPeriodsResource($ifrsReportingPeriods), 'Ifrs Reporting Periods saved successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Get(
     *      path="/ifrsReportingPeriods/{id}",
     *      summary="Display the specified IfrsReportingPeriods",
     *      tags={"IfrsReportingPeriods"},
     *      description="Get IfrsReportingPeriods",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of IfrsReportingPeriods",
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
     *                  ref="#/definitions/IfrsReportingPeriods"
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
        /** @var IfrsReportingPeriods $ifrsReportingPeriods */
        $ifrsReportingPeriods = $this->ifrsReportingPeriodsRepository->find($id);

        if (empty($ifrsReportingPeriods)) {
            return $this->sendError('Ifrs Reporting Periods not found');
        }

        return $this->sendResponse(new IfrsReportingPeriodsResource($ifrsReportingPeriods), 'Ifrs Reporting Periods retrieved successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Put(
     *      path="/ifrsReportingPeriods/{id}",
     *      summary="Update the specified IfrsReportingPeriods in storage",
     *      tags={"IfrsReportingPeriods"},
     *      description="Update IfrsReportingPeriods",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of IfrsReportingPeriods",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="IfrsReportingPeriods that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/IfrsReportingPeriods")
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
     *                  ref="#/definitions/IfrsReportingPeriods"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateIfrsReportingPeriodsAPIRequest $request)
    {
        $input = $request->all();

        /** @var IfrsReportingPeriods $ifrsReportingPeriods */
        $ifrsReportingPeriods = $this->ifrsReportingPeriodsRepository->find($id);

        if (empty($ifrsReportingPeriods)) {
            return $this->sendError('Ifrs Reporting Periods not found');
        }

        $ifrsReportingPeriods = $this->ifrsReportingPeriodsRepository->update($input, $id);

        return $this->sendResponse(new IfrsReportingPeriodsResource($ifrsReportingPeriods), 'IfrsReportingPeriods updated successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Delete(
     *      path="/ifrsReportingPeriods/{id}",
     *      summary="Remove the specified IfrsReportingPeriods from storage",
     *      tags={"IfrsReportingPeriods"},
     *      description="Delete IfrsReportingPeriods",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of IfrsReportingPeriods",
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
        /** @var IfrsReportingPeriods $ifrsReportingPeriods */
        $ifrsReportingPeriods = $this->ifrsReportingPeriodsRepository->find($id);

        if (empty($ifrsReportingPeriods)) {
            return $this->sendError('Ifrs Reporting Periods not found');
        }

        $ifrsReportingPeriods->delete();

        return $this->sendSuccess('Ifrs Reporting Periods deleted successfully');
    }
}
