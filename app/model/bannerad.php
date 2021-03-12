<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class bannerad extends Model
{
    public function livebanner()
    {
        return $this->belongsTo(\App\model\bannerliveadd::class, 'id', 'bannerad_id');
    }
}
