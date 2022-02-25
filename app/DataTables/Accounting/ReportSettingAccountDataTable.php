<?php

namespace App\DataTables\Accounting;

use App\Models\Accounting\ReportSettingAccount;
use App\DataTables\BaseDataTable as DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class ReportSettingAccountDataTable extends DataTable
{
    /**
    * example mapping filter column to search by keyword, default use %keyword%
    */
    private $columnFilterOperator = [
        'group_type' => \App\DataTables\FilterClass\MatchKeyword::class,
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
        $dataTable->editColumn('group_type', function($item){            

            return ReportSettingAccount::GROUP_TYPE[$item->group_type] ?? '-';
        });
        return $dataTable->addColumn('action', 'accounting.report_setting_accounts.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ReportSettingAccount $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ReportSettingAccount $model)
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
            'code' => new Column(['title' => __('models/reportSettingAccounts.fields.code'), 'data' => 'code', 'searchable' => true, 'elmsearch' => 'text']),
            'group' => new Column(['title' => __('models/reportSettingAccounts.fields.group'), 'data' => 'group', 'searchable' => true, 'elmsearch' => 'text']),
            'group_type' => new Column(['title' => __('models/reportSettingAccounts.fields.group_type'), 'data' => 'group_type', 'searchable' => true, 'elmsearch' => 'dropdown', 'listItem' => convertArrayPairValueWithKey(['' => 'Pilih type'] + ReportSettingAccount::GROUP_TYPE)])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'report_setting_accounts_datatable_' . time();
    }
}
