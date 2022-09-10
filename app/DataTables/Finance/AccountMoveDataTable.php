<?php

namespace App\DataTables\Finance;

use App\DataTables\BaseDataTable as DataTable;
use App\Models\Base\DmsSmBranch;
use App\Models\Finance\AccountMove;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class AccountMoveDataTable extends DataTable
{
    /**
     * example mapping filter column to search by keyword, default use %keyword%.
     */
    private $columnFilterOperator = [
        'date' => \App\DataTables\FilterClass\BetweenKeyword::class,
        'branch_id' => \App\DataTables\FilterClass\MatchKeyword::class,
    ];

    private $mapColumnSearch = [
        //'depo.szName' => 'branch_id',
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

        return $dataTable->addColumn('action', 'finance.account_moves.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\AccountMove $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(AccountMove $model)
    {
        return $model->with(['depo'])->newQuery();
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
        $branchItem = array_merge([['text' => 'Pilih Depo', 'value' => ''],['text' => 'PT', 'value' => 'PT']], convertArrayPairValueWithKey(DmsSmBranch::pluck('szName', 'szId')->toArray()));

        return [
            'number' => new Column(['title' => __('models/accountMoves.fields.number'), 'data' => 'number', 'searchable' => true, 'elmsearch' => 'text']),
            'date' => new Column(['title' => __('models/accountMoves.fields.date'), 'data' => 'date', 'searchable' => true, 'elmsearch' => 'daterange']),
            'reference' => new Column(['title' => __('models/accountMoves.fields.reference'), 'data' => 'reference', 'searchable' => true, 'elmsearch' => 'text']),
            'branch_id' => new Column(['title' => __('models/accountMoves.fields.branch_id'), 'name' => 'branch_id', 'data' => 'depo.szName', 'defaultContent' => 'PT', 'orderable' => false, 'searchable' => true, 'elmsearch' => 'dropdown', 'listItem' => $branchItem]),
            //'narration' => new Column(['title' => __('models/accountMoves.fields.narration'), 'data' => 'narration', 'searchable' => true, 'elmsearch' => 'text']),
            //'state' => new Column(['title' => __('models/accountMoves.fields.state'), 'data' => 'state', 'searchable' => true, 'elmsearch' => 'text'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'account_moves_datatable_'.time();
    }
}
