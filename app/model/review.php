<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    protected $fillable = ['user_id', 'review', 'server_id', 'parent_id', 'status', 'delete_flag'];

    protected $table = 'reviews';

    public $timestamps = true;
}
