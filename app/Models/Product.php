<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'ProductName', 'slug_product', 'description', 'price', 'discount', 'image', 'category_id',
    ];
}
