<?php

namespace App\Http\Controllers\Sales;

use App\DataTables\Sales\SalesReportDataTable;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Base\DmsSmBranchRepository;
use App\Repositories\Sales\SalesReportRepository;
use Illuminate\Http\Request;

class SalesReportController extends AppBaseController
{
    /** @var SalesReportRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = SalesReportRepository::class;
    }

    public function index(SalesReportDataTable $dmsSdRouteDataTable)
    {
        return $dmsSdRouteDataTable->render('sales.sales_report.index');
    }

    public function rekap(Request $request)
    {
        if ($request->ajax()) {
            $period = explode(' - ', $request->get('period_range'));
            $branchId = $request->get('branch_id');
            $cash = $request->get('cash');
            $startDate = createLocalFormatDate($period[0])->format('Y-m-d');
            $endDate = createLocalFormatDate($period[1])->format('Y-m-d');
            $datas = $this->getRepositoryObj()->listRekap($startDate, $endDate, $branchId, $cash);

            return view('sales.sales_report.list_rekap')->with('datas', $datas)->with(['startDate' => $startDate, 'endDate' => $endDate]);
        }

        $downloadXls = $request->get('download_xls');
        if ($downloadXls) {
            $period = explode(' - ', $request->get('period_range'));
            $cash = $request->get('cash');
            $startDate = createLocalFormatDate($period[0])->format('Y-m-d');
            $endDate = createLocalFormatDate($period[1])->format('Y-m-d');
            $branchId = $request->get('branch_id');

            return $this->exportExcel($startDate, $endDate, $branchId, $cash);
        }

        return view('sales.sales_report.rekap')->with($this->getOptionItems());
    }

    private function exportExcel($startDate, $endDate, $branchId, $cash)
    {
        $modelEksport = '\\App\Exports\\Template\\Sales\\RekapSalesExport';
        $fileName = 'rekap_sales_'.$startDate.'_'.$endDate;
        $collection = $this->getRepositoryObj()->listRekap($startDate, $endDate, $branchId, $cash);

        return (new $modelEksport($collection))->setStartDate($startDate)->setEndDate($endDate)->download($fileName.'.xls');
    }

    /**
     * Provide options item based on relationship model BkbDiscounts from storage.
     *
     * @throws \Exception
     *
     * @return Response
     */
    private function getOptionItems()
    {
        $branch = new DmsSmBranchRepository(app());
        $user = \Auth::user();
        return [
            'branchItems' => + config('entity.gudangPusat')[$user->entity_id] + $branch->pluck([], null, null, 'szId', 'szName'),
            'cashItems' => ['1' => 'Tunai', '0' => 'Tidak Tunai'],
        ];
    }
}
