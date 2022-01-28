<?php

namespace App\Http\Controllers\Accounting;

use Response;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Base\DmsSmBranchRepository;
use App\Repositories\Accounting\CashFlowRepository;

class CashFlowController extends AppBaseController
{
    /** @var CashFlowRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = CashFlowRepository::class;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $period = explode(' - ', $request->get('period_range'));
            $branchId = $request->get('branch_id');
            $startDate = createLocalFormatDate($period[0])->format('Y-m-d');
            $endDate = createLocalFormatDate($period[1])->format('Y-m-d');
            $datas = $this->getRepositoryObj()->list($startDate, $endDate, $branchId);
            $period = \Carbon\CarbonPeriod::create($startDate, '1 month', $endDate);
            return view('accounting.cash_flow.list')
                ->with($datas)
                ->with(['startDate' => $startDate, 'endDate' => $endDate, 'period' => $period])
            ;
        }

        $downloadXls = $request->get('download_xls');
        if ($downloadXls) {
            $period = explode(' - ', $request->get('period_range'));
            $branchId = $request->get('branch_id');
            $startDate = createLocalFormatDate($period[0])->format('Y-m-d');
            $endDate = createLocalFormatDate($period[1])->format('Y-m-d');
            $datas = $this->getRepositoryObj()->list($startDate, $endDate, $branchId);

            return $this->exportExcel($startDate, $endDate, $datas);
        }

        return view('accounting.cash_flow.index')->with($this->getOptionItems());
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
            'branchItems' => $branch->pluck([], null, null, 'szId', 'szName')            
        ];
    }

    private function exportExcel($endDateObj)
    {
        $endDate = $endDateObj->format('Y-m-d');
        $startDate = substr($endDate, 0, 8).'01';        
        $collection = $this->getRepositoryObj()->list($startDate, $endDate);
        $modelEksport = '\\App\Exports\\Template\\Accounting\\CashFlowExport';
        $fileName = 'arus_kas_'.$endDate;

        return (new $modelEksport($collection))->setStartDate($startDate)->setEndDate($endDate)->download($fileName.'.xls');
    }
}
