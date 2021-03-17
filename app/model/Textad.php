<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Textad extends Model
{
    protected $fillable = ['Name', 'category', 'cType', 'cost', 'status', 'delete_flag', 'image', 'position'];

    public function liveadd()
    {
        return $this->belongsTo(\App\model\liveadd::class);
    }

    public function liveadds()
    {
        return $this->belongsTo('App\model\liveadd', 'id', 'textad_id');
    }
}
