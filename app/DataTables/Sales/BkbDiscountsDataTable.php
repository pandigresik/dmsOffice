<?php

namespace App\DataTables\Sales;

use App\Models\Sales\BkbDiscounts;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class BkbDiscountsDataTable extends DataTable
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
        return $dataTable->addColumn('action', 'sales.bkb_discounts.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\BkbDiscounts $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(BkbDiscounts $model)
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
            'szDocId' => new Column(['title' => __('models/bkbDiscounts.fields.szDocId'), 'data' => 'szDocId', 'searchable' => true, 'elmsearch' => 'text']),
            'szProductId' => new Column(['title' => __('models/bkbDiscounts.fields.szProductId'), 'data' => 'szProductId', 'searchable' => true, 'elmsearch' => 'text']),
            'szSalesId' => new Column(['title' => __('models/bkbDiscounts.fields.szSalesId'), 'data' => 'szSalesId', 'searchable' => true, 'elmsearch' => 'text']),
            'szBranchId' => new Column(['title' => __('models/bkbDiscounts.fields.szBranchId'), 'data' => 'szBranchId', 'searchable' => true, 'elmsearch' => 'text']),
            'decQty' => new Column(['title' => __('models/bkbDiscounts.fields.decQty'), 'data' => 'decQty', 'searchable' => true, 'elmsearch' => 'text']),
            'discPrinciple' => new Column(['title' => __('models/bkbDiscounts.fields.discPrinciple'), 'data' => 'discPrinciple', 'searchable' => true, 'elmsearch' => 'text']),
            'discDistributor' => new Column(['title' => __('models/bkbDiscounts.fields.discDistributor'), 'data' => 'discDistributor', 'searchable' => true, 'elmsearch' => 'text']),
            'sistemPrinciple' => new Column(['title' => __('models/bkbDiscounts.fields.sistemPrinciple'), 'data' => 'sistemPrinciple', 'searchable' => true, 'elmsearch' => 'text']),
            'sistemDistributor' => new Column(['title' => __('models/bkbDiscounts.fields.sistemDistributor'), 'data' => 'sistemDistributor', 'searchable' => true, 'elmsearch' => 'text']),
            'selisihPrinciple' => new Column(['title' => __('models/bkbDiscounts.fields.selisihPrinciple'), 'data' => 'selisihPrinciple', 'searchable' => true, 'elmsearch' => 'text']),
            'selisihDistributor' => new Column(['title' => __('models/bkbDiscounts.fields.selisihDistributor'), 'data' => 'selisihDistributor', 'searchable' => true, 'elmsearch' => 'text'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'bkb_discounts_datatable_' . time();
    }
}
