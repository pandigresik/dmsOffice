<?php

namespace App\Exports\Template\Sales;

use App\Models\Base\DmsSmBranch;
use App\Models\Sales\Discounts;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class RekapSalesExport implements FromView
{
    use Exportable;

    /**
     * @var Collection
     */
    protected $collection;
    private $startDate;
    private $endDate;
    public function __construct(Collection $collection)
    {
        $this->collection = $collection;
    }

    public function view(): View
    {                
    
        return view('sales.sales_report.list_rekap', [
            'datas' => $this->collection,      
            'startDate' => $this->getStartDate(),
            'endDate' => $this->getEndDate()
        ]);
    }

    

    /**
     * Get the value of endDate
     */ 
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set the value of endDate
     *
     * @return  self
     */ 
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get the value of startDate
     */ 
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set the value of startDate
     *
     * @return  self
     */ 
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }
}
