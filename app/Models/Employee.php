<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name', 'phone','date_of_birth', 'address', 'hsl',
    ];
}
