<?php

namespace App\Exports\Template\Purchase;

use Illuminate\Contracts\View\View;
use App\Models\Purchase\InvoiceBkb;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class InvoiceBkbExport implements FromView
{
    use Exportable;

    /**
     * @var Collection
     */
    protected $invoiceId;
    private $collection;

    public function __construct(int $invoiceId)
    {
        $this->invoiceId = $invoiceId;
    }
    
    public function view(): View
    {
        return view('purchase.invoices.list_bkb', [
            'datas' => $this->getData()
        ]);
    }

    public function getData()
    {
        return InvoiceBkb::whereInvoiceId($this->invoiceId)->get()->toArray();
    }
}
