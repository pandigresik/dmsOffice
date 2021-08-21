<?php

namespace App\DataTables\Accounting;

use App\Models\Accounting\AccountInvoice;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class AccountInvoiceDataTable extends DataTable
{
    /**
    * example mapping filter column to search by keyword, default use %keyword%
    */
    private $columnFilterOperator = [
        //'name' => \App\DataTables\FilterClass\MatchKeyword::class,        
    ];
    
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);
        if (!empty($this->columnFilterOperator)) {
            foreach ($this->columnFilterOperator as $column => $operator) {
                $dataTable->filterColumn($column, new $operator($column));
            }
        }
        return $dataTable->addColumn('action', 'accounting.account_invoices.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\AccountInvoice $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(AccountInvoice $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')])
            ->parameters([
                'dom'       => 'Brtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    [
                       'extend' => 'create',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-plus"></i> ' .__('auth.app.create').''
                    ],
                    [
                       'extend' => 'export',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-download"></i> ' .__('auth.app.export').''
                    ],
                    [
                       'extend' => 'print',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-print"></i> ' .__('auth.app.print').''
                    ],
                    [
                       'extend' => 'reset',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-undo"></i> ' .__('auth.app.reset').''
                    ],
                    [
                       'extend' => 'reload',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-refresh"></i> ' .__('auth.app.reload').''
                    ],
                ],
                 'language' => [
                   'url' => url('vendor/datatables/i18n/en-gb.json'),
                 ],
                 'responsive' => true,
                 'fixedHeader' => true,
                 'orderCellsTop' => true     
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'name' => new Column(['title' => __('models/accountInvoices.fields.name'), 'data' => 'name', 'searchable' => true, 'elmsearch' => 'text']),
            'number' => new Column(['title' => __('models/accountInvoices.fields.number'), 'data' => 'number', 'searchable' => true, 'elmsearch' => 'text']),
            'amount_total' => new Column(['title' => __('models/accountInvoices.fields.amount_total'), 'data' => 'amount_total', 'searchable' => true, 'elmsearch' => 'text']),
            'company_id' => new Column(['title' => __('models/accountInvoices.fields.company_id'), 'data' => 'company_id', 'searchable' => true, 'elmsearch' => 'text']),
            'vendor_id' => new Column(['title' => __('models/accountInvoices.fields.vendor_id'), 'data' => 'vendor_id', 'searchable' => true, 'elmsearch' => 'text']),
            'account_journal_id' => new Column(['title' => __('models/accountInvoices.fields.account_journal_id'), 'data' => 'account_journal_id', 'searchable' => true, 'elmsearch' => 'text']),
            'type' => new Column(['title' => __('models/accountInvoices.fields.type'), 'data' => 'type', 'searchable' => true, 'elmsearch' => 'text']),
            'references' => new Column(['title' => __('models/accountInvoices.fields.references'), 'data' => 'references', 'searchable' => true, 'elmsearch' => 'text']),
            'comment' => new Column(['title' => __('models/accountInvoices.fields.comment'), 'data' => 'comment', 'searchable' => true, 'elmsearch' => 'text']),
            'state' => new Column(['title' => __('models/accountInvoices.fields.state'), 'data' => 'state', 'searchable' => true, 'elmsearch' => 'text']),
            'date_invoice' => new Column(['title' => __('models/accountInvoices.fields.date_invoice'), 'data' => 'date_invoice', 'searchable' => true, 'elmsearch' => 'text']),
            'date_due' => new Column(['title' => __('models/accountInvoices.fields.date_due'), 'data' => 'date_due', 'searchable' => true, 'elmsearch' => 'text'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'account_invoices_datatable_' . time();
    }
}
