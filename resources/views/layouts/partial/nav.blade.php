<?php

$currentDateTime = date('Y-m-d H:i:s');
$newDateTime = date('h:i A', strtotime($currentDateTime)); //09:25 AM
$current_time_type=[];
$current_time_type=explode(" ",$newDateTime);
$type=$current_time_type[1];
$count_total_index=0;
if($type=='AM')
{


  $count_total_index=DB::table('servers')
                  ->join('uptime_history','uptime_history.server_id','=','servers.id')
                  ->where(['uptime_history.first_section_status'=>1,'servers.status'=>1,'servers.delete_flag'=>0])->where('uptime_history.created_at',date('Y-m-d'))
                  ->count(); 
}
else if($type=='PM')
{
 
   $count_total_index=DB::table('servers')
                  ->join('uptime_history','uptime_history.server_id','=','servers.id')
                  ->where(['uptime_history.second_section_status'=>1,'servers.status'=>1,'servers.delete_flag'=>0])->where('uptime_history.created_at',date('Y-m-d'))
                  ->count(); 
}

    $ip=request()->ip();

    $ip_country_code=@json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));

     $flag=$ip_country_code->geoplugin_countryCode;

     $ip_country_code=strtolower($flag).'.png';


?>

<div>
  
         <nav class="navbar navbar-expand-lg navbar-light navbar-default navbar-fixed-top menu" id="myheader">
            <a class="navbar-brand" href="{{ URL::to('/') }}"><img class="logo-image" src="{{url('images/logo.png')}}" alt="craftnotion" style="width: 120px;"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mymenu" id="navbarNav" style="text-align: center" >
               <ul id="main_menu" class="navbar-nav navbar-right custom-ul">
                  <li class="nav-item">
                     <a class="nav-link"  href="{{ url('alllineage2servers') }}">{{ trans('lang.all_liniar_2_servers') }}</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="{{ url('premiumservers') }}">{{ trans('lang.premium_server') }}</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="{{ url('newservers') }}">{{ trans('lang.new_servers') }}</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="{{ url('comingservers') }}">{{ trans('lang.commingsoon_server') }}</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="{{ url('searchservers') }}">{{ trans('lang.search_server') }}</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="{{ url('addserver') }}">{{ trans('lang.add_new_server') }}</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="{{ url('advertising') }}">{{ trans('lang.advertising') }}</a>
                  </li>
              	  <li class="nav-item hotimage">
                  <!-- <img  src="{{url('/images/imagesAdd/hot1.png')}}"  alt="Hot Tag"/>  -->
                  <a class="nav-link" href="{{ url('lineagerstream') }}">{{ trans('lang.linear2_stream') }}</a>
                  <!-- <img src="{{url('/images/imagesAdd/hot.png')}}" alt="Hot Tag"/> -->
                  </li>
               </ul>

            </div>
           <div class="wrap-panel h-100"  style="width: 227px;">
               @if(Auth::guest())
               <div class="sign mylogin">
                  <img src="/images/loginregister.png"  style="width: 23px;margin-right: 6px;vertical-align: bottom;" alt="Login">
                  <span class="sign-lr"><a href="{{url('/forum/index.php?action=login&page=dashboard')}}">{{ trans('lang.login') }}</a></span>
                  <span class="divider">|</span>
                  <span class="sign-lr"><a href="{{url('/forum/index.php?action=register&page=dashboard')}}">{{ trans('lang.register') }}</a></span>
               </div>
               @else
               <div class="dropdown"> 
                  <a class="btn dropdown-toggle" href="#" role="button" style="background-color: #51bdb5;color: white !important;border: 1px solid white;margin-left: 35px;" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user()->member_name }}
                  </a>
                  <?php $v = "forum/index.php?action=logout&page=dashboard;".$session_var.'='.$session_value; 
                     $prof = "forum/index.php?action=profile&area=account&u=".Auth::User()->id_member; 
                     $forum = "forum/index.php"; 
                     ?>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                     <a class="dropdown-item" href="{{ url($prof) }}">{{ trans('lang.profile') }}</a>
                     <a class="dropdown-item" href="{{ route('userseverlist') }}" >{{ trans('lang.server') }} {{ trans('lang.list') }}</a>
                     
                     <a class="dropdown-item" href="{{ url($v) }}">{{ trans('lang.logout') }}</a>
                  </div>
               </div>
               <!-- <div class="sign">
                  <img src="/images/loginregister.png" alt="Login">
                  <span class="sign-lr"><a href="#"> {{ Auth::user()->member_name }}</a></span>
                  <span class="divider">|</span>
                  <?php $v = "forum/index.php?action=logout&page=dashboard;".$session_var.'='.$session_value; ?>
                  <span class="sign-lr"><a href="{{ url($v) }}"> Logout</a></span>
                  </div>  --> 
               @endif  
               <div class="ip mt-1 " style="font-size: 12px;font-weight: bold;margin-left: 37px">
                 <p class="ip_index_style">  {{ trans('lang.your_ip') }} : <img src="{{url('images/'.$ip_country_code)}}" class="flag_icon" alt="Image"/> <span> {{request()->ip()}}</span>
                     <br>
                  {{ trans('lang.servers') }} {{ trans('lang.indexed') }} : <span> {{ $count_total_index }}</span>
                </p>
              </div>
            </div>
      </nav>
      </div>

<style type="text/css">
   .hotimage{position: relative;}
   li.nav-item.hotimage:before {
    content: '';
    position: absolute;
    width: 50px;
    height: 50px;
    z-index: 16;
    background: url(https://l2hotzone.com/images/imagesAdd/hot.png);
    background-repeat: no-repeat;
    right: 0px;
    top: -19px;
}
   li.nav-item.hotimage:after {
    content: '';
    position: absolute;
    width: 50px;
    height: 50px;
    z-index: 16;
    background: url(https://l2hotzone.com/images/imagesAdd/hot1.png);
    background-repeat: no-repeat;
    left: -11px;
    top: -19px;

}

.flag_icon
{
  height: 20px;
  width: 20px;
}

.ip.mt-1
{
  margin-left: 5px !important;
}

@media (min-width:991px) and (max-width: 1300px)
{
   li.nav-item.hotimage:after {left: -25px;}
   li.nav-item.hotimage:before {right:-16px;}
}
</style>