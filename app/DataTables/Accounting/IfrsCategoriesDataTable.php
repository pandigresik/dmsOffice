<?php

namespace App\DataTables\Accounting;

use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use App\Models\Accounting\IfrsCategories;
use App\Repositories\Accounting\IfrsEntitiesRepository;

class IfrsCategoriesDataTable extends DataTable
{
    /**
    * example mapping filter column to search by keyword, default use %keyword%
    */
    private $columnFilterOperator = [
        'entity.name' => \App\DataTables\FilterClass\MatchKeyword::class, 
        'category_type' => \App\DataTables\FilterClass\MatchKeyword::class       
    ];

    private $mapColumnSearch = [
        'entity.name' => 'entity_id'
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
        return $dataTable->addColumn('action', 'accounting.ifrs_categories.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\IfrsCategories $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(IfrsCategories $model)
    {
        return $model->with(['entity'])->newQuery();
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
        $listCategory = convertArrayPairValueWithKey(config('ifrs')['accounts']);
        return [            
            'name' => new Column(['title' => __('models/ifrsCategories.fields.name'), 'data' => 'name', 'searchable' => true, 'elmsearch' => 'text']),            
            'entity_id' => new Column(['title' => __('models/ifrsCategories.fields.entity_id'), 'data' => 'entity.name',  'searchable' => true, 'elmsearch' => 'dropdown', 'listItem' => array_merge([['value' => '', 'text' => 'Pilih Entity']], $listEntity)]),
            'category_type' => new Column(['title' => __('models/ifrsCategories.fields.category_type'), 'data' => 'category_type', 'searchable' => true, 'elmsearch' => 'dropdown', 'listItem' => array_merge([['value' => '', 'text' => 'Pilih Category']],$listCategory)]),
        ];

    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ifrs_categories_datatable_' . time();
    }
}
