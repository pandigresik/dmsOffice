<?php

namespace App\DataTables\Base;

use App\Models\Base\Trip;
use App\Repositories\Base\LocationRepository;
use App\Repositories\Inventory\ProductCategoriesRepository;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use App\DataTables\BaseDataTable as DataTable;

class TripDataTable extends DataTable
{
    /**
     * example mapping filter column to search by keyword, default use %keyword%.
     */
    private $columnFilterOperator = [
        'destination_location_id' => \App\DataTables\FilterClass\MatchKeyword::class,
        'origin_location_id' => \App\DataTables\FilterClass\MatchKeyword::class,
        'product_categories.name' => \App\DataTables\FilterClass\RelationMatchKeyword::class,
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
                $dataTable
                    ->editColumn('price', function ($q) {
                        return '<div class="text-right">'.$q->price.'</div>';
                    })
                    ->editColumn('distance', function ($q) {
                        return '<div class="text-right">'.$q->distance.'</div>';
                    })
                    ->editColumn('origin_additional_price', function ($q) {
                        return '<div class="text-right">'.$q->origin_additional_price.'</div>';
                    })
                    ->editColumn('destination_additional_price', function ($q) {
                        return '<div class="text-right">'.$q->destination_additional_price.'</div>';
                    })
                    ->editColumn('quantity', function ($q) {
                        return '<div class="text-right">'.$q->quantity.'</div>';
                    })
                    ->editColumn('origin.name', function ($q) {
                        return $q->origin ? $q->origin->fullIdentity : '-';
                    })
                    ->editColumn('destination.name', function ($q) {
                        return $q->destination ? $q->destination->fullIdentity : '-';
                    })
                    ->filterColumn($column, new $operator($columnSearch))
                    ->escapeColumns([])
                ;
            }
        }

        return $dataTable->addColumn('action', 'base.trips.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Trip $model)
    {
        return $model->with(['origin', 'destination', 'productCategories'])->newQuery();
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
        $locationItems = new LocationRepository(app());
        $productCategoriesItems = new ProductCategoriesRepository(app());
        $dropDownOrigin = array_merge([['value' => '', 'text' => __('crud.option.location_placeholder')]], convertArrayPairValueWithKey($locationItems->allQuery(['type' => 'origin'])->get()->pluck('full_identity', 'id')));
        $dropDownDestination = array_merge([['value' => '', 'text' => __('crud.option.location_placeholder')]], convertArrayPairValueWithKey($locationItems->allQuery(['type' => 'destination'])->get()->pluck('full_identity', 'id')));
        $dropDownProductCategories = array_merge([['value' => '', 'text' => __('crud.option.product_categories_placeholder')]], convertArrayPairValue($productCategoriesItems->pluck()));

        return [
            'code' => new Column(['title' => __('models/trips.fields.code'), 'data' => 'code', 'searchable' => true, 'elmsearch' => 'text']),
            'name' => new Column(['title' => __('models/trips.fields.name'), 'data' => 'name', 'searchable' => true, 'elmsearch' => 'text']),
            'origin_location_id' => new Column(['title' => __('models/trips.fields.origin_place'), 'name' => 'origin_location_id', 'data' => 'origin.name', 'defaultContent' => '-', 'searchable' => true, 'elmsearch' => 'dropdown', 'listItem' => $dropDownOrigin]),
            //'origin_additional_price' => new Column(['title' => __('models/trips.fields.origin_additional_price'), 'data' => 'origin_additional_price', 'searchable' => false, 'elmsearch' => 'text']),
            'destination_location_id' => new Column(['title' => __('models/trips.fields.destination_place'), 'name' => 'destination_location_id', 'data' => 'destination.name', 'defaultContent' => '-', 'searchable' => true, 'elmsearch' => 'dropdown', 'listItem' => $dropDownDestination]),
            'destination_additional_price' => new Column(['title' => __('models/trips.fields.destination_additional_price'), 'data' => 'destination_additional_price', 'searchable' => false, 'elmsearch' => 'text']),
            'price' => new Column(['title' => __('models/trips.fields.price'), 'data' => 'price', 'searchable' => false, 'elmsearch' => 'text']),
            'distance' => new Column(['title' => __('models/trips.fields.distance'), 'data' => 'distance', 'searchable' => false, 'elmsearch' => 'text']),
            'quantity' => new Column(['title' => __('models/trips.fields.quantity'), 'data' => 'quantity', 'searchable' => false, 'elmsearch' => 'text']),
            'description' => new Column(['title' => __('models/trips.fields.description'), 'data' => 'description', 'searchable' => false]),
            'product_categories_id' => new Column(['title' => __('models/trips.fields.product_categories_id'), 'data' => 'product_categories.name', 'defaultContent' => '-', 'searchable' => true, 'elmsearch' => 'dropdown', 'listItem' => $dropDownProductCategories]),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'trips_datatable_'.time();
    }
}
