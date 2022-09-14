<?php

namespace App\DataTables\Base;

use App\DataTables\BaseDataTable as DataTable;
use App\Models\Base\ProductPriceSales;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class ProductPriceSalesDataTable extends DataTable
{
    protected $fastExcel = false;
    /**
     * example mapping filter column to search by keyword, default use %keyword%.
     */
    private $columnFilterOperator = [
        'dms_inv_product.szName' => \App\DataTables\FilterClass\RelationContainKeyword::class,
        'dms_inv_product.szId' => \App\DataTables\FilterClass\RelationContainKeyword::class,
    ];

    private $mapColumnSearch = [
        // 'dms_inv_product.szName' => 'dms_inv_product_id',
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
        // $dataTable->editColumn('dms_inv_product_id', function($q){

        // });
        return $dataTable->addColumn('action', 'base.product_price_sales.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ProductPriceSales $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ProductPriceSales $model)
    {
        return $model->with(['dmsInvProduct'])->newQuery();
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
                'order' => [[2, 'desc']],
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
            // 'product_id' => new Column(['title' => __('models/dmsInvProducts.fields.szId'), 'data' => 'dms_inv_product.szId', 'searchable' => true, 'elmsearch' => 'text', 'orderable' => false]),
            'dms_inv_product_id' => new Column(['title' => __('models/productPriceSales.fields.dms_inv_product_id'), 'data' => 'dms_inv_product.szName', 'searchable' => true, 'elmsearch' => 'text', 'orderable' => false]),
            'price' => new Column(['title' => __('models/productPriceSales.fields.price'), 'data' => 'price', 'searchable' => false, 'elmsearch' => 'text', 'class' => 'text-right']),
            // 'dpp_price' => new Column(['title' => __('models/productPriceSales.fields.dpp_price'), 'data' => 'dpp_price', 'searchable' => false, 'elmsearch' => 'text', 'class' => 'text-right']),
            // 'branch_price' => new Column(['title' => __('models/productPriceSales.fields.branch_price'), 'data' => 'branch_price', 'searchable' => false, 'elmsearch' => 'text', 'class' => 'text-right']),
            'start_date' => new Column(['title' => __('models/productPriceSales.fields.start_date'), 'data' => 'start_date', 'searchable' => false, 'elmsearch' => 'text']),
            'product_uom_id' => new Column(['title' => __('models/dmsInvProducts.fields.szUomId'), 'data' => 'dms_inv_product.szUomId', 'searchable' => true, 'elmsearch' => 'text', 'orderable' => false]),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'product_prices_sales_datatable_'.time();
    }
}
