<?php

namespace App\DataTables\Finance;

use App\Models\Finance\DebitCreditNote;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class DebitCreditNoteDataTable extends DataTable
{
    /**
     * example mapping filter column to search by keyword, default use %keyword%.
     */
    private $columnFilterOperator = [
        'partner_type' => \App\DataTables\FilterClass\MatchKeyword::class,
        'invoice.number' => \App\DataTables\FilterClass\RelationContainKeyword::class,
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

        return $dataTable->addColumn('action', 'finance.debit_credit_notes.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\DebitCreditNote $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(DebitCreditNote $model)
    {
        return $model->with(['invoice'])->newQuery();
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
            // [
            //    'extend' => 'import',
            //    'className' => 'btn btn-default btn-sm no-corner',
            //    'text' => '<i class="fa fa-upload"></i> ' .__('auth.app.import').''
            // ],
            // [
            //    'extend' => 'print',
            //    'className' => 'btn btn-default btn-sm no-corner',
            //    'text' => '<i class="fa fa-print"></i> ' .__('auth.app.print').''
            // ],
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
        $dropDownPartnerType = array_merge([['value' => '', 'text' => __('crud.option.partner_type_placeholder')]], convertArrayPairValueWithKey(DebitCreditNote::PARTNER_TYPE));

        return [
            'number' => new Column(['title' => __('models/debitCreditNotes.fields.number'), 'data' => 'number', 'searchable' => true, 'elmsearch' => 'text']),
            //'type' => new Column(['title' => __('models/debitCreditNotes.fields.type'), 'data' => 'type', 'searchable' => true, 'elmsearch' => 'text']),
            'partner_type' => new Column(['title' => __('models/debitCreditNotes.fields.partner_type'), 'data' => 'partner_type', 'searchable' => true, 'elmsearch' => 'dropdown', 'listItem' => $dropDownPartnerType]),
            //'partner_id' => new Column(['title' => __('models/debitCreditNotes.fields.partner_id'), 'data' => 'partner_id', 'searchable' => true, 'elmsearch' => 'text']),
            'issue_date' => new Column(['title' => __('models/debitCreditNotes.fields.issue_date'), 'data' => 'issue_date', 'searchable' => true, 'elmsearch' => 'datesingle']),
            'reference' => new Column(['title' => __('models/debitCreditNotes.fields.reference'), 'data' => 'reference', 'searchable' => true, 'elmsearch' => 'text']),
            'invoice_id' => new Column(['title' => __('models/debitCreditNotes.fields.invoice_id'), 'data' => 'invoice.number', 'searchable' => true, 'elmsearch' => 'text']),
            'amount' => new Column(['title' => __('models/debitCreditNotes.fields.amount'), 'data' => 'amount', 'searchable' => false, 'elmsearch' => 'text']),
            'description' => new Column(['title' => __('models/debitCreditNotes.fields.description'), 'data' => 'description', 'searchable' => false, 'elmsearch' => 'text']),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'debit_credit_notes_datatable_'.time();
    }
}
