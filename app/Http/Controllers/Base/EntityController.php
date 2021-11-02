<?php

namespace App\Http\Controllers\Base;

use App\DataTables\Base\EntityDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Base\CreateEntityRequest;
use App\Http\Requests\Base\UpdateEntityRequest;
use App\Repositories\Base\EntityRepository;
use Flash;
use Response;

class EntityController extends AppBaseController
{
    /** @var EntityRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = EntityRepository::class;
    }

    /**
     * Display a listing of the Entity.
     *
     * @return Response
     */
    public function index(EntityDataTable $entityDataTable)
    {
        return $entityDataTable->render('base.entities.index');
    }

    /**
     * Show the form for creating a new Entity.
     *
     * @return Response
     */
    public function create()
    {
        return view('base.entities.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created Entity in storage.
     *
     * @return Response
     */
    public function store(CreateEntityRequest $request)
    {
        $input = $request->all();

        $entity = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/entities.singular')]));

        return redirect(route('base.entities.index'));
    }

    /**
     * Display the specified Entity.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $entity = $this->getRepositoryObj()->find($id);

        if (empty($entity)) {
            Flash::error(__('models/entities.singular').' '.__('messages.not_found'));

            return redirect(route('base.entities.index'));
        }

        return view('base.entities.show')->with('entity', $entity);
    }

    /**
     * Show the form for editing the specified Entity.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $entity = $this->getRepositoryObj()->find($id);

        if (empty($entity)) {
            Flash::error(__('messages.not_found', ['model' => __('models/entities.singular')]));

            return redirect(route('base.entities.index'));
        }

        return view('base.entities.edit')->with('entity', $entity)->with($this->getOptionItems());
    }

    /**
     * Update the specified Entity in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateEntityRequest $request)
    {
        $entity = $this->getRepositoryObj()->find($id);

        if (empty($entity)) {
            Flash::error(__('messages.not_found', ['model' => __('models/entities.singular')]));

            return redirect(route('base.entities.index'));
        }

        $entity = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/entities.singular')]));

        return redirect(route('base.entities.index'));
    }

    /**
     * Remove the specified Entity from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $entity = $this->getRepositoryObj()->find($id);

        if (empty($entity)) {
            Flash::error(__('messages.not_found', ['model' => __('models/entities.singular')]));

            return redirect(route('base.entities.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/entities.singular')]));

        return redirect(route('base.entities.index'));
    }

    /**
     * Provide options item based on relationship model Entity from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        return [
        ];
    }
}
