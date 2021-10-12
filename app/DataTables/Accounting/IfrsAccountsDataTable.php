<?php

namespace App\DataTables\Accounting;

use Yajra\DataTables\Html\Column;
use App\Models\Accounting\IfrsAccounts;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use App\Repositories\Accounting\IfrsEntitiesRepository;
use App\Repositories\Accounting\IfrsCategoriesRepository;

class IfrsAccountsDataTable extends DataTable
{
    /**
    * example mapping filter column to search by keyword, default use %keyword%
    */
    private $columnFilterOperator = [
        'entity.name' => \App\DataTables\FilterClass\RelationMatchKeyword::class,
        'account_type' => \App\DataTables\FilterClass\MatchKeyword::class,
        'category.name' => \App\DataTables\FilterClass\RelationMatchKeyword::class,
        
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
        return $dataTable->addColumn('action', 'accounting.ifrs_accounts.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\IfrsAccounts $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(IfrsAccounts $model)
    {
        //return $model->disableModelCaching()->withoutGlobalScope('IFRS\Scopes\EntityScope')->newQuery();
        return $model->with(['entity','category'])->newQuery();
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
                       'extend' => 'import',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-upload"></i> ' .__('auth.app.import').''
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
                'dom'       => 'Brtip',
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
        $listEntity = (new IfrsEntitiesRepository(app()))->all([], null, null, ['id as value', 'name as text'])->toArray();
        $listCategory = (new IfrsCategoriesRepository(app()))->all([], null, null, ['id as value', 'name as text'])->toArray();
        $listType = convertArrayPairValueWithKey(config('ifrs')['accounts']);
        return [            
            'code' => new Column(['title' => __('models/ifrsAccounts.fields.code'), 'data' => 'code', 'searchable' => true, 'elmsearch' => 'text']),
            'name' => new Column(['title' => __('models/ifrsAccounts.fields.name'), 'data' => 'name', 'searchable' => true, 'elmsearch' => 'text']),
            'description' => new Column(['title' => __('models/ifrsAccounts.fields.description'), 'data' => 'description', 'searchable' => true, 'elmsearch' => 'text']),
            'account_type' => new Column(['title' => __('models/ifrsAccounts.fields.account_type'), 'data' => 'account_type', 'searchable' => true, 'elmsearch' => 'dropdown', 'listItem' => array_merge([['value' => '', 'text' => 'Pilih Type']], $listType)]),
            'entity_id' => new Column(['title' => __('models/ifrsAccounts.fields.entity_id'), 'data' => 'entity.name', 'searchable' => true, 'elmsearch' => 'dropdown', 'listItem' => array_merge([['value' => '', 'text' => 'Pilih Entity']], $listEntity)]),
            'category_id' => new Column(['title' => __('models/ifrsAccounts.fields.category_id'), 'data' => 'category.name','defaultContent' => '', 'searchable' => false, 'elmsearch' => 'dropdown', 'listItem' => array_merge([['value' => '', 'text' => 'Pilih Category']], $listCategory)]),
            'currency_id' => new Column(['title' => __('models/ifrsAccounts.fields.currency_id'), 'data' => 'currency_id', 'searchable' => false, 'elmsearch' => 'text']),            
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ifrs_accounts_datatable_' . time();
    }
}
