<?php

namespace App\DataTables\Base;

use App\Models\Base\DmsArDoccustomer;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class DmsArDoccustomerDataTable extends DataTable
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
        return $dataTable->addColumn('action', 'base.dms_ar_doccustomers.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\DmsArDoccustomer $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(DmsArDoccustomer $model)
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
            // 'iId' => new Column(['title' => __('models/dmsArDoccustomers.fields.iId'), 'data' => 'iId', 'searchable' => true, 'elmsearch' => 'text']),
            'szDocId' => new Column(['title' => __('models/dmsArDoccustomers.fields.szDocId'), 'data' => 'szDocId', 'searchable' => true, 'elmsearch' => 'text']),
            'dtmDoc' => new Column(['title' => __('models/dmsArDoccustomers.fields.dtmDoc'), 'data' => 'dtmDoc', 'searchable' => true, 'elmsearch' => 'text']),
            'szCustomerId' => new Column(['title' => __('models/dmsArDoccustomers.fields.szCustomerId'), 'data' => 'szCustomerId', 'searchable' => true, 'elmsearch' => 'text']),
            'szName' => new Column(['title' => __('models/dmsArDoccustomers.fields.szName'), 'data' => 'szName', 'searchable' => true, 'elmsearch' => 'text']),
            'bNewCustomer' => new Column(['title' => __('models/dmsArDoccustomers.fields.bNewCustomer'), 'data' => 'bNewCustomer', 'searchable' => true, 'elmsearch' => 'text']),
            'szIDCard' => new Column(['title' => __('models/dmsArDoccustomers.fields.szIDCard'), 'data' => 'szIDCard', 'searchable' => true, 'elmsearch' => 'text']),
            'bHasDifferentCollectAddress' => new Column(['title' => __('models/dmsArDoccustomers.fields.bHasDifferentCollectAddress'), 'data' => 'bHasDifferentCollectAddress', 'searchable' => true, 'elmsearch' => 'text']),
            'intPrintedCount' => new Column(['title' => __('models/dmsArDoccustomers.fields.intPrintedCount'), 'data' => 'intPrintedCount', 'searchable' => true, 'elmsearch' => 'text']),
            'szBranchId' => new Column(['title' => __('models/dmsArDoccustomers.fields.szBranchId'), 'data' => 'szBranchId', 'searchable' => true, 'elmsearch' => 'text']),
            'szCompanyId' => new Column(['title' => __('models/dmsArDoccustomers.fields.szCompanyId'), 'data' => 'szCompanyId', 'searchable' => true, 'elmsearch' => 'text']),
            'szDocStatus' => new Column(['title' => __('models/dmsArDoccustomers.fields.szDocStatus'), 'data' => 'szDocStatus', 'searchable' => true, 'elmsearch' => 'text']),
            'szHierarchyId' => new Column(['title' => __('models/dmsArDoccustomers.fields.szHierarchyId'), 'data' => 'szHierarchyId', 'searchable' => true, 'elmsearch' => 'text']),
            'szHierarchyFull' => new Column(['title' => __('models/dmsArDoccustomers.fields.szHierarchyFull'), 'data' => 'szHierarchyFull', 'searchable' => true, 'elmsearch' => 'text']),
            'szDocFUpId' => new Column(['title' => __('models/dmsArDoccustomers.fields.szDocFUpId'), 'data' => 'szDocFUpId', 'searchable' => true, 'elmsearch' => 'text']),
            // 'szUserCreatedId' => new Column(['title' => __('models/dmsArDoccustomers.fields.szUserCreatedId'), 'data' => 'szUserCreatedId', 'searchable' => true, 'elmsearch' => 'text']),
            // 'szUserUpdatedId' => new Column(['title' => __('models/dmsArDoccustomers.fields.szUserUpdatedId'), 'data' => 'szUserUpdatedId', 'searchable' => true, 'elmsearch' => 'text']),
            // 'dtmCreated' => new Column(['title' => __('models/dmsArDoccustomers.fields.dtmCreated'), 'data' => // 'dtmCreated', 'searchable' => true, 'elmsearch' => 'text']),
            // 'dtmLastUpdated' => new Column(['title' => __('models/dmsArDoccustomers.fields.dtmLastUpdated'), 'data' => // 'dtmLastUpdated', 'searchable' => true, 'elmsearch' => 'text'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'dms_ar_doccustomers_datatable_' . time();
    }
}
