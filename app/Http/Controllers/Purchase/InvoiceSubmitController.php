<?php

namespace App\Http\Controllers\Purchase;

use Response;
use App\DataTables\Purchase\InvoiceDataTable;
use App\Repositories\Purchase\InvoiceRepository;
use App\DataTables\Purchase\InvoiceSubmitDataTable;

class InvoiceSubmitController extends InvoiceController
{
    /** @var InvoiceRepository */
    protected $repository;

    public function __construct()
    {
        $this->repository = InvoiceRepository::class;
    }

    /**
     * Display a listing of the Invoice.
     *
     * @return Response
     */
    public function index(InvoiceDataTable $invoiceDataTable)
    {        
        return $invoiceDataTable->render('purchase.invoices.index');
    }
}