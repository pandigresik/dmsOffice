<?php

namespace App\Http\Controllers\Purchase;

use App\DataTables\Purchase\BtbValidateDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Purchase\CreateBtbValidateRequest;
use App\Http\Requests\Purchase\UpdateBtbValidateRequest;
use App\Repositories\Base\DmsSmBranchRepository;
use App\Repositories\Inventory\DmsInvCarrierRepository;
use App\Repositories\Purchase\BtbValidateRepository;
use Flash;
use Illuminate\Http\Request;
use Response;

class BtbValidateController extends AppBaseController
{
    /** @var BtbValidateRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = BtbValidateRepository::class;
    }

    /**
     * Display a listing of the BtbValidate.
     *
     * @return Response
     */
    public function index(BtbValidateDataTable $btbValidateDataTable)
    {
        return $btbValidateDataTable->render('purchase.btb_validates.index');
    }

    /**
     * Show the form for creating a new BtbValidate.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        if ($request->ajax()) {
            // $period = explode(' - ', $request->get('ref'));
            $period = explode(' - ', $request->get('period_range'));
            $branchId = $request->get('branch_id');
            $startDate = createLocalFormatDate($period[0])->format('Y-m-d');
            $endDate = createLocalFormatDate($period[1])->format('Y-m-d');
            $datas = $this->getRepositoryObj()->mustValidate($startDate, $endDate, $branchId);

            return view('purchase.btb_validates.list')->with('datas', $datas);
        }

        return view('purchase.btb_validates.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created BtbValidate in storage.
     *
     * @return Response
     */
    public function store(CreateBtbValidateRequest $request)
    {
        $input = $request->all();

        $btbValidate = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/btbValidates.singular')]));

        return redirect(route('purchase.btbValidates.index'));
    }

    /**
     * Display the specified BtbValidate.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $btbValidate = $this->getRepositoryObj()->find($id);

        if (empty($btbValidate)) {
            Flash::error(__('models/btbValidates.singular').' '.__('messages.not_found'));

            return redirect(route('purchase.btbValidates.index'));
        }

        return view('purchase.btb_validates.show')->with('btbValidate', $btbValidate);
    }

    /**
     * Show the form for editing the specified BtbValidate.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $btbValidate = $this->getRepositoryObj()->find($id);

        if (empty($btbValidate)) {
            Flash::error(__('messages.not_found', ['model' => __('models/btbValidates.singular')]));

            return redirect(route('purchase.btbValidates.index'));
        }

        $carrier = new DmsInvCarrierRepository(app());
        $btbDataOptions = [
            'carrierItems' => $carrier->pluck([], null, null, 'szId', 'szName'),
        ];

        return view('purchase.btb_validates.edit_ekspedisi')->with('btbValidate', $btbValidate)->with($btbDataOptions);
    }

    /**
     * Update the specified BtbValidate in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id, UpdateBtbValidateRequest $request)
    {
        $btbValidate = $this->getRepositoryObj()->find($id);

        if (empty($btbValidate)) {
            Flash::error(__('messages.not_found', ['model' => __('models/btbValidates.singular')]));

            return redirect(route('purchase.btbValidates.index'));
        }

        $btbValidate = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/btbValidates.singular')]));

        return redirect(route('purchase.btbValidates.index'));
    }

    /**
     * Remove the specified BtbValidate from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $btbValidate = $this->getRepositoryObj()->find($id);

        if (empty($btbValidate)) {
            Flash::error(__('messages.not_found', ['model' => __('models/btbValidates.singular')]));

            return redirect(route('purchase.btbValidates.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/btbValidates.singular')]));

        return redirect(route('purchase.btbValidates.index'));
    }

    /**
     * Provide options item based on relationship model BtbValidate from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        // $btbItems = (new ListBtbValidate)->canValidate();
        // $btbDataOptions = $btbItems->keyBy('reference_id')->toArray();
        $branch = new DmsSmBranchRepository(app());
        $user = \Auth::user();
        return [
            'branchItems' => ['' => 'Semua']+ config('entity.gudangPusat')[$user->entity_id] + $branch->pluck([], null, null, 'szId', 'szName'),
            //'btbItems' => ['' => __('crud.option.btbitems_placeholder')] + $btbItems->pluck('full_identity', 'reference_id')->toArray(),
            //'btbDataOptions' => $btbDataOptions,
        ];
    }
}
