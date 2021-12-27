<?php

namespace App\DataTables\Sales;

use App\Models\Sales\BkbValidate;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class BkbValidateDataTable extends DataTable
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
        return $dataTable->addColumn('action', 'sales.bkb_validates.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\BkbValidate $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(BkbValidate $model)
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
        return [
            'doc_id' => new Column(['title' => __('models/bkbValidates.fields.doc_id'), 'data' => 'doc_id', 'searchable' => true, 'elmsearch' => 'text']),
            'dms_ar_customer_id' => new Column(['title' => __('models/bkbValidates.fields.dms_ar_customer_id'), 'data' => 'dms_ar_customer_id', 'searchable' => true, 'elmsearch' => 'text']),
            'dms_pi_employee_id' => new Column(['title' => __('models/bkbValidates.fields.dms_pi_employee_id'), 'data' => 'dms_pi_employee_id', 'searchable' => true, 'elmsearch' => 'text']),
            'disc_principle_sales' => new Column(['title' => __('models/bkbValidates.fields.disc_principle_sales'), 'data' => 'disc_principle_sales', 'searchable' => true, 'elmsearch' => 'text']),
            'disc_distributor_sales' => new Column(['title' => __('models/bkbValidates.fields.disc_distributor_sales'), 'data' => 'disc_distributor_sales', 'searchable' => true, 'elmsearch' => 'text']),
            'disc_principle_dms' => new Column(['title' => __('models/bkbValidates.fields.disc_principle_dms'), 'data' => 'disc_principle_dms', 'searchable' => true, 'elmsearch' => 'text']),
            'disc_distributor_dms' => new Column(['title' => __('models/bkbValidates.fields.disc_distributor_dms'), 'data' => 'disc_distributor_dms', 'searchable' => true, 'elmsearch' => 'text']),
            'invoiced' => new Column(['title' => __('models/bkbValidates.fields.invoiced'), 'data' => 'invoiced', 'searchable' => true, 'elmsearch' => 'text'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'bkb_validates_datatable_' . time();
    }
}
