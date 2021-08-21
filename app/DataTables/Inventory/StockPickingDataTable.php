<?php

namespace App\DataTables\Inventory;

use App\Models\Inventory\StockPicking;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class StockPickingDataTable extends DataTable
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
        return $dataTable->addColumn('action', 'inventory.stock_pickings.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\StockPicking $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(StockPicking $model)
    {
        return $model->with(['warehouse','product','stockPickingType'])->newQuery();
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
            'warehouse_id' => new Column(['title' => __('models/stockPickings.fields.warehouse_id'), 'data' => 'warehouse.name', 'searchable' => true, 'elmsearch' => 'text']),
            'product_id' => new Column(['title' => __('models/stockPickings.fields.product_id'), 'data' => 'product.name', 'searchable' => true, 'elmsearch' => 'text']),
            'stock_picking_type_id' => new Column(['title' => __('models/stockPickings.fields.stock_picking_type_id'), 'data' => 'stock_picking_type.name', 'searchable' => true, 'elmsearch' => 'text']),
            'name' => new Column(['title' => __('models/stockPickings.fields.name'), 'data' => 'name', 'searchable' => true, 'elmsearch' => 'text']),
            'quantity' => new Column(['title' => __('models/stockPickings.fields.quantity'), 'data' => 'quantity', 'searchable' => true, 'elmsearch' => 'text']),
            'state' => new Column(['title' => __('models/stockPickings.fields.state'), 'data' => 'state', 'searchable' => true, 'elmsearch' => 'text']),                        
            'note' => new Column(['title' => __('models/stockPickings.fields.note'), 'data' => 'note', 'searchable' => true, 'elmsearch' => 'text'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'stock_pickings_datatable_' . time();
    }
}
