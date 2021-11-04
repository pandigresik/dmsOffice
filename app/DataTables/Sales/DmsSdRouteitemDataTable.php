<?php

namespace App\DataTables\Sales;

use App\Models\Sales\DmsSdRouteitem;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class DmsSdRouteitemDataTable extends DataTable
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
        return $dataTable->addColumn('action', 'sales.dms_sd_routeitems.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\DmsSdRouteitem $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(DmsSdRouteitem $model)
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
            // 'iId' => new Column(['title' => __('models/dmsSdRouteitems.fields.iId'), 'data' => 'iId', 'searchable' => true, 'elmsearch' => 'text']),
            'szId' => new Column(['title' => __('models/dmsSdRouteitems.fields.szId'), 'data' => 'szId', 'searchable' => true, 'elmsearch' => 'text']),
            'intItemNumber' => new Column(['title' => __('models/dmsSdRouteitems.fields.intItemNumber'), 'data' => 'intItemNumber', 'searchable' => true, 'elmsearch' => 'text']),
            'szCustomerId' => new Column(['title' => __('models/dmsSdRouteitems.fields.szCustomerId'), 'data' => 'szCustomerId', 'searchable' => true, 'elmsearch' => 'text']),
            'intDay1' => new Column(['title' => __('models/dmsSdRouteitems.fields.intDay1'), 'data' => 'intDay1', 'searchable' => true, 'elmsearch' => 'text']),
            'intDay2' => new Column(['title' => __('models/dmsSdRouteitems.fields.intDay2'), 'data' => 'intDay2', 'searchable' => true, 'elmsearch' => 'text']),
            'intDay3' => new Column(['title' => __('models/dmsSdRouteitems.fields.intDay3'), 'data' => 'intDay3', 'searchable' => true, 'elmsearch' => 'text']),
            'intDay4' => new Column(['title' => __('models/dmsSdRouteitems.fields.intDay4'), 'data' => 'intDay4', 'searchable' => true, 'elmsearch' => 'text']),
            'intDay5' => new Column(['title' => __('models/dmsSdRouteitems.fields.intDay5'), 'data' => 'intDay5', 'searchable' => true, 'elmsearch' => 'text']),
            'intDay6' => new Column(['title' => __('models/dmsSdRouteitems.fields.intDay6'), 'data' => 'intDay6', 'searchable' => true, 'elmsearch' => 'text']),
            'intDay7' => new Column(['title' => __('models/dmsSdRouteitems.fields.intDay7'), 'data' => 'intDay7', 'searchable' => true, 'elmsearch' => 'text']),
            'intWeek1' => new Column(['title' => __('models/dmsSdRouteitems.fields.intWeek1'), 'data' => 'intWeek1', 'searchable' => true, 'elmsearch' => 'text']),
            'intWeek2' => new Column(['title' => __('models/dmsSdRouteitems.fields.intWeek2'), 'data' => 'intWeek2', 'searchable' => true, 'elmsearch' => 'text']),
            'intWeek3' => new Column(['title' => __('models/dmsSdRouteitems.fields.intWeek3'), 'data' => 'intWeek3', 'searchable' => true, 'elmsearch' => 'text']),
            'intWeek4' => new Column(['title' => __('models/dmsSdRouteitems.fields.intWeek4'), 'data' => 'intWeek4', 'searchable' => true, 'elmsearch' => 'text'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'dms_sd_routeitems_datatable_' . time();
    }
}
