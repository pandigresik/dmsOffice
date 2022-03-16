<?php

namespace App\Exports\Template\Accounting;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class BalanceExport implements FromView
{
    use Exportable;

    /**
     * @var Collection
     */
    protected $collection;
    private $startDate;
    private $endDate;

    public function __construct(array $collection)
    {
        $this->collection = $collection;
    }

    public function view(): View
    {
        $currentMonth = \Carbon\Carbon::createFromFormat('Y-m-d', $this->getStartDate())->format('M');
        $previousMonth = \Carbon\Carbon::createFromFormat('Y-m-d', $this->getStartDate())->subDay()->format('M');

        return view('accounting.balance.list', [
            'data' => $this->collection['data'],
            'saldo' => $this->collection['saldo'],
            'listAccount' => $this->collection['listAccount'],
            'currentMonth' => $currentMonth,
            'previousMonth' => $previousMonth,
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
}
