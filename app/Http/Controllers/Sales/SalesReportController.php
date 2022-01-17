<?php

namespace App\Http\Controllers\Sales;

use App\DataTables\Sales\SalesReportDataTable;
use App\Http\Controllers\AppBaseController;
use App\Repositories\Sales\SalesReportRepository;

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
}
