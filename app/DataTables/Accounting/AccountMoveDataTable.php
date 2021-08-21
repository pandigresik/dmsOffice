<?php

namespace App\DataTables\Accounting;

use App\Models\Accounting\AccountMove;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class AccountMoveDataTable extends DataTable
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
        return $dataTable->addColumn('action', 'accounting.account_moves.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\AccountMove $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(AccountMove $model)
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
            'name' => new Column(['title' => __('models/accountMoves.fields.name'), 'data' => 'name', 'searchable' => true, 'elmsearch' => 'text']),
            'company_id' => new Column(['title' => __('models/accountMoves.fields.company_id'), 'data' => 'company_id', 'searchable' => true, 'elmsearch' => 'text']),
            'account_journal_id' => new Column(['title' => __('models/accountMoves.fields.account_journal_id'), 'data' => 'account_journal_id', 'searchable' => true, 'elmsearch' => 'text']),
            'ref' => new Column(['title' => __('models/accountMoves.fields.ref'), 'data' => 'ref', 'searchable' => true, 'elmsearch' => 'text']),
            'date' => new Column(['title' => __('models/accountMoves.fields.date'), 'data' => 'date', 'searchable' => true, 'elmsearch' => 'text']),
            'state' => new Column(['title' => __('models/accountMoves.fields.state'), 'data' => 'state', 'searchable' => true, 'elmsearch' => 'text']),
            'amount' => new Column(['title' => __('models/accountMoves.fields.amount'), 'data' => 'amount', 'searchable' => true, 'elmsearch' => 'text']),
            'move_type' => new Column(['title' => __('models/accountMoves.fields.move_type'), 'data' => 'move_type', 'searchable' => true, 'elmsearch' => 'text']),
            'narration' => new Column(['title' => __('models/accountMoves.fields.narration'), 'data' => 'narration', 'searchable' => true, 'elmsearch' => 'text']),
            'stock_picking_id' => new Column(['title' => __('models/accountMoves.fields.stock_picking_id'), 'data' => 'stock_picking_id', 'searchable' => true, 'elmsearch' => 'text'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'account_moves_datatable_' . time();
    }
}
