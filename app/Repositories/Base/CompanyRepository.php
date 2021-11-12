<?php

namespace App\Repositories\Base;

use App\Models\Base\Company;
use App\Repositories\BaseRepository;

/**
 * Class CompanyRepository.
 *
 * @version August 15, 2021, 3:20 pm UTC
 */
class CompanyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'internal_code',
    ];

    /**
     * Return searchable fields.
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model.
     */
    public function model()
    {
        return Company::class;
    }
}
