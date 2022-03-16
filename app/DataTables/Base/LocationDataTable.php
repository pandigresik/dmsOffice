<?php

namespace App\DataTables\Base;

use App\DataTables\BaseDataTable as DataTable;
use App\Models\Base\Location;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class LocationDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'base.locations.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Location $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Location $model)
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
        $typeItems = [
            ['value' => '', 'text' => __('crud.option.location_type_placeholder')],
            ['value' => 'origin', 'text' => 'origin'],
            ['value' => 'destination', 'text' => 'destination'],
            ['value' => 'common', 'text' => 'common'],
        ];

        return [
            'name' => new Column(['title' => __('models/locations.fields.name'), 'data' => 'name', 'searchable' => true, 'elmsearch' => 'text']),
            'district' => new Column(['title' => __('models/locations.fields.district'), 'data' => 'district', 'searchable' => true, 'elmsearch' => 'text']),
            'city' => new Column(['title' => __('models/locations.fields.city'), 'data' => 'city', 'searchable' => true, 'elmsearch' => 'text']),
            'type' => new Column(['title' => __('models/locations.fields.type'), 'data' => 'type', 'searchable' => true, 'elmsearch' => 'dropdown', 'listItem' => $typeItems]),
            'reference_id' => new Column(['title' => __('models/locations.fields.reference_id'), 'data' => 'reference_id', 'searchable' => false]),
            'reference_type' => new Column(['title' => __('models/locations.fields.reference_type'), 'data' => 'reference_type', 'searchable' => false]),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'locations_datatable_'.time();
    }
}
