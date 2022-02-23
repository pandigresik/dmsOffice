<?php

namespace App\Jobs;

use App\Repositories\Sales\BkbDiscountsRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class CalculateDiscount implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    private $repository;
    private $startDate;
    private $endDate;
    private $branches = [];
    private $defaultDate;
    private $beforeDays = 3;
    private $userId;

    /**
     * Create a new job instance.
     */
    public function __construct(int $userId, string $startDate = '', string $endDate = '', array $branches = [])
    {
        $this->setStartDate($startDate);
        $this->setEndDate($endDate);
        $this->setBranches($branches);
        $this->userId = $userId;
        $this->defaultDate = \Carbon\Carbon::now()->subDays($this->beforeDays)->format('Y-m-d');        
    }

    public function timeout(){

        return 599;
    }

    /**
     * Execute the job.
     */
    public function handle(BkbDiscountsRepository $repository)
    {
        $startDate = $this->getStartDate() ?? $this->defaultDate;
        $endDate = $this->getEndDate() ?? $this->defaultDate;
        $branches = $this->getBranches();       
        Auth::loginUsingId($this->userId);
        $repository->processDiscountSave($startDate, $endDate, $branches);        
    }

    /**
     * Get the value of branches.
     */
    public function getBranches()
    {
        return $this->branches;
    }

    /**
     * Set the value of branches.
     *
     * @param mixed $branches
     *
     * @return self
     */
    public function setBranches($branches)
    {
        $this->branches = $branches;

        return $this;
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
