<?php

namespace App\Http\Viewcomposers;

use Auth;
use Carbon\Carbon;
use App\model\bannerad;
use App\model\language;
use App\model\messages;
use App\model\voter_list;
use Illuminate\View\View;
use App\model\voter_list_history;
use Session;
use DB;

class Languaged
{
    public function compose(View $view)
    {

        if(!Session::has('language_key'))
        {
             app()->setLocale('en');
        }
        else
        {
            $lang_option=Session::get('language_key');
            app()->setLocale($lang_option);
        }
       
       /* $allbanner = bannerad::with('livebanner')->orderBy('id')->get();
        $view->with('imageBanner', $allbanner);
        $view->with('select', language::get());*/

        /*$allbanner = bannerad::query();
        if( Auth::id()!=='')
        {
        	 $allbanner = $allbanner->with(['livebanner' => function ($query) {
         $query->where('user_id', '=', Auth::id());
    		}]);

            >whereDate('till_date', '>', date('Y-m-d'))


        }
        else
        {
        	 $allbanner = $allbanner->with('livebanner');
        }
        $allbanner = $allbanner->orderBy('id')->get();
        $view->with('imageBanner', $allbanner);
        $view->with('select', language::get());*/

        $allbanner = bannerad::query();
        $allbanner = $allbanner->with(['livebanner' => function ($query) {
            $query->whereDate('till_date', '>', date('Y-m-d'))->where('active_status', 1);
        }]);
        $allbanner = $allbanner->orderBy('id')->get();
        $banner_count = 0;
        //echo "<pre>";print_r($allbanner->toArray());die;
        foreach ($allbanner->toArray() as $key => $value) {
            //banner_count = (!is_array($value['livebanner'])) ? $banner_count++ : $banner_count;
            if ((! is_array($value['livebanner']))) {
                $banner_count = $banner_count + 1;
            }
        }

        $posts = messages::Join('l2hotzone_devDb_members', 'l2hotzone_devDb_members.id_member', '=', 'l2hotzone_devDb_messages.id_member')->where('l2hotzone_devDb_messages.id_board', 2)->orderBy('l2hotzone_devDb_messages.id_msg', 'desc')->take(5)->get();

        $mmrog_news = messages::where('id_board',3)
                      ->join('l2hotzone_devDb_members','l2hotzone_devDb_members.id_member','=','l2hotzone_devDb_messages.id_member')
                      ->orderBy('l2hotzone_devDb_messages.id_msg', 'desc')->take(5)->get();
       
        $view->with('mmrog_news', $mmrog_news);
        $view->with('imageBanner', $allbanner);
        $view->with('banner_count', $banner_count);
        $view->with('select', language::get());
        $view->with('posts', $posts);

        $count_details=DB::table('voter_lists')
                 ->select('*', DB::raw('count(*) as total_vote'))
                 ->groupBy('server_id')
                 ->get();
         $view->with('server_total_vote', $count_details);
         
         $count_review_details=DB::table('reviews')
                 ->select('*', DB::raw('count(*) as total_review'))
                 ->groupBy('server_id')
                 ->get();
         $view->with('server_total_review', $count_review_details);

        
        $start = new Carbon('first day of this month');
        $last = new Carbon('last day of this month');

        $start_date = date('Y-m-d', strtotime($start));
        $last_date = date('Y-m-d', strtotime($last));

        $current_date = date('Y-m-d');
        $start_date_value = date('Y-m-d 00:00:00', strtotime($start));
        $last_date_value = date('Y-m-d 00:00:00', strtotime($last_date));
        $current_date_value = date('Y-m-d 00:00:00');

        //$start_date = date('Y-m-d');

        if ($start_date == $current_date) {
            $voter_list = voter_list::where('cron_status', 0)->get();
            if (! empty($voter_list->toArray())) {
                foreach ($voter_list as $key => $value) {
                    $vote_array[$key] = ['user_id'=>$value->user_id, 'server_id'=>$value->server_id, 'voting_count'=>$value->voting_count, 'start_date'=> $start_date_value, 'end_date'=>$last_date_value, 'created_at'=>$current_date_value];
                }

                voter_list_history::insert($vote_array);
                voter_list::where('cron_status', 0)->update(['voting_count' => 0, 'cron_status'=>1]);
            }
        }

        /*if(isset($_GET['p']) && $_GET['p'] == 1)
        {
            
        }*/
    }
}
