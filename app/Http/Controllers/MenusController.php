<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\DataTables\MenusDataTable;
use App\Repositories\MenusRepository;
use App\Http\Requests\CreateMenusRequest;
use App\Http\Requests\UpdateMenusRequest;
use App\Repositories\PermissionRepository;

class MenusController extends AppBaseController
{
    /** @var MenusRepository */
    private $menusRepository;

    public function __construct(MenusRepository $menusRepo)
    {
        $this->menusRepository = $menusRepo;        
    }

    /**
     * Display a listing of the Menus.
     *
     * @return Response
     */
    public function index(MenusDataTable $menusDataTable)
    {
        return $menusDataTable->render('menus.index');
    }

    /**
     * Show the form for creating a new Menus.
     *
     * @return Response
     */
    public function create()
    {
        return view('menus.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created Menus in storage.
     *
     * @return Response
     */
    public function store(CreateMenusRequest $request)
    {
        $input = $request->all();

        $menus = $this->menusRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/menus.singular')]));

        return redirect(route('menus.index'));
    }

    /**
     * Display the specified Menus.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $menus = $this->menusRepository->find($id);

        if (empty($menus)) {
            Flash::error(__('models/menus.singular').' '.__('messages.not_found'));

            return redirect(route('menus.index'));
        }

        return view('menus.show')->with('menus', $menus);
    }

    /**
     * Show the form for editing the specified Menus.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $menus = $this->menusRepository->find($id);

        if (empty($menus)) {
            Flash::error(__('messages.not_found', ['model' => __('models/menus.singular')]));

            return redirect(route('menus.index'));
        }        
        return view('menus.edit')->with('menus', $menus)->with($this->getOptionItems())->with(['selectedPermission' => $menus->permissions->pluck('id')->toArray()]);
    }

    /**
     * Update the specified Menus in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateMenusRequest $request)
    {
        $menus = $this->menusRepository->find($id);

        if (empty($menus)) {
            Flash::error(__('messages.not_found', ['model' => __('models/menus.singular')]));

            return redirect(route('menus.index'));
        }

        $menus = $this->menusRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/menus.singular')]));

        return redirect(route('menus.index'));
    }

    /**
     * Remove the specified Menus from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $menus = $this->menusRepository->find($id);

        if (empty($menus)) {
            Flash::error(__('messages.not_found', ['model' => __('models/menus.singular')]));

            return redirect(route('menus.index'));
        }

        $this->menusRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/menus.singular')]));

        return redirect(route('menus.index'));
    }

    /**
     * Provide options item based on relationship model Menus from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        $menuParent = new MenusRepository(app());
        $permission = new PermissionRepository(app());
        return [
            'statusItems' => ['1' => __('crud.state_active'), '0' => __('crud.state_nonactive')],
            'parentItems' => $menuParent->pluck(),
            'permissionItems' => $permission->pluck(),
            'routeItems' => $this->listRoute(),
            'iconItems' => array_combine(config('icon.coreui'),config('icon.coreui'))    
        ];
    }

    private function listRoute(){
        $routeCollection = \Route::getRoutes();
        $listRoute = [];
        foreach ($routeCollection as $route) {
            
            if (!in_array('web', $route->action['middleware'])) {
                continue;
            }
            $listRoute[$route->uri] = $route->uri;            
        }
        \Log::error(json_encode($route));

        return $listRoute;
    }    
}
