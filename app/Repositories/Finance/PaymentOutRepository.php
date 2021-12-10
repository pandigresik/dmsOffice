<?php

namespace App\Repositories\Finance;

use App\Models\Finance\PaymentOut;

/**
 * Class PaymentRepository.
 *
 * @version December 8, 2021, 9:49 pm WIB
 */
class PaymentOutRepository extends PaymentRepository
{
    /**
     * Configure the Model.
     */
    public function model()
    {
        return PaymentOut::class;
    }    
}
