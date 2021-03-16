<?php

namespace App\model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class uptime_history extends Model
{
    // protected $casts = [
    //     'date'  => 'd-m-Y',
    // ];
    protected $table = 'uptime_history';

    protected $fillable = [
        'server_id', 'first_section_status', 'second_section_status',

    ];
}
