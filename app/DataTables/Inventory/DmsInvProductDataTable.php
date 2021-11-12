<?php

namespace App\DataTables\Inventory;

use App\Models\Inventory\DmsInvProduct;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class DmsInvProductDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'inventory.dms_inv_products.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\DmsInvProduct $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(DmsInvProduct $model)
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
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            // 'iId' => new Column(['title' => __('models/dmsInvProducts.fields.iId'), 'data' => 'iId', 'searchable' => true, 'elmsearch' => 'text']),
            'szId' => new Column(['title' => __('models/dmsInvProducts.fields.szId'), 'data' => 'szId', 'searchable' => true, 'elmsearch' => 'text']),
            'szName' => new Column(['title' => __('models/dmsInvProducts.fields.szName'), 'data' => 'szName', 'searchable' => true, 'elmsearch' => 'text']),
            'szDescription' => new Column(['title' => __('models/dmsInvProducts.fields.szDescription'), 'data' => 'szDescription', 'searchable' => true, 'elmsearch' => 'text']),
            'szTrackingType' => new Column(['title' => __('models/dmsInvProducts.fields.szTrackingType'), 'data' => 'szTrackingType', 'searchable' => true, 'elmsearch' => 'text']),
            'szUomId' => new Column(['title' => __('models/dmsInvProducts.fields.szUomId'), 'data' => 'szUomId', 'searchable' => true, 'elmsearch' => 'text']),
            'bUseComposite' => new Column(['title' => __('models/dmsInvProducts.fields.bUseComposite'), 'data' => 'bUseComposite', 'searchable' => true, 'elmsearch' => 'text']),
            'bKit' => new Column(['title' => __('models/dmsInvProducts.fields.bKit'), 'data' => 'bKit', 'searchable' => true, 'elmsearch' => 'text']),
            //'szQtyFormat' => new Column(['title' => __('models/dmsInvProducts.fields.szQtyFormat'), 'data' => 'szQtyFormat', 'searchable' => true, 'elmsearch' => 'text']),
            'szProductType' => new Column(['title' => __('models/dmsInvProducts.fields.szProductType'), 'data' => 'szProductType', 'searchable' => true, 'elmsearch' => 'text']),
            //'szNickName' => new Column(['title' => __('models/dmsInvProducts.fields.szNickName'), 'data' => 'szNickName', 'searchable' => true, 'elmsearch' => 'text']),
            //'dtmStartDate' => new Column(['title' => __('models/dmsInvProducts.fields.dtmStartDate'), 'data' => 'dtmStartDate', 'searchable' => true, 'elmsearch' => 'text']),
            //'dtmEndDate' => new Column(['title' => __('models/dmsInvProducts.fields.dtmEndDate'), 'data' => 'dtmEndDate', 'searchable' => true, 'elmsearch' => 'text']),
            // 'szUserCreatedId' => new Column(['title' => __('models/dmsInvProducts.fields.szUserCreatedId'), 'data' => 'szUserCreatedId', 'searchable' => true, 'elmsearch' => 'text']),
            // 'szUserUpdatedId' => new Column(['title' => __('models/dmsInvProducts.fields.szUserUpdatedId'), 'data' => 'szUserUpdatedId', 'searchable' => true, 'elmsearch' => 'text']),
            // 'dtmCreated' => new Column(['title' => __('models/dmsInvProducts.fields.dtmCreated'), 'data' => // 'dtmCreated', 'searchable' => true, 'elmsearch' => 'text']),
            // 'dtmLastUpdated' => new Column(['title' => __('models/dmsInvProducts.fields.dtmLastUpdated'), 'data' => // 'dtmLastUpdated', 'searchable' => true, 'elmsearch' => 'text'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'dms_inv_products_datatable_'.time();
    }
}
