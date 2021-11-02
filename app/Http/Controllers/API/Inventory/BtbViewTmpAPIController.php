<?php

namespace App\Http\Controllers\API\Inventory;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\Inventory\CreateBtbViewTmpAPIRequest;
use App\Http\Requests\API\Inventory\UpdateBtbViewTmpAPIRequest;
use App\Http\Resources\Inventory\BtbViewTmpResource;
use App\Models\Inventory\BtbViewTmp;
use App\Repositories\Inventory\BtbViewTmpRepository;
use Illuminate\Http\Request;
use Response;

/**
 * Class BtbViewTmpController.
 */
class BtbViewTmpAPIController extends AppBaseController
{
    /** @var BtbViewTmpRepository */
    protected $repository;

    public function __construct()
    {
    }

    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/btbViewTmps",
     *      summary="Get a listing of the BtbViewTmps.",
     *      tags={"BtbViewTmp"},
     *      description="Get all BtbViewTmps",
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
     *                  @SWG\Items(ref="#/definitions/BtbViewTmp")
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
        $btbViewTmps = $this->getRepositoryObj()->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(BtbViewTmpResource::collection($btbViewTmps), 'Btb View Tmps retrieved successfully');
    }

    /**
     * @return Response
     *
     * @SWG\Post(
     *      path="/btbViewTmps",
     *      summary="Store a newly created BtbViewTmp in storage",
     *      tags={"BtbViewTmp"},
     *      description="Store BtbViewTmp",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="BtbViewTmp that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/BtbViewTmp")
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
     *                  ref="#/definitions/BtbViewTmp"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateBtbViewTmpAPIRequest $request)
    {
        $input = $request->all();

        $btbViewTmp = $this->getRepositoryObj()->create($input);

        return $this->sendResponse(new BtbViewTmpResource($btbViewTmp), 'Btb View Tmp saved successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Get(
     *      path="/btbViewTmps/{id}",
     *      summary="Display the specified BtbViewTmp",
     *      tags={"BtbViewTmp"},
     *      description="Get BtbViewTmp",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of BtbViewTmp",
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
     *                  ref="#/definitions/BtbViewTmp"
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
        /** @var BtbViewTmp $btbViewTmp */
        $btbViewTmp = $this->getRepositoryObj()->find($id);

        if (empty($btbViewTmp)) {
            return $this->sendError('Btb View Tmp not found');
        }

        return $this->sendResponse(new BtbViewTmpResource($btbViewTmp), 'Btb View Tmp retrieved successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Put(
     *      path="/btbViewTmps/{id}",
     *      summary="Update the specified BtbViewTmp in storage",
     *      tags={"BtbViewTmp"},
     *      description="Update BtbViewTmp",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of BtbViewTmp",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="BtbViewTmp that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/BtbViewTmp")
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
     *                  ref="#/definitions/BtbViewTmp"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateBtbViewTmpAPIRequest $request)
    {
        $input = $request->all();

        /** @var BtbViewTmp $btbViewTmp */
        $btbViewTmp = $this->getRepositoryObj()->find($id);

        if (empty($btbViewTmp)) {
            return $this->sendError('Btb View Tmp not found');
        }

        $btbViewTmp = $this->getRepositoryObj()->update($input, $id);

        return $this->sendResponse(new BtbViewTmpResource($btbViewTmp), 'BtbViewTmp updated successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Delete(
     *      path="/btbViewTmps/{id}",
     *      summary="Remove the specified BtbViewTmp from storage",
     *      tags={"BtbViewTmp"},
     *      description="Delete BtbViewTmp",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of BtbViewTmp",
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
        /** @var BtbViewTmp $btbViewTmp */
        $btbViewTmp = $this->getRepositoryObj()->find($id);

        if (empty($btbViewTmp)) {
            return $this->sendError('Btb View Tmp not found');
        }

        $btbViewTmp->delete();

        return $this->sendSuccess('Btb View Tmp deleted successfully');
    }
}
