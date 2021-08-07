<?php

namespace App\Models;


use App\Traits\SearchModelTrait;
use App\Traits\BlameableCustomTrait;
use Illuminate\Database\Eloquent\Model;
use DigitalCloud\Blameable\Traits\Blameable;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class Base extends Model
{
    use Cachable;
    use SearchModelTrait;
    use Blameable, BlameableCustomTrait{
        BlameableCustomTrait::bootBlameable insteadof Blameable;
    }
    /** this column shown on dropdown, usually name */
    protected $showColumnOption;
    const CREATED_BY = 'created_by';
    const UPDATED_BY = 'updated_by';

    /**
     * Get the name of the "created by" column.
     *
     * @return string|null
     */
    public function getCreatedByColumn()
    {
        return static::CREATED_BY;
    }

    /**
     * Get the name of the "updated by" column.
     *
     * @return string|null
     */
    public function getUpdatedByColumn()
    {
        return static::UPDATED_BY;
    }    

    /**
     * Get the value of showColumnOption
     */ 
    public function getShowColumnOption()
    {
        return $this->showColumnOption ?? $this->getKeyName();
    }

    /**
     * Set the value of showColumnOption
     *
     * @return  self
     */ 
    public function setShowColumnOption($showColumnOption)
    {
        $this->showColumnOption = $showColumnOption;

        return $this;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function createdBy()
    {
        return $this->belongsTo(\App\Models\User::class, static::CREATED_BY);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function updatedBy()
    {
        return $this->belongsTo(\App\Models\User::class, static::UPDATED_BY);
    }    
}
