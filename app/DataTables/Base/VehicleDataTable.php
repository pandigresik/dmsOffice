<?php

namespace App\DataTables\Base;

use App\Models\Base\Vehicle;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class VehicleDataTable extends DataTable
{
    private $idReferences;

    /**
     * example mapping filter column to search by keyword, default use %keyword%.
     */
    private $columnFilterOperator = [
        'id' => \App\DataTables\FilterClass\MatchKeyword::class,
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

        return $dataTable->addColumn('action', 'base.vehicles.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Vehicle $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Vehicle $model)
    {
        return $model->where(['vendor_expedition_id' => $this->getIdReferences()])->with(['vehicleGroup', 'Vendor'])->newQuery();
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
     * Get the value of idReferences.
     */
    public function getIdReferences()
    {
        return $this->idReferences;
    }

    /**
     * Set the value of idReferences.
     *
     * @param mixed $idReferences
     *
     * @return self
     */
    public function setIdReferences($idReferences)
    {
        $this->idReferences = $idReferences;

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
            'number_registration' => new Column(['title' => __('models/vehicles.fields.number_registration'), 'data' => 'number_registration', 'searchable' => true, 'elmsearch' => 'text']),
            'number_identity' => new Column(['title' => __('models/vehicles.fields.number_identity'), 'data' => 'number_identity', 'searchable' => true, 'elmsearch' => 'text']),
            'vehicle_group_id' => new Column(['title' => __('models/vehicles.fields.vehicle_group_id'), 'data' => 'vehicle_group.name', 'defaultContent' => '-', 'searchable' => true, 'elmsearch' => 'text']),
            'vendor_expedition_id' => new Column(['title' => __('models/vehicles.fields.vendor_expedition_id'), 'data' => 'vendor_expedition.name', 'defaultContent' => '-', 'searchable' => true, 'elmsearch' => 'text']),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'vehicles_datatable_'.time();
    }
}
