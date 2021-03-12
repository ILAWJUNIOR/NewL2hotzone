<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Premiumserver extends Model
{
    protected $table = 'premiumservers';

    protected $fillable = ['server_id', 'till_date', 'delete_flag', 'active_status'];
}
