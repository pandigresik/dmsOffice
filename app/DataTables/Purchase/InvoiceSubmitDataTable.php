<?php

namespace App\DataTables\Purchase;

use App\Models\Purchase\Invoice;
use Yajra\DataTables\Services\DataTable;

class InvoiceSubmitDataTable extends InvoiceDataTable
{
    protected $withUpdate = true;

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Invoice $model
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Invoice $model)
    {
        return $model->submit()->with(['partner'])->newQuery();
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
            // [
            //    'extend' => 'export',
            //    'className' => 'btn btn-default btn-sm no-corner',
            //    'text' => '<i class="fa fa-download"></i> ' .__('auth.app.export').''
            // ],
            // [
            //    'extend' => 'import',
            //    'className' => 'btn btn-default btn-sm no-corner',
            //    'text' => '<i class="fa fa-upload"></i> ' .__('auth.app.import').''
            // ],
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

        $builder = $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->initComplete('function( settings, json ){ $(this).find(\'[data-toggle=tooltip]\').tooltip()}')
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
        if ($this->withUpdate) {
            $builder->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')]);
        }

        return $builder;
    }
}
