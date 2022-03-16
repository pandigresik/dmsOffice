<?php

namespace App\DataTables\Inventory;

use App\DataTables\BaseDataTable as DataTable;
use App\Models\Inventory\SynchronizeOutStockPicking;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class SynchronizeOutStockPickingDataTable extends DataTable
{
    protected $skipPaging = false;
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

        return $dataTable; //->addColumn('action', 'inventory.btb_view_tmps.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\SynchronizeOutStockPicking $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(SynchronizeOutStockPicking $model)
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
            //->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')])
            ->parameters([
                'dom' => 't',
                'stateSave' => true,
                'order' => [[0, 'desc']],
                'columnDefs' => [
                    [
                        'targets' => 10,
                        'checkboxes' => [
                            'selectRow' => true,
                        ],
                        'render' => <<<'STR'
                            function ( data, type, row, meta ) {                                
                                return '<input type="checkbox" name="ck['+row.id+']" data-row="'+row.id+'" class="dt-checkboxes" autocomplete="off">'
                            }
STR
                        //''
                    ],
                ],
                //    'buttons'   => $buttons,
                'language' => [
                    'url' => url('vendor/datatables/i18n/en-gb.json'),
                ],
                //'responsive' => true,
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
            'Tgl_BTB' => new Column(['title' => __('models/btbViewTmps.fields.Tgl_BTB'), 'data' => 'Tgl_BTB', 'searchable' => true, 'elmsearch' => 'text']),
            'No_BTB' => new Column(['title' => __('models/btbViewTmps.fields.No_BTB'), 'data' => 'No_BTB', 'searchable' => true, 'elmsearch' => 'text']),
            'ID_Vendor' => new Column(['title' => __('models/btbViewTmps.fields.ID_Vendor'), 'data' => 'ID_Vendor', 'searchable' => true, 'elmsearch' => 'text']),
            'Nama_Vendor' => new Column(['title' => __('models/btbViewTmps.fields.Nama_Vendor'), 'data' => 'Nama_Vendor', 'searchable' => true, 'elmsearch' => 'text']),
            'Nama_PT' => new Column(['title' => __('models/btbViewTmps.fields.Nama_PT'), 'data' => 'Nama_PT', 'searchable' => true, 'elmsearch' => 'text']),
            'No_CO' => new Column(['title' => __('models/btbViewTmps.fields.No_CO'), 'data' => 'No_CO', 'searchable' => true, 'elmsearch' => 'text']),
            'No_DN' => new Column(['title' => __('models/btbViewTmps.fields.No_DN'), 'data' => 'No_DN', 'searchable' => true, 'elmsearch' => 'text']),
            'Tgl_sjp' => new Column(['title' => __('models/btbViewTmps.fields.Tgl_sjp'), 'data' => 'Tgl_sjp', 'searchable' => true, 'elmsearch' => 'text']),
            'Depo' => new Column(['title' => __('models/btbViewTmps.fields.Depo'), 'data' => 'Depo', 'searchable' => true, 'elmsearch' => 'text']),
            'Nama_Produk' => new Column(['title' => __('models/btbViewTmps.fields.Nama_Produk'), 'data' => 'Nama_Produk', 'searchable' => true, 'elmsearch' => 'text']),
            'checkboxes' => new Column(['title' => null, 'defaultContent' => '', 'data' => null, 'searchable' => false, 'sClass' => 'text-bold']),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'btb_view_tmps_datatable_'.time();
    }
}
