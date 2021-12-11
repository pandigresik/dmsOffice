<?php

namespace App\DataTables\Finance;

use App\Models\Finance\PaymentOut;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class PaymentOutDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'finance.payments_out.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Payment $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(PaymentOut $model)
    {
        return $model->whereType(PaymentOut::TYPE)->readyToPay()->newQuery();
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
            ->initComplete('function( settings, json ){ $(this).find(\'[data-toggle=tooltip]\').tooltip()}')
            ->parameters([
                'dom' => 'Brtip',
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
            'number' => new Column(['title' => __('models/payments.fields.number'), 'data' => 'number', 'searchable' => true, 'elmsearch' => 'text']),
            'type' => new Column(['title' => __('models/payments.fields.type'), 'data' => 'type', 'searchable' => true, 'elmsearch' => 'text']),
            'reference' => new Column(['title' => __('models/payments.fields.reference'), 'data' => 'reference', 'searchable' => true, 'elmsearch' => 'text']),
            'state' => new Column(['title' => __('models/payments.fields.state'), 'data' => 'state', 'searchable' => true, 'elmsearch' => 'text']),
            'estimate_date' => new Column(['title' => __('models/payments.fields.estimate_date'), 'data' => 'estimate_date', 'searchable' => true, 'elmsearch' => 'text']),
            'pay_date' => new Column(['title' => __('models/payments.fields.pay_date'), 'data' => 'pay_date', 'searchable' => true, 'elmsearch' => 'text']),
            'amount' => new Column(['title' => __('models/payments.fields.amount'), 'data' => 'amount', 'searchable' => true, 'elmsearch' => 'text']),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'payments_datatable_'.time();
    }
}
