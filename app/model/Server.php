<?php

namespace App\model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    // protected $casts = [
    //     'date'  => 'd-m-Y',
    // ];

    protected $fillable = [
        'server_name', 'servertype_1',
        'serverplatform', 'type',
        'date',
        'loginIp', 'serverIp',
        'loginPort', 'serverPort',
        'chronicle', 'xpRate',
        'dropRate', 'safeRate',
        'spRate', 'adenaRate',
        'maxRate', 'language',
        'desc', 'website', 'active_status', 'delete_flag', 'status',
    ];

    public function setDateAttribute($value)
    {
        if (strlen($value)) {
            $this->attributes['date'] = date('y-m-d', strtotime($value));
        } else {
            $this->attributes['date'] = null;
        }
    }

    public function metaField()
    {
        return $this->hasMany(\App\model\Servermeta::class);
    }

    public function hasPremiumAble()
    {
        $data = Carbon::today();

        $server = $this->hasMany(\App\model\Premiumserver::class);
        //print_r($server);die;
        return $server->where('till_date', '<', $data);
    }

    public function hasVote()
    {
        return $this->hasMany(\App\model\voter_list::class)->where('cron_status', '=', 0);
    }

    public function haspremium()
    {
        $premium = $this->hasOne(\App\model\Premiumserver::class, 'server_id');
        $premium->where('till_date', '>=', Carbon::today());

        return $premium;
    }

    public function premiumcontent()
    {
        return $this->hasOne(\App\model\serverpremiumcontent::class, 'server_id');
    }

    public function langret()
    {
        return $this->belongsTo(\App\model\language::class, 'language', 'code');
    }

    public function metas()
    {
        return $this->hasMany(\App\model\Servermeta::class);
    }
}
