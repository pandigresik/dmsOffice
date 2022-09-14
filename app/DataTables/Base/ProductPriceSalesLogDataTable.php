<?php

namespace App\DataTables\Base;

use App\DataTables\BaseDataTable as DataTable;
use App\Models\Base\ProductPriceSalesLog;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class ProductPriceSalesLogDataTable extends DataTable
{
    private $defaultFilter = [];
    /**
     * example mapping filter column to search by keyword, default use %keyword%.
     */
    private $columnFilterOperator = [
        // 'created_by.name' => \App\DataTables\FilterClass\RelationMatchKeyword::class,
    ];

    private $mapColumnSearch = [
        'dmsInvProduct.szName' => 'dms_inv_product_id',
        'createdBy.name' => 'created_by',
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

        return $dataTable; //->addColumn('action', 'Base.product_price_logs.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ProductPriceSalesLog $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ProductPriceSalesLog $model)
    {
        return empty($this->getDefaultFilter()) ? $model->with(['dmsInvProduct', 'createdBy'])->newQuery() : $model->where($this->getDefaultFilter())->with(['dmsInvProduct', 'createdBy'])->newQuery();
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
                'extend' => 'export',
                'className' => 'btn btn-default btn-sm no-corner',
                'text' => '<i class="fa fa-download"></i> '.__('auth.app.export').'',
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
            // ->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')])
            ->parameters([
                'dom' => '<"row" <"col-md-6"B><"col-md-6 text-right"l>>rtip',
                'stateSave' => true,
                'order' => [[5, 'desc']],
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
     * Get the value of defaultFilter.
     */
    public function getDefaultFilter()
    {
        return $this->defaultFilter;
    }

    /**
     * Set the value of defaultFilter.
     *
     * @param mixed $defaultFilter
     *
     * @return self
     */
    public function setDefaultFilter($defaultFilter)
    {
        $this->defaultFilter = $defaultFilter;

        return $this;
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [            
            'dms_inv_product_id' => new Column(['title' => __('models/productPriceSalesLogs.fields.dms_inv_product_id'), 'data' => 'dms_inv_product.szName', 'searchable' => false, 'elmsearch' => 'text', 'orderable' => false]),
            'price' => new Column(['title' => __('models/productPriceSalesLogs.fields.price'), 'data' => 'price', 'searchable' => false, 'elmsearch' => 'text', 'class' => 'text-right']),
            'start_date' => new Column(['title' => __('models/productPriceSalesLogs.fields.start_date'), 'data' => 'start_date', 'searchable' => false, 'elmsearch' => 'text']),
            'end_date' => new Column(['title' => __('models/productPriceSalesLogs.fields.end_date'), 'data' => 'end_date', 'defaultContent' => '', 'searchable' => false, 'elmsearch' => 'text']),
            'product_uom_id' => new Column(['title' => __('models/dmsInvProducts.fields.szUomId'), 'data' => 'dms_inv_product.szUomId', 'searchable' => true, 'elmsearch' => 'text', 'orderable' => false]),
            'created_at' => new Column(['title' => __('models/productPriceSalesLogs.fields.created_at'), 'data' => 'created_at', 'searchable' => false, 'elmsearch' => 'text']),
            // 'created_by' => new Column(['title' => __('models/productPriceSalesLogs.fields.created_by'), 'data' => 'created_by.name', 'searchable' => false, 'elmsearch' => 'text']),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'product_price_logs_datatable_'.time();
    }
}
