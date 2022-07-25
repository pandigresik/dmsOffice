<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\AppBaseController;
use App\Repositories\Accounting\PayableRepository;
use Illuminate\Http\Request;
use Response;

class ReportPayableController extends AppBaseController
{
    /** @var PayableRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = PayableRepository::class;
    }

    public function index(Request $request)
    {
        $isAjax = $request->ajax();
        $downloadXls = $request->get('download_xls');
        if ($request->get('period_range')) {
            $period = explode(' - ', $request->get('period_range'));
            $type = $request->get('type');
            $startDate = createLocalFormatDate($period[0])->format('Y-m-d');
            $endDate = createLocalFormatDate($period[1])->format('Y-m-d');            
            $datas = $this->getRepositoryObj()->list($startDate, $endDate, $type);
        }
        if ($isAjax) {
            return view('accounting.report_payable.list_'.$type)
                ->with($datas)
                ->with(['endDate' => $endDate, 'startDate' => $startDate])
            ;
        }

        if ($downloadXls) {
            return $this->exportExcel($startDate, $endDate, $datas, $type);
        }

        return view('accounting.report_payable.index')->with($this->getOptionItems());
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
            'typeItems' => ['OA' => 'Hutang OA', 'TIV' => 'Hutang TIV'],
        ];
    }

    private function exportExcel($startDate, $endDate, $collection, $type)
    {
        $modelEksport = '\\App\Exports\\Template\\Accounting\\ReportPayableExport';
        $fileName = 'laporan_hutang_'.$startDate.'_'.$endDate;

        return (new $modelEksport($collection))->setType($type)->setStartDate($startDate)->setEndDate($endDate)->download($fileName.'.xls');
    }
}
