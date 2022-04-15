<?php

namespace App\Exports\Template\Accounting;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class MoneyCheckExport implements FromView
{
    use Exportable;

    /**
     * @var Collection
     */
    protected $collection;
    private $startDate;
    private $endDate;
    private $branch;
    private $headerSheet;

    public function __construct(array $collection)
    {
        $this->collection = $collection;
    }

    public function view(): View
    {
        return view('accounting.money_check.list', [
            'data' => $this->collection['data'],
            'startDate' => $this->getStartDate(),
            'endDate' => $this->getEndDate(),
            'branch' => $this->getBranch(),
            'header' => $this->getHeaderSheet(),
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
     * Get the value of headerSheet.
     */
    public function getHeaderSheet()
    {
        return $this->headerSheet;
    }

    /**
     * Set the value of headerSheet.
     *
     * @param mixed $headerSheet
     *
     * @return self
     */
    public function setHeaderSheet($headerSheet)
    {
        $this->headerSheet = $headerSheet;

        return $this;
    }

    /**
     * Get the value of branch.
     */
    public function getBranch()
    {
        return $this->branch;
    }

    /**
     * Set the value of branch.
     *
     * @param mixed $branch
     *
     * @return self
     */
    public function setBranch($branch)
    {
        $this->branch = $branch;

        return $this;
    }
}
