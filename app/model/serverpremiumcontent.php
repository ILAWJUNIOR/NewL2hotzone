<?php

namespace App\model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class serverpremiumcontent extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'server_id',
        'thumbnail',
        'premiumcontent',
    ];
}
