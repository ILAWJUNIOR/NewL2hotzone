<?php

namespace App\model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class voter_list extends Model
{
    // protected $casts = [
    //     'date'  => 'd-m-Y',
    // ];

    protected $fillable = [
        'user_id', 'server_id','voter_ip'

    ];
}
