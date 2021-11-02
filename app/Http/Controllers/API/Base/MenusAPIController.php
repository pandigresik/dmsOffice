<?php

namespace App\Http\Controllers\API\Base;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\Base\CreateMenusAPIRequest;
use App\Http\Requests\API\Base\UpdateMenusAPIRequest;
use App\Http\Resources\Base\MenusResource;
use App\Models\Base\Menus;
use App\Repositories\Base\MenusRepository;
use Illuminate\Http\Request;
use Response;

/**
 * Class MenusController.
 */
class MenusAPIController extends AppBaseController
{
    /** @var MenusRepository */
    protected $repository;

    public function __construct()
    {
    }

    /**
     * @return Response
     *
     * @SWG\Get(
     *      path="/menus",
     *      summary="Get a listing of the menus.",
     *      tags={"Menus"},
     *      description="Get all menus",
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
     *                  @SWG\Items(ref="#/definitions/Menus")
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
        $menus = $this->getRepositoryObj()->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(MenusResource::collection($menus), 'menus retrieved successfully');
    }

    /**
     * @return Response
     *
     * @SWG\Post(
     *      path="/menus",
     *      summary="Store a newly created Menus in storage",
     *      tags={"Menus"},
     *      description="Store Menus",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Menus that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Menus")
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
     *                  ref="#/definitions/Menus"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateMenusAPIRequest $request)
    {
        $input = $request->all();

        $menus = $this->getRepositoryObj()->create($input);

        return $this->sendResponse(new MenusResource($menus), 'Menus saved successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Get(
     *      path="/menus/{id}",
     *      summary="Display the specified Menus",
     *      tags={"Menus"},
     *      description="Get Menus",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Menus",
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
     *                  ref="#/definitions/Menus"
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
        /** @var Menus $menus */
        $menus = $this->getRepositoryObj()->find($id);

        if (empty($menus)) {
            return $this->sendError('Menus not found');
        }

        return $this->sendResponse(new MenusResource($menus), 'Menus retrieved successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Put(
     *      path="/menus/{id}",
     *      summary="Update the specified Menus in storage",
     *      tags={"Menus"},
     *      description="Update Menus",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Menus",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Menus that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Menus")
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
     *                  ref="#/definitions/Menus"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateMenusAPIRequest $request)
    {
        $input = $request->all();

        /** @var Menus $menus */
        $menus = $this->getRepositoryObj()->find($id);

        if (empty($menus)) {
            return $this->sendError('Menus not found');
        }

        $menus = $this->getRepositoryObj()->update($input, $id);

        return $this->sendResponse(new MenusResource($menus), 'Menus updated successfully');
    }

    /**
     * @param int $id
     *
     * @return Response
     *
     * @SWG\Delete(
     *      path="/menus/{id}",
     *      summary="Remove the specified Menus from storage",
     *      tags={"Menus"},
     *      description="Delete Menus",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Menus",
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
        /** @var Menus $menus */
        $menus = $this->getRepositoryObj()->find($id);

        if (empty($menus)) {
            return $this->sendError('Menus not found');
        }

        $menus->delete();

        return $this->sendSuccess('Menus deleted successfully');
    }
}
