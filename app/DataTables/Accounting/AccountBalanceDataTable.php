<?php

namespace App\DataTables\Accounting;

use App\Models\Accounting\AccountBalance;
use App\DataTables\BaseDataTable as DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class AccountBalanceDataTable extends DataTable
{
    /**
    * example mapping filter column to search by keyword, default use %keyword%
    */
    private $columnFilterOperator = [
        'account.name' => \App\DataTables\FilterClass\RelationContainKeyword::class,
        'balance_date' => \App\DataTables\FilterClass\BetweenKeyword::class,
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
        return $dataTable; //->addColumn('action', 'accounting.account_balances.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\AccountBalance $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(AccountBalance $model)
    {
        return $model->with(['account'])->newQuery();
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
                'dom'       => '<"row" <"col-md-6"B><"col-md-6 text-right"l>>rtip',
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
            'balance_date' => new Column(['title' => __('models/accountBalances.fields.balance_date'), 'data' => 'balance_date', 'searchable' => true, 'elmsearch' => 'daterange']),
            'code' => new Column(['title' => __('models/accountBalances.fields.code'), 'data' => 'code', 'searchable' => true, 'elmsearch' => 'text']),
            'name' => new Column(['title' => __('models/accountBalances.fields.name'), 'data' => 'account.name', 'searchable' => true, 'elmsearch' => 'text']),
            'amount' => new Column(['title' => __('models/accountBalances.fields.amount'), 'data' => 'amount', 'searchable' => false, 'elmsearch' => 'text']),
            
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'account_balances_datatable_' . time();
    }
}
