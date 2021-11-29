<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Purchase\CreateBtbValidateRequest;
use App\Http\Requests\Purchase\UpdateBtbValidateRequest;
use App\Models\Purchase\BtbValidate;
use App\Models\Purchase\ListBtbValidate;
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
    public function index(Request $request)
    {
        $period = explode(' - ',$request->get('ref'));
        $startDate = createLocalFormatDate($period[0])->format('Y-m-d');
        $endDate = createLocalFormatDate($period[1])->format('Y-m-d');
        $datas = $this->getRepositoryObj()->mustValidate($startDate, $endDate);        
        return view('purchase.btb_validates.list')->with('datas',$datas);
    }

    /**
     * Show the form for creating a new BtbValidate.
     *
     * @return Response
     */
    public function create()
    {
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
        
        return redirect(route('purchase.btbValidates.create'));
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
        $btbDataOptions = $this->getOptionItems();
        $btbValidateArray = $btbValidate->toArray();
        $btbValidateArray['no_btb'] = $btbValidate->doc_id;
        $btbValidateArray['sj_pabrik'] = $btbValidate->ref_doc;
        $btbValidateArray['decqty'] = $btbValidate->getRawOriginal('qty');
        $btbDataOptions['btbDataOptions'][$btbValidate->reference_id] = $btbValidateArray;
        $btbDataOptions['btbItems'][$btbValidate->reference_id] = implode(' | ', ['BTB::'.$btbValidate->doc_id, 'CO::'.$btbValidate->co_reference, 'Product::'.$btbValidate->product_name]);

        return view('purchase.btb_validates.edit')->with('btbValidate', $btbValidate)->with($btbDataOptions);
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
        $btbItems = ListBtbValidate::all();
        $btbDataOptions = $btbItems->keyBy('reference_id')->toArray();

        return [
            'btbItems' => ['' => __('crud.option.btbitems_placeholder')] + $btbItems->pluck('full_identity', 'reference_id')->toArray(),
            'btbDataOptions' => $btbDataOptions,
        ];
    }
}
