<?php

namespace App\DataTables;

use App\Models\BookableBookings;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class BookableBookingsDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'bookable_bookings.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\BookableBookings $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(BookableBookings $model)
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
            'bookable_type' => new Column(['title' => __('models/bookableBookings.fields.bookable_type'), 'data' => 'bookable_type', 'searchable' => true, 'elmsearch' => 'text']),
            'bookable_id' => new Column(['title' => __('models/bookableBookings.fields.bookable_id'), 'data' => 'bookable_id', 'searchable' => true, 'elmsearch' => 'text']),
            'customer_type' => new Column(['title' => __('models/bookableBookings.fields.customer_type'), 'data' => 'customer_type', 'searchable' => true, 'elmsearch' => 'text']),
            'customer_id' => new Column(['title' => __('models/bookableBookings.fields.customer_id'), 'data' => 'customer_id', 'searchable' => true, 'elmsearch' => 'text']),
            'starts_at' => new Column(['title' => __('models/bookableBookings.fields.starts_at'), 'data' => 'starts_at', 'searchable' => true, 'elmsearch' => 'text']),
            'ends_at' => new Column(['title' => __('models/bookableBookings.fields.ends_at'), 'data' => 'ends_at', 'searchable' => true, 'elmsearch' => 'text']),
            'canceled_at' => new Column(['title' => __('models/bookableBookings.fields.canceled_at'), 'data' => 'canceled_at', 'searchable' => true, 'elmsearch' => 'text']),
            'timezone' => new Column(['title' => __('models/bookableBookings.fields.timezone'), 'data' => 'timezone', 'searchable' => true, 'elmsearch' => 'text']),
            'price' => new Column(['title' => __('models/bookableBookings.fields.price'), 'data' => 'price', 'searchable' => true, 'elmsearch' => 'text']),
            'quantity' => new Column(['title' => __('models/bookableBookings.fields.quantity'), 'data' => 'quantity', 'searchable' => true, 'elmsearch' => 'text']),
            'total_paid' => new Column(['title' => __('models/bookableBookings.fields.total_paid'), 'data' => 'total_paid', 'searchable' => true, 'elmsearch' => 'text']),
            'currency' => new Column(['title' => __('models/bookableBookings.fields.currency'), 'data' => 'currency', 'searchable' => true, 'elmsearch' => 'text']),
            'formula' => new Column(['title' => __('models/bookableBookings.fields.formula'), 'data' => 'formula', 'searchable' => true, 'elmsearch' => 'text']),
            'options' => new Column(['title' => __('models/bookableBookings.fields.options'), 'data' => 'options', 'searchable' => true, 'elmsearch' => 'text']),
            'notes' => new Column(['title' => __('models/bookableBookings.fields.notes'), 'data' => 'notes', 'searchable' => true, 'elmsearch' => 'text'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'bookable_bookings_datatable_' . time();
    }
}
