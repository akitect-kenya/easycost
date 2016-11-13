<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * Mass assignable fields
     *
     * @var array
     */
    protected $fillable = ['name', 'slug'];

    /**
     * Linked to the department's goods
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function goods()
    {
        return $this->hasMany(Good::class);
    }
}
