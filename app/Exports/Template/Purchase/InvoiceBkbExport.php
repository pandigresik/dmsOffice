<?php

namespace App\Exports\Template\Purchase;

use App\Models\Purchase\InvoiceBkb;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class InvoiceBkbExport implements FromCollection
{
    use Exportable;

    /**
     * @var Collection
     */
    protected $invoiceId;

    public function __construct(int $invoiceId)
    {
        $this->invoiceId = $invoiceId;
    }
    
    public function collection()
    {
        return InvoiceBkb::whereInvoiceId($this->invoiceId)->get();
    }
}
