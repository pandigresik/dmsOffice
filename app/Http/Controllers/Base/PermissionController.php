<?php

namespace App\Http\Controllers\Base;

use App\DataTables\Base\PermissionDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Base\CreatePermissionRequest;
use App\Http\Requests\Base\UpdatePermissionRequest;
use App\Models\Base\Permission;
use App\Repositories\Base\PermissionRepository;
use Flash;
use Response;

class PermissionController extends AppBaseController
{
    /** @var PermissionRepository */
    private $permissionRepository;

    public function __construct(PermissionRepository $permissionRepo)
    {
        $this->permissionRepository = $permissionRepo;
    }

    /**
     * Display a listing of the Permission.
     *
     * @return Response
     */
    public function index(PermissionDataTable $permissionDataTable)
    {
        return $permissionDataTable->render('base.permissions.index');
    }

    /**
     * Show the form for creating a new Permission.
     *
     * @return Response
     */
    public function create()
    {
        $permission = new Permission();
        $permission->name = 'tes';
        $permission->guard_name = 'web';

        return view('base.permissions.create')->with('permission', $permission);
    }

    /**
     * Store a newly created Permission in storage.
     *
     * @return Response
     */
    public function store(CreatePermissionRequest $request)
    {
        $input = $request->all();

        $permission = $this->permissionRepository->create($input);

        Flash::success('Permission saved successfully.');

        return redirect(route('base.permissions.index'));
    }

    /**
     * Display the specified Permission.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $permission = $this->permissionRepository->find($id);

        if (empty($permission)) {
            Flash::error('Permission not found');

            return redirect(route('base.permissions.index'));
        }

        return view('base.permissions.show')->with('permission', $permission);
    }

    /**
     * Show the form for editing the specified Permission.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $permission = $this->permissionRepository->find($id);

        if (empty($permission)) {
            Flash::error('Permission not found');

            return redirect(route('base.permissions.index'));
        }

        return view('base.permissions.edit')->with('permission', $permission);
    }

    /**
     * Update the specified Permission in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdatePermissionRequest $request)
    {
        $permission = $this->permissionRepository->find($id);

        if (empty($permission)) {
            Flash::error('Permission not found');

            return redirect(route('base.permissions.index'));
        }

        $permission = $this->permissionRepository->update($request->all(), $id);

        Flash::success('Permission updated successfully.');

        return redirect(route('base.permissions.index'));
    }

    /**
     * Remove the specified Permission from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $permission = $this->permissionRepository->find($id);

        if (empty($permission)) {
            Flash::error('Permission not found');

            return redirect(route('base.permissions.index'));
        }

        $this->permissionRepository->delete($id);

        Flash::success('Permission deleted successfully.');

        return redirect(route('base.permissions.index'));
    }
}
