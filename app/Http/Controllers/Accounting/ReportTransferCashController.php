<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\AppBaseController;
use App\Repositories\Accounting\TransferCashBankRepository;
use Illuminate\Http\Request;
use Response;

class ReportTransferCashController extends AppBaseController
{
    /** @var TransferCashBankRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = TransferCashBankRepository::class;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $period = explode(' - ', $request->get('ref'));

            $startDate = createLocalFormatDate($period[0])->format('Y-m-d');
            $endDate = createLocalFormatDate($period[1])->format('Y-m-d');
            $datas = $this->getRepositoryObj()->list($startDate, $endDate);

            return view('accounting.report_transfer_cash.list')
                ->with($datas)
                ->with(['endDate' => $endDate, 'startDate' => $startDate])
            ;
        }

        $downloadXls = $request->get('download_xls');
        if ($downloadXls) {
            $period = explode(' - ', $request->get('period_range'));

            $startDate = createLocalFormatDate($period[0])->format('Y-m-d');
            $endDate = createLocalFormatDate($period[1])->format('Y-m-d');
            $datas = $this->getRepositoryObj()->list($startDate, $endDate);

            return $this->exportExcel($startDate, $endDate, $datas);
        }

        return view('accounting.report_transfer_cash.index')->with($this->getOptionItems());
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

    private function exportExcel($startDate, $endDate, $collection)
    {
        $modelEksport = '\\App\Exports\\Template\\Accounting\\ReportTransferCashExport';
        $fileName = 'mutasi_harian_'.$startDate.'_'.$endDate;

        return (new $modelEksport($collection))->setStartDate($startDate)->setEndDate($endDate)->download($fileName.'.xls');
    }
}
