<?php

namespace App\Http\Controllers\Sales;

use Flash;
use Response;
use App\Http\Requests\Sales;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

use App\DataTables\Sales\BkbDiscountsDataTable;
use App\Repositories\Base\DmsSmBranchRepository;
use App\Repositories\Sales\BkbDiscountsRepository;
use App\Http\Requests\Sales\CreateBkbDiscountsRequest;
use App\Http\Requests\Sales\UpdateBkbDiscountsRequest;
use App\Models\Base\DmsSmBranch;
use App\Models\Sales\Discounts;

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
    // public function index(BkbDiscountsDataTable $bkbDiscountsDataTable)
    // {
    //     return $bkbDiscountsDataTable->render('sales.bkb_discounts.index');
    // }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $period = explode(' - ', $request->get('period_range'));
            $branchId = $request->get('branch_id');
            $startDate = createLocalFormatDate($period[0])->format('Y-m-d');
            $endDate = createLocalFormatDate($period[1])->format('Y-m-d');
            $datas = $this->getRepositoryObj()->listDiscount($startDate, $endDate, $branchId);
            $discountMaster = Discounts::whereIn('id', $datas->keys())->get()->keyBy('id');
            return view('sales.bkb_discounts.list_discount')->with('datas', $datas)->with(['startDate' => $startDate, 'endDate' => $endDate, 'depo' => DmsSmBranch::where(['szId' => $branchId])->first(), 'discountMaster' => $discountMaster]);
        }
        return view('sales.bkb_discounts.index')->with($this->getOptionItems());
    }
    /**
     * Show the form for creating a new BkbValidate.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $period = explode(' - ', $request->get('period_range'));
            $branchId = $request->get('branch_id');
            $startDate = createLocalFormatDate($period[0])->format('Y-m-d');
            $endDate = createLocalFormatDate($period[1])->format('Y-m-d');
            $datas = $this->getRepositoryObj()->mustValidate($startDate, $endDate, $branchId);

            return view('sales.bkb_discounts.list_filter')->with('datas', $datas)->with(['startDate' => $startDate, 'endDate' => $endDate, 'branchId' => $branchId]);
        }
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

        return redirect(route('sales.bkbDiscounts.create'));
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
        $branch = new DmsSmBranchRepository(app());
        return [
            'branchItems' => $branch->pluck([],null,null,'szId','szName')
        ];
    }
}
