<?php

namespace App\Http\Controllers\Base;

use App\DataTables\Base\UomCategoryDataTable;
use App\Http\Requests\Base;
use App\Http\Requests\Base\CreateUomCategoryRequest;
use App\Http\Requests\Base\UpdateUomCategoryRequest;
use App\Repositories\Base\UomCategoryRepository;

use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class UomCategoryController extends AppBaseController
{
    /** @var  UomCategoryRepository */
    private $uomCategoryRepository;

    public function __construct(UomCategoryRepository $uomCategoryRepo)
    {
        $this->uomCategoryRepository = $uomCategoryRepo;
    }

    /**
     * Display a listing of the UomCategory.
     *
     * @param UomCategoryDataTable $uomCategoryDataTable
     * @return Response
     */
    public function index(UomCategoryDataTable $uomCategoryDataTable)
    {
        return $uomCategoryDataTable->render('base.uom_categories.index');
    }

    /**
     * Show the form for creating a new UomCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('base.uom_categories.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created UomCategory in storage.
     *
     * @param CreateUomCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateUomCategoryRequest $request)
    {
        $input = $request->all();

        $uomCategory = $this->uomCategoryRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/uomCategories.singular')]));

        return redirect(route('base.uomCategories.index'));
    }

    /**
     * Display the specified UomCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $uomCategory = $this->uomCategoryRepository->find($id);

        if (empty($uomCategory)) {
            Flash::error(__('models/uomCategories.singular').' '.__('messages.not_found'));

            return redirect(route('base.uomCategories.index'));
        }

        return view('base.uom_categories.show')->with('uomCategory', $uomCategory);
    }

    /**
     * Show the form for editing the specified UomCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $uomCategory = $this->uomCategoryRepository->find($id);

        if (empty($uomCategory)) {
            Flash::error(__('messages.not_found', ['model' => __('models/uomCategories.singular')]));

            return redirect(route('base.uomCategories.index'));
        }

        return view('base.uom_categories.edit')->with('uomCategory', $uomCategory)->with($this->getOptionItems());
    }

    /**
     * Update the specified UomCategory in storage.
     *
     * @param  int              $id
     * @param UpdateUomCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUomCategoryRequest $request)
    {
        $uomCategory = $this->uomCategoryRepository->find($id);

        if (empty($uomCategory)) {
            Flash::error(__('messages.not_found', ['model' => __('models/uomCategories.singular')]));

            return redirect(route('base.uomCategories.index'));
        }

        $uomCategory = $this->uomCategoryRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/uomCategories.singular')]));

        return redirect(route('base.uomCategories.index'));
    }

    /**
     * Remove the specified UomCategory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $uomCategory = $this->uomCategoryRepository->find($id);

        if (empty($uomCategory)) {
            Flash::error(__('messages.not_found', ['model' => __('models/uomCategories.singular')]));

            return redirect(route('base.uomCategories.index'));
        }

        $this->uomCategoryRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/uomCategories.singular')]));

        return redirect(route('base.uomCategories.index'));
    }

    /**
     * Provide options item based on relationship model UomCategory from storage.         
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems(){        
        
        return [
                        
        ];
    }
}
