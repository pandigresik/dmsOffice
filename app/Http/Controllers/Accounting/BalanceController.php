<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\AppBaseController;
use App\Repositories\Accounting\BalanceRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Response;

class BalanceController extends AppBaseController
{
    /** @var BalanceRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = BalanceRepository::class;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $endDateObj = createLocalFormatDate($request->get('ref'));
            $endDate = $endDateObj->format('Y-m-d');
            $startDate = substr($endDate, 0, 8).'01';
            $startDateObj = Carbon::createFromFormat('Y-m-d', $startDate);
            $datas = $this->getRepositoryObj()->list($startDate, $endDate);
            $currentMonth = $endDateObj->format('M');
            $previousMonth = $startDateObj->subDay()->format('M');

            return view('accounting.balance.list')
                ->with($datas)
                ->with(['endDate' => $endDate, 'currentMonth' => $currentMonth, 'previousMonth' => $previousMonth])
            ;
        }

        $downloadXls = $request->get('download_xls');
        if ($downloadXls) {
            $endDateObj = createLocalFormatDate($request->get('period_range'));

            return $this->exportExcel($endDateObj);
        }

        return view('accounting.balance.index')->with($this->getOptionItems());
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
        return [
        ];
    }

    private function exportExcel($endDateObj)
    {
        $endDate = $endDateObj->format('Y-m-d');
        $startDate = substr($endDate, 0, 8).'01';        
        $collection = $this->getRepositoryObj()->list($startDate, $endDate);
        $modelEksport = '\\App\Exports\\Template\\Accounting\\BalanceExport';
        $fileName = 'neraca_'.$endDate;

        return (new $modelEksport($collection))->setStartDate($startDate)->setEndDate($endDate)->download($fileName.'.xls');
    }
}
