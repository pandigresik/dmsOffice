<?php

namespace App\DataTables\Accounting;

use App\Models\Accounting\AccountAccount;
use App\Repositories\Base\CompanyRepository;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class AccountAccountDataTable extends DataTable
{
    /**
    * example mapping filter column to search by keyword, default use %keyword%
    */
    private $columnFilterOperator = [
        'company.name' => \App\DataTables\FilterClass\MatchKeyword::class,        
    ];

    private $mapColumnSearch = [
        'company.name' => 'company_id'
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
        return $dataTable->addColumn('action', 'accounting.account_accounts.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\AccountAccount $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(AccountAccount $model)
    {
        return $model->with(['company'])->newQuery();
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
        $listCompany = array_merge([['value' => '', 'text' => 'Pilih company']], (new CompanyRepository(app()))->all([],['id as value','name as text'])->toArray());
        $listInternalType = array_merge([['value' => '', 'text' => 'Pilih group']], convertArrayPairValue(['receivable', 'payable', 'other', 'liquidity']));
        $listInternalGroup = array_merge([['value' => '', 'text' => 'Pilih type']], convertArrayPairValue(['asset', 'liability', 'equity', 'income', 'expense', 'off_balance']));
        $listState = [['value' => '', 'text' => 'Pilih Status'], ['value' => '1', 'text' => 'Ya'], ['value' => '0', 'text' => 'Tidak']];
        return [
            'name' => new Column(['title' => __('models/accountAccounts.fields.name'), 'data' => 'name', 'searchable' => true, 'elmsearch' => 'text']),
            'code' => new Column(['title' => __('models/accountAccounts.fields.code'), 'data' => 'code', 'searchable' => true, 'elmsearch' => 'text']),
            'company_id' => new Column(['title' => __('models/accountAccounts.fields.company_id'), 'data' => 'company.name', 'searchable' => true, 'elmsearch' => 'dropdown','listItem' => $listCompany]),
            'is_off_balance' => new Column(['title' => __('models/accountAccounts.fields.is_off_balance'), 'data' => 'is_off_balance', 'searchable' => true, 'elmsearch' => 'dropdown', 'listItem' => $listState ]),
            'reconcile' => new Column(['title' => __('models/accountAccounts.fields.reconcile'), 'data' => 'reconcile', 'searchable' => true, 'elmsearch' => 'dropdown', 'listItem' => $listState]),
            'internal_type' => new Column(['title' => __('models/accountAccounts.fields.internal_type'), 'data' => 'internal_type', 'searchable' => true, 'elmsearch' => 'dropdown', 'listItem' => $listInternalType]),
            'internal_group' => new Column(['title' => __('models/accountAccounts.fields.internal_group'), 'data' => 'internal_group', 'searchable' => true, 'elmsearch' => 'dropdown', 'listItem' => $listInternalGroup]),
            'note' => new Column(['title' => __('models/accountAccounts.fields.note'), 'data' => 'note', 'searchable' => true, 'elmsearch' => 'text'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'account_accounts_datatable_' . time();
    }
}
