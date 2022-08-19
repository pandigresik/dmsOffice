<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\AppBaseController;
use App\Repositories\Accounting\ProfitLossRepository;
use App\Repositories\Base\DmsSmBranchRepository;
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
            $branchId = $request->get('branch_id') ?? [];
            $startDate = createLocalFormatDate($period[0])->format('Y-m-d');
            $endDate = createLocalFormatDate($period[1])->format('Y-m-d');
            $priceChoice = $request->get('price_choice');
            $datas = $this->getRepositoryObj()->list($startDate, $endDate, $branchId, $priceChoice);

            return view('accounting.profit_loss.list')
                ->with($datas)
                ->with(['startDate' => $startDate, 'endDate' => $endDate, 'branch' => $branchId])
            ;
        }

        $downloadXls = $request->get('download_xls');
        if ($downloadXls) {
            $period = explode(' - ', $request->get('period_range'));
            $branchId = $request->get('branch_id') ?? [];
            $startDate = createLocalFormatDate($period[0])->format('Y-m-d');
            $endDate = createLocalFormatDate($period[1])->format('Y-m-d');
            $priceChoice = $request->get('price_choice');
            $datas = $this->getRepositoryObj()->list($startDate, $endDate, $branchId, $priceChoice);

            return $this->exportExcel($startDate, $endDate, $datas, $branchId);
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
            'priceItems' => ['HPPP' => 'Harga Depo', 'HPPPT' => 'Harga pabrik'],
        ];
    }

    private function exportExcel($startDate, $endDate, $collection, $branchId)
    {
        $modelEksport = '\\App\Exports\\Template\\Accounting\\ProfitLossExport';
        $fileName = 'profit_loss_depo'.$startDate.'_'.$endDate;

        return (new $modelEksport($collection))->setBranch($branchId)->setStartDate($startDate)->setEndDate($endDate)->download($fileName.'.xls');
    }    
}
