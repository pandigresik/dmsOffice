<?php

namespace App\DataTables\Base;

use App\DataTables\BaseDataTable as DataTable;
use App\Models\Base\VendorLocation;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class VendorLocationDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'base.vendor_locations.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\VendorLocation $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(VendorLocation $model)
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
                'text' => '<i class="fa fa-plus"></i> '.__('auth.app.create').'',
            ],
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
            'address' => new Column(['title' => __('models/vendorLocations.fields.address'), 'data' => 'address', 'searchable' => true, 'elmsearch' => 'text']),
            'city' => new Column(['title' => __('models/vendorLocations.fields.city'), 'data' => 'city', 'searchable' => true, 'elmsearch' => 'text']),
            'state' => new Column(['title' => __('models/vendorLocations.fields.state'), 'data' => 'state', 'searchable' => true, 'elmsearch' => 'text']),
            'additional_cost' => new Column(['title' => __('models/vendorLocations.fields.additional_cost'), 'data' => 'additional_cost', 'searchable' => true, 'elmsearch' => 'text']),
            'route_trip_id' => new Column(['title' => __('models/vendorLocations.fields.route_trip_id'), 'data' => 'route_trip_id', 'searchable' => true, 'elmsearch' => 'text']),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'vendor_locations_datatable_'.time();
    }
}
