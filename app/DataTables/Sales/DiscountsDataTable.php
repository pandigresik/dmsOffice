<?php

namespace App\DataTables\Sales;

use App\DataTables\BaseDataTable as DataTable;
use App\Models\Inventory\DmsInvProduct;
use App\Models\Sales\Discounts;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class DiscountsDataTable extends DataTable
{
    /**
     * example mapping filter column to search by keyword, default use %keyword%.
     */
    private $columnFilterOperator = [
        //'main_product.szName' => \App\DataTables\FilterClass\RelationContainKeyword::class,
        //'bundling_product.szName' => \App\DataTables\FilterClass\RelationContainKeyword::class,
        'type' => \App\DataTables\FilterClass\MatchKeyword::class,
        'jenis' => \App\DataTables\FilterClass\MatchKeyword::class,
    ];

    private $mapColumnSearch = [
        //'entity.name' => 'entity_id',
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
        $dataTable->editColumn('main_dms_inv_product_id', function ($p) {
            $listProduct = DmsInvProduct::select('szName')->whereIn('szId', explode(',', $p->main_dms_inv_product_id))->get()->map(function ($item) {
                return $item->szName;
            });

            return !empty($listProduct) ? '<div>'.implode('</div><div>', $listProduct->toArray()).'</div>' : '-';
        })->editColumn('bundling_dms_inv_product_id', function ($p) {
            $listProduct = DmsInvProduct::select('szName')->whereIn('szId', explode(',', $p->bundling_dms_inv_product_id))->get()->map(function ($item) {
                return $item->szName;
            });

            return !empty($listProduct) ? '<div>'.implode('</div><div>', $listProduct->toArray()).'</div>' : '-';
        })->escapeColumns([]);

        return $dataTable->addColumn('action', 'sales.discounts.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Discounts $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Discounts $model)
    {
        //return $model->with(['mainProduct','bundlingProduct'])->newQuery();
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
                'text' => '<i class="fa fa-upload"></i> '.__('auth.app.import').'',
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
                'dom' => '<"row" <"col-md-6"B><"col-md-6 text-right"l>>rtip',
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
        $jenisDiscountItem = array_merge([['text' => 'Pilih Jenis', 'value' => '']], convertArrayPairValueWithKey(array_combine(Discounts::OPTION_ITEM_JENIS, Discounts::OPTION_ITEM_JENIS)));
        $typeDiscountItem = array_merge([['text' => 'Pilih Type', 'value' => '']], convertArrayPairValueWithKey(array_combine(Discounts::OPTION_ITEM_TYPE, Discounts::OPTION_ITEM_TYPE)));

        return [
            'type' => new Column(['title' => __('models/discounts.fields.type'), 'data' => 'type', 'searchable' => true, 'elmsearch' => 'dropdown', 'listItem' => $typeDiscountItem]),
            'jenis' => new Column(['title' => __('models/discounts.fields.jenis'), 'data' => 'jenis', 'searchable' => true, 'elmsearch' => 'dropdown', 'listItem' => $jenisDiscountItem]),
            'name' => new Column(['title' => __('models/discounts.fields.name'), 'data' => 'name', 'searchable' => true, 'elmsearch' => 'text']),
            'start_date' => new Column(['title' => __('models/discounts.fields.start_date'), 'data' => 'start_date', 'searchable' => true, 'elmsearch' => 'text']),
            'end_date' => new Column(['title' => __('models/discounts.fields.end_date'), 'data' => 'end_date', 'searchable' => true, 'elmsearch' => 'text']),
            'main_dms_inv_product_id' => new Column(['title' => __('models/discounts.fields.main_dms_inv_product_id'), 'data' => 'main_dms_inv_product_id', 'defaultContent' => '-', 'searchable' => true, 'elmsearch' => 'text']),
            'bundling_dms_inv_product_id' => new Column(['title' => __('models/discounts.fields.bundling_dms_inv_product_id'), 'data' => 'bundling_dms_inv_product_id', 'defaultContent' => '-', 'searchable' => true, 'elmsearch' => 'text']),
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
        return 'discounts_datatable_'.time();
    }
}
