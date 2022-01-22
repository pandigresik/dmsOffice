<?php

namespace App\DataTables\Purchase;

use App\Models\Purchase\BtbValidate;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class BtbValidateDataTable extends DataTable
{
    /**
     * example mapping filter column to search by keyword, default use %keyword%.
     */
    private $columnFilterOperator = [
        'btb_date' => \App\DataTables\FilterClass\BetweenKeyword::class,
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

        return $dataTable->addColumn('action', 'purchase.btb_validates.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\BtbValidate $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(BtbValidate $model)
    {
        return $model->whereInvoiced(0)->newQuery();
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
            // [
            //    'extend' => 'import',
            //    'className' => 'btn btn-default btn-sm no-corner',
            //    'text' => '<i class="fa fa-upload"></i> ' .__('auth.app.import').''
            // ],
            // [
            //    'extend' => 'print',
            //    'className' => 'btn btn-default btn-sm no-corner',
            //    'text' => '<i class="fa fa-print"></i> ' .__('auth.app.print').''
            // ],
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
            'doc_id' => new Column(['title' => __('models/btbValidates.fields.doc_id'), 'data' => 'doc_id', 'searchable' => true, 'elmsearch' => 'text']),
            'co_reference' => new Column(['title' => __('models/btbValidates.fields.co_reference'), 'data' => 'co_reference', 'searchable' => true, 'elmsearch' => 'text']),
            'product_name' => new Column(['title' => __('models/btbValidates.fields.product_name'), 'data' => 'product_name', 'searchable' => true, 'elmsearch' => 'text']),
            'uom_id' => new Column(['title' => __('models/btbValidates.fields.uom_id'), 'data' => 'uom_id', 'searchable' => false, 'elmsearch' => 'text']),
            'ref_doc' => new Column(['title' => __('models/btbValidates.fields.ref_doc'), 'data' => 'ref_doc', 'searchable' => true, 'elmsearch' => 'text']),
            'btb_type' => new Column(['title' => __('models/btbValidates.fields.btb_type'), 'data' => 'btb_type', 'searchable' => true, 'elmsearch' => 'text']),
            'btb_date' => new Column(['title' => __('models/btbValidates.fields.btb_date'), 'data' => 'btb_date', 'searchable' => true, 'elmsearch' => 'daterange']),
            'qty' => new Column(['title' => __('models/btbValidates.fields.qty'), 'data' => 'qty', 'searchable' => false, 'elmsearch' => 'text']),
            'price' => new Column(['title' => __('models/btbValidates.fields.price'), 'data' => 'price', 'searchable' => false, 'elmsearch' => 'text']),
            'shipping_cost' => new Column(['title' => __('models/btbValidates.fields.shipping_cost'), 'data' => 'shipping_cost', 'searchable' => false, 'elmsearch' => 'text']),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'btb_validates_datatable_'.time();
    }
}
