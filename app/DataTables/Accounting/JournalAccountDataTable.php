<?php

namespace App\DataTables\Accounting;

use App\DataTables\BaseDataTable as DataTable;
use App\Models\Accounting\JournalAccount;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class JournalAccountDataTable extends DataTable
{
    /**
     * example mapping filter column to search by keyword, default use %keyword%.
     */
    private $columnFilterOperator = [
        'date' => \App\DataTables\FilterClass\BetweenKeyword::class,
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
        $dataTable->editColumn('debit', function ($item) {
            return '<div class="text-right">'.localNumberFormat($item['debit']).'</div>';
        })->editColumn('credit', function ($item) {
            return '<div class="text-right">'.localNumberFormat($item['credit']).'</div>';
        })->editColumn('balance', function ($item) {
            return '<div class="text-right">'.localNumberFormat($item['balance']).'</div>';
        })->editColumn('date', function ($item) {
            return '<div class="text-right">'.localFormatDate($item['date']).'</div>';
        })
            ->escapeColumns([])
        ;

        return $dataTable; //->addColumn('action', 'accounting.journal_accounts.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\JournalAccount $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(JournalAccount $model)
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
        return [
            'account_id' => new Column(['title' => __('models/journalAccounts.fields.account_id'), 'data' => 'account_id', 'searchable' => true, 'elmsearch' => 'text']),
            'branch_id' => new Column(['title' => __('models/journalAccounts.fields.branch_id'), 'data' => 'branch_id', 'searchable' => true, 'elmsearch' => 'text']),
            'description' => new Column(['title' => __('models/journalAccounts.fields.description'), 'data' => 'description', 'searchable' => true, 'elmsearch' => 'text']),
            'reference' => new Column(['title' => __('models/journalAccounts.fields.reference'), 'data' => 'reference', 'searchable' => true, 'elmsearch' => 'text']),
            'name' => new Column(['title' => __('models/journalAccounts.fields.name'), 'data' => 'name', 'searchable' => true, 'elmsearch' => 'text']),
            'debit' => new Column(['title' => __('models/journalAccounts.fields.debit'), 'data' => 'debit', 'searchable' => false, 'elmsearch' => 'text']),
            'credit' => new Column(['title' => __('models/journalAccounts.fields.credit'), 'data' => 'credit', 'searchable' => false, 'elmsearch' => 'text']),
            'balance' => new Column(['title' => __('models/journalAccounts.fields.balance'), 'data' => 'balance', 'searchable' => false, 'elmsearch' => 'text']),
            'date' => new Column(['title' => __('models/journalAccounts.fields.date'), 'data' => 'date', 'searchable' => true, 'elmsearch' => 'daterange']),
            'type' => new Column(['title' => __('models/journalAccounts.fields.type'), 'data' => 'type', 'searchable' => true, 'elmsearch' => 'text']),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'journal_accounts_datatable_'.time();
    }
}
