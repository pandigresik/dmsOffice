<?php

namespace App\DataTables\Accounting;

use App\Models\Accounting\AccountType;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class AccountTypeDataTable extends DataTable
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
        return $dataTable->editcolumn('include_initial_balance', function($m){

            return $m->include_initial_balance ? 'Ya' : 'Tidak';
        })        
        ->addColumn('action', 'accounting.account_types.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\AccountType $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(AccountType $model)
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
                        
        $listItem = [['value' => '', 'text' => 'Pilih type'],['value' => 'receivable', 'text' =>  'receivable'],['value' => 'payable', 'text' => 'payable'],['value' => 'other', 'text' => 'other'],['value' => 'liquidity', 'text' =>  'liquidity']];
        $listGroup = [['value' => '', 'text' => 'Pilih group'],['value' => 'asset', 'text' =>  'asset' ],['value' => 'liability', 'text' =>  'liability' ], ['value' => 'equity', 'text' => 'equity'],['value' => 'income', 'text' =>  'income' ], ['value' => 'expense', 'text' => 'expense'],['value' => 'off_balance', 'text' =>  'off_balance']];
        return [
            'name' => new Column(['title' => __('models/accountTypes.fields.name'), 'data' => 'name', 'searchable' => true, 'elmsearch' => 'text']),
            'include_initial_balance' => new Column(['title' => __('models/accountTypes.fields.include_initial_balance'), 'data' => 'include_initial_balance', 'searchable' => true, 'elmsearch' => 'text']),
            'type' => new Column(['title' => __('models/accountTypes.fields.type'), 'data' => 'type', 'searchable' => true, 'elmsearch' => 'dropdown', 'listItem' => $listItem]),
            'internal_group' => new Column(['title' => __('models/accountTypes.fields.internal_group'), 'data' => 'internal_group', 'searchable' => true, 'elmsearch' => 'dropdown', 'listItem' => $listGroup]),
            'note' => new Column(['title' => __('models/accountTypes.fields.note'), 'data' => 'note', 'searchable' => true, 'elmsearch' => 'text'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'account_types_datatable_' . time();
    }
}
