<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductFilterValue extends Model
{
    protected $table = 'product_filter_values';

    protected $fillable = [
        'product_id', 'product_filter_value_id'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public static function exists($product_id, $fv_id)
    {
        $result = ProductFilterValue::where(['product_id' => $product_id, 'product_filter_value_id' => $fv_id])->first();
        return ($result) ? true : false;
    }
}
