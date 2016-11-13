<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sheet extends Model
{
    /**
     * Mass assignable fields
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['created_on'];

    /**
     * Links to the sheet's products
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Link to it's good
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function good()
    {
        return $this->belongsTo(Good::class);
    }

    /**
     * Get the created at date for the sheet.
     *
     * @return bool
     */
    public function getCreatedOnAttribute()
    {
        return $this->created_at->diffForHumans();
    }
}
