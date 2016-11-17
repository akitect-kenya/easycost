<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * Mass assignable fields
     *
     * @var array
     */
    protected $fillable = ['date', 'sku', 'number_produced', 'batch_no', 'cost', 'sheet_id', 'product_name'];

    /**
     * The fields to be hidden in the array serialization
     *
     * @var array
     */
    protected $hidden = ['sheet_id', 'created_at', 'updated_at'];

    /**
     * Links to the product's sheet
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sheet()
    {
        return $this->belongsTo(Sheet::class);
    }
}
