<?php

namespace App\DataTables\Inventory;

use App\Models\Inventory\ProductStock;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class ProductStockDataTable extends DataTable
{
    /**
    * example mapping filter column to search by keyword, default use %keyword%
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
        return $dataTable->addColumn('action', 'inventory.product_stocks.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ProductStock $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ProductStock $model)
    {
        return $model->with(['product'])->newQuery();
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
                
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')])
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
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'product_id' => new Column(['title' => __('models/productStocks.fields.product_id'), 'data' => 'product_id', 'searchable' => true, 'elmsearch' => 'text']),
            'product_name' => new Column(['title' => __('models/productStocks.fields.product_name'),'name' => 'product_name', 'data' => 'product.szName', 'searchable' => false, 'elmsearch' => 'text']),
            'first_stock' => new Column(['title' => __('models/productStocks.fields.first_stock'), 'data' => 'first_stock', 'searchable' => true, 'elmsearch' => 'text']),
            'supplier_in' => new Column(['title' => __('models/productStocks.fields.supplier_in'), 'data' => 'supplier_in', 'searchable' => true, 'elmsearch' => 'text']),
            'mutation_in' => new Column(['title' => __('models/productStocks.fields.mutation_in'), 'data' => 'mutation_in', 'searchable' => true, 'elmsearch' => 'text']),
            'distribution_in' => new Column(['title' => __('models/productStocks.fields.distribution_in'), 'data' => 'distribution_in', 'searchable' => true, 'elmsearch' => 'text']),
            'supplier_out' => new Column(['title' => __('models/productStocks.fields.supplier_out'), 'data' => 'supplier_out', 'searchable' => true, 'elmsearch' => 'text']),
            'mutation_out' => new Column(['title' => __('models/productStocks.fields.mutation_out'), 'data' => 'mutation_out', 'searchable' => true, 'elmsearch' => 'text']),
            'distribution_out' => new Column(['title' => __('models/productStocks.fields.distribution_out'), 'data' => 'distribution_out', 'searchable' => true, 'elmsearch' => 'text']),
            'morphing' => new Column(['title' => __('models/productStocks.fields.morphing'), 'data' => 'morphing', 'searchable' => true, 'elmsearch' => 'text']),
            'last_stock' => new Column(['title' => __('models/productStocks.fields.last_stock'), 'data' => 'last_stock', 'searchable' => true, 'elmsearch' => 'text']),
            'period' => new Column(['title' => __('models/productStocks.fields.period'), 'data' => 'period', 'searchable' => true, 'elmsearch' => 'text']),
            'additional_info' => new Column(['title' => __('models/productStocks.fields.additional_info'), 'data' => 'additional_info', 'searchable' => true, 'elmsearch' => 'text'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'product_stocks_datatable_' . time();
    }
}
