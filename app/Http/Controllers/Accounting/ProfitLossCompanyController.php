<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\AppBaseController;
use App\Repositories\Accounting\ProfitLossCompanyRepository;
use Illuminate\Http\Request;
use Response;

class ProfitLossCompanyController extends AppBaseController
{
    /** @var ProfitLossCompanyRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = ProfitLossCompanyRepository::class;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $period = explode(' - ', $request->get('ref'));

            $startDate = createLocalFormatDate($period[0])->format('Y-m-d');
            $endDate = createLocalFormatDate($period[1])->format('Y-m-d');
            $datas = $this->getRepositoryObj()->list($startDate, $endDate);

            return view('accounting.profit_loss_company.list')
                ->with($datas)
                ->with(['startDate' => $startDate, 'endDate' => $endDate])
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

        return view('accounting.profit_loss_company.index')->with($this->getOptionItems());
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
        $modelEksport = '\\App\Exports\\Template\\Accounting\\ProfitLossCompanyExport';
        $fileName = 'profit_loss_company'.$startDate.'_'.$endDate;

        return (new $modelEksport($collection))->setStartDate($startDate)->setEndDate($endDate)->download($fileName.'.xls');
    }
}
