<?php

namespace App\model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class voter_list_history extends Model
{
    // protected $casts = [
    //     'date'  => 'd-m-Y',
    // ];
    protected $table = 'voter_list_history';

    protected $fillable = ['user_id', 'server_id', 'voting_count', 'start_date', 'end_date'];
}
