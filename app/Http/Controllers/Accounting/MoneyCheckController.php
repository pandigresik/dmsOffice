<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\AppBaseController;
use App\Models\Accounting\BankDeposit;
use App\Repositories\Accounting\MoneyCheckRepository;
use App\Repositories\Base\DmsSmBranchRepository;
use Illuminate\Http\Request;
use Response;

class MoneyCheckController extends AppBaseController
{
    /** @var MoneyCheckRepository */
    protected $repository;
    private $headerSheet = [
        'PENJUALAN' => ['130121'],
        'PELUNASAN PIUTANG' => ['130120'],
        'EMBALASI' => ['311100'],
        'TITIPAN TUNAI' => ['311110'],
        'PENDAPATAN LAIN2' => ['919900'],
        'BIAYA OPRSL' => [ 
            '130130',
            '130131',
            '130501',
            '211102',
            '311100',
            '811003',
            '811004',
            '811005',
            '811006',
            '821004',
            '824001',
            '824002',
            '824003',
            '824004',
            '824005',
            '824007',
            '824019',
            '824021',
            '824037',
            '824042',
            '825012',
            '829207',            
        ],
        'JML YG HARUS DISETOR' => [],
        // 'BANK DIREKSI' => ['110201'],
        // 'SETORAN  LIVIA/SEJATI55' => ['110210'],
    ];

    private $listBank = [
        'bank_1' => 'Bank 1',
        'bank_2' => 'Bank 2',
        'bank_3' => 'Bank 3',
    ];

    public function __construct()
    {
        $this->repository = MoneyCheckRepository::class;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            // $endDateObj = createLocalFormatDate($request->get('ref'));
            $period = explode(' - ', $request->get('period_range'));
            $startDate = createLocalFormatDate($period[0])->format('Y-m-d');
            $endDate = createLocalFormatDate($period[1])->format('Y-m-d');
            $branch = $request->get('branch_id');
            $datas = $this->getRepositoryObj()->list($startDate, $endDate, $branch);
            
            return view('accounting.money_check.list')
                ->with($datas)
                ->with(['endDate' => $endDate, 'startDate' => $startDate, 'listBank' => $this->listBank ,'branch' => $branch, 'header' => $this->headerSheet])
            ;
        }

        $downloadXls = $request->get('download_xls');
        if ($downloadXls) {
            $period = explode(' - ', $request->get('period_range'));
            $startDate = createLocalFormatDate($period[0])->format('Y-m-d');
            $endDate = createLocalFormatDate($period[1])->format('Y-m-d');
            $branch = $request->get('branch_id');

            return $this->exportExcel($endDate, $branch);
        }

        return view('accounting.money_check.index')->with($this->getOptionItems());
    }

    /**
     * Display detail the specified MoneyCheck.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $endDate = request('endDate');
        $startDate = request('startDate');
        $name = request('name');
        $branch = request('branch_id');
        $generalLedger = $this->getRepositoryObj()->detail($startDate, $endDate, $id, $branch);

        if (empty($generalLedger)) {
            Flash::error(__('models/generalLedger.singular').' '.__('messages.not_found'));

            return redirect(route('accounting.money_check.index'));
        }

        return view('accounting.money_check.show')->with(['generalLedger' => $generalLedger, 'startDate' => $startDate, 'endDate' => $endDate, 'name' => $name, 'accountCode' => $id]);
    }

    /**
     * Provide options item based on relationship model ProfitLoss from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        $branch = new DmsSmBranchRepository(app());

        return [
            'branchItem' => ['' => 'Pilih depo'] + $branch->all()->pluck('szName', 'szId')->toArray(),
        ];
    }

    private function exportExcel($endDate, $branch)
    {
        $startDate = substr($endDate, 0, 8).'01';
        $collection = $this->getRepositoryObj()->list($startDate, $endDate, $branch);
        $modelEksport = '\\App\Exports\\Template\\Accounting\\MoneyCheckExport';
        $fileName = 'money_check_'.$branch.'_'.$endDate;

        return (new $modelEksport($collection))->setBranch($branch)->setListBank($this->listBank)->setHeaderSheet($this->headerSheet)->setStartDate($startDate)->setEndDate($endDate)->download($fileName.'.xls');
    }

    public function update($id, Request $request)
    {
        $account_id = $request->get('account_id');
        $transaction_date = $request->get('transaction_date');
        $amount = $request->get('amount');
        $branchId = $request->get('branch_id');

        try {
            $bankDeposit = BankDeposit::firstOrNew(['account_id' => $account_id, 'branch_id' => $branchId, 'transaction_date' => $transaction_date]);                
            $bankDeposit->amount = $amount;
            $bankDeposit->save();

            return $this->sendSuccess('Setoran bank sudah diupdate');
        } catch (\Throwable $th) {
            return $this->sendError($th->getMessage());
        }
    }
}
