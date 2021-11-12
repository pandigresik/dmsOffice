<?php

namespace App\DataTables\Inventory;

use App\Models\Inventory\DmsInvWarehouse;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class DmsInvWarehouseDataTable extends DataTable
{
    private $defaultFilter = [];
    /**
     * example mapping filter column to search by keyword, default use %keyword%.
     */
    private $columnFilterOperator = [
        'branch.name' => \App\DataTables\FilterClass\RelationMatchKeyword::class,
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

        return $dataTable->addColumn('action', 'inventory.dms_inv_warehouses.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\DmsInvWarehouse $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(DmsInvWarehouse $model)
    {
        return empty($this->getDefaultFilter()) ? $model->with(['branch'])->newQuery() : $model->where($this->getDefaultFilter())->with(['branch'])->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $buttons = [
            // [
            //    'extend' => 'create',
            //    'className' => 'btn btn-default btn-sm no-corner',
            //    'text' => '<i class="fa fa-plus"></i> ' .__('auth.app.create').''
            // ],
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
                'dom' => 'Brtip',
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
            // 'iId' => new Column(['title' => __('models/dmsInvWarehouses.fields.iId'), 'data' => 'iId', 'searchable' => true, 'elmsearch' => 'text']),
            'szId' => new Column(['title' => __('models/dmsInvWarehouses.fields.szId'), 'data' => 'szId', 'searchable' => true, 'elmsearch' => 'text']),
            'szName' => new Column(['title' => __('models/dmsInvWarehouses.fields.szName'), 'data' => 'szName', 'searchable' => true, 'elmsearch' => 'text']),
            'szDescription' => new Column(['title' => __('models/dmsInvWarehouses.fields.szDescription'), 'data' => 'szDescription', 'searchable' => true, 'elmsearch' => 'text']),
            'szBranchId' => new Column(['title' => __('models/dmsInvWarehouses.fields.szBranchId'), 'data' => 'branch.szName', 'searchable' => true, 'elmsearch' => 'text']),
            'bAllowForSalesTransaction' => new Column(['title' => __('models/dmsInvWarehouses.fields.bAllowForSalesTransaction'), 'data' => 'bAllowForSalesTransaction', 'searchable' => false, 'elmsearch' => 'text']),
            // 'szUserCreatedId' => new Column(['title' => __('models/dmsInvWarehouses.fields.szUserCreatedId'), 'data' => 'szUserCreatedId', 'searchable' => true, 'elmsearch' => 'text']),
            // 'szUserUpdatedId' => new Column(['title' => __('models/dmsInvWarehouses.fields.szUserUpdatedId'), 'data' => 'szUserUpdatedId', 'searchable' => true, 'elmsearch' => 'text']),
            // 'dtmCreated' => new Column(['title' => __('models/dmsInvWarehouses.fields.dtmCreated'), 'data' => // 'dtmCreated', 'searchable' => true, 'elmsearch' => 'text']),
            // 'dtmLastUpdated' => new Column(['title' => __('models/dmsInvWarehouses.fields.dtmLastUpdated'), 'data' => // 'dtmLastUpdated', 'searchable' => true, 'elmsearch' => 'text'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'dms_inv_warehouses_datatable_'.time();
    }
}
