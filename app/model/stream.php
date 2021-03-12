<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class stream extends Model
{
    protected $table = 'l2hotzone_stream';

    protected $primaryKey = 'id';

    protected $fillable = ['id', 'title', 'url', 'cost', 'location', 'bgcolor', 'textcolor'];
}
