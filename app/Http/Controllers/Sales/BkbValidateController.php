<?php

namespace App\Http\Controllers\Sales;

use Flash;
use Response;
use App\Http\Requests\Sales;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

use App\DataTables\Sales\BkbValidateDataTable;
use App\Repositories\Sales\BkbValidateRepository;
use App\Http\Requests\Sales\CreateBkbValidateRequest;
use App\Http\Requests\Sales\UpdateBkbValidateRequest;
use App\Repositories\Base\DmsSmBranchRepository;

class BkbValidateController extends AppBaseController
{
    /** @var  BkbValidateRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = BkbValidateRepository::class;
    }

    /**
     * Display a listing of the BkbValidate.
     *
     * @param BkbValidateDataTable $bkbValidateDataTable
     * @return Response
     */
    public function index(BkbValidateDataTable $bkbValidateDataTable)
    {
        return $bkbValidateDataTable->render('sales.bkb_validates.index');
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

            return view('sales.bkb_validates.list_filter')->with('datas', $datas);
        }
        return view('sales.bkb_validates.create')->with($this->getOptionItems());
    }

    /**
     * Store a newly created BkbValidate in storage.
     *
     * @param CreateBkbValidateRequest $request
     *
     * @return Response
     */
    public function store(CreateBkbValidateRequest $request)
    {
        $input = $request->all();

        $bkbValidate = $this->getRepositoryObj()->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/bkbValidates.singular')]));

        return redirect(route('sales.bkbValidates.index'));
    }

    /**
     * Display the specified BkbValidate.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bkbValidate = $this->getRepositoryObj()->find($id);

        if (empty($bkbValidate)) {
            Flash::error(__('models/bkbValidates.singular').' '.__('messages.not_found'));

            return redirect(route('sales.bkbValidates.index'));
        }

        return view('sales.bkb_validates.show')->with('bkbValidate', $bkbValidate);
    }

    /**
     * Show the form for editing the specified BkbValidate.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bkbValidate = $this->getRepositoryObj()->find($id);

        if (empty($bkbValidate)) {
            Flash::error(__('messages.not_found', ['model' => __('models/bkbValidates.singular')]));

            return redirect(route('sales.bkbValidates.index'));
        }

        return view('sales.bkb_validates.edit')->with('bkbValidate', $bkbValidate)->with($this->getOptionItems());
    }

    /**
     * Update the specified BkbValidate in storage.
     *
     * @param  int              $id
     * @param UpdateBkbValidateRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBkbValidateRequest $request)
    {
        $bkbValidate = $this->getRepositoryObj()->find($id);

        if (empty($bkbValidate)) {
            Flash::error(__('messages.not_found', ['model' => __('models/bkbValidates.singular')]));

            return redirect(route('sales.bkbValidates.index'));
        }

        $bkbValidate = $this->getRepositoryObj()->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/bkbValidates.singular')]));

        return redirect(route('sales.bkbValidates.index'));
    }

    /**
     * Remove the specified BkbValidate from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bkbValidate = $this->getRepositoryObj()->find($id);

        if (empty($bkbValidate)) {
            Flash::error(__('messages.not_found', ['model' => __('models/bkbValidates.singular')]));

            return redirect(route('sales.bkbValidates.index'));
        }

        $this->getRepositoryObj()->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/bkbValidates.singular')]));

        return redirect(route('sales.bkbValidates.index'));
    }

    /**
     * Provide options item based on relationship model BkbValidate from storage.         
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
