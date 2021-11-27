<?php

namespace App\DataTables\Purchase;

use App\Models\Purchase\Invoice;
use Yajra\DataTables\Services\DataTable;

class InvoiceSubmitDataTable extends InvoiceDataTable
{
    protected $withUpdate = true;
    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Invoice $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Invoice $model)
    {
        return $model->submit()->with(['partner'])->newQuery();
    }
}
