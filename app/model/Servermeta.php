<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Servermeta extends Model
{
    protected $fillable = [
        'metaKey',
        'metaValue',
        'flag',
    ];

    public $timestamps = false;

    public function server()
    {
        return $this->belongsTo('app\model\server');
    }
}
