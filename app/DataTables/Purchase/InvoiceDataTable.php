<?php

namespace App\DataTables\Purchase;

use App\Models\Purchase\Invoice;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class InvoiceDataTable extends DataTable
{
    protected $withUpdate = false;
    /**
    * example mapping filter column to search by keyword, default use %keyword%
    */
    private $columnFilterOperator = [
        'partner.name' => \App\DataTables\FilterClass\RelationMatchKeyword::class,        
    ];
    
    private $mapColumnSearch = [
        //'partner.name' => 'partner_id',
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
                $columnSearch = $this->mapColumnSearch[$column] ?? $column;
                $dataTable->filterColumn($column, new $operator($columnSearch));                
            }
        }
        if($this->withUpdate){
            $dataTable->addColumn('action', 'purchase.invoices.datatables_actions');
        }
        return $dataTable; //->addColumn('action', 'purchase.invoices.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Invoice $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Invoice $model)
    {
        return $model->with(['partner'])->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $buttons = [
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
                       'extend' => 'import',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-upload"></i> ' .__('auth.app.import').''
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
                ];
                
        $builder = $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()            
            ->parameters([
                'dom'       => 'Brtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => $buttons,
                 'language' => [
                   'url' => url('vendor/datatables/i18n/en-gb.json'),
                 ],
                 'responsive' => true,
                 'fixedHeader' => true,
                 'orderCellsTop' => true     
            ]);
        if($this->withUpdate){
            $builder->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')]);
        }
        return $builder;
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'number' => new Column(['title' => __('models/invoices.fields.number'), 'data' => 'number', 'searchable' => true, 'elmsearch' => 'text']),
            // 'type' => new Column(['title' => __('models/invoices.fields.type'), 'data' => 'type', 'searchable' => true, 'elmsearch' => 'text']),
            'reference' => new Column(['title' => __('models/invoices.fields.reference'), 'data' => 'reference', 'searchable' => true, 'elmsearch' => 'text']),
            'qty' => new Column(['title' => __('models/invoices.fields.qty'), 'data' => 'qty', 'searchable' => false, 'elmsearch' => 'text']),
            'amount' => new Column(['title' => __('models/invoices.fields.amount'), 'data' => 'amount', 'searchable' => false, 'elmsearch' => 'text']),
            'amount_discount' => new Column(['title' => __('models/invoices.fields.amount_discount'), 'data' => 'amount_discount', 'searchable' => false, 'elmsearch' => 'text']),
            'state' => new Column(['title' => __('models/invoices.fields.state'), 'data' => 'state', 'searchable' => true, 'elmsearch' => 'text']),
            'date_invoice' => new Column(['title' => __('models/invoices.fields.date_invoice'), 'data' => 'date_invoice', 'searchable' => true, 'elmsearch' => 'text']),
            'date_due' => new Column(['title' => __('models/invoices.fields.date_due'), 'data' => 'date_due', 'searchable' => true, 'elmsearch' => 'text']),
            'partner_id' => new Column(['title' => __('models/invoices.fields.partner_id'), 'data' => 'partner.szName','defaultContent' => '', 'searchable' => true, 'elmsearch' => 'text'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'invoices_datatable_' . time();
    }
}
