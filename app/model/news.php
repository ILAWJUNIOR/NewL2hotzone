<?php

namespace App\model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    protected $fillable = ['news', 'server_id'];
}
