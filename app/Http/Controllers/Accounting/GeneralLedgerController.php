<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\AppBaseController;
use App\Repositories\Accounting\GeneralLedgerRepository;
use Carbon\Carbon;
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
            $endDateObj = createLocalFormatDate($request->get('ref'));
            $endDate = $endDateObj->format('Y-m-d');
            $startDate = substr($endDate, 0, 8).'01';            
            $datas = $this->getRepositoryObj()->list($startDate, $endDate);            

            return view('accounting.general_ledger.list')
                ->with($datas)
                ->with(['endDate' => $endDate])
            ;
        }

        $downloadXls = $request->get('download_xls');
        if ($downloadXls) {
            $endDateObj = createLocalFormatDate($request->get('period_range'));

            return $this->exportExcel($endDateObj);
        }

        return view('accounting.general_ledger.index')->with($this->getOptionItems());
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
        $modelEksport = '\\App\Exports\\Template\\Accounting\\GeneralLedgerExport';
        $fileName = 'gl_'.$endDate;

        return (new $modelEksport($collection))->setStartDate($startDate)->setEndDate($endDate)->download($fileName.'.xls');
    }
}
