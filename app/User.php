<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'l2hotzone_devDb_members';

    protected $primaryKey = 'id_member';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'password_salt',
    ];

    public function hasMoneyB()
    {
        return $this->hasOne(\App\model\userMoney::class, 'user_id');
    }

    public function servers()
    {
        return $this->hasMany(\App\model\Server::class, 'user_id');
    }

    public function hasPremium()
    {
        return $this->hasManyThrough(\App\model\Premiumserver::class, \App\model\Server::class);
    }

    public function hasTextAdds()
    {
        return $this->hasMany(\App\model\liveadd::class);
    }
}
