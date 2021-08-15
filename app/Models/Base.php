<?php

namespace App\Models;

use App\Traits\BlameableCustomTrait;
use App\Traits\SearchModelTrait;
use DigitalCloud\Blameable\Traits\Blameable;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    use Cachable;
    use SearchModelTrait;
    use Blameable, BlameableCustomTrait{
        BlameableCustomTrait::bootBlameable insteadof Blameable;
    }
    const CREATED_BY = 'created_by';
    const UPDATED_BY = 'updated_by';
    /** this column shown on dropdown, usually name */
    protected $showColumnOption = 'name';

    /**
     * Get the name of the "created by" column.
     *
     * @return null|string
     */
    public function getCreatedByColumn()
    {
        return static::CREATED_BY;
    }

    /**
     * Get the name of the "updated by" column.
     *
     * @return null|string
     */
    public function getUpdatedByColumn()
    {
        return static::UPDATED_BY;
    }

    /**
     * Get the value of showColumnOption.
     */
    public function getShowColumnOption()
    {
        return $this->showColumnOption ?? $this->getKeyName();
    }

    /**
     * Set the value of showColumnOption.
     *
     * @param mixed $showColumnOption
     *
     * @return self
     */
    public function setShowColumnOption($showColumnOption)
    {
        $this->showColumnOption = $showColumnOption;

        return $this;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function createdBy()
    {
        return $this->belongsTo(\App\Models\Base\User::class, static::CREATED_BY);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function updatedBy()
    {
        return $this->belongsTo(\App\Models\Base\User::class, static::UPDATED_BY);
    }
}
