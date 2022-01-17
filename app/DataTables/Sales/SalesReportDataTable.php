<?php

namespace App\DataTables\Sales;

use App\Models\Base\DmsSmBranch;
use App\Models\Sales\DmsSdDocdo;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class SalesReportDataTable extends DataTable
{
    protected $exportColumns = [
            'dtmDoc',
            'szDocId',
            'szProductId',
            'szProductName',
            'szBranchId',
            'branchName',
            'bCash',
            'szDocStatus',
            'decQty',
            'decPrice',
            'decDiscPrinciple',
            'decDiscDistributor',
            'decDiscInternal'
    ];
    /**
    * example mapping filter column to search by keyword, default use %keyword%
    */
    private $columnFilterOperator = [
        'dtmDoc' => \App\DataTables\FilterClass\BetweenKeyword::class,
        'szDocStatus' => \App\DataTables\FilterClass\MatchKeyword::class,
        'szBranchId' => \App\DataTables\FilterClass\MatchKeyword::class,
        'bCash' => \App\DataTables\FilterClass\MatchKeyword::class
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
        $dataTable->editColumn('dtmDoc', function($item){

            return localFormatDate($item['dtmDoc']);
        })->editColumn('bCash', function($item){

            return $item['bCash'] ? 'Ya' : 'Tidak';
        })->editColumn('decDiscPrinciple', function($item){

            return localNumberFormat($item['decDiscPrinciple']);
        })->editColumn('decDiscInternal', function($item){

            return localNumberFormat($item['decDiscPrinciple']);
        })->editColumn('decDiscDistributor', function($item){

            return localNumberFormat($item['decDiscDistributor']);
        })->editColumn('decPrice', function($item){

            return localNumberFormat($item['decPrice']);
        });
        
        // return $dataTable->addColumn('action', 'sales.bkb_discounts.datatables_actions');
        return $dataTable;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\DmsSdDocdo $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(DmsSdDocdo $model)
    {
        return $model->select(['dms_sd_docdo.szDocId','dms_sd_docdo.dtmDoc','dms_sd_docdo.szSalesId','dms_sd_docdo.szBranchId', 'dms_sd_docdo.szDocStatus','dms_sd_docdo.bCash',
                 'dms_sd_docdoitem.decQty','dms_sd_docdoitem.szProductId','dms_inv_product.szName as szProductName','dms_sm_branch.szName as branchName',
                 'dms_sd_docdoitemprice.decPrice','dms_sd_docdoitemprice.decAmount','dms_sd_docdoitemprice.decDiscPrinciple','dms_sd_docdoitemprice.decDiscDistributor','dms_sd_docdoitemprice.decDiscInternal'
            ])->join('dms_sm_branch','dms_sm_branch.szId','=','dms_sd_docdo.szBranchId')
            ->join('dms_sd_docdoitem','dms_sd_docdoitem.szDocId','=','dms_sd_docdo.szDocId')
            ->join('dms_inv_product','dms_inv_product.szId','=','dms_sd_docdoitem.szProductId')            
            ->join('dms_sd_docdoitemprice', function($q){
                $q->on('dms_sd_docdoitemprice.szDocId','=','dms_sd_docdoitem.szDocId')
                    ->on('dms_sd_docdoitemprice.intItemNumber','=','dms_sd_docdoitem.intItemNumber');
            }            
        )
        ->newQuery();
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
        $branchItem = array_merge([['text' => 'Pilih Depo', 'value' => '']] , convertArrayPairValueWithKey(DmsSmBranch::pluck('szName','szId')->toArray()));
        $castItems = array_merge([['text' => 'Pilih Status', 'value' => '']] , convertArrayPairValueWithKey(['1' => 'Tunai', '0' => 'Tidak Tunai']));
        $statusItems = array_merge([['text' => 'Pilih Status', 'value' => '']] , convertArrayPairValueWithKey(['Applied' => 'Applied', 'Draft' => 'Draft']));
        return [
            'dtmDoc' => new Column(['title' => __('models/salesReport.fields.dtmDoc'), 'data' => 'dtmDoc', 'searchable' => true, 'elmsearch' => 'daterange']),
            'szDocId' => new Column(['title' => __('models/salesReport.fields.szDocId'), 'data' => 'szDocId', 'searchable' => true, 'elmsearch' => 'text']),
            'szProductId' => new Column(['title' => __('models/salesReport.fields.szProductId'),'name' => 'dms_inv_product.szName', 'data' => 'szProductName', 'searchable' => true, 'elmsearch' => 'text']),
//            'szSalesId' => new Column(['title' => __('models/salesReport.fields.szSalesId'), 'data' => 'szSalesId', 'searchable' => true, 'elmsearch' => 'text']),
            'szBranchId' => new Column(['title' => __('models/salesReport.fields.szBranchId'), 'name' => 'szBranchId', 'data' => 'branchName', 'searchable' => true, 'elmsearch' => 'dropdown', 'listItem' => $branchItem]),
            'bCash' => new Column(['title' => __('models/salesReport.fields.bCash'), 'data' => 'bCash', 'searchable' => true, 'elmsearch' => 'dropdown', 'listItem' => $castItems ]),
            'szDocStatus' => new Column(['title' => __('models/salesReport.fields.szDocStatus'), 'data' => 'szDocStatus', 'searchable' => true, 'elmsearch' => 'dropdown', 'listItem' => $statusItems]),
            'decQty' => new Column(['title' => __('models/salesReport.fields.decQty'), 'data' => 'decQty', 'searchable' => false, 'elmsearch' => 'text']),
            'decPrice' => new Column(['title' => __('models/salesReport.fields.decPrice'), 'data' => 'decPrice', 'searchable' => false, 'elmsearch' => 'text']),
            'decDiscPrinciple' => new Column(['title' => __('models/salesReport.fields.decDiscPrinciple'), 'data' => 'decDiscPrinciple', 'searchable' => false, 'elmsearch' => 'text']),
            'decDiscDistributor' => new Column(['title' => __('models/salesReport.fields.decDiscDistributor'), 'data' => 'decDiscDistributor', 'searchable' => false, 'elmsearch' => 'text']),
            'decDiscInternal' => new Column(['title' => __('models/salesReport.fields.decDiscInternal'), 'data' => 'decDiscInternal', 'searchable' => false, 'elmsearch' => 'text']),            
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
