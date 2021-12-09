<?php

namespace App\Repositories\Finance;

use App\Models\Finance\PaymentIn;

/**
 * Class PaymentRepository.
 *
 * @version December 8, 2021, 9:49 pm WIB
 */
class PaymentInRepository extends PaymentRepository
{
    /**
     * Configure the Model.
     */
    public function model()
    {
        return PaymentIn::class;
    }
}
