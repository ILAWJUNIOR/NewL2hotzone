<?php

namespace App\Library;

use Auth;
use App\model\bannerliveadd;
use App\model\Server as modelServer;

class UserBanners
{
    public function UserAllBanners($user_id = '')
    {
        $servers = modelServer::pluck('server_name', 'id');
        $banners = bannerliveadd::where(['delete_flag'=>0, 'user_id'=>Auth::id()])->get()->toArray();

        $agency_id = ($agency_id != '') ? $agency_id : Auth::User()->id;

        $hireRequests = AgencyHireRequests::where(['agency_id'=>$agency_id, 'action_flag'=>1, 'delete_flag'=> 0, 'status'=> 1])->pluck('nurse_id');
        $nurseRequests = NurseHireRequests::where(['agency_id'=>$agency_id, 'action_flag'=>1, 'delete_flag'=> 0, 'status'=> 1])->pluck('nurse_id');
        $hireRequests = array_merge($hireRequests->toArray(), $nurseRequests->toArray());

        return $hireRequests;
    }
}
