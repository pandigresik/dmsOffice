<?php

namespace App\DataTables\Purchase;

use App\Models\Purchase\Invoice;
use App\DataTables\BaseDataTable as DataTable;

class InvoiceValidateDataTable extends InvoiceDataTable
{
    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Invoice $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Invoice $model)
    {
        return $model->validate()->with(['partner'])->newQuery();
    }
}
