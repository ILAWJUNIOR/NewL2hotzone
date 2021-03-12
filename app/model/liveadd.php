<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class liveadd extends Model
{
    protected $fillable = ['user_id', 'server_id', 'till_date', 'textad_id', 'active_status', 'delete_flag'];

    public $timestamps = false;
}
