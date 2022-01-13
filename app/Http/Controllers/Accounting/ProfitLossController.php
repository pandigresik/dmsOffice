<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\AppBaseController;
use App\Models\Base\DmsSmBranch;
use App\Models\Sales\Discounts;
use App\Repositories\Base\DmsSmBranchRepository;
use App\Repositories\Accounting\ProfitLossRepository;
use Illuminate\Http\Request;
use Response;

class ProfitLossController extends AppBaseController
{
    /** @var ProfitLossRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = ProfitLossRepository::class;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $period = explode(' - ', $request->get('period_range'));
            $branchId = $request->get('branch_id');            
            $startDate = createLocalFormatDate($period[0])->format('Y-m-d');
            $endDate = createLocalFormatDate($period[1])->format('Y-m-d');            
            $datas = $this->getRepositoryObj()->list($startDate, $endDate, $branchId);
            
            return view('accounting.profit_loss.list')
                ->with($datas)
                ->with(['startDate' => $startDate, 'endDate' => $endDate]);
        }

        $downloadXls = $request->get('download_xls');
        if ($downloadXls) {
            $period = explode(' - ', $request->get('period_range'));
            $startDate = createLocalFormatDate($period[0])->format('Y-m-d');
            $endDate = createLocalFormatDate($period[1])->format('Y-m-d');

            return $this->exportExcel($startDate, $endDate);
        }

        return view('accounting.profit_loss.index')->with($this->getOptionItems());
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
            'branchItems' => $branch->pluck([], null, null, 'szId', 'szName'),
            'typeItems' => ['detail' => 'Detail', 'rekap' => 'Rekap'],
        ];
    }

    private function exportExcel($startDate, $endDate)
    {
        $modelEksport = '\\App\Exports\\Template\\Sales\\RekapDiscountsExport';
        $fileName = 'rekap_discount_'.$startDate.'_'.$endDate;
        $collection = $this->getRepositoryObj()->listDiscountRekapExcel($startDate, $endDate);

        return (new $modelEksport($collection))->setStartDate($startDate)->setEndDate($endDate)->download($fileName.'.xls');
    }
}
