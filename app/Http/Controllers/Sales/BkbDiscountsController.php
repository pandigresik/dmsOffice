<?php

namespace App\Http\Controllers\Sales;

use App\DataTables\Sales\BkbDiscountsDataTable;
use App\Http\Requests\Sales;
use App\Http\Requests\Sales\CreateBkbDiscountsRequest;
use App\Http\Requests\Sales\UpdateBkbDiscountsRequest;
use App\Repositories\Sales\BkbDiscountsRepository;

use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BkbDiscountsController extends AppBaseController
{
    /** @var  BkbDiscountsRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = BkbDiscountsRepository::class;
    }

    /**
     * Display a listing of the BkbDiscounts.
     *
     * @param BkbDiscountsDataTable $bkbDiscountsDataTable
     * @return Response
     */
    public function index(BkbDiscountsDataTable $bkbDiscountsDataTable)
    {
        return $bkbDiscountsDataTable->render('sales.bkb_discounts.index');
    }

    /**
     * Show the form for creating a new BkbDiscounts.
     *
     * @return Response
     */
    public function create()
    {
        return view('sales.bkb_discounts.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created BkbDiscounts in storage.
     *
     * @param CreateBkbDiscountsRequest $request
     *
     * @return Response
     */
    public function store(CreateBkbDiscountsRequest $request)
    {
        $input = $request->all();

        $bkbDiscounts = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/bkbDiscounts.singular')]));

        return redirect(route('sales.bkbDiscounts.index'));
    }

    /**
     * Display the specified BkbDiscounts.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bkbDiscounts = $this->getRepositoryObj()->find($id);

        if (empty($bkbDiscounts)) {
            Flash::error(__('models/bkbDiscounts.singular').' '.__('messages.not_found'));

            return redirect(route('sales.bkbDiscounts.index'));
        }

        return view('sales.bkb_discounts.show')->with('bkbDiscounts', $bkbDiscounts);
    }

    /**
     * Show the form for editing the specified BkbDiscounts.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bkbDiscounts = $this->getRepositoryObj()->find($id);

        if (empty($bkbDiscounts)) {
            Flash::error(__('messages.not_found', ['model' => __('models/bkbDiscounts.singular')]));

            return redirect(route('sales.bkbDiscounts.index'));
        }

        return view('sales.bkb_discounts.edit')->with('bkbDiscounts', $bkbDiscounts)->with($this->getOptionItems());
    }

    /**
     * Update the specified BkbDiscounts in storage.
     *
     * @param  int              $id
     * @param UpdateBkbDiscountsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBkbDiscountsRequest $request)
    {
        $bkbDiscounts = $this->getRepositoryObj()->find($id);

        if (empty($bkbDiscounts)) {
            Flash::error(__('messages.not_found', ['model' => __('models/bkbDiscounts.singular')]));

            return redirect(route('sales.bkbDiscounts.index'));
        }

        $bkbDiscounts = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/bkbDiscounts.singular')]));

        return redirect(route('sales.bkbDiscounts.index'));
    }

    /**
     * Remove the specified BkbDiscounts from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bkbDiscounts = $this->getRepositoryObj()->find($id);

        if (empty($bkbDiscounts)) {
            Flash::error(__('messages.not_found', ['model' => __('models/bkbDiscounts.singular')]));

            return redirect(route('sales.bkbDiscounts.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/bkbDiscounts.singular')]));

        return redirect(route('sales.bkbDiscounts.index'));
    }

    /**
     * Provide options item based on relationship model BkbDiscounts from storage.         
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
