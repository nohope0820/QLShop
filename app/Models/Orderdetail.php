<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    protected $fillable = [
        'product_id', 'order_id', 'size', 'quantity',
    ];
}
