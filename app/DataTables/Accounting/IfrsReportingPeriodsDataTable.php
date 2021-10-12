<?php

namespace App\DataTables\Accounting;

use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use App\Models\Accounting\IfrsReportingPeriods;
use App\Repositories\Accounting\IfrsEntitiesRepository;

class IfrsReportingPeriodsDataTable extends DataTable
{
    /**
     * example mapping filter column to search by keyword, default use %keyword%.
     */
    private $columnFilterOperator = [
        'entity.name' => \App\DataTables\FilterClass\MatchKeyword::class,
    ];

    private $mapColumnSearch = [
        'entity.name' => 'entity_id'
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

        return $dataTable->addColumn('action', 'accounting.ifrs_reporting_periods.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\IfrsReportingPeriods $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(IfrsReportingPeriods $model)
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
                'text' => '<i class="fa fa-plus"></i> '.__('auth.app.create').'',
            ],
            [
                'extend' => 'export',
                'className' => 'btn btn-default btn-sm no-corner',
                'text' => '<i class="fa fa-download"></i> '.__('auth.app.export').'',
            ],
            [
                'extend' => 'import',
                'className' => 'btn btn-default btn-sm no-corner',
                'text' => '<i class="fa fa-download"></i> '.__('auth.app.import').'',
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
        ];

        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')])
            ->parameters([
                'dom' => 'Brtip',
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
        $listEntity = (new IfrsEntitiesRepository(app()))->all([], null, null, ['id as value', 'name as text'])->toArray();

        return [            
            'period_count' => new Column(['title' => __('models/ifrsReportingPeriods.fields.period_count'), 'data' => 'period_count', 'searchable' => true, 'elmsearch' => 'text']),
            'entity_id' => new Column(['title' => __('models/ifrsReportingPeriods.fields.entity_id'), 'data' => 'entity_id', 'searchable' => true, 'elmsearch' => 'dropdown', 'listItem' => array_merge([['value' => '', 'text' => 'Pilih Entity']], $listEntity)]),
            'status' => new Column(['title' => __('models/ifrsReportingPeriods.fields.status'), 'data' => 'status', 'searchable' => true, 'elmsearch' => 'text']),
            'calendar_year' => new Column(['title' => __('models/ifrsReportingPeriods.fields.calendar_year'), 'data' => 'calendar_year', 'searchable' => true, 'elmsearch' => 'text']),
            //'destroyed_at' => new Column(['title' => __('models/ifrsReportingPeriods.fields.destroyed_at'), 'data' => 'destroyed_at', 'searchable' => true, 'elmsearch' => 'text']),
            'closing_date' => new Column(['title' => __('models/ifrsReportingPeriods.fields.closing_date'), 'data' => 'closing_date', 'searchable' => true, 'elmsearch' => 'text']),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ifrs_reporting_periods_datatable_'.time();
    }
}
