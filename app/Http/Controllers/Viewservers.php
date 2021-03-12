<?php

namespace App\Http\Controllers;

use DB;

use Auth;

use Session;

use App\User;

use Validator;

use Carbon\Carbon;

use App\model\news;

use EloquentBuilder;

use App\model\Server;

use App\model\stream;

use App\model\messages;

use App\model\Servermeta;

use App\model\voter_list;

use Illuminate\Http\Request;

use App\model\fieldmeta_value;

use App\Http\Requests\freeServer;

use App\model\serverpremiumcontent;

use App\model\Premiumserver as premiumserver;

use App\model\review;

use Illuminate\Contracts\Encryption\DecryptException;

use App\model\uptime_history;


class Viewservers extends Controller
{

    public function __construct()
    {
      
    }
    public function premium()
    {
        $currentDateTime = date('Y-m-d H:i:s');
        $newDateTime = date('h:i A', strtotime($currentDateTime)); //09:25 AM
        $current_time_type=[];
        $current_time_type=explode(" ",$newDateTime);
        $type=$current_time_type[1];
        $count_total_index=0;

        if(isset($_GET['key']) && isset($_GET['value']))
        {

          $key=$_GET['key'];

            if($key=='xpRate')
            {
                 $where_condition=[[$key,'<=',$_GET['value']]];
            }
            else
            {   
                 $where_condition=[[$key,'=',$_GET['value']]];
            }

            if($key=='created_at')
            {
                $value=$_GET['value'];
                if($value=='1')
                {
                    $order_type='ASC';
                }
                else
                {
                    $order_type='DESC';
                }

                if($type=='AM')
                {


                     $premiumserver = Server::where('status', '=', 1)->where('servers.delete_flag','=',0)
                     ->orderBy('servers.updated_at',$order_type)
                    ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')
                    ->join('premiumservers as premiumserver','premiumserver.server_id','=','servers.id')
                    ->where('member.delete_flag','=',0)->where('uptime_history.created_at',date('Y-m-d'))
                    ->join('uptime_history','uptime_history.server_id','=','servers.id')
                    ->where('uptime_history.first_section_status',1)->where('member.delete_flag','=',0)
                    ->with('haspremium')->has('haspremium')

                    ->with('premiumcontent')->with('langret')

                    ->withCount('hasVote as total_count')->with(['hasVote' => function ($query) {
                        $query->where('cron_status', '=', 0);
                    }])->orderBy('created_at','DESC')->groupBy('servers.id')->paginate(15);


                }
                else
                {


                    $premiumserver = Server::where('status', '=', 1)->where('servers.delete_flag','=',0)
                    ->orderBy('servers.updated_at',$order_type)
                    ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')
                    ->join('premiumservers as premiumserver','premiumserver.server_id','=','servers.id')
                    ->where('member.delete_flag','=',0)
                    ->join('uptime_history','uptime_history.server_id','=','servers.id')->where('uptime_history.created_at',date('Y-m-d'))
                    ->where('uptime_history.second_section_status',1)->where('member.delete_flag','=',0)
                    ->with('haspremium')->has('haspremium')

                    ->with('premiumcontent')->with('langret')

                    ->withCount('hasVote as total_count')->with(['hasVote' => function ($query) {
                        $query->where('cron_status', '=', 0);
                    }])->orderBy('created_at','DESC')->groupBy('servers.id')->paginate(15);



                }
            }
            else
            {
            
                if($type=='AM')
                {
                     $premiumserver = Server::where($where_condition)->where('status', '=', 1)->where('servers.delete_flag','=',0)
                    ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')
                    ->join('premiumservers as premiumserver','premiumserver.server_id','=','servers.id')
                    ->where('member.delete_flag','=',0)
                    ->join('uptime_history','uptime_history.server_id','=','servers.id')->where('uptime_history.created_at',date('Y-m-d'))
                    ->where('uptime_history.first_section_status',1)->where('member.delete_flag','=',0)
                    ->with('haspremium')->has('haspremium')

                    ->with('premiumcontent')->with('langret')

                    ->withCount('hasVote as total_count')->with(['hasVote' => function ($query) {
                        $query->where('cron_status', '=', 0);
                    }])->orderBy('created_at','DESC')->orderBy('total_count', 'desc')->groupBy('servers.id')->paginate(15);
                }
                else
                {


                    $premiumserver = Server::where($where_condition)->where('status', '=', 1)->where('servers.delete_flag','=',0)
                    ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')
                    ->join('premiumservers as premiumserver','premiumserver.server_id','=','servers.id')
                    ->where('member.delete_flag','=',0)
                    ->join('uptime_history','uptime_history.server_id','=','servers.id')->where('uptime_history.created_at',date('Y-m-d'))
                    ->where('uptime_history.second_section_status',1)->where('member.delete_flag','=',0)
                    ->with('haspremium')->has('haspremium')

                    ->with('premiumcontent')->with('langret')

                    ->withCount('hasVote as total_count')->with(['hasVote' => function ($query) {
                        $query->where('cron_status', '=', 0);
                    }])->orderBy('created_at','DESC')->orderBy('total_count', 'desc')->groupBy('servers.id')->paginate(15);


                }

            }    

                

        }
        else
        {

            if($type=='AM')
                {
                    // echo "string1";
                    // die;


                    $premiumserver = Server::where('status', '=', 1)->where('servers.delete_flag','=',0)
                    ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')
                    ->join('premiumservers as premiumserver','premiumserver.server_id','=','servers.id')
                    ->where('member.delete_flag','=',0)
                    
                    
                    ->with('haspremium')->has('haspremium')

                    ->with('premiumcontent')->with('langret')

                    ->withCount('hasVote as total_count')->with(['hasVote' => function ($query) {
                        $query->where('cron_status', '=', 0);
                    }])->orderBy('created_at','ASC')->groupBy('servers.id')->paginate(15); 

                    //  $premiumserver = Server::where('status', '=', 1)->where('servers.delete_flag','=',0)
                    // ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')
                    // ->join('premiumservers as premiumserver','premiumserver.server_id','=','servers.id')
                    // ->where('member.delete_flag','=',0)
                    // ->join('uptime_history','uptime_history.server_id','=','servers.id')->where('uptime_history.created_at',date('Y-m-d'))
                    // ->where('uptime_history.first_section_status',1)->where('member.delete_flag','=',0)
                
                    // ->join('languages as language','language.code','=','servers.language')

                    // ->withCount('hasVote as total_count')->with(['hasVote' => function ($query) {
                    //     $query->where('cron_status', '=', 0);
                    // }])->orderBy('created_at','DESC')->orderBy('total_count', 'desc')->groupBy('servers.id')->paginate(15);

                    
                   
                }
                else
                {


                    $premiumserver = Server::where('status', '=', 1)->where('servers.delete_flag','=',0)
                    ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')
                    ->join('premiumservers as premiumserver','premiumserver.server_id','=','servers.id')
                    ->where('member.delete_flag','=',0)
                    
                    
                    ->with('haspremium')->has('haspremium')

                    ->with('premiumcontent')->with('langret')

                    ->withCount('hasVote as total_count')->with(['hasVote' => function ($query) {
                        $query->where('cron_status', '=', 0);
                    }])->orderBy('created_at','DESC')->orderBy('total_count', 'desc')->groupBy('servers.id')->paginate(15);      
                    

                }
        }    

       


        return view('serverslist')->with('premiumlists', $premiumserver)->with('paginate_records', $premiumserver);


    }

    /** * New Servers * * */
    public function newServer()
    {
        $currentDateTime = date('Y-m-d H:i:s');
        $newDateTime = date('h:i A', strtotime($currentDateTime)); //09:25 AM
        $current_time_type=[];
        $current_time_type=explode(" ",$newDateTime);
        $type=$current_time_type[1];
        $count_total_index=0;

        if(isset($_GET['key']) && isset($_GET['value']))
        {
            $key=$_GET['key'];

            if($key=='xpRate')
            {
                 $where_condition=[[$key,'<=',$_GET['value']]];
            }
            else
            {   
                 $where_condition=[[$key,'=',$_GET['value']]];
            }
            if($key=='created_at')
            {
                $value=$_GET['value'];
                if($value=='1')
                {
                    $order_type='ASC';
                }
                else
                {
                    $order_type='DESC';
                }

                if($type=='AM')
                {

                $newServer = Server::where('status', '=', 1)->where('servers.delete_flag','=',0)->orderBy('servers.updated_at',$order_type)
                ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')->where('member.delete_flag','=',0)
                ->join('uptime_history','uptime_history.server_id','=','servers.id')
                ->where('uptime_history.first_section_status',1)->where('member.delete_flag','=',0)->where('uptime_history.created_at',date('Y-m-d'))
                ->with('haspremium')

                ->with('premiumcontent')->with('langret')

                ->withCount('hasVote as total_count')->with(['hasVote' => function ($query) {
                    $query->where('cron_status', '=', 0);
                }])->orderBy('updated_at','DESC')->groupBy('servers.id')->take(30)->get();


                }
                else
                {
                      $newServer = Server::where('status', '=', 1)->where('servers.delete_flag','=',0)->orderBy('servers.updated_at',$order_type)
                    ->where('date','=',null)->orWhere('date','<=',NOW())
                    ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')->where('member.delete_flag','=',0)
                    ->join('uptime_history','uptime_history.server_id','=','servers.id')
                    ->where('uptime_history.second_section_status',1)->where('member.delete_flag','=',0)->where('uptime_history.created_at',date('Y-m-d'))
                    ->with('haspremium')

                    ->with('premiumcontent')->with('langret')

                    ->withCount('hasVote as total_count')->with(['hasVote' => function ($query) {
                        $query->where('cron_status', '=', 0);
                    }])->orderBy('updated_at','DESC')->groupBy('servers.id')->take(30)->get();


                }
            }
            else
            {
                if($type=='AM')
                {

                $newServer = Server::where($where_condition)->where('status', '=', 1)->where('servers.delete_flag','=',0)
                ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')->where('member.delete_flag','=',0)
                ->join('uptime_history','uptime_history.server_id','=','servers.id')
                ->where('uptime_history.first_section_status',1)->where('member.delete_flag','=',0)->where('uptime_history.created_at',date('Y-m-d'))
                ->with('haspremium')

                ->with('premiumcontent')->with('langret')

                ->withCount('hasVote as total_count')->with(['hasVote' => function ($query) {
                    $query->where('cron_status', '=', 0);
                }])->orderBy('updated_at', 'desc')->groupBy('servers.id')->take(30)->get();

                }
                else
                {
                      $newServer = Server::where($where_condition)->where('status', '=', 1)->where('servers.delete_flag','=',0)
                      //->where('date','=',null)->orWhere('date','<=',NOW())
                    ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')->where('member.delete_flag','=',0)
                    ->join('uptime_history','uptime_history.server_id','=','servers.id')
                    ->where('uptime_history.second_section_status',1)->where('member.delete_flag','=',0)->where('uptime_history.created_at',date('Y-m-d'))
                    ->with('haspremium')

                    ->with('premiumcontent')->with('langret')

                    ->withCount('hasVote as total_count')->with(['hasVote' => function ($query) {
                        $query->where('cron_status', '=', 0);
                    }])->orderBy('updated_at', 'desc')->groupBy('servers.id')->take(30)->get();


                }
            }    
        }
        else
        {
            if($type=='AM')
            {

        //        $newServer = Server::where('status', '=', 1)->where('servers.delete_flag','=',0)
        // ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')
        //  ->join('uptime_history','uptime_history.server_id','=','servers.id')->where('uptime_history.created_at',date('Y-m-d'))
        //   ->where('uptime_history.second_section_status',1)
        // ->with('haspremium')

        // ->with('premiumcontent')->with('langret')
        // ->where('member.delete_flag','=',0)
        // ->withCount('hasVote as total_count')->with(['hasVote' => function ($query) {
        //     $query->where('cron_status', '=', 0);
        // }])->orderBy('updated_at', 'desc')->groupBy('servers.id')->take(30)->get();

            $newServer = Server::where('status', '=', 1)->where('servers.delete_flag','=',0)
            ->where('servers.servertype_1','=','3')
            ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')->where('member.delete_flag','=',0)
            ->join('uptime_history','uptime_history.server_id','=','servers.id')
            ->where('uptime_history.first_section_status',1)->where('member.delete_flag','=',0)->where('uptime_history.created_at',date('Y-m-d'))
            ->with('haspremium')

            ->with('premiumcontent')
            ->with('langret')

            ->withCount('hasVote as total_count')->with(['hasVote' => function ($query) {
                $query->where('cron_status', '=', 0);
            }])->orderBy('updated_at','DESC')->groupBy('servers.id')->take(30)->get();

            
            }
            else
            {

                $newServer = Server::where('status', '=', 1)->where('servers.delete_flag','=',0)
                ->where('servers.servertype_1','=','3')
                ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')
                 ->join('uptime_history','uptime_history.server_id','=','servers.id')->where('uptime_history.created_at',date('Y-m-d'))
                  ->where('uptime_history.second_section_status',1)
                ->with('haspremium')

                ->with('premiumcontent')->with('langret')
                ->where('member.delete_flag','=',0)
                ->withCount('hasVote as total_count')->with(['hasVote' => function ($query) {
                    $query->where('cron_status', '=', 0);
                }])->orderBy('updated_at', 'desc')->groupBy('servers.id')->take(30)->get();
                

                //   $newServer = Server::where('status', '=', 1)->where('servers.delete_flag','=',0)
                // ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')->where('member.delete_flag','=',0)
                // ->join('uptime_history','uptime_history.server_id','=','servers.id')
                // ->where('uptime_history.second_section_status',1)->where('member.delete_flag','=',0)->where('uptime_history.created_at',date('Y-m-d'))
                // ->with('haspremium')

                // ->with('premiumcontent')->with('langret')

                // ->withCount('hasVote as total_count')->with(['hasVote' => function ($query) {
                //     $query->where('cron_status', '=', 0);
                // }])->orderBy('updated_at', 'desc')->groupBy('servers.id')->take(30)->get();

                
            }
        }   

        
        return view('serverslist')->with('premiumlists', $newServer)->with('paginate_records', '');
    }

    public function comingserver()
    {
         // $upcomingServer = Server::where('status','=',1)
         //            ->where('date', '>=', NOW())
         //            ->where('servers.delete_flag',0)->where('date','!=',null)
         //            ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')
         //            ->where('servers.active_status',"!=",1)
         //            ->join('languages as language','language.code','=','servers.language')
         //            ->withCount('hasVote as total_count')->with(['hasVote' => function ($query) {
         //                $query->where('cron_status', '=', 0);
         //            }])
         //            ->orderBy('id','desc')->limit(13)
         //            ->where('member.delete_flag','=',0)->limit(10)
         //            ->groupBy('servers.id')
         //            ->get();


                    $upcomingServer = Server::where('status','=',1)
                    ->where('date', '>=', NOW())
                    ->where('servers.delete_flag',0)->where('date','!=',null)
                    ->where('servers.servertype_1',"!=",3)
                    ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')
                    ->join('languages as language','language.code','=','servers.language')
                    ->withCount('hasVote as total_count')->with(['hasVote' => function ($query) {
                        $query->where('cron_status', '=', 0);
                    }])
                    ->orderBy('id','desc')
                    ->where('member.delete_flag','=',0)
                    ->groupBy('servers.id')
                    ->get();


            
         if(isset($_GET['key']) && isset($_GET['value']))
         {
            $key=$_GET['key'];

            if($key=='xpRate')
            {
                 $where_condition=[[$key,'<=',$_GET['value']]];
            }
            else
            {   
                 $where_condition=[[$key,'=',$_GET['value']]];
            }
            if($key=='created_at')
            {
                 $value=$_GET['value'];
                if($value=='1')
                {
                    $order_type='ASC';
                }
                else
                {
                    $order_type='DESC';
                }

                $upcomingServer = Server::where('status', '=', 1)->where('date', '>=', NOW())->where('servers.delete_flag',0)->where('date','!=',null)
                ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')->where('member.delete_flag','=',0)
                ->with('haspremium')->has('haspremium')
                ->with('premiumcontent')->with('langret')
                ->withCount('hasVote as total_count')->with(['hasVote' => function ($query) {
                    $query->where('cron_status', '=', 0);
                }])
                ->orderBy('servers.date',$order_type)
                ->groupBy('servers.id')
                ->get();
            }
            else
            {
                $upcomingServer = Server::where($where_condition)->where('status', '=', 1)->where('date', '>=', NOW())->where('servers.delete_flag',0)->where('date','!=',null)
                ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')->where('member.delete_flag','=',0)
                ->with('haspremium')->has('haspremium')
                ->with('premiumcontent')->with('langret')
                ->withCount('hasVote as total_count')->with(['hasVote' => function ($query) {
                    $query->where('cron_status', '=', 0);}])
                ->orderBy('id','desc')
                ->groupBy('servers.id')
                ->get();
            }
        }
        else
        {
            //  $upcomingServer = Server::where('status', '=', 1)->where('date', '>=', NOW())->where('servers.delete_flag',0)->where('date','!=',null)
            // ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')->where('member.delete_flag','=',0)
            // ->with('haspremium')->has('haspremium')
            // ->with('premiumcontent')->with('langret')
            // ->withCount('hasVote as total_count')->with(['hasVote' => function ($query) {
            //     $query->where('cron_status', '=', 0);}])
            // ->orderBy('id', 'desc')->limit(13)
            // ->groupBy('servers.id')
            // ->get();

           
        }

       

        return view('serverslist')->with('premiumlists', $upcomingServer)->with('paginate_records','')->with('commingSoonPage',1);
    }

    public function allTopserver()
    {

        // $count_details=DB::table('voter_lists')
        //          ->select('*', DB::raw('count(*) as total_vote'))
        //          ->groupBy('server_id')
        //          ->get();       
       

        $currentDateTime = date('Y-m-d H:i:s');
        $newDateTime = date('h:i A', strtotime($currentDateTime)); //09:25 AM
        $current_time_type=[];
        $current_time_type=explode(" ",$newDateTime);
        $type=$current_time_type[1];
        $count_total_index=0;

        if(isset($_GET['key']) && isset($_GET['value']))
        {
            $key=$_GET['key'];

            if($key=='xpRate')
            {
                 $where_condition=[[$key,'<=',$_GET['value']]];
            }
            else
            {   
                 $where_condition=[[$key,'=',$_GET['value']]];
            }

            if($key=='created_at')
            {
                $value=$_GET['value'];
                if($value=='1')
                {
                    $order_type='ASC';
                }
                else
                {
                    $order_type='DESC';
                }
                if($type=='AM')
                {
                    $paginate_records = $topserver = Server::where('status', '=', 1)->where('servers.delete_flag',0)->orderBy('servers.updated_at',$order_type)
                    ->where('servers.servertype_1','=','3')
                    ->join('uptime_history','uptime_history.server_id','=','servers.id')
                    ->where('uptime_history.first_section_status',1)->where('member.delete_flag','=',0)
                    ->where('uptime_history.created_at',date('Y-m-d'))
                    ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')->where('member.delete_flag','=',0)
                    ->with('haspremium')

                    ->with('premiumcontent')->with('langret')

                    ->withCount('hasVote as total_count')->groupBy('servers.id')->take(40)->paginate(15);
                    

                }
                else
                {
                   
                    $paginate_records = $topserver = Server::where('status', '=', 1)->where('servers.delete_flag',0)->orderBy('servers.updated_at',$order_type)
                    ->where('servers.servertype_1','=','3')
                    ->join('uptime_history','uptime_history.server_id','=','servers.id')
                    ->where('uptime_history.second_section_status',1)->where('member.delete_flag','=',0)->where('uptime_history.created_at',date('Y-m-d'))
                    ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')->where('member.delete_flag','=',0)
                    ->with('haspremium')

                    ->with('premiumcontent')->with('langret')

                    ->withCount('hasVote as total_count')->groupBy('servers.id')->take(40)->paginate(15); 
                    
                    
                }
            }
            else
            {
                if($type=='AM')
                {
                    $paginate_records = $topserver = Server::where($where_condition)->where('status', '=', 1)->where('servers.delete_flag',0)
                    ->where('servers.servertype_1','=','3')
                    ->join('uptime_history','uptime_history.server_id','=','servers.id')
                    ->where('uptime_history.first_section_status',1)->where('member.delete_flag','=',0)
                    ->where('uptime_history.created_at',date('Y-m-d'))
                    ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')->where('member.delete_flag','=',0)
                    ->with('haspremium')

                    ->with('premiumcontent')->with('langret')

                    ->withCount('hasVote as total_count')->orderBy('total_count', 'desc')->groupBy('servers.id')->take(40)->paginate(15);
                }
                else
                {
                   
                    $paginate_records = $topserver = Server::where($where_condition)->where('status', '=', 1)->where('servers.delete_flag',0)
                    ->where('servers.servertype_1','=','3')
                    ->join('uptime_history','uptime_history.server_id','=','servers.id')
                    ->where('uptime_history.second_section_status',1)->where('member.delete_flag','=',0)->where('uptime_history.created_at',date('Y-m-d'))
                    ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')->where('member.delete_flag','=',0)
                    ->with('haspremium')

                    ->with('premiumcontent')->with('langret')

                    ->withCount('hasVote as total_count')->orderBy('total_count', 'desc')->groupBy('servers.id')->take(40)->paginate(15); 
                }
            }       
        }
        else
        {
            if($type=='AM')
            {
            $paginate_records = $topserver = Server::where('status', '=', 1)->where('servers.delete_flag',0)
            ->where('servers.servertype_1','=','3')
            ->join('uptime_history','uptime_history.server_id','=','servers.id')
            ->where('uptime_history.first_section_status',1)->where('member.delete_flag','=',0)
            ->where('uptime_history.created_at',date('Y-m-d'))
            ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')->where('member.delete_flag','=',0)
            ->with('haspremium')

            ->with('premiumcontent')->with('langret')

            ->withCount('hasVote as total_count')->orderBy('total_count', 'desc')->groupBy('servers.id')->take(40)->paginate(15);


            }
            else
            {
                $paginate_records = $topserver =Server::where('status', '=', 1)->where('servers.delete_flag',0)
                ->where('servers.servertype_1','=','3')
                ->join('uptime_history','uptime_history.server_id','=','servers.id')
                ->where('uptime_history.second_section_status',1)->where('member.delete_flag','=',0)
                ->where('uptime_history.created_at',date('Y-m-d'))
                ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')->where('member.delete_flag','=',0)
                ->with('haspremium')

                ->with('premiumcontent')->with('langret')

                ->withCount('hasVote as total_count')->orderBy('total_count', 'DESC')->groupBy('servers.id')->take(40)->paginate(15); 
                // echo "<pre>";
                // print_r($topserver);
                // die;
                
            }
        }
       
        return view('serverslist')->with('premiumlists', $topserver)->/*with('vote_info',$vote_info)->*/with('paginate_records', $paginate_records);
    }

    public function lineagerstream()
    {
        $stream_data = DB::table('l2hotzone_stream')->where('status', '=', '1')->whereDate('expired_date', '>', date('Y-m-d'))->get();

        foreach ($stream_data as $key => $value) {
            $a[$value->location] = $value;
        }

        return view('lineagerstream', compact('stream_data'));
    }

    /**
     * home page all servers.

     *

     *  */
    public function homepage()
    {
 
        $currentDateTime = date('Y-m-d H:i:s');
        $newDateTime = date('h:i A', strtotime($currentDateTime)); //09:25 AM
        $current_time_type=[];
        $current_time_type=explode(" ",$newDateTime);
        $type=$current_time_type[1];
        $count_total_index=0;

        $textLive = DB::table('liveadds as live')

                        ->select('live.*', 'textads.*', 'ser.*')

                        ->join('textads', 'live.textad_id', '=', 'textads.id')

                        ->join('servers as ser', 'live.server_id', '=', 'ser.id')

                        ->where('ser.status', '=', 1)
                        ->where('ser.delete_flag',0)
                        ->where('live.active_status',1)
                        ->where('live.delete_flag',0)
                        ->get()

                        ->groupBy('category');

        $textAdds = [];

        foreach ($textLive as $key=>$textLiv) {
            $textAdds[$key] = $textLiv->groupBy('cType');
        }

        if($type=='AM')
        {
            $textResult = DB::table('liveadds as live')

                        ->select('live.*', 'textads.*', 'ser.*')

                        ->join('textads', 'live.textad_id', '=', 'textads.id')

                        ->join('servers as ser', 'live.server_id', '=', 'ser.id')

                        ->join('uptime_history','uptime_history.server_id','=','ser.id')
                        ->where('uptime_history.first_section_status',1)
                        ->where('uptime_history.created_at',date('Y-m-d'))
                        ->where('ser.status', '=', 1)
                        ->where('live.active_status',1)
                        ->where('live.delete_flag',0)
                        ->groupBy('category')

                        ->get();

        }
        else
        {
            $textResult = DB::table('liveadds as live')

                        ->select('live.*', 'textads.*', 'ser.*')

                        ->join('textads', 'live.textad_id', '=', 'textads.id')

                        ->join('servers as ser', 'live.server_id', '=', 'ser.id')

                        ->join('uptime_history','uptime_history.server_id','=','ser.id')
                        ->where('uptime_history.second_section_status',1)
                        ->where('uptime_history.created_at',date('Y-m-d'))
                        ->where('ser.status', '=', 1)
                        ->where('live.active_status',1)
                        ->where('live.delete_flag',0)
                        ->groupBy('category')

                        ->get();

        }


         
        foreach ($textResult as $key => $value) 
        {
            $textResults[$value->category][$value->position] = $value;
        }
      

        $textad_main = DB::table('textads as ads')->where(array('status'=>1,'delete_flag'=>0))->get();
        foreach ($textad_main as $key => $value) 
        {
            $textad_sub[$value->category][$value->position] = $value;
        }

        if($type=='AM')
        {


            // $premiumservers = Server::where('status', '=', 1)->where('servers.delete_flag','=',0)
            //         ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')
            //         ->where('member.delete_flag','=',0)
            //         ->join('uptime_history','uptime_history.server_id','=','servers.id')->where('uptime_history.created_at',date('Y-m-d'))
            //         ->where('uptime_history.first_section_status',1)->where('member.delete_flag','=',0)
                    
            //         ->join('languages as language','language.code','=','servers.language')

            //         ->withCount('hasVote as total_count')->with(['hasVote' => function ($query) {
            //             $query->where('cron_status', '=', 0);
            //         }])->orderBy('created_at','DESC')->groupBy('servers.id')->limit(13)->get();

            // $premiumservers = Server::where('status', '=', 1)->where('servers.delete_flag',0)
            // ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')
            // ->join('premiumservers as premiumserver','premiumserver.server_id','=','servers.id')
            //  ->join('uptime_history','uptime_history.server_id','=','servers.id')
            //   ->where('uptime_history.first_section_status',1)
            //   ->where('member.delete_flag','=',0)->where('uptime_history.created_at',date('Y-m-d'))
            // ->with('haspremium')->has('haspremium')

            // ->with('premiumcontent')->with('langret')

            // ->withCount('hasVote as total_count')->with(['hasVote' => function ($query) {
            //     $query->where('cron_status', '=', 0);
            // }])->orderBy('total_count', 'desc')->groupBy('servers.id')->limit(13)->get();

            $premiumservers = Server::where('status', '=', 1)->where('servers.delete_flag','=',0)
            ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')
            ->join('premiumservers as premiumserver','premiumserver.server_id','=','servers.id')
             
            ->with('haspremium')->has('haspremium')

            ->with('premiumcontent')->with('langret')

            ->withCount('hasVote as total_count')->with(['hasVote' => function ($query) {
                $query->where('cron_status', '=', 0);
            }])->orderBy('created_at','DESC')->orderBy('total_count', 'desc')->groupBy('servers.id')->limit(13)->get();

            $premiumyourtextservers = Server::where('status', '=', 1)->where('servers.delete_flag',0)
            ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')
            ->join('premiumservers as premiumserver','premiumserver.server_id','=','servers.id')
            ->join('uptime_history','uptime_history.server_id','=','servers.id')->where('uptime_history.created_at',date('Y-m-d'))
              ->where('uptime_history.first_section_status',1)
              ->where('member.delete_flag','=',0)
            ->with('haspremium')->has('haspremium')

            ->with('premiumcontent')->with('langret')

            ->withCount('hasVote as total_count')->with(['hasVote' => function ($query) {
                $query->where('cron_status', '=', 0);
            }])->orderBy('created_at','DESC')->groupBy('servers.id')->limit(10)->get();


        }
        else
        {

            // $premiumservers = Server::where('status', '=', 1)->where('servers.delete_flag','=',0)
            //         ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')
            //         ->where('member.delete_flag','=',0)
            //         ->join('uptime_history','uptime_history.server_id','=','servers.id')->where('uptime_history.created_at',date('Y-m-d'))
            //         ->where('uptime_history.first_section_status',1)->where('member.delete_flag','=',0)
                    
            //         ->join('languages as language','language.code','=','servers.language')

            //         ->withCount('hasVote as total_count')->with(['hasVote' => function ($query) {
            //             $query->where('cron_status', '=', 0);
            //         }])->orderBy('created_at','DESC')->groupBy('servers.id')->limit(13)->get();

           $premiumservers = Server::where('status', '=', 1)->where('servers.delete_flag','=',0)
            ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')
            ->join('premiumservers as premiumserver','premiumserver.server_id','=','servers.id')
             
            ->with('haspremium')->has('haspremium')

            ->with('premiumcontent')->with('langret')

            ->withCount('hasVote as total_count')->with(['hasVote' => function ($query) {
                $query->where('cron_status', '=', 0);
            }])->orderBy('created_at','DESC')->orderBy('total_count', 'desc')->groupBy('servers.id')->limit(13)->get();



            $premiumyourtextservers = Server::where('status', '=', 1)->where('servers.delete_flag','=',0)
            ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')
            ->join('uptime_history','uptime_history.server_id','=','servers.id')->where('uptime_history.created_at',date('Y-m-d'))
              ->where('uptime_history.second_section_status',1)
              ->where('member.delete_flag','=',0)
            ->with('haspremium')->has('haspremium')

            ->with('premiumcontent')->with('langret')

            ->withCount('hasVote as total_count')->with(['hasVote' => function ($query) {
                $query->where('cron_status', '=', 0);
            }])->orderBy('created_at','DESC')->groupBy('servers.id')->limit(10)->get(); 

            
        }


        // New end here
        if($type=='AM')
        {

        $newServer = Server::where('status', '=', 1)->where('servers.delete_flag','=',0)
        ->where('servers.servertype_1','=','3')
        ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')
         ->join('uptime_history','uptime_history.server_id','=','servers.id')->where('uptime_history.created_at',date('Y-m-d'))
          ->where('uptime_history.first_section_status',1)
          ->where('member.delete_flag','=',0)
        ->with('haspremium')

        ->with('premiumcontent')->with('langret')

        ->withCount('hasVote as total_count')->with(['hasVote' => function ($query) {
            $query->where('cron_status', '=', 0);
        }])->orderBy('updated_at','DESC')->groupBy('servers.id')->limit(10)->get();


         $newyourtextServer = Server::where('status', '=', 1)->where('servers.delete_flag','=',0)
         
         ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')
         ->join('uptime_history','uptime_history.server_id','=','servers.id')->where('uptime_history.created_at',date('Y-m-d'))
          ->where('uptime_history.first_section_status',1)
          ->where('member.delete_flag','=',0)
        ->with('haspremium')

        ->with('premiumcontent')->with('langret')

        ->withCount('hasVote as total_count')->with(['hasVote' => function ($query) {
            $query->where('cron_status', '=', 0);
        }])->orderBy('updated_at','DESC')->groupBy('servers.id')->limit(10)->get();

        // echo "<pre>";
        // print_r($newServer);
        // die;

        }
        else
        {
            $newServer = Server::where('status', '=', 1)->where('servers.delete_flag','=',0)
        ->where('servers.servertype_1','=','3')
        ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')

         ->join('uptime_history','uptime_history.server_id','=','servers.id')->where('uptime_history.created_at',date('Y-m-d'))
          ->where('uptime_history.second_section_status',1)
        ->with('haspremium')

        ->with('premiumcontent')->with('langret')
        ->where('member.delete_flag','=',0)
        ->withCount('hasVote as total_count')->with(['hasVote' => function ($query) {
            $query->where('cron_status', '=', 0);
        }])->groupBy('servers.id')->limit(10)->get();


         $newyourtextServer = Server::where('status', '=', 1)->where('servers.delete_flag','=',0)
         ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')
         ->join('uptime_history','uptime_history.server_id','=','servers.id')->where('uptime_history.created_at',date('Y-m-d'))
          ->where('uptime_history.second_section_status',1)
        ->with('haspremium')

        ->with('premiumcontent')->with('langret')
        ->where('member.delete_flag','=',0)
        ->withCount('hasVote as total_count')->with(['hasVote' => function ($query) {
            $query->where('cron_status', '=', 0);
        }])->groupBy('servers.id')->limit(10)->get();


        
        }

        if($type=='AM')
        {
        $topServer = Server::where('status', '=', 1)->where('servers.delete_flag','=',0)
        ->where('servers.servertype_1','=','3')
        ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')
         ->join('uptime_history','uptime_history.server_id','=','servers.id')->where('uptime_history.created_at',date('Y-m-d'))
          ->where('uptime_history.first_section_status',1)->where('member.delete_flag','=',0)
        ->with('haspremium')

        ->with('premiumcontent')->with('langret')

        ->withCount('hasVote as total_count')->orderBy('total_count', 'desc')->groupBy('servers.id')->limit(10)->get();

        $toptextServer = Server::where('status', '=', 1)->where('servers.delete_flag','=',0)
        ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')
         ->join('uptime_history','uptime_history.server_id','=','servers.id')->where('uptime_history.created_at',date('Y-m-d'))
          ->where('uptime_history.first_section_status',1)->where('member.delete_flag','=',0)
        ->with('haspremium')

        ->with('premiumcontent')->with('langret')

        ->withCount('hasVote as total_count')->orderBy('total_count', 'desc')->groupBy('servers.id')->limit(10)->get();

        
        }
        else
        {
            $topServer = Server::where('status', '=', 1)->where('servers.delete_flag','=',0)
            ->where('servers.servertype_1','=','3')
            ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')
             ->join('uptime_history','uptime_history.server_id','=','servers.id')->where('uptime_history.created_at',date('Y-m-d'))
              ->where('uptime_history.second_section_status',1)->where('member.delete_flag','=',0)
            ->with('haspremium')

            ->with('premiumcontent')->with('langret')

            ->withCount('hasVote as total_count')->orderBy('total_count', 'desc')->groupBy('servers.id')->limit(10)->get();

            $toptextServer = Server::where('status', '=', 1)->where('servers.delete_flag','=',0)
            ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')
             ->join('uptime_history','uptime_history.server_id','=','servers.id')->where('uptime_history.created_at',date('Y-m-d'))
              ->where('uptime_history.second_section_status',1)->where('member.delete_flag','=',0)
            ->with('haspremium')

            ->with('premiumcontent')->with('langret')

            ->withCount('hasVote as total_count')->orderBy('total_count', 'desc')->groupBy('servers.id')->limit(10)->get();
        }

        
        

         if($type=='AM')
        {
            // echo "string";
            // die;
           $upcomingServer = Server::where('status','=',1)
                    ->where('date', '>=', NOW())
                    ->where('servers.delete_flag',0)
                    ->where('date','!=',null)
                    ->where('servers.servertype_1',"=",1)
                    ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')
                    ->join('languages as language','language.code','=','servers.language')
                    ->withCount('hasVote as total_count')->with(['hasVote' => function ($query) {
                        $query->where('cron_status', '=', 0);
                    }])
                    ->orderBy('id','desc')->limit(13)
                    ->where('member.delete_flag','=',0)->limit(10)
                    ->groupBy('servers.id')
                    ->get();

            // echo "<pre>";
            // print_r($upcomingServer);
            // die;        

                    // this===========
        //  $upcomingServer = Server::where('status', '=', 1)->where('date', '>=', Carbon::today())->where('servers.delete_flag','=',0)
        //  ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')
        //   ->join('uptime_history','uptime_history.server_id','=','servers.id')->where('uptime_history.created_at',date('Y-m-d'))
        //   ->where('uptime_history.first_section_status',1)->where('member.delete_flag','=',0)
        // ->with('haspremium')->has('haspremium')

        // ->with('premiumcontent')->with('langret')

        // ->withCount('hasVote as total_count')->with(['hasVote' => function ($query) {
        //     $query->where('cron_status', '=', 0);
        // }])->orderBy('id', 'desc')->groupBy('servers.id')->get();


         $upcomingtextServer = Server::where('status', '=', 1)->where('date', '>=', Carbon::today())->where('servers.delete_flag','=',0)
         ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')
          ->join('uptime_history','uptime_history.server_id','=','servers.id')->where('uptime_history.created_at',date('Y-m-d'))
          ->where('uptime_history.first_section_status',1)->where('member.delete_flag','=',0)
        ->with('haspremium')->has('haspremium')

        ->with('premiumcontent')->with('langret')

        ->withCount('hasVote as total_count')->with(['hasVote' => function ($query) {
            $query->where('cron_status', '=', 0);
        }])->orderBy('id', 'desc')->groupBy('servers.id')->limit(10)->get();

        // echo "<pre>";
        // print_r($upcomingServer);
        // die;

        }
        else
        {
        //      $upcomingServer = Server::where('status', '=', 1)->where('date', '>=', Carbon::today())->where('servers.delete_flag','=',0)
        //  ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')
        //   ->join('uptime_history','uptime_history.server_id','=','servers.id')->where('uptime_history.created_at',date('Y-m-d'))
        //   ->where('uptime_history.second_section_status',1)->where('member.delete_flag','=',0)
        // ->with('haspremium')->has('haspremium')

        // ->with('premiumcontent')->with('langret')

        // ->withCount('hasVote as total_count')->with(['hasVote' => function ($query) {
        //     $query->where('cron_status', '=', 0);
        // }])->orderBy('id', 'desc')->groupBy('servers.id')->get();

            $upcomingServer = Server::where('status','=',1)
                    ->where('date', '>=', NOW())
                    ->where('servers.delete_flag',0)->where('date','!=',null)
                    ->where('servers.servertype_1',"!=",3)
                    ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')
                    
                    ->join('languages as language','language.code','=','servers.language')
                    ->withCount('hasVote as total_count')->with(['hasVote' => function ($query) {
                        $query->where('cron_status', '=', 0);
                    }])
                    ->orderBy('id','desc')->limit(13)
                    ->where('member.delete_flag','=',0)->limit(10)
                ->groupBy('servers.id')
                    ->get();


         $upcomingtextServer = Server::where('status', '=', 1)->where('date', '>=', Carbon::today())->where('servers.delete_flag','=',0)
         ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')
          ->join('uptime_history','uptime_history.server_id','=','servers.id')->where('uptime_history.created_at',date('Y-m-d'))
          ->where('uptime_history.second_section_status',1)->where('member.delete_flag','=',0)
        ->with('haspremium')->has('haspremium')

        ->with('premiumcontent')->with('langret')

        ->withCount('hasVote as total_count')->with(['hasVote' => function ($query) {
            $query->where('cron_status', '=', 0);
        }])->orderBy('id', 'desc')->groupBy('servers.id')->limit(10)->get();



        }
        
            
        $check_array = array('0'=>0,'1'=>1,'2'=>2);

        $atleast_server_no_data = Server::where('status', '=', 1)->where('delete_flag',0)->limit(1)->get();
        
        

        
        foreach ($premiumyourtextservers as $key1 => $value1) 
        {

            $atleast_server[0] = $value1;
          
            if(isset($textResults['premium'][$key1]))
            {
                $premser12[$key1] = $textResults['premium'][$key1];
            }
            else if(isset($textad_sub['premium'][$key1]))
            {
               
                $premser12[$key1] = $value1;
                $premser12[$key1]['server_name'] = "Your Server Here";
            } 
                            
        }
        foreach ($atleast_server_no_data as $key => $value) 
        {
           
            $atleast_server[0] = empty($atleast_server[0]) ? $value : $atleast_server[0];
        }
           
        foreach ($newyourtextServer as $key1 => $value1) 
        {
            if(isset($textResults['newest'][$key1]))
            {
                $newyourtext[$key1] = $textResults['newest'][$key1];
            }
            else if(isset($textad_sub['newest'][$key1]))
            {
               
                $newyourtext[$key1] = $value1;
                $newyourtext[$key1]['server_name'] = "Your Server Here";
            } 
                    
        }

        foreach ($toptextServer as $key => $value) 
        {
            if(isset($textResults['top'][$key]))
            {
                $toptext[$key] = $textResults['top'][$key];
            }
            else if(isset($textad_sub['top'][$key]))
            {
               
                $toptext[$key] = $value;
                $toptext[$key]->server_name = "Your Server Here";
            }
                    
        }


           
         
            foreach ($upcomingtextServer as $key => $value) 
            {

                if(isset($textResults['upcoming'][$key]))
                {
                    $upcomingtext[$key] = $textResults['upcoming'][$key];
                }
                else if(isset($textad_sub['upcoming'][$key]))
                {
                    $upcomingtext[$key] = $value;
                    $upcomingtext[$key]->server_name = "Your Server Here";
                }
                
            }

        foreach ($check_array as $key => $value) 
        {
            if(!isset($premser12[$key]))
            {
                $premser12[$key] = $atleast_server[0];
                $premser12[$key]->server_name = "Your Server Here";
            }
            if(!isset($newyourtext[$key]))
            {
                $newyourtext[$key] = $atleast_server[0];
                $newyourtext[$key]->server_name = "Your Server Here";
            }
            if(!isset($toptext[$key]))
            {
                $toptext[$key] = $atleast_server[0];
                $toptext[$key]->server_name = "Your Server Here";
            }
            if(!isset($upcomingtext[$key]))
            {
                $upcomingtext[$key] = $atleast_server[0];
                $upcomingtext[$key]->server_name = "Your Server Here";
            }
        }
      

        $user_news = messages::Join('l2hotzone_devDb_members', 'l2hotzone_devDb_members.id_member', '=', 'l2hotzone_devDb_messages.id_member')->where('l2hotzone_devDb_members.id_group', '!=', 1)->where('l2hotzone_devDb_messages.id_board', 1)->where('l2hotzone_devDb_members.delete_flag','=',0)->orderBy('l2hotzone_devDb_messages.id_msg', 'desc')->take(5)->get();

        

        return view('welcome')

                ->with('premiumservers', $premser12)
                ->with('premiummainservers', $premiumservers)
                ->with('newservers', $newServer)
                ->with('newyourtextServer', $newyourtext)
                ->with('topservers', $topServer)
                ->with('toptext', $toptext)
                ->with('upcomingServers', $upcomingServer)
                ->with('upcomingtext', $upcomingtext)
                ->with('textAdds', $textAdds)

                ->with('latestNes', $user_news);
    }

    /**
     * Server Detail show correct.
     */
    public function serverdetail($id, $servername)
    {
        $serverDetails = Server::leftJoin('premiumservers', 'servers.id', '=', 'premiumservers.server_id')

        ->select('servers.*', 'premiumservers.till_date', 'languages.lang')->where('servers.delete_flag',0)

        ->leftJoin('languages', 'servers.language', '=', 'languages.code')

        ->withCount('hasVote as total')->with(['hasVote' => function ($query) {
            $query->where('cron_status', '=', 0);
        }])

        ->where('servers.id', '=', $id)->where('servers.server_name', '=', $servername)

        ->first(); 
        

        $metas = Servermeta::where('server_id', '=', $id)->where('flag','1')->get()->toArray();

        $newsserver = news::where('server_id', '=', $id)->orderBy('id', 'desc')->get();

        $premiumcontent = serverpremiumcontent::where('server_id', $id)->orderBy('id', 'desc')->first();

        $fullarrays = [

            'SPrate'=>0,

            'NPCbuffer'=>0,

            'GlobalGK'=>0,

            'Customzone'=>0,

            'Customweapon'=>0,

            'Customarmor'=>0,

            'Offlineshop'=>0, ];
           
             
        foreach ($metas as $key => $value) {
            $fullarrays[$value['metaKey']] =1;

        }
        

        if ($serverDetails) {
            $server_ip = $serverDetails->serverIp;
            $server_port = $serverDetails->serverPort;
            //For test purpose: $server_ip ="116.72.1.210", $server_port="8080"
            $fp = @fsockopen($server_ip, $server_port, $errno, $errstr, 10);
            $online = 0;
            if ($fp) 
            {
                $online = 1;
            }
            $serverDetails->active_status = $online;
            Server::where('id',$serverDetails->id)->where('servers.delete_flag',0)->update(['active_status' =>$online]);


            $details = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip={$server_ip}"));
           

            $country_name = isset($details->geoplugin_countryName) ? $details->geoplugin_countryName : 'Location not found';


            

            $serverDetails->country_name = $country_name;
           
            /*Review management here*/
            $server_reviews = review::where('server_id', '=', $id)->where('status',1)->join('l2hotzone_devDb_members','reviews.user_id','=','l2hotzone_devDb_members.id_member')->where('l2hotzone_devDb_members.delete_flag','=',0)->get();
            $review_arrray = array();
            foreach ($server_reviews as $key => $value) 
            {   
                
                if($value->parent_id != 0)
                {
                    $review_arrray[$value->parent_id][] = $value;
                }
                else
                {
                    $review_arrray[$value->id][] = $value;
                }
            }
            /*Review management ends here*/
            /*Uptime hisory management*/
            $currentDate = Carbon::now();
            $nowDate = $currentDate->subDays($currentDate->dayOfWeek + 1);
            $timestamp = strtotime($nowDate);
            $day = date('l', $timestamp);
            
            $uptime_history = uptime_history::where('server_id', '=', $id)->where('created_at', '<', Carbon::today())->where('created_at', '>=', $nowDate)->limit(7)->get();

            $uptime_graph_data = array();
            foreach ($uptime_history as $key => $value) 
            {
                $timestamp = strtotime($value->created_at);
                $day = date('l', $timestamp);
                $graph_value = 0;
                if($value->first_section_status == 1 && $value->second_section_status == 1)
                {
                    $graph_value = 100;
                }
                else if($value->first_section_status == 1 || $value->second_section_status == 1)
                {
                    $graph_value = 50;
                }
               
                $uptime_graph_data[$day] = $graph_value;
               
            }

           
            /*End uptime history management*/
            /*Vote history management starts hre*/
            $days_ten_before = $currentDate->subDays(10);
            $voterlist_history = voter_list::select(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') as create_date"),DB::raw("COUNT(voting_count) as count_click"))->where('server_id', '=', $id)->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"))->where('created_at', '<', Carbon::today())->where('created_at', '>', $days_ten_before)->get()->toArray();
            $voterlist_history_array = array();
            $vote_grpah_values = array();
            $currentDateforvote = Carbon::now();
            for ($i=11; $i >0 ; $i--) 
            { 
                
                $days = $currentDateforvote->subDays(1);
                $voterlist_history_array[$days->toDateString()] = 0;
            }
            
            foreach ($voterlist_history as $key => $value) 
            {
                $voterlist_history_array[$value['create_date']] = $value['count_click'];
            }
            foreach ($voterlist_history_array as $key => $value) 
            {
                $vote_grpah_values[$key]['x'] = $key;
                $vote_grpah_values[$key]['y'] = $value;
            }
          
             /*Vote management ends here*/
            return view('server.serverdetails')->with('serverDetails', $serverDetails)->with('metas', $fullarrays)

                ->with('newsserver', $newsserver)
                ->with('server_reviews', $review_arrray)
                ->with('premiumcontentshow', $premiumcontent)
                ->with('uptime_graph_data', $uptime_graph_data)
                ->with('voterlist_history_array', json_encode(array_values($vote_grpah_values)));
        } else {
            return 'Server temporaly remove!';
        }
    }

    public function searchserver(Request $request)
    {
        $result = null;

        if (count($request->all())) {
            $query = [];

            $requestlist = $request->only(['server_name', 'offlineshop', 'npc', 'globalgK', 'customzone', 'customweapon', 'chronicle']);

            $saerverlist = Server::

         

            where('status', '=', 1)->where('servers.delete_flag',0);

            if ($requestlist['server_name'] != '') {
                $saerverlist->where('server_name', 'LIKE', '%'.$requestlist['server_name'].'%');
            }

            if ($requestlist['chronicle']) {
                $saerverlist->where('chronicle', '=', $requestlist['chronicle']);
            }

            $result = $saerverlist->with('metas')->with('haspremium')->with('premiumcontent')->with('langret')
            ->join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')->where('member.delete_flag','=',0)
            ->withCount('hasVote as total')->with(['hasVote' => function ($query) {
                $query->where('cron_status', '=', 0);
            }])->orderBy('total', 'desc')->get();

            return view('searchserver')->with('searchlist', $result)->with('noresult', false)->with('paginate_records', '');
        }

        return view('searchserver')->with('noresult', true);
    }

    public function posts_details($post_id = '')
    {
        $posts_details = messages::where('id_msg', $post_id)->first();

        return view('postsdetails')->with('posts_details', $posts_details);
    }

    
    public function addreview(Request $request)
    {
        $this->validate($request,[
         'review'=>'required'
        ]);
        $reviews = $request->review;
        $server_id = $request->server_id;
        $review_id = ($request->review_id != '') ? $request->review_id : 0;
        $review = new review;
        $review->user_id = Auth::id();
        $review->server_id = $server_id;
        $review->parent_id = $review_id;
        $review->review = $reviews;
        $review->save();
       
    }

    public function demo()
    {
        $textLive = DB::table('liveadds as live')

                        ->select('live.*', 'textads.*', 'ser.*')

                        ->join('textads', 'live.textad_id', '=', 'textads.id')

                        ->join('servers as ser', 'live.server_id', '=', 'ser.id')

                        ->where('ser.status', '=', 1)

                        ->get()

                        ->groupBy('category');

        $textAdds = [];

        foreach ($textLive as $key=>$textLiv) {
            $textAdds[$key] = $textLiv->groupBy('cType');
        }

        $premiumservers = DB::table('servers as ser')

        ->select('ser.*', 'premiumservers.till_date', 'total_votes.total', 'serverpremiumcontents.thumbnail')

        ->join('premiumservers', 'ser.id', '=', 'premiumservers.server_id')

        ->leftJoin('total_votes', 'ser.id', '=', 'total_votes.server_id')

        ->leftJoin('serverpremiumcontents', 'ser.id', '=', 'serverpremiumcontents.thumbnail')

        ->where('ser.status', '=', 1)

        ->where('premiumservers.till_date', '>=', Carbon::today())

        ->whereNull('ser.date')

        ->orWhere('ser.date', '<=', Carbon::today())

        ->orderBy('ser.id', 'desc')

        ->take(10)->get();

        // premium end here

        $newServer = DB::table('servers as ser')

        ->select('ser.*', 'premiumservers.till_date', 'total_votes.total', 'serverpremiumcontents.thumbnail')

        ->leftJoin('premiumservers', 'ser.id', '=', 'premiumservers.server_id')

        ->leftJoin('total_votes', 'ser.id', '=', 'total_votes.server_id')

        ->leftJoin('serverpremiumcontents', 'ser.id', '=', 'serverpremiumcontents.thumbnail')

        ->where('ser.status', '=', 1)

        ->whereNull('ser.date')

        ->orWhere('ser.date', '<=', Carbon::today())

        ->orderBy('ser.created_at', 'desc')->take(10)->get();

        // New end here

        $topServer = DB::table('servers as ser')

        ->select('ser.*', 'premiumservers.till_date', 'total_votes.total', 'serverpremiumcontents.thumbnail')

        ->leftJoin('premiumservers', 'ser.id', '=', 'premiumservers.server_id')

        ->leftJoin('total_votes', 'ser.id', '=', 'total_votes.server_id')

        ->leftJoin('serverpremiumcontents', 'ser.id', '=', 'serverpremiumcontents.thumbnail')

        ->where('ser.status', '=', 1)

        ->whereNull('ser.date')

        ->orWhere('ser.date', '<=', Carbon::today())

        ->orderBy('total_votes.total', 'desc')->take(10)->get();

        // top voted server end here

        $upcomingServer = DB::table('servers as ser')

        ->select('ser.*', 'premiumservers.till_date', 'total_votes.total', 'serverpremiumcontents.thumbnail')

        ->leftJoin('premiumservers', 'ser.id', '=', 'premiumservers.server_id')

        ->leftJoin('total_votes', 'ser.id', '=', 'total_votes.server_id')

        ->leftJoin('serverpremiumcontents', 'ser.id', '=', 'serverpremiumcontents.thumbnail')

        ->where('ser.status', '=', 1)

        ->where('ser.date', '>=', Carbon::today())

        ->orderBy('ser.id', 'desc')->take(10)->get();

        $user_news = messages::Join('l2hotzone_devDb_members', 'l2hotzone_devDb_members.id_member', '=', 'l2hotzone_devDb_messages.id_member')->where('l2hotzone_devDb_members.id_group', '!=', 1)->where('l2hotzone_devDb_messages.id_board', 1)->where('l2hotzone_devDb_members.delete_flag','=',0)->orderBy('l2hotzone_devDb_messages.id_msg', 'desc')->take(5)->get();

        return view('new_design')

                ->with('premiumservers', $premiumservers)

                ->with('newservers', $newServer)

                ->with('topservers', $topServer)

                ->with('upcomingServers', $upcomingServer)

                ->with('textAdds', $textAdds)

                ->with('latestNes', $user_news);
    }


    public function changeLang(Request $request)
    {
        Session::put('language_key',$_POST['lang']);

        return redirect('/');

    }
}
