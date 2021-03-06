<?php

namespace App\Http\Controllers\Sales;

use App\DataTables\Sales\DiscountsDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Sales\CreateDiscountsRequest;
use App\Http\Requests\Sales\UpdateDiscountsRequest;
use App\Models\Base\DmsArCustomer;
use App\Models\Sales\Discounts;
use App\Repositories\Base\DmsArCustomerhierarchyRepository;
use App\Repositories\Inventory\DmsInvProductRepository;
use App\Repositories\Sales\DiscountsRepository;
use Flash;
use Response;

class DiscountsController extends AppBaseController
{
    /** @var DiscountsRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = DiscountsRepository::class;
    }

    /**
     * Display a listing of the Discounts.
     *
     * @return Response
     */
    public function index(DiscountsDataTable $discountsDataTable)
    {
        return $discountsDataTable->render('sales.discounts.index');
    }

    /**
     * Show the form for creating a new Discounts.
     *
     * @return Response
     */
    public function create()
    {
        $discounts = new Discounts(['conversion_main_dms_inv_product_id' => 1, 'conversion_bundling_dms_inv_product_id' => 1]);

        return view('sales.discounts.create')->with('discounts', $discounts)->with($this->getOptionItems());
    }

    /**
     * Store a newly created Discounts in storage.
     *
     * @return Response
     */
    public function store(CreateDiscountsRequest $request)
    {
        $input = $request->all();

        $discounts = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/discounts.singular')]));

        return redirect(route('sales.discounts.index'));
    }

    /**
     * Display the specified Discounts.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $discounts = $this->getRepositoryObj()->find($id);

        if (empty($discounts)) {
            Flash::error(__('models/discounts.singular').' '.__('messages.not_found'));

            return redirect(route('sales.discounts.index'));
        }

        return view('sales.discounts.show')->with('discounts', $discounts);
    }

    /**
     * Show the form for editing the specified Discounts.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $discounts = $this->getRepositoryObj()->find($id);
        $members = $discounts->members;
        $details = $discounts->details;
        $typeMember = $members->first()->tipe;
        $listMember = $members->pluck('member_id')->toArray();

        $discounts->discount_members = [
            'tipe' => $typeMember,
            'member_id' => $listMember,
        ];
        if (empty($discounts)) {
            Flash::error(__('messages.not_found', ['model' => __('models/discounts.singular')]));

            return redirect(route('sales.discounts.index'));
        }
        $optionItems = $this->getOptionItems();
        $product = new DmsInvProductRepository(app());
        if ('customer' == $typeMember) {
            $customer = new DmsArCustomer();
            $optionItems['customerItems'] = $customer->whereIn('szId', $listMember)->pluck('szName', 'szId');
        }

        $optionItems['mainProductItems'] = $product->allQuery()->whereIn('szId', explode(',', $discounts->main_dms_inv_product_id))->get()->pluck('szName', 'szId');
        $optionItems['bundlingProductItems'] = $discounts->bundling_dms_inv_product_id ? $product->allQuery()->whereIn('szId', explode(',', $discounts->bundling_dms_inv_product_id))->get()->pluck('szName', 'szId') : [];
        $optionItems['detailItems'] = $details;

        return view('sales.discounts.edit')->with('discounts', $discounts)->with($optionItems);
    }

    /**
     * Update the specified Discounts in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateDiscountsRequest $request)
    {
        $discounts = $this->getRepositoryObj()->find($id);

        if (empty($discounts)) {
            Flash::error(__('messages.not_found', ['model' => __('models/discounts.singular')]));

            return redirect(route('sales.discounts.index'));
        }

        $discounts = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/discounts.singular')]));

        return redirect(route('sales.discounts.index'));
    }

    /**
     * Remove the specified Discounts from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $discounts = $this->getRepositoryObj()->find($id);

        if (empty($discounts)) {
            Flash::error(__('messages.not_found', ['model' => __('models/discounts.singular')]));

            return redirect(route('sales.discounts.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/discounts.singular')]));

        return redirect(route('sales.discounts.index'));
    }

    /**
     * Provide options item based on relationship model Discounts from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        $segmentCustomer = new DmsArCustomerhierarchyRepository(app());

        return [
            'jenisOptionItems' => array_combine(Discounts::OPTION_ITEM_JENIS, Discounts::OPTION_ITEM_JENIS),
            'typeOptionItems' => array_combine(Discounts::OPTION_ITEM_TYPE, Discounts::OPTION_ITEM_TYPE),
            'segmentCustomerItems' => $segmentCustomer->pluck([], null, null, 'szId', 'szName'),
            'tipeSegmentCustomerItems' => array_combine(Discounts::OPTION_ITEM_SEGMENT, ['Segment Pelanggan', 'Pelanggan']),
            'mainProductItems' => [],
            'bundlingProductItems' => [],
            'customerItems' => [],
        ];
    }
}
