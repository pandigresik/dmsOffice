<?php

namespace App\DataTables\Accounting;

use App\Models\Accounting\ShippingCostManual;
use App\DataTables\BaseDataTable as DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class ShippingCostManualDataTable extends DataTable
{
    /**
    * example mapping filter column to search by keyword, default use %keyword%
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
     * @param mixed $query Results from query() method.
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
        $dataTable->editColumn('amount', function($item){

            return '<div class="text-right">'.localNumberFormat($item['amount']).'</div>';
        })->escapeColumns([]);
        return $dataTable->addColumn('action', 'accounting.shipping_cost_manuals.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ShippingCostManual $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ShippingCostManual $model)
    {
        return $model->with(['ekspedisi', 'originBranch', 'destinationBranch'])->newQuery();
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
                       'text' => '<i class="fa fa-plus"></i> ' .__('auth.app.create').''
                    ],
                    [
                       'extend' => 'export',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-download"></i> ' .__('auth.app.export').''
                    ],
                    [
                       'extend' => 'import',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-upload"></i> ' .__('auth.app.import').''
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
                ];
                
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')])
            ->parameters([
                'dom'       => 'Brtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => $buttons,
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
            'number' => new Column(['title' => __('models/shippingCostManuals.fields.number'), 'data' => 'number', 'searchable' => true, 'elmsearch' => 'text']),
            'origin_branch_id' => new Column(['title' => __('models/shippingCostManuals.fields.origin_branch_id'), 'data' => 'origin_branch.szName', 'searchable' => true, 'elmsearch' => 'text']),
            'destination_branch_id' => new Column(['title' => __('models/shippingCostManuals.fields.destination_branch_id'), 'data' => 'destination_branch.szName', 'searchable' => true, 'elmsearch' => 'text']),
            'carrier_id' => new Column(['title' => __('models/shippingCostManuals.fields.carrier_id'), 'data' => 'ekspedisi.szName', 'searchable' => true, 'elmsearch' => 'text']),
            'date' => new Column(['title' => __('models/shippingCostManuals.fields.date'), 'data' => 'date', 'searchable' => true, 'elmsearch' => 'text']),
            'do_references' => new Column(['title' => __('models/shippingCostManuals.fields.do_references'), 'data' => 'do_references', 'searchable' => true, 'elmsearch' => 'text']),
            'sj_references' => new Column(['title' => __('models/shippingCostManuals.fields.sj_references'), 'data' => 'sj_references', 'searchable' => true, 'elmsearch' => 'text']),
            'amount' => new Column(['title' => __('models/shippingCostManuals.fields.amount'), 'data' => 'amount', 'searchable' => true, 'elmsearch' => 'text'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'shipping_cost_manuals_datatable_' . time();
    }
}
