<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_phone', 'user_id', 'total_money', 'type', 'status_online',
    ];
}
