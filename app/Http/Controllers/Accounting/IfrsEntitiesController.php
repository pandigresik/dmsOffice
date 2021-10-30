<?php

namespace App\Http\Controllers\Accounting;

use App\DataTables\Accounting\IfrsEntitiesDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Accounting\CreateIfrsEntitiesRequest;
use App\Http\Requests\Accounting\UpdateIfrsEntitiesRequest;
use App\Repositories\Accounting\IfrsCurrenciesRepository;
use App\Repositories\Accounting\IfrsEntitiesRepository;
use Flash;
use Response;

class IfrsEntitiesController extends AppBaseController
{
    /** @var IfrsEntitiesRepository */
    private $ifrsEntitiesRepository;

    public function __construct(IfrsEntitiesRepository $ifrsEntitiesRepo)
    {
        $this->ifrsEntitiesRepository = $ifrsEntitiesRepo;
    }

    /**
     * Display a listing of the IfrsEntities.
     *
     * @return Response
     */
    public function index(IfrsEntitiesDataTable $ifrsEntitiesDataTable)
    {
        return $ifrsEntitiesDataTable->render('accounting.ifrs_entities.index');
    }

    /**
     * Show the form for creating a new IfrsEntities.
     *
     * @return Response
     */
    public function create()
    {
        return view('accounting.ifrs_entities.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created IfrsEntities in storage.
     *
     * @return Response
     */
    public function store(CreateIfrsEntitiesRequest $request)
    {
        $input = $request->all();

        $ifrsEntities = $this->ifrsEntitiesRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/ifrsEntities.singular')]));

        return redirect(route('accounting.ifrsEntities.index'));
    }

    /**
     * Display the specified IfrsEntities.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ifrsEntities = $this->ifrsEntitiesRepository->find($id);

        if (empty($ifrsEntities)) {
            Flash::error(__('models/ifrsEntities.singular').' '.__('messages.not_found'));

            return redirect(route('accounting.ifrsEntities.index'));
        }

        return view('accounting.ifrs_entities.show')->with('ifrsEntities', $ifrsEntities);
    }

    /**
     * Show the form for editing the specified IfrsEntities.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ifrsEntities = $this->ifrsEntitiesRepository->find($id);

        if (empty($ifrsEntities)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ifrsEntities.singular')]));

            return redirect(route('accounting.ifrsEntities.index'));
        }

        return view('accounting.ifrs_entities.edit')->with('ifrsEntities', $ifrsEntities)->with($this->getOptionItems());
    }

    /**
     * Update the specified IfrsEntities in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateIfrsEntitiesRequest $request)
    {
        $ifrsEntities = $this->ifrsEntitiesRepository->find($id);

        if (empty($ifrsEntities)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ifrsEntities.singular')]));

            return redirect(route('accounting.ifrsEntities.index'));
        }

        $ifrsEntities = $this->ifrsEntitiesRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/ifrsEntities.singular')]));

        return redirect(route('accounting.ifrsEntities.index'));
    }

    /**
     * Remove the specified IfrsEntities from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ifrsEntities = $this->ifrsEntitiesRepository->find($id);

        if (empty($ifrsEntities)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ifrsEntities.singular')]));

            return redirect(route('accounting.ifrsEntities.index'));
        }

        $this->ifrsEntitiesRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/ifrsEntities.singular')]));

        return redirect(route('accounting.ifrsEntities.index'));
    }

    /**
     * Provide options item based on relationship model IfrsEntities from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
//        $ifrsCurrency = new IfrsCurrenciesRepository(app());
        $ifrsEntity = new IfrsEntitiesRepository(app());

        return [
            //            'currencyItems' => ['' => __('crud.option.ifrsEntity_placeholder')] + $ifrsCurrency->pluck(),
            'parentItems' => ['' => __('crud.option.ifrsEntity_placeholder')] + $ifrsEntity->pluck(),
        ];
    }
}
