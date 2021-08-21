<?php

namespace App\DataTables\Accounting;

use App\Models\Accounting\AccountJournal;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class AccountJournalDataTable extends DataTable
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
        return $dataTable->addColumn('action', 'accounting.account_journals.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\AccountJournal $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(AccountJournal $model)
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
            'name' => new Column(['title' => __('models/accountJournals.fields.name'), 'data' => 'name', 'searchable' => true, 'elmsearch' => 'text']),
            'code' => new Column(['title' => __('models/accountJournals.fields.code'), 'data' => 'code', 'searchable' => true, 'elmsearch' => 'text']),
            'company_id' => new Column(['title' => __('models/accountJournals.fields.company_id'), 'data' => 'company_id', 'searchable' => true, 'elmsearch' => 'text']),
            'default_debit_account_id' => new Column(['title' => __('models/accountJournals.fields.default_debit_account_id'), 'data' => 'default_debit_account_id', 'searchable' => true, 'elmsearch' => 'text']),
            'default_credit_account_id' => new Column(['title' => __('models/accountJournals.fields.default_credit_account_id'), 'data' => 'default_credit_account_id', 'searchable' => true, 'elmsearch' => 'text']),
            'type' => new Column(['title' => __('models/accountJournals.fields.type'), 'data' => 'type', 'searchable' => true, 'elmsearch' => 'text'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'account_journals_datatable_' . time();
    }
}
