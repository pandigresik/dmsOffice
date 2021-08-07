<?php

namespace App\DataTables;

use App\Models\Customers;
use App\Exports\CustomersExport;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class CustomersDataTable extends DataTable
{
    protected $exportClass = CustomersExport::class;
    /**
     * example mapping filter column to search by keyword, default use %keyword%.
     */
    private $columnFilterOperator = [
        //'name' => \App\DataTables\FilterClass\MatchKeyword::class,
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


        return $dataTable; //->addColumn('action', 'customers.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Customers $model)
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
            //->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')])
            ->parameters([
                'dom' => 'Brtip',
                'stateSave' => false,
                'order' => [[0, 'desc']],
                'columnDefs' => [
                    [
                        'targets' => 6,
                        'checkboxes' => [
                            'selectRow' => true,
                        ],                        
                        'render' => <<<STR
                            function ( data, type, row, meta ) {                                
                                return '<input type="checkbox" name="ck['+row.id+']" data-row="'+row.id+'" class="dt-checkboxes" autocomplete="off">'
                            }
STR                            
                        //''
                    ],
                ],
                // 'select' => [
                //     'style' => 'multi',
                // ],
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
            'name' => new Column(['title' => __('models/customers.fields.name'), 'data' => 'name', 'searchable' => true, 'elmsearch' => 'text']),
            'email' => new Column(['title' => __('models/customers.fields.email'), 'data' => 'email', 'searchable' => true, 'elmsearch' => 'text']),
            'hp_number' => new Column(['title' => __('models/customers.fields.hp_number'), 'data' => 'hp_number', 'searchable' => true, 'elmsearch' => 'text']),
            'address' => new Column(['title' => __('models/customers.fields.address'), 'data' => 'address', 'searchable' => true, 'elmsearch' => 'text']),
            'city' => new Column(['title' => __('models/customers.fields.city'), 'data' => 'city', 'searchable' => true, 'elmsearch' => 'text']),
            'country' => new Column(['title' => __('models/customers.fields.country'), 'data' => 'country', 'searchable' => true, 'elmsearch' => 'text']),
            'checkboxes' => new Column(['title' => null, 'defaultContent' => '' , 'data' => null, 'searchable' => false, 'sClass' => 'text-bold']),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'customers_datatable_'.time();
    }
}
