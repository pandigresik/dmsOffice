<?php

namespace App\DataTables\Accounting;

use App\Models\Accounting\IfrsExchangeRates;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class IfrsExchangeRatesDataTable extends DataTable
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
        if (!empty($this->columnFilterOperator)) {
            foreach ($this->columnFilterOperator as $column => $operator) {
                $dataTable->filterColumn($column, new $operator($column));
            }
        }
        return $dataTable->addColumn('action', 'accounting.ifrs_exchange_rates.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\IfrsExchangeRates $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(IfrsExchangeRates $model)
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
            'entity_id' => new Column(['title' => __('models/ifrsExchangeRates.fields.entity_id'), 'data' => 'entity_id', 'searchable' => true, 'elmsearch' => 'text']),
            'currency_id' => new Column(['title' => __('models/ifrsExchangeRates.fields.currency_id'), 'data' => 'currency_id', 'searchable' => true, 'elmsearch' => 'text']),
            'valid_from' => new Column(['title' => __('models/ifrsExchangeRates.fields.valid_from'), 'data' => 'valid_from', 'searchable' => true, 'elmsearch' => 'text']),
            'valid_to' => new Column(['title' => __('models/ifrsExchangeRates.fields.valid_to'), 'data' => 'valid_to', 'searchable' => true, 'elmsearch' => 'text']),
            'rate' => new Column(['title' => __('models/ifrsExchangeRates.fields.rate'), 'data' => 'rate', 'searchable' => true, 'elmsearch' => 'text']),
            'destroyed_at' => new Column(['title' => __('models/ifrsExchangeRates.fields.destroyed_at'), 'data' => 'destroyed_at', 'searchable' => true, 'elmsearch' => 'text'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ifrs_exchange_rates_datatable_' . time();
    }
}
