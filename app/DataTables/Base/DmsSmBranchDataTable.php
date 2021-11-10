<?php

namespace App\DataTables\Base;

use App\Models\Base\DmsSmBranch;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class DmsSmBranchDataTable extends DataTable
{
    /**
    * example mapping filter column to search by keyword, default use %keyword%
    */
    private $columnFilterOperator = [
        //'name' => \App\DataTables\FilterClass\MatchKeyword::class,        
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
        $dataTable->editColumn('szDistrict',function($p){

            return '<div class="text-wrap" style="width:200px;">'.$p->szDistrict.'</div>';
        })->editColumn('szCity',function($p){

            return '<div class="text-wrap" style="width:150px;">'.$p->szCity.'</div>';
        })->escapeColumns([]);;
        return $dataTable->addColumn('action', 'base.dms_sm_branches.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\DmsSmBranch $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(DmsSmBranch $model)
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
                    // [
                    //    'extend' => 'create',
                    //    'className' => 'btn btn-default btn-sm no-corner',
                    //    'text' => '<i class="fa fa-plus"></i> ' .__('auth.app.create').''
                    // ],
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
                 //'responsive' => true,
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
            'szId' => new Column(['title' => __('models/dmsSmBranches.fields.szId'), 'data' => 'szId', 'searchable' => true, 'elmsearch' => 'text']),
            'szName' => new Column(['title' => __('models/dmsSmBranches.fields.szName'), 'data' => 'szName', 'searchable' => true, 'elmsearch' => 'text']),
            //'szDescription' => new Column(['title' => __('models/dmsSmBranches.fields.szDescription'), 'data' => 'szDescription', 'searchable' => true, 'elmsearch' => 'text']),
            // 'szCompanyId' => new Column(['title' => __('models/dmsSmBranches.fields.szCompanyId'), 'data' => 'szCompanyId', 'searchable' => true, 'elmsearch' => 'text']),
            // 'szLangitude' => new Column(['title' => __('models/dmsSmBranches.fields.szLangitude'), 'data' => 'szLangitude', 'searchable' => true, 'elmsearch' => 'text']),
            // 'szLongitude' => new Column(['title' => __('models/dmsSmBranches.fields.szLongitude'), 'data' => 'szLongitude', 'searchable' => true, 'elmsearch' => 'text']),
            // 'szTaxEntityId' => new Column(['title' => __('models/dmsSmBranches.fields.szTaxEntityId'), 'data' => 'szTaxEntityId', 'searchable' => true, 'elmsearch' => 'text']),
            //'szProvince' => new Column(['title' => __('models/dmsSmBranches.fields.szProvince'), 'data' => 'szProvince', 'searchable' => true, 'elmsearch' => 'text']),
            'szCity' => new Column(['title' => __('models/dmsSmBranches.fields.szCity'), 'data' => 'szCity', 'searchable' => true, 'elmsearch' => 'text']),
            'szDistrict' => new Column(['title' => __('models/dmsSmBranches.fields.szDistrict'), 'data' => 'szDistrict', 'searchable' => false, 'elmsearch' => 'text']),
            // 'szSubDistrict' => new Column(['title' => __('models/dmsSmBranches.fields.szSubDistrict'), 'data' => 'szSubDistrict', 'searchable' => true, 'elmsearch' => 'text']),
            // 'szUserCreatedId' => new Column(['title' => __('models/dmsSmBranches.fields.szUserCreatedId'), 'data' => 'szUserCreatedId', 'searchable' => true, 'elmsearch' => 'text']),
            // 'szUserUpdatedId' => new Column(['title' => __('models/dmsSmBranches.fields.szUserUpdatedId'), 'data' => 'szUserUpdatedId', 'searchable' => true, 'elmsearch' => 'text'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'dms_sm_branches_datatable_' . time();
    }
}
