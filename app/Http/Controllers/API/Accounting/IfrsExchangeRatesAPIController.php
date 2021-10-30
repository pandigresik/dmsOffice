<?php

namespace App\Http\Controllers\API\Accounting;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\Accounting\CreateIfrsExchangeRatesAPIRequest;
use App\Http\Requests\API\Accounting\UpdateIfrsExchangeRatesAPIRequest;
use App\Http\Resources\Accounting\IfrsExchangeRatesResource;
use App\Models\Accounting\IfrsExchangeRates;
use App\Repositories\Accounting\IfrsExchangeRatesRepository;
use Illuminate\Http\Request;
use Response;

/**
 * Class IfrsExchangeRatesController.
 */
class IfrsExchangeRatesAPIController extends AppBaseController
{
    /** @var IfrsExchangeRatesRepository */
    private $ifrsExchangeRatesRepository;

    public function __construct(IfrsExchangeRatesRepository $ifrsExchangeRatesRepo)
    {
        $this->ifrsExchangeRatesRepository = $ifrsExchangeRatesRepo;
    }

    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/ifrsExchangeRates",
     *      summary="Get a listing of the IfrsExchangeRates.",
     *      tags={"IfrsExchangeRates"},
     *      description="Get all IfrsExchangeRates",
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
     *                  @SWG\Items(ref="#/definitions/IfrsExchangeRates")
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
        $ifrsExchangeRates = $this->ifrsExchangeRatesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(IfrsExchangeRatesResource::collection($ifrsExchangeRates), 'Ifrs Exchange Rates retrieved successfully');
    }

    /**
     * @return Response
     *
     * @SWG\Post(
     *      path="/ifrsExchangeRates",
     *      summary="Store a newly created IfrsExchangeRates in storage",
     *      tags={"IfrsExchangeRates"},
     *      description="Store IfrsExchangeRates",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="IfrsExchangeRates that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/IfrsExchangeRates")
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
     *                  ref="#/definitions/IfrsExchangeRates"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateIfrsExchangeRatesAPIRequest $request)
    {
        $input = $request->all();

        $ifrsExchangeRates = $this->ifrsExchangeRatesRepository->create($input);

        return $this->sendResponse(new IfrsExchangeRatesResource($ifrsExchangeRates), 'Ifrs Exchange Rates saved successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Get(
     *      path="/ifrsExchangeRates/{id}",
     *      summary="Display the specified IfrsExchangeRates",
     *      tags={"IfrsExchangeRates"},
     *      description="Get IfrsExchangeRates",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of IfrsExchangeRates",
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
     *                  ref="#/definitions/IfrsExchangeRates"
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
        /** @var IfrsExchangeRates $ifrsExchangeRates */
        $ifrsExchangeRates = $this->ifrsExchangeRatesRepository->find($id);

        if (empty($ifrsExchangeRates)) {
            return $this->sendError('Ifrs Exchange Rates not found');
        }

        return $this->sendResponse(new IfrsExchangeRatesResource($ifrsExchangeRates), 'Ifrs Exchange Rates retrieved successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Put(
     *      path="/ifrsExchangeRates/{id}",
     *      summary="Update the specified IfrsExchangeRates in storage",
     *      tags={"IfrsExchangeRates"},
     *      description="Update IfrsExchangeRates",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of IfrsExchangeRates",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="IfrsExchangeRates that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/IfrsExchangeRates")
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
     *                  ref="#/definitions/IfrsExchangeRates"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateIfrsExchangeRatesAPIRequest $request)
    {
        $input = $request->all();

        /** @var IfrsExchangeRates $ifrsExchangeRates */
        $ifrsExchangeRates = $this->ifrsExchangeRatesRepository->find($id);

        if (empty($ifrsExchangeRates)) {
            return $this->sendError('Ifrs Exchange Rates not found');
        }

        $ifrsExchangeRates = $this->ifrsExchangeRatesRepository->update($input, $id);

        return $this->sendResponse(new IfrsExchangeRatesResource($ifrsExchangeRates), 'IfrsExchangeRates updated successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Delete(
     *      path="/ifrsExchangeRates/{id}",
     *      summary="Remove the specified IfrsExchangeRates from storage",
     *      tags={"IfrsExchangeRates"},
     *      description="Delete IfrsExchangeRates",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of IfrsExchangeRates",
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
        /** @var IfrsExchangeRates $ifrsExchangeRates */
        $ifrsExchangeRates = $this->ifrsExchangeRatesRepository->find($id);

        if (empty($ifrsExchangeRates)) {
            return $this->sendError('Ifrs Exchange Rates not found');
        }

        $ifrsExchangeRates->delete();

        return $this->sendSuccess('Ifrs Exchange Rates deleted successfully');
    }
}
