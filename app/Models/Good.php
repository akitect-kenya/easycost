<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    /**
     * Mass assignable fields
     *
     * @var array
     */
    protected $fillable = ['name', 'department_id'];

    /**
     * Link to the good's department
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Links to the goods's skus
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function skus()
    {
        return $this->hasMany(SKU::class);
    }

    /**
     * Links to the good's sheets
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sheets()
    {
        return $this->hasMany(Sheet::class);
    }
}
