<?php

namespace App\DataTables;

use App\Models\BookableAvailabilities;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class BookableAvailabilitiesDataTable extends DataTable
{
    /**
    * example mapping filter column to search by keyword, default use %keyword%
    */
    private $columnFilterOperator = [
        //'name' => \App\DataTables\FilterClass\MatchKeyword::class,        
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

        return $dataTable->addColumn('action', 'bookable_availabilities.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\BookableAvailabilities $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(BookableAvailabilities $model)
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
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')])
            ->parameters([
                'dom'       => 'Brtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
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
                ],
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
            'bookable_type' => new Column(['title' => __('models/bookableAvailabilities.fields.bookable_type'), 'data' => 'bookable_type', 'searchable' => true, 'elmsearch' => 'text']),
            'bookable_id' => new Column(['title' => __('models/bookableAvailabilities.fields.bookable_id'), 'data' => 'bookable_id', 'searchable' => true, 'elmsearch' => 'text']),
            'range' => new Column(['title' => __('models/bookableAvailabilities.fields.range'), 'data' => 'range', 'searchable' => true, 'elmsearch' => 'text']),
            'from' => new Column(['title' => __('models/bookableAvailabilities.fields.from'), 'data' => 'from', 'searchable' => true, 'elmsearch' => 'text']),
            'to' => new Column(['title' => __('models/bookableAvailabilities.fields.to'), 'data' => 'to', 'searchable' => true, 'elmsearch' => 'text']),
            'is_bookable' => new Column(['title' => __('models/bookableAvailabilities.fields.is_bookable'), 'data' => 'is_bookable', 'searchable' => true, 'elmsearch' => 'text']),
            'priority' => new Column(['title' => __('models/bookableAvailabilities.fields.priority'), 'data' => 'priority', 'searchable' => true, 'elmsearch' => 'text'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'bookable_availabilities_datatable_' . time();
    }
}
