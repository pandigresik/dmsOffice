<?php

namespace App\DataTables\Sales;

use App\Models\Sales\Discounts;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class DiscountsDataTable extends DataTable
{
    /**
    * example mapping filter column to search by keyword, default use %keyword%
    */
    private $columnFilterOperator = [
        'main_product.szName' => \App\DataTables\FilterClass\RelationContainKeyword::class,
        'bundling_product.szName' => \App\DataTables\FilterClass\RelationContainKeyword::class,
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
        return $dataTable->addColumn('action', 'sales.discounts.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Discounts $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Discounts $model)
    {
        return $model->with(['mainProduct','bundlingProduct'])->newQuery();
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
        $jenisDiscountItem = array_merge([['text' => 'Pilih Jenis', 'value' => '']] , convertArrayPairValueWithKey(array_combine(Discounts::OPTION_ITEM_JENIS,Discounts::OPTION_ITEM_JENIS)));
        return [
            'jenis' => new Column(['title' => __('models/discounts.fields.jenis'), 'data' => 'jenis', 'searchable' => true, 'elmsearch' => 'dropdown', 'listItem' => $jenisDiscountItem]),
            'name' => new Column(['title' => __('models/discounts.fields.name'), 'data' => 'name', 'searchable' => true, 'elmsearch' => 'text']),
            'start_date' => new Column(['title' => __('models/discounts.fields.start_date'), 'data' => 'start_date', 'searchable' => true, 'elmsearch' => 'text']),
            'end_date' => new Column(['title' => __('models/discounts.fields.end_date'), 'data' => 'end_date', 'searchable' => true, 'elmsearch' => 'text']),
            //'split' => new Column(['title' => __('models/discounts.fields.split'), 'data' => 'split', 'searchable' => true, 'elmsearch' => 'text']),
            'main_dms_inv_product_id' => new Column(['title' => __('models/discounts.fields.main_dms_inv_product_id'), 'data' => 'main_product.szName','defaultContent' => '-', 'searchable' => true, 'elmsearch' => 'text']),
            //'main_quota' => new Column(['title' => __('models/discounts.fields.main_quota'), 'data' => 'main_quota', 'searchable' => true, 'elmsearch' => 'text']),
            'bundling_dms_inv_product_id' => new Column(['title' => __('models/discounts.fields.bundling_dms_inv_product_id'), 'data' => 'bundling_product.szName','defaultContent' => '-', 'searchable' => true, 'elmsearch' => 'text']),
            //'bundling_quota' => new Column(['title' => __('models/discounts.fields.bundling_quota'), 'data' => 'bundling_quota', 'searchable' => true, 'elmsearch' => 'text']),
            'max_quota' => new Column(['title' => __('models/discounts.fields.max_quota'), 'data' => 'max_quota', 'searchable' => false, 'elmsearch' => 'text']),            
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'discounts_datatable_' . time();
    }
}
