<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class userMoney extends Model
{
    protected $table = 'usermoney';

    protected $fillable = ['amount'];
}
