<?php

namespace App\Repositories\Sales;

use App\Models\Sales\BkbValidate;
use App\Repositories\BaseRepository;

/**
 * Class BkbValidateRepository
 * @package App\Repositories\Sales
 * @version December 27, 2021, 5:39 am WIB
*/

class BkbValidateRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'doc_id',
        'dms_ar_customer_id',
        'dms_pi_employee_id',
        'disc_principle_sales',
        'disc_distributor_sales',
        'disc_principle_dms',
        'disc_distributor_dms',
        'invoiced'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return BkbValidate::class;
    }
}
