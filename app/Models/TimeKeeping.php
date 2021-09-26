<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeKeeping extends Model
{
    protected $fillable = [
        'MaNV', 'SoCong','working_day','note',
    ];
}
