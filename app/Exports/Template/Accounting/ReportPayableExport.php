<?php

namespace App\Exports\Template\Accounting;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class ReportPayableExport implements FromView
{
    use Exportable;

    /**
     * @var Collection
     */
    protected $collection;
    private $startDate;
    private $endDate;
    private $type;

    public function __construct(array $collection)
    {
        $this->collection = $collection;
    }

    public function view(): View
    {        

        return view('accounting.report_payable.list_'.$this->getType(), [
            'data' => $this->collection['data'],                 
            'startDate' => $this->getStartDate(),
            'endDate' => $this->getEndDate(),
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
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }
}
