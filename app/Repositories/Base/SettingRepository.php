<?php

namespace App\Repositories\Base;

use App\Models\Base\Setting;
use App\Repositories\BaseRepository;

/**
 * Class SettingRepository.
 *
 * @version January 14, 2022, 8:20 pm WIB
 */
class SettingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'description',
        'value',
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
        return Setting::class;
    }
}
