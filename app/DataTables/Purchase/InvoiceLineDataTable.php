<?php

namespace App\DataTables\Purchase;

use App\DataTables\BaseDataTable as DataTable;
use App\Models\Purchase\InvoiceLine;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class InvoiceLineDataTable extends DataTable
{
    /**
     * example mapping filter column to search by keyword, default use %keyword%.
     */
    private $columnFilterOperator = [
        //'name' => \App\DataTables\FilterClass\MatchKeyword::class,
    ];

    private $mapColumnSearch = [
        //'entity.name' => 'entity_id',
    ];

    /**
     * Build DataTable class.
     *
     * @param mixed $query results from query() method
     *
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

        return $dataTable->addColumn('action', 'purchase.invoice_lines.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\InvoiceLine $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(InvoiceLine $model)
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
        $buttons = [
            [
                'extend' => 'create',
                'className' => 'btn btn-default btn-sm no-corner',
                'text' => '<i class="fa fa-plus"></i> '.__('auth.app.create').'',
            ],
            [
                'extend' => 'export',
                'className' => 'btn btn-default btn-sm no-corner',
                'text' => '<i class="fa fa-download"></i> '.__('auth.app.export').'',
            ],
            [
                'extend' => 'import',
                'className' => 'btn btn-default btn-sm no-corner',
                'text' => '<i class="fa fa-upload"></i> '.__('auth.app.import').'',
            ],
            [
                'extend' => 'print',
                'className' => 'btn btn-default btn-sm no-corner',
                'text' => '<i class="fa fa-print"></i> '.__('auth.app.print').'',
            ],
            [
                'extend' => 'reset',
                'className' => 'btn btn-default btn-sm no-corner',
                'text' => '<i class="fa fa-undo"></i> '.__('auth.app.reset').'',
            ],
            [
                'extend' => 'reload',
                'className' => 'btn btn-default btn-sm no-corner',
                'text' => '<i class="fa fa-refresh"></i> '.__('auth.app.reload').'',
            ],
        ];

        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')])
            ->parameters([
                'dom' => '<"row" <"col-md-6"B><"col-md-6 text-right"l>>rtip',
                'stateSave' => true,
                'order' => [[0, 'desc']],
                'buttons' => $buttons,
                'language' => [
                    'url' => url('vendor/datatables/i18n/en-gb.json'),
                ],
                'responsive' => true,
                'fixedHeader' => true,
                'orderCellsTop' => true,
            ])
        ;
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'invoice_id' => new Column(['title' => __('models/invoiceLines.fields.invoice_id'), 'data' => 'invoice_id', 'searchable' => true, 'elmsearch' => 'text']),
            'doc_id' => new Column(['title' => __('models/invoiceLines.fields.doc_id'), 'data' => 'doc_id', 'searchable' => true, 'elmsearch' => 'text']),
            'reference_id' => new Column(['title' => __('models/invoiceLines.fields.reference_id'), 'data' => 'reference_id', 'searchable' => true, 'elmsearch' => 'text']),
            'product_id' => new Column(['title' => __('models/invoiceLines.fields.product_id'), 'data' => 'product_id', 'searchable' => true, 'elmsearch' => 'text']),
            'product_name' => new Column(['title' => __('models/invoiceLines.fields.product_name'), 'data' => 'product_name', 'searchable' => true, 'elmsearch' => 'text']),
            'uom_id' => new Column(['title' => __('models/invoiceLines.fields.uom_id'), 'data' => 'uom_id', 'searchable' => true, 'elmsearch' => 'text']),
            'qty' => new Column(['title' => __('models/invoiceLines.fields.qty'), 'data' => 'qty', 'searchable' => true, 'elmsearch' => 'text']),
            'price' => new Column(['title' => __('models/invoiceLines.fields.price'), 'data' => 'price', 'searchable' => true, 'elmsearch' => 'text']),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'invoice_lines_datatable_'.time();
    }
}
