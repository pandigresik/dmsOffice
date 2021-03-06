<?php

namespace App\DataTables\Base;

use App\DataTables\BaseDataTable as DataTable;
use App\Models\Base\Vendor;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class VendorDataTable extends DataTable
{
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

        return $dataTable->editColumn('is_supplier', function ($m) {
            return $m->is_supplier ? 'Ya' : 'Tidak';
        })->editColumn('is_customer', function ($m) {
            return $m->is_customer ? 'Ya' : 'Tidak';
        })->editColumn('is_expedition', function ($m) {
            return $m->is_expedition ? 'Ya' : 'Tidak';
        })->addColumn('action', 'base.vendors.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Vendor $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Vendor $model)
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
                'dom' => '<"row" <"col-md-6"B><"col-md-6 text-right"l>>rtip',
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
            'name' => new Column(['title' => __('models/vendors.fields.name'), 'data' => 'name', 'searchable' => true, 'elmsearch' => 'text']),
            'address' => new Column(['title' => __('models/vendors.fields.address'), 'data' => 'address', 'searchable' => true, 'elmsearch' => 'text']),
            'email' => new Column(['title' => __('models/vendors.fields.email'), 'data' => 'email', 'searchable' => true, 'elmsearch' => 'text']),
            'is_supplier' => new Column(['title' => __('models/vendors.fields.is_supplier'), 'data' => 'is_supplier', 'searchable' => true, 'elmsearch' => 'text']),
            'is_expedition' => new Column(['title' => __('models/vendors.fields.is_expedition'), 'data' => 'is_expedition', 'searchable' => true, 'elmsearch' => 'text']),
            'is_customer' => new Column(['title' => __('models/vendors.fields.is_customer'), 'data' => 'is_customer', 'searchable' => true, 'elmsearch' => 'text']),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'vendors_datatable_'.time();
    }
}
