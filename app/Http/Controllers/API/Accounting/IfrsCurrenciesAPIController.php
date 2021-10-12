<?php

namespace App\Http\Controllers\API\Accounting;

use App\Http\Requests\API\Accounting\CreateIfrsCurrenciesAPIRequest;
use App\Http\Requests\API\Accounting\UpdateIfrsCurrenciesAPIRequest;
use App\Models\Accounting\IfrsCurrencies;
use App\Repositories\Accounting\IfrsCurrenciesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\Accounting\IfrsCurrenciesResource;
use Response;

/**
 * Class IfrsCurrenciesController
 * @package App\Http\Controllers\API\Accounting
 */

class IfrsCurrenciesAPIController extends AppBaseController
{
    /** @var  IfrsCurrenciesRepository */
    private $ifrsCurrenciesRepository;

    public function __construct(IfrsCurrenciesRepository $ifrsCurrenciesRepo)
    {
        $this->ifrsCurrenciesRepository = $ifrsCurrenciesRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/ifrsCurrencies",
     *      summary="Get a listing of the IfrsCurrencies.",
     *      tags={"IfrsCurrencies"},
     *      description="Get all IfrsCurrencies",
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
     *                  @SWG\Items(ref="#/definitions/IfrsCurrencies")
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
        $ifrsCurrencies = $this->ifrsCurrenciesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(IfrsCurrenciesResource::collection($ifrsCurrencies), 'Ifrs Currencies retrieved successfully');
    }

    /**
     * @param CreateIfrsCurrenciesAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/ifrsCurrencies",
     *      summary="Store a newly created IfrsCurrencies in storage",
     *      tags={"IfrsCurrencies"},
     *      description="Store IfrsCurrencies",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="IfrsCurrencies that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/IfrsCurrencies")
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
     *                  ref="#/definitions/IfrsCurrencies"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateIfrsCurrenciesAPIRequest $request)
    {
        $input = $request->all();

        $ifrsCurrencies = $this->ifrsCurrenciesRepository->create($input);

        return $this->sendResponse(new IfrsCurrenciesResource($ifrsCurrencies), 'Ifrs Currencies saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/ifrsCurrencies/{id}",
     *      summary="Display the specified IfrsCurrencies",
     *      tags={"IfrsCurrencies"},
     *      description="Get IfrsCurrencies",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of IfrsCurrencies",
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
     *                  ref="#/definitions/IfrsCurrencies"
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
        /** @var IfrsCurrencies $ifrsCurrencies */
        $ifrsCurrencies = $this->ifrsCurrenciesRepository->find($id);

        if (empty($ifrsCurrencies)) {
            return $this->sendError('Ifrs Currencies not found');
        }

        return $this->sendResponse(new IfrsCurrenciesResource($ifrsCurrencies), 'Ifrs Currencies retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateIfrsCurrenciesAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/ifrsCurrencies/{id}",
     *      summary="Update the specified IfrsCurrencies in storage",
     *      tags={"IfrsCurrencies"},
     *      description="Update IfrsCurrencies",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of IfrsCurrencies",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="IfrsCurrencies that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/IfrsCurrencies")
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
     *                  ref="#/definitions/IfrsCurrencies"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateIfrsCurrenciesAPIRequest $request)
    {
        $input = $request->all();

        /** @var IfrsCurrencies $ifrsCurrencies */
        $ifrsCurrencies = $this->ifrsCurrenciesRepository->find($id);

        if (empty($ifrsCurrencies)) {
            return $this->sendError('Ifrs Currencies not found');
        }

        $ifrsCurrencies = $this->ifrsCurrenciesRepository->update($input, $id);

        return $this->sendResponse(new IfrsCurrenciesResource($ifrsCurrencies), 'IfrsCurrencies updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/ifrsCurrencies/{id}",
     *      summary="Remove the specified IfrsCurrencies from storage",
     *      tags={"IfrsCurrencies"},
     *      description="Delete IfrsCurrencies",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of IfrsCurrencies",
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
        /** @var IfrsCurrencies $ifrsCurrencies */
        $ifrsCurrencies = $this->ifrsCurrenciesRepository->find($id);

        if (empty($ifrsCurrencies)) {
            return $this->sendError('Ifrs Currencies not found');
        }

        $ifrsCurrencies->delete();

        return $this->sendSuccess('Ifrs Currencies deleted successfully');
    }
}
