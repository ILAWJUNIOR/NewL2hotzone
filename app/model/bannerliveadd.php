<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class bannerliveadd extends Model
{
    protected $fillable = ['user_id', 'server_id', 'from_date', 'till_date', 'bannerad_id', 'website', 'liveimages', 'active_status', 'delete_flag'];

    protected $table = 'bannerliveadds';

    public $timestamps = false;

    public function hasbannerad()
    {
        return $this->belongsTo(\App\model\bannerad::class, 'id');
    }
}
