<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\AppBaseController;
use App\Models\Base\DmsPiEmployee;
use App\Repositories\Sales\BkbDiscountsRepository;
use Illuminate\Http\Request;
use Response;

class DiscountRejectController extends AppBaseController
{
    /** @var BkbDiscountsRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = BkbDiscountsRepository::class;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $period = explode(' - ', $request->get('period_range'));
            $sales = $request->get('sales') ?? [];
            $startDate = createLocalFormatDate($period[0])->format('Y-m-d');
            $endDate = createLocalFormatDate($period[1])->format('Y-m-d');
            $datas = $this->getRepositoryObj()->listSalesReject($startDate, $endDate, $sales);
            if(!empty($sales)){
                $salesMaster = DmsPiEmployee::where('szDivisionId', 'SALES')->whereIn('szId', $sales)->get()->keyBy('szId');
            }else{
                $salesMaster = DmsPiEmployee::where('szDivisionId', 'SALES')->get()->keyBy('szId');
            }
            

            return view('sales.discount_reject.list_discount')->with('datas', $datas)->with(['startDate' => $startDate, 'endDate' => $endDate, 'salesMaster' => $salesMaster]);
        }

        $downloadXls = $request->get('download_xls');
        if ($downloadXls) {
            $period = explode(' - ', $request->get('period_range'));
            $startDate = createLocalFormatDate($period[0])->format('Y-m-d');
            $endDate = createLocalFormatDate($period[1])->format('Y-m-d');
            $sales = $request->get('sales');

            return $this->exportExcel($startDate, $endDate, $sales);
        }

        return view('sales.discount_reject.index')->with($this->getOptionItems());
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
        return [
        ];
    }

    private function exportExcel($startDate, $endDate, $sales)
    {
        $modelEksport = '\\App\Exports\\Template\\Sales\\RejectDiscountsExport';
        $fileName = 'reject_discount_'.$startDate.'_'.$endDate;
        $collection = $this->getRepositoryObj()->listSalesReject($startDate, $endDate, $sales);

        return (new $modelEksport($collection))->setStartDate($startDate)->setEndDate($endDate)->download($fileName.'.xls');
    }
}
