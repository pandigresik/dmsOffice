<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\AppBaseController;
use App\Repositories\Accounting\GeneralLedgerRepository;
use App\Repositories\Base\DmsSmBranchRepository;
use Illuminate\Http\Request;
use Response;

class GeneralLedgerController extends AppBaseController
{
    /** @var GeneralLedgerRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = GeneralLedgerRepository::class;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            // $endDateObj = createLocalFormatDate($request->get('ref'));
            $endDateObj = createLocalFormatDate($request->get('period_range'));
            $endDate = $endDateObj->format('Y-m-d');
            $startDate = substr($endDate, 0, 8).'01';
            $branch = $request->get('branch_id');
            $datas = $this->getRepositoryObj()->list($startDate, $endDate, $branch);

            return view('accounting.general_ledger.list')
                ->with($datas)
                ->with(['endDate' => $endDate, 'startDate' => $startDate, 'branch' => $branch])
            ;
        }

        $downloadXls = $request->get('download_xls');
        if ($downloadXls) {
            $endDateObj = createLocalFormatDate($request->get('period_range'));
            $branch = $request->get('branch_id');

            return $this->exportExcel($endDateObj, $branch);
        }

        return view('accounting.general_ledger.index')->with($this->getOptionItems());
    }

    /**
     * Display detail the specified GeneralLedger.
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
        $downloadXls = request('download_xls');
        $generalLedger = $this->getRepositoryObj()->detail($startDate, $endDate, $id, $branch);

        if ($downloadXls) {
            return $this->exportExcelDetail(['generalLedger' => $generalLedger, 'startDate' => $startDate, 'endDate' => $endDate, 'name' => $name, 'accountCode' => $id]);
        }

        return view('accounting.general_ledger.show')->with(['generalLedger' => $generalLedger, 'startDate' => $startDate, 'endDate' => $endDate, 'name' => $name, 'accountCode' => $id]);
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

    private function exportExcel($endDateObj, $branch)
    {
        $endDate = $endDateObj->format('Y-m-d');
        $startDate = substr($endDate, 0, 8).'01';
        $collection = $this->getRepositoryObj()->list($startDate, $endDate, $branch);
        $modelEksport = '\\App\Exports\\Template\\Accounting\\GeneralLedgerExport';
        $fileName = 'gl_'.$endDate;

        return (new $modelEksport($collection))->setStartDate($startDate)->setEndDate($endDate)->download($fileName.'.xls');
    }

    private function exportExcelDetail($data)
    {
        $endDate = $data['endDate'];
        $startDate = $data['startDate'];
        $collection = $data['generalLedger'];
        $name = $data['name'];
        $accountCode = $data['accountCode'];

        $modelEksport = '\\App\Exports\\Template\\Accounting\\GeneralLedgerDetailExport';
        $fileName = 'gl_detail_'.$accountCode.'_'.$endDate;

        return (new $modelEksport($collection))
            ->setAccountCode($accountCode)
            ->setName($name)
            ->setStartDate($startDate)->setEndDate($endDate)->download($fileName.'.xls');
    }
}
