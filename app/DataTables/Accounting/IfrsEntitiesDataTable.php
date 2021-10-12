<?php

namespace App\DataTables\Accounting;

use App\Models\Accounting\IfrsEntities;
use App\Repositories\Accounting\IfrsEntitiesRepository;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class IfrsEntitiesDataTable extends DataTable
{
    /**
    * example mapping filter column to search by keyword, default use %keyword%
    */
    private $columnFilterOperator = [
        'ifrs_parent.name' => \App\DataTables\FilterClass\MatchKeyword::class,        
    ];
    
    private $mapColumnSearch = [
        'ifrs_parent.name' => 'parent_id'
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
        return $dataTable->addColumn('action', 'accounting.ifrs_entities.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\IfrsEntities $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(IfrsEntities $model)
    {
        return $model->with(['ifrsParent'])->newQuery();
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
        return [            
            'name' => new Column(['title' => __('models/ifrsEntities.fields.name'), 'data' => 'name', 'searchable' => true, 'elmsearch' => 'text']),
            //'currency_id' => new Column(['title' => __('models/ifrsEntities.fields.currency_id'), 'data' => 'currency_id', 'searchable' => true, 'elmsearch' => 'text']),
            'parent_id' => new Column(['title' => __('models/ifrsEntities.fields.parent_id'), 'data' => 'ifrs_parent.name', 'defaultContent' => '-', 'searchable' => true, 'elmsearch' => 'dropdown', 'listItem' => array_merge([['value' => '', 'text' => 'Pilih parent']], $listEntity)]),
            'multi_currency' => new Column(['title' => __('models/ifrsEntities.fields.multi_currency'), 'data' => 'multi_currency', 'searchable' => false, 'elmsearch' => 'text']),
            'mid_year_balances' => new Column(['title' => __('models/ifrsEntities.fields.mid_year_balances'), 'data' => 'mid_year_balances', 'searchable' => false, 'elmsearch' => 'text']),
            'year_start' => new Column(['title' => __('models/ifrsEntities.fields.year_start'), 'data' => 'year_start', 'searchable' => true, 'elmsearch' => 'text']),            
            'locale' => new Column(['title' => __('models/ifrsEntities.fields.locale'), 'data' => 'locale', 'searchable' => false, 'elmsearch' => 'text'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ifrs_entities_datatable_' . time();
    }
}
