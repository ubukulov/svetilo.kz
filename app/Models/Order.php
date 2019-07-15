<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $dates = ['created_at', 'updated_at'];

    protected $fillable = [
        'user_id', 'phone', 'address', 'full_name', 'order_notes'
    ];
}
