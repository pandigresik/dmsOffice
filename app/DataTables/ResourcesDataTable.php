<?php

namespace App\DataTables;

use App\Models\Resources;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class ResourcesDataTable extends DataTable
{

    /**
     * define operator column
     * 
     */
    private $columnFilterOperator = [
        'name' => \App\DataTables\FilterClass\MatchKeyword::class,
        'description' => \App\DataTables\FilterClass\EndWithKeyword::class,
        'grup' => \App\DataTables\FilterClass\BetweenKeyword::class
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
        if(!empty($this->columnFilterOperator)){
            foreach($this->columnFilterOperator as $column => $operator){
                $dataTable->filterColumn($column, new $operator($column));    
            }
        }
        
        return $dataTable->addColumn('action', 'resources.datatables_actions');
    }



    /**
     * Get query source of dataTable.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Resources $model)
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
                'dom' => 'Brtip',
                'stateSave' => true,
                'order' => [[0, 'desc']],
                'buttons' => [
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
                ],
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
        return [
            'grup' => new Column(['title' => __('models/resources.fields.grup'), 'data' => 'grup', 'searchable' => true, 'elmsearch' => 'numberrange']),
            'name' => new Column(['title' => __('models/resources.fields.name'), 'data' => 'name', 'searchable' => true, 'elmsearch' => 'text']),
            'description' => new Column(['title' => __('models/resources.fields.description'), 'data' => 'description', 'searchable' => true, 'elmsearch' => 'dropdown', 'listItem' => [['value' => '', 'text' => 'Pilih Status'],['value' => '1', 'text' => 'Aktif'],['value' => '0', 'text' => 'Non Aktif']]]),
            'specification' => new Column(['title' => __('models/resources.fields.specification'), 'data' => 'specification', 'searchable' => false]),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'resources_datatable_'.time();
    }
}

