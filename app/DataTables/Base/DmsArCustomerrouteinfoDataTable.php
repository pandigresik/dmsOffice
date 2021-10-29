<?php

namespace App\DataTables\Base;

use App\Models\Base\DmsArCustomerrouteinfo;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class DmsArCustomerrouteinfoDataTable extends DataTable
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
        return $dataTable->addColumn('action', 'base.dms_ar_customerrouteinfos.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\DmsArCustomerrouteinfo $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(DmsArCustomerrouteinfo $model)
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
            // 'iId' => new Column(['title' => __('models/dmsArCustomerrouteinfos.fields.iId'), 'data' => 'iId', 'searchable' => true, 'elmsearch' => 'text']),
            'szId' => new Column(['title' => __('models/dmsArCustomerrouteinfos.fields.szId'), 'data' => 'szId', 'searchable' => true, 'elmsearch' => 'text']),
            'intItemNumber' => new Column(['title' => __('models/dmsArCustomerrouteinfos.fields.intItemNumber'), 'data' => 'intItemNumber', 'searchable' => true, 'elmsearch' => 'text']),
            'szRouteType' => new Column(['title' => __('models/dmsArCustomerrouteinfos.fields.szRouteType'), 'data' => 'szRouteType', 'searchable' => true, 'elmsearch' => 'text']),
            'szEmployeeId' => new Column(['title' => __('models/dmsArCustomerrouteinfos.fields.szEmployeeId'), 'data' => 'szEmployeeId', 'searchable' => true, 'elmsearch' => 'text']),
            'bMon' => new Column(['title' => __('models/dmsArCustomerrouteinfos.fields.bMon'), 'data' => 'bMon', 'searchable' => true, 'elmsearch' => 'text']),
            'bTue' => new Column(['title' => __('models/dmsArCustomerrouteinfos.fields.bTue'), 'data' => 'bTue', 'searchable' => true, 'elmsearch' => 'text']),
            'bWed' => new Column(['title' => __('models/dmsArCustomerrouteinfos.fields.bWed'), 'data' => 'bWed', 'searchable' => true, 'elmsearch' => 'text']),
            'bThu' => new Column(['title' => __('models/dmsArCustomerrouteinfos.fields.bThu'), 'data' => 'bThu', 'searchable' => true, 'elmsearch' => 'text']),
            'bFri' => new Column(['title' => __('models/dmsArCustomerrouteinfos.fields.bFri'), 'data' => 'bFri', 'searchable' => true, 'elmsearch' => 'text']),
            'bSat' => new Column(['title' => __('models/dmsArCustomerrouteinfos.fields.bSat'), 'data' => 'bSat', 'searchable' => true, 'elmsearch' => 'text']),
            'bSun' => new Column(['title' => __('models/dmsArCustomerrouteinfos.fields.bSun'), 'data' => 'bSun', 'searchable' => true, 'elmsearch' => 'text']),
            'bWeek1' => new Column(['title' => __('models/dmsArCustomerrouteinfos.fields.bWeek1'), 'data' => 'bWeek1', 'searchable' => true, 'elmsearch' => 'text']),
            'bWeek2' => new Column(['title' => __('models/dmsArCustomerrouteinfos.fields.bWeek2'), 'data' => 'bWeek2', 'searchable' => true, 'elmsearch' => 'text']),
            'bWeek3' => new Column(['title' => __('models/dmsArCustomerrouteinfos.fields.bWeek3'), 'data' => 'bWeek3', 'searchable' => true, 'elmsearch' => 'text']),
            'bWeek4' => new Column(['title' => __('models/dmsArCustomerrouteinfos.fields.bWeek4'), 'data' => 'bWeek4', 'searchable' => true, 'elmsearch' => 'text']),
            // 'szUserCreatedId' => new Column(['title' => __('models/dmsArCustomerrouteinfos.fields.szUserCreatedId'), 'data' => 'szUserCreatedId', 'searchable' => true, 'elmsearch' => 'text']),
            // 'szUserUpdatedId' => new Column(['title' => __('models/dmsArCustomerrouteinfos.fields.szUserUpdatedId'), 'data' => 'szUserUpdatedId', 'searchable' => true, 'elmsearch' => 'text']),
            // 'dtmCreated' => new Column(['title' => __('models/dmsArCustomerrouteinfos.fields.dtmCreated'), 'data' => // 'dtmCreated', 'searchable' => true, 'elmsearch' => 'text']),
            // 'dtmLastUpdated' => new Column(['title' => __('models/dmsArCustomerrouteinfos.fields.dtmLastUpdated'), 'data' => // 'dtmLastUpdated', 'searchable' => true, 'elmsearch' => 'text'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'dms_ar_customerrouteinfos_datatable_' . time();
    }
}
