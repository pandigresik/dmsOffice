<?php

namespace App\Exports\Template\Accounting;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class GeneralLedgerDetailExport implements FromView
{
    use Exportable;

    /**
     * @var Collection
     */
    protected $collection;
    private $startDate;
    private $endDate;
    private $name;
    private $accountCode;

    public function __construct(array $collection)
    {
        $this->collection = $collection;
    }

    public function view(): View
    {
        return view('accounting.general_ledger.show_excel', [
            'generalLedger' => $this->collection,
            'startDate' => $this->getStartDate(),            
            'endDate' => $this->getEndDate(),
            'name' => $this->getName(),
            'accountCode' => $this->getAccountCode()
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
     * Get the value of accountCode
     */ 
    public function getAccountCode()
    {
        return $this->accountCode;
    }

    /**
     * Set the value of accountCode
     *
     * @return  self
     */ 
    public function setAccountCode($accountCode)
    {
        $this->accountCode = $accountCode;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
