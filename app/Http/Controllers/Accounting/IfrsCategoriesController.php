<?php

namespace App\Http\Controllers\Accounting;

use App\DataTables\Accounting\IfrsCategoriesDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Accounting\CreateIfrsCategoriesRequest;
use App\Http\Requests\Accounting\UpdateIfrsCategoriesRequest;
use App\Repositories\Accounting\IfrsCategoriesRepository;
use App\Repositories\Accounting\IfrsEntitiesRepository;
use Flash;
use Response;

class IfrsCategoriesController extends AppBaseController
{
    /** @var IfrsCategoriesRepository */
    private $ifrsCategoriesRepository;

    public function __construct(IfrsCategoriesRepository $ifrsCategoriesRepo)
    {
        $this->ifrsCategoriesRepository = $ifrsCategoriesRepo;
    }

    /**
     * Display a listing of the IfrsCategories.
     *
     * @return Response
     */
    public function index(IfrsCategoriesDataTable $ifrsCategoriesDataTable)
    {
        return $ifrsCategoriesDataTable->render('accounting.ifrs_categories.index');
    }

    /**
     * Show the form for creating a new IfrsCategories.
     *
     * @return Response
     */
    public function create()
    {
        return view('accounting.ifrs_categories.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created IfrsCategories in storage.
     *
     * @return Response
     */
    public function store(CreateIfrsCategoriesRequest $request)
    {
        $input = $request->all();

        $ifrsCategories = $this->ifrsCategoriesRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/ifrsCategories.singular')]));

        return redirect(route('accounting.ifrsCategories.index'));
    }

    /**
     * Display the specified IfrsCategories.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ifrsCategories = $this->ifrsCategoriesRepository->find($id);

        if (empty($ifrsCategories)) {
            Flash::error(__('models/ifrsCategories.singular').' '.__('messages.not_found'));

            return redirect(route('accounting.ifrsCategories.index'));
        }

        return view('accounting.ifrs_categories.show')->with('ifrsCategories', $ifrsCategories);
    }

    /**
     * Show the form for editing the specified IfrsCategories.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ifrsCategories = $this->ifrsCategoriesRepository->find($id);

        if (empty($ifrsCategories)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ifrsCategories.singular')]));

            return redirect(route('accounting.ifrsCategories.index'));
        }

        return view('accounting.ifrs_categories.edit')->with('ifrsCategories', $ifrsCategories)->with($this->getOptionItems());
    }

    /**
     * Update the specified IfrsCategories in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateIfrsCategoriesRequest $request)
    {
        $ifrsCategories = $this->ifrsCategoriesRepository->find($id);

        if (empty($ifrsCategories)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ifrsCategories.singular')]));

            return redirect(route('accounting.ifrsCategories.index'));
        }

        $ifrsCategories = $this->ifrsCategoriesRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/ifrsCategories.singular')]));

        return redirect(route('accounting.ifrsCategories.index'));
    }

    /**
     * Remove the specified IfrsCategories from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ifrsCategories = $this->ifrsCategoriesRepository->find($id);

        if (empty($ifrsCategories)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ifrsCategories.singular')]));

            return redirect(route('accounting.ifrsCategories.index'));
        }

        $this->ifrsCategoriesRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/ifrsCategories.singular')]));

        return redirect(route('accounting.ifrsCategories.index'));
    }

    /**
     * Provide options item based on relationship model IfrsCategories from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        $ifrsEntity = new IfrsEntitiesRepository(app());
        $listCategory = config('ifrs')['accounts'];
        return [
            'entityItems' => ['' => __('crud.option.ifrsEntity_placeholder')] + $ifrsEntity->pluck(),
            'categoryItems' => ['' => __('crud.option.ifrsEntity_placeholder')] + $listCategory,
        ];
    }
}
