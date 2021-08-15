<?php

namespace App\DataTables\Base;

use App\Models\Base\RouteTrip;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class RouteTripDataTable extends DataTable
{
    /**
     * example mapping filter column to search by keyword, default use %keyword%.
     */
    private $columnFilterOperator = [
        'vehicle_group.name' => \App\DataTables\FilterClass\RelationContainKeyword::class,
        'destination_city.name' => \App\DataTables\FilterClass\RelationContainKeyword::class,
        'origin_city.name' => \App\DataTables\FilterClass\RelationContainKeyword::class,
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
                $dataTable->filterColumn($column, new $operator($column));
            }
        }

        return $dataTable
        // ->editColumn('price', function($q){
        //     return money($q->price)->format();
        // })
            ->addColumn('action', 'base.route_trips.datatables_actions')
        ;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\RouteTrip $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(RouteTrip $model)
    {
        return $model->with('vehicleGroup', 'destinationCity', 'originCity')->newQuery();
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
                'dom' => 'Brtip',
                'stateSave' => true,
                'order' => [[0, 'desc']],
                'buttons' => [
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
                ],
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
            'name' => new Column(['title' => __('models/routeTrips.fields.name'), 'data' => 'name', 'searchable' => true, 'elmsearch' => 'text']),
            'description' => new Column(['title' => __('models/routeTrips.fields.description'), 'data' => 'description', 'searchable' => true, 'elmsearch' => 'text']),
            'vehicle_group_id' => new Column(['title' => __('models/routeTrips.fields.vehicle_group_id'), 'data' => 'vehicle_group.name', 'defaultContent' => '-', 'searchable' => true, 'elmsearch' => 'text']),
            'origin' => new Column(['title' => __('models/routeTrips.fields.origin'), 'data' => 'origin_city.name', 'defaultContent' => '-', 'searchable' => true, 'elmsearch' => 'text']),
            'destination' => new Column(['title' => __('models/routeTrips.fields.destination'), 'data' => 'destination_city.name', 'defaultContent' => '-', 'searchable' => true, 'elmsearch' => 'text']),
            'price' => new Column(['title' => __('models/routeTrips.fields.price'), 'data' => 'price', 'searchable' => true, 'elmsearch' => 'text']),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'route_trips_datatable_'.time();
    }
}
