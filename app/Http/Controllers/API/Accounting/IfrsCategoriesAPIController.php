<?php

namespace App\Http\Controllers\API\Accounting;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\Accounting\CreateIfrsCategoriesAPIRequest;
use App\Http\Requests\API\Accounting\UpdateIfrsCategoriesAPIRequest;
use App\Http\Resources\Accounting\IfrsCategoriesResource;
use App\Models\Accounting\IfrsCategories;
use App\Repositories\Accounting\IfrsCategoriesRepository;
use Illuminate\Http\Request;
use Response;

/**
 * Class IfrsCategoriesController.
 */
class IfrsCategoriesAPIController extends AppBaseController
{
    /** @var IfrsCategoriesRepository */
    private $ifrsCategoriesRepository;

    public function __construct(IfrsCategoriesRepository $ifrsCategoriesRepo)
    {
        $this->ifrsCategoriesRepository = $ifrsCategoriesRepo;
    }

    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/ifrsCategories",
     *      summary="Get a listing of the IfrsCategories.",
     *      tags={"IfrsCategories"},
     *      description="Get all IfrsCategories",
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
     *                  @SWG\Items(ref="#/definitions/IfrsCategories")
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
        $ifrsCategories = $this->ifrsCategoriesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(IfrsCategoriesResource::collection($ifrsCategories), 'Ifrs Categories retrieved successfully');
    }

    /**
     * @return Response
     *
     * @SWG\Post(
     *      path="/ifrsCategories",
     *      summary="Store a newly created IfrsCategories in storage",
     *      tags={"IfrsCategories"},
     *      description="Store IfrsCategories",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="IfrsCategories that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/IfrsCategories")
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
     *                  ref="#/definitions/IfrsCategories"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateIfrsCategoriesAPIRequest $request)
    {
        $input = $request->all();

        $ifrsCategories = $this->ifrsCategoriesRepository->create($input);

        return $this->sendResponse(new IfrsCategoriesResource($ifrsCategories), 'Ifrs Categories saved successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Get(
     *      path="/ifrsCategories/{id}",
     *      summary="Display the specified IfrsCategories",
     *      tags={"IfrsCategories"},
     *      description="Get IfrsCategories",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of IfrsCategories",
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
     *                  ref="#/definitions/IfrsCategories"
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
        /** @var IfrsCategories $ifrsCategories */
        $ifrsCategories = $this->ifrsCategoriesRepository->find($id);

        if (empty($ifrsCategories)) {
            return $this->sendError('Ifrs Categories not found');
        }

        return $this->sendResponse(new IfrsCategoriesResource($ifrsCategories), 'Ifrs Categories retrieved successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Put(
     *      path="/ifrsCategories/{id}",
     *      summary="Update the specified IfrsCategories in storage",
     *      tags={"IfrsCategories"},
     *      description="Update IfrsCategories",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of IfrsCategories",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="IfrsCategories that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/IfrsCategories")
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
     *                  ref="#/definitions/IfrsCategories"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateIfrsCategoriesAPIRequest $request)
    {
        $input = $request->all();

        /** @var IfrsCategories $ifrsCategories */
        $ifrsCategories = $this->ifrsCategoriesRepository->find($id);

        if (empty($ifrsCategories)) {
            return $this->sendError('Ifrs Categories not found');
        }

        $ifrsCategories = $this->ifrsCategoriesRepository->update($input, $id);

        return $this->sendResponse(new IfrsCategoriesResource($ifrsCategories), 'IfrsCategories updated successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Delete(
     *      path="/ifrsCategories/{id}",
     *      summary="Remove the specified IfrsCategories from storage",
     *      tags={"IfrsCategories"},
     *      description="Delete IfrsCategories",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of IfrsCategories",
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
        /** @var IfrsCategories $ifrsCategories */
        $ifrsCategories = $this->ifrsCategoriesRepository->find($id);

        if (empty($ifrsCategories)) {
            return $this->sendError('Ifrs Categories not found');
        }

        $ifrsCategories->delete();

        return $this->sendSuccess('Ifrs Categories deleted successfully');
    }
}
