<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMenusAPIRequest;
use App\Http\Requests\API\UpdateMenusAPIRequest;
use App\Models\Menus;
use App\Repositories\MenusRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\MenusResource;
use Response;

/**
 * Class MenusController
 * @package App\Http\Controllers\API
 */

class MenusAPIController extends AppBaseController
{
    /** @var  MenusRepository */
    private $menusRepository;

    public function __construct(MenusRepository $menusRepo)
    {
        $this->menusRepository = $menusRepo;
    }

    /**
     * @param Request $request
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
        $menus = $this->menusRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(MenusResource::collection($menus), 'menus retrieved successfully');
    }

    /**
     * @param CreateMenusAPIRequest $request
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

        $menus = $this->menusRepository->create($input);

        return $this->sendResponse(new MenusResource($menus), 'Menus saved successfully');
    }

    /**
     * @param int $id
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
        $menus = $this->menusRepository->find($id);

        if (empty($menus)) {
            return $this->sendError('Menus not found');
        }

        return $this->sendResponse(new MenusResource($menus), 'Menus retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateMenusAPIRequest $request
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
        $menus = $this->menusRepository->find($id);

        if (empty($menus)) {
            return $this->sendError('Menus not found');
        }

        $menus = $this->menusRepository->update($input, $id);

        return $this->sendResponse(new MenusResource($menus), 'Menus updated successfully');
    }

    /**
     * @param int $id
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
        $menus = $this->menusRepository->find($id);

        if (empty($menus)) {
            return $this->sendError('Menus not found');
        }

        $menus->delete();

        return $this->sendSuccess('Menus deleted successfully');
    }
}
