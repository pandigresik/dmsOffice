<?php

namespace App\Exports\Template\Sales;

use App\Models\Base\DmsPiEmployee;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class RejectDiscountsExport implements FromView
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
        $salesMaster = DmsPiEmployee::whereIn('szId', $this->collection->keys())->get()->keyBy('szId');

        return view('exports.sales.rejectDiscount', [
            'collection' => $this->collection,
            'salesMaster' => $salesMaster,
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
