<?php

namespace App\Repositories\Base;

use App\Models\Base\DmsSmBranch;
use App\Repositories\BaseRepository;

/**
 * Class DmsSmBranchRepository.
 *
 * @version November 9, 2021, 2:09 pm UTC
 */
class DmsSmBranchRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'szId',
        'szName',
        'szDescription',
        'szCompanyId',
        'szLangitude',
        'szLongitude',
        'szTaxEntityId',
        'szProvince',
        'szCity',
        'szDistrict',
        'szSubDistrict',
        'szUserCreatedId',
        'szUserUpdatedId',
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
        return DmsSmBranch::class;
    }
}
