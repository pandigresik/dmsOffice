<?php

namespace App\DataTables\Base;

use App\DataTables\BaseDataTable as DataTable;
use App\Models\Base\DmsArCustomer;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class DmsArCustomerDataTable extends DataTable
{
    /**
     * example mapping filter column to search by keyword, default use %keyword%.
     */
    private $columnFilterOperator = [
        'bHasDifferentCollectAddress' => \App\DataTables\FilterClass\MatchKeyword::class,
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

        return $dataTable->addColumn('action', 'base.dms_ar_customers.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\DmsArCustomer $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(DmsArCustomer $model)
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
            // 'iId' => new Column(['title' => __('models/dmsArCustomers.fields.iId'), 'data' => 'iId', 'searchable' => true, 'elmsearch' => 'text']),
            'szId' => new Column(['title' => __('models/dmsArCustomers.fields.szId'), 'data' => 'szId', 'searchable' => true, 'elmsearch' => 'text']),
            'szName' => new Column(['title' => __('models/dmsArCustomers.fields.szName'), 'data' => 'szName', 'searchable' => true, 'elmsearch' => 'text']),
            //'szDescription' => new Column(['title' => __('models/dmsArCustomers.fields.szDescription'), 'data' => 'szDescription', 'searchable' => true, 'elmsearch' => 'text']),
            'szHierarchyId' => new Column(['title' => __('models/dmsArCustomers.fields.szHierarchyId'), 'data' => 'szHierarchyId', 'searchable' => true, 'elmsearch' => 'text']),
            'szHierarchyFull' => new Column(['title' => __('models/dmsArCustomers.fields.szHierarchyFull'), 'data' => 'szHierarchyFull', 'searchable' => true, 'elmsearch' => 'text']),
            //'szIDCard' => new Column(['title' => __('models/dmsArCustomers.fields.szIDCard'), 'data' => 'szIDCard', 'searchable' => true, 'elmsearch' => 'text']),
            'bHasDifferentCollectAddress' => new Column(['title' => __('models/dmsArCustomers.fields.bHasDifferentCollectAddress'), 'data' => 'bHasDifferentCollectAddress', 'searchable' => true, 'elmsearch' => 'dropdown', 'listItem' => [['text' => 'Pilih status', 'value' => ''], ['text' => 'true', 'value' => 1], ['text' => 'false', 'value' => 0]]]),
            'szCode' => new Column(['title' => __('models/dmsArCustomers.fields.szCode'), 'data' => 'szCode', 'searchable' => true, 'elmsearch' => 'text']),
            // 'szUserCreatedId' => new Column(['title' => __('models/dmsArCustomers.fields.szUserCreatedId'), 'data' => 'szUserCreatedId', 'searchable' => true, 'elmsearch' => 'text']),
            // 'szUserUpdatedId' => new Column(['title' => __('models/dmsArCustomers.fields.szUserUpdatedId'), 'data' => 'szUserUpdatedId', 'searchable' => true, 'elmsearch' => 'text']),
            // 'dtmCreated' => new Column(['title' => __('models/dmsArCustomers.fields.dtmCreated'), 'data' => // 'dtmCreated', 'searchable' => true, 'elmsearch' => 'text']),
            // 'dtmLastUpdated' => new Column(['title' => __('models/dmsArCustomers.fields.dtmLastUpdated'), 'data' => // 'dtmLastUpdated', 'searchable' => true, 'elmsearch' => 'text']),
            // 'szMCOId' => new Column(['title' => __('models/dmsArCustomers.fields.szMCOId'), 'data' => 'szMCOId', 'searchable' => true, 'elmsearch' => 'text'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'dms_ar_customers_datatable_'.time();
    }
}
