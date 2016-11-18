<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SKU extends Model
{
    /**
     * Mass assignable fields
     *
     * @var array
     */
    protected $fillable = ['size', 'price', 'good_id'];

    /**
     * Link to the sku's good
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function good()
    {
        return $this->belongsTo(Good::class);
    }
}
