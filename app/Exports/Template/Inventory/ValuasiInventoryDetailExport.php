<?php

namespace App\Exports\Template\Inventory;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class ValuasiInventoryDetailExport implements FromView
{
    use Exportable;

    /**
     * @var Collection
     */
    protected $collection;
    private $startDate;
    private $endDate;
    private $saldoAwal;

    public function __construct($collection)
    {
        $this->collection = $collection;
    }    

    public function view(): View
    {        
        $view = 'inventory.valuasi_inventory.show';        
        return view($view, [
            'detail' => $this->collection,
            'saldoAwal' => $this->getSaldoAwal(),
            'startDate' => $this->getStartDate(),
            'endDate' => $this->getEndDate(),     
            'exportExcel' => true
        ]);
    }

    /**
     * Get the value of endDate.
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set the value of endDate.
     *
     * @param mixed $endDate
     *
     * @return self
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get the value of startDate.
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set the value of startDate.
     *
     * @param mixed $startDate
     *
     * @return self
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }


    /**
     * Get the value of saldoAwal
     */ 
    public function getSaldoAwal()
    {
        return $this->saldoAwal;
    }

    /**
     * Set the value of saldoAwal
     *
     * @return  self
     */ 
    public function setSaldoAwal($saldoAwal)
    {
        $this->saldoAwal = $saldoAwal;

        return $this;
    }
}
