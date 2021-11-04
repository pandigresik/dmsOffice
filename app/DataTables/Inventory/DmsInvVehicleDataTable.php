<?php

namespace App\DataTables\Inventory;

use App\Models\Inventory\DmsInvVehicle;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class DmsInvVehicleDataTable extends DataTable
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
        return $dataTable            
            ->editColumn('decVolume', function($q){
                return '<div class="text-right">'.$q->decVolume.'</div>';
            })
            ->editColumn('decWeight', function($q){
                return '<div class="text-right">'.$q->decWeight.'</div>';
            })
            ->addColumn('action', 'inventory.dms_inv_vehicles.datatables_actions')
            ->escapeColumns([]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\DmsInvVehicle $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(DmsInvVehicle $model)
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
            // 'iId' => new Column(['title' => __('models/dmsInvVehicles.fields.iId'), 'data' => 'iId', 'searchable' => true, 'elmsearch' => 'text']),
            'szId' => new Column(['title' => __('models/dmsInvVehicles.fields.szId'), 'data' => 'szId', 'searchable' => true, 'elmsearch' => 'text']),
            'szName' => new Column(['title' => __('models/dmsInvVehicles.fields.szName'), 'data' => 'szName', 'searchable' => true, 'elmsearch' => 'text']),
            //'szDescription' => new Column(['title' => __('models/dmsInvVehicles.fields.szDescription'), 'data' => 'szDescription', 'searchable' => true, 'elmsearch' => 'text']),
            'szBranchId' => new Column(['title' => __('models/dmsInvVehicles.fields.szBranchId'), 'data' => 'szBranchId', 'searchable' => true, 'elmsearch' => 'text']),
            'szPoliceNo' => new Column(['title' => __('models/dmsInvVehicles.fields.szPoliceNo'), 'data' => 'szPoliceNo', 'searchable' => true, 'elmsearch' => 'text']),
            'szChassisNo' => new Column(['title' => __('models/dmsInvVehicles.fields.szChassisNo'), 'data' => 'szChassisNo', 'searchable' => true, 'elmsearch' => 'text']),
            'szMachineNo' => new Column(['title' => __('models/dmsInvVehicles.fields.szMachineNo'), 'data' => 'szMachineNo', 'searchable' => true, 'elmsearch' => 'text']),
            'decWeight' => new Column(['title' => __('models/dmsInvVehicles.fields.decWeight'), 'data' => 'decWeight', 'searchable' => true, 'elmsearch' => 'text']),
            'decVolume' => new Column(['title' => __('models/dmsInvVehicles.fields.decVolume'), 'data' => 'decVolume', 'searchable' => true, 'elmsearch' => 'text']),
            'szVehicleTypeId' => new Column(['title' => __('models/dmsInvVehicles.fields.szVehicleTypeId'), 'data' => 'szVehicleTypeId', 'searchable' => true, 'elmsearch' => 'text']),
            'dtmVehicleLicense' => new Column(['title' => __('models/dmsInvVehicles.fields.dtmVehicleLicense'), 'data' => 'dtmVehicleLicense', 'searchable' => true, 'elmsearch' => 'text']),
            // 'szUserCreatedId' => new Column(['title' => __('models/dmsInvVehicles.fields.szUserCreatedId'), 'data' => 'szUserCreatedId', 'searchable' => true, 'elmsearch' => 'text']),
            // 'szUserUpdatedId' => new Column(['title' => __('models/dmsInvVehicles.fields.szUserUpdatedId'), 'data' => 'szUserUpdatedId', 'searchable' => true, 'elmsearch' => 'text']),
            // 'dtmCreated' => new Column(['title' => __('models/dmsInvVehicles.fields.dtmCreated'), 'data' => // 'dtmCreated', 'searchable' => true, 'elmsearch' => 'text']),
            // 'dtmLastUpdated' => new Column(['title' => __('models/dmsInvVehicles.fields.dtmLastUpdated'), 'data' => // 'dtmLastUpdated', 'searchable' => true, 'elmsearch' => 'text'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'dms_inv_vehicles_datatable_' . time();
    }
}
