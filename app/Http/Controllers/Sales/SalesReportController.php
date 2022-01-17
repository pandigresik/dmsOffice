<?php

namespace App\Http\Controllers\Sales;

use App\DataTables\Sales\SalesReportDataTable;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Base\DmsSmBranchRepository;
use App\Repositories\Sales\SalesReportRepository;
use Illuminate\Http\Request;
use Response;

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

    /**
     * Provide options item based on relationship model SalesReport from storage.
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
}
