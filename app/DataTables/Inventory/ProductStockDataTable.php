<?php

namespace App\DataTables\Inventory;

use App\Models\Base\DmsSmBranch;
use App\Models\Inventory\ProductStock;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ProductStockDataTable extends DataTable
{
    /**
     * example mapping filter column to search by keyword, default use %keyword%.
     */
    private $columnFilterOperator = [
        'branch_id' => \App\DataTables\FilterClass\InKeyword::class,
        'period' => \App\DataTables\FilterClass\MatchKeyword::class,
    ];

    private $mapColumnSearch = [
        //'entity.name' => 'entity_id',
    ];

    private $listGudang = [];

    public function __construct()
    {
        $user = \Auth::user();
        $this->listGudang = config('entity.gudangPusat')[$user->entity_id] + DmsSmBranch::pluck('szName', 'szId')->toArray();
    }

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
        
        $dataTable->editColumn('branch_id', function ($data) {               
            return $this->listGudang[$data->branch_id] ?? $data->branch_id;
        })->editColumn('first_stock', function($data){
            return !empty($data->first_stock) ? $data->first_stock : '0';
        })->editColumn('supplier_in', function($data){
            return !empty($data->supplier_in) ? $data->supplier_in : '0';
        })->editColumn('mutation_in', function($data){
            return !empty($data->mutation_in) ? $data->mutation_in : '0';
        })->editColumn('distribution_in', function($data){
            return !empty($data->distribution_in) ? $data->distribution_in : '0';
        })->editColumn('supplier_out', function($data){
            return !empty($data->supplier_out) ? $data->supplier_out : '0';
        })->editColumn('mutation_out', function($data){
            return !empty($data->mutation_out) ? $data->mutation_out :  '0';
        })->editColumn('distribution_out', function($data){
            return !empty($data->distribution_out) ? $data->distribution_out : '0';
        })->editColumn('morphing', function($data){
            return !empty($data->morphing) ? $data->morphing : '0';
        })->editColumn('last_stock', function($data){
            return !empty($data->last_stock) ? $data->last_stock : '0';
        })->escapeColumns([]);
        return $dataTable->addColumn('action', 'inventory.product_stocks.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ProductStock $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ProductStock $model)
    {
        return $model->with(['product'])->newQuery();
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
        $branchItem = array_merge([['text' => 'Pilih Depo', 'value' => '']], convertArrayPairValueWithKey($this->listGudang));
        return [
            'product_id' => new Column(['title' => __('models/productStocks.fields.product_id'), 'data' => 'product_id', 'searchable' => true, 'elmsearch' => 'text']),
            'product_name' => new Column(['title' => __('models/productStocks.fields.product_name'), 'name' => 'product_name', 'data' => 'product.szName', 'searchable' => false, 'elmsearch' => 'text']),
            'branch_id' => new Column(['title' => __('models/productStocks.fields.branch_id'), 'name' => 'branch_id', 'data' => 'branch_id', 'searchable' => true, 'elmsearch' => 'dropdown', 'listItem' => $branchItem, 'multiple' => 'multiple', 'width' => '200px']),
            'first_stock' => new Column(['title' => __('models/productStocks.fields.first_stock'), 'data' => 'first_stock', 'searchable' => false, 'elmsearch' => 'text']),
            'supplier_in' => new Column(['title' => __('models/productStocks.fields.supplier_in'), 'data' => 'supplier_in', 'searchable' => false, 'elmsearch' => 'text']),
            'mutation_in' => new Column(['title' => __('models/productStocks.fields.mutation_in'), 'data' => 'mutation_in', 'searchable' => false, 'elmsearch' => 'text']),
            'distribution_in' => new Column(['title' => __('models/productStocks.fields.distribution_in'), 'data' => 'distribution_in', 'searchable' => false, 'elmsearch' => 'text']),
            'supplier_out' => new Column(['title' => __('models/productStocks.fields.supplier_out'), 'data' => 'supplier_out', 'searchable' => false, 'elmsearch' => 'text']),
            'mutation_out' => new Column(['title' => __('models/productStocks.fields.mutation_out'), 'data' => 'mutation_out', 'searchable' => false, 'elmsearch' => 'text']),
            'distribution_out' => new Column(['title' => __('models/productStocks.fields.distribution_out'), 'data' => 'distribution_out', 'searchable' => false, 'elmsearch' => 'text']),
            'morphing' => new Column(['title' => __('models/productStocks.fields.morphing'), 'data' => 'morphing', 'searchable' => false, 'elmsearch' => 'text']),
            'last_stock' => new Column(['title' => __('models/productStocks.fields.last_stock'), 'data' => 'last_stock', 'searchable' => false, 'elmsearch' => 'text']),
            'period' => new Column(['title' => __('models/productStocks.fields.period'), 'data' => 'period', 'searchable' => true, 'elmsearch' => 'text']),
            'additional_info' => new Column(['title' => __('models/productStocks.fields.additional_info'), 'data' => 'additional_info', 'searchable' => false, 'elmsearch' => 'text']),
            'price' => new Column(['title' => __('models/productStocks.fields.price'), 'data' => 'price', 'searchable' => false, 'elmsearch' => 'text']),
            'substractor' => new Column(['title' => __('models/productStocks.fields.substractor'), 'data' => 'substractor', 'searchable' => false, 'elmsearch' => 'text']),
            'cogs' => new Column(['title' => __('models/productStocks.fields.cogs'), 'data' => 'cogs', 'searchable' => false, 'elmsearch' => 'text']),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'product_stocks_datatable_'.time();
    }
}
