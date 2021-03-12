<?php

namespace App\Http\Controllers;

use App;
use Log;
use Auth;
use Session;
use App\User;
// use Redirect;
use Validator;
use Carbon\Carbon;

use App\model\Server;
use App\model\stream;
use App\model\bannerad;
use App\model\userMoney;
use App\model\paymenttoken;
use App\model\bannerliveadd;
use Illuminate\Http\Request;
use App\model\fieldmeta_value;
use Illuminate\Support\Facades\DB;
use App\model\Premiumserver as premiumserver;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Contracts\Encryption\DecryptException;

class Banneradd extends Controller
{
    /**
     * Get all Banner Adds list.
     */
    public function index()
    {
        
        $bannerAdds = DB::table('bannerads')
        ->leftJoin('bannerliveadds', 'bannerads.id', '=', 'bannerliveadds.bannerad_id')
        ->select('bannerads.*', 'bannerads.id as idc', 'bannerliveadds.*')

        ->groupby('bannerads.id')
        ->get();
        $myserver = Server::where('user_id', '=', Auth::id())->get();

        $bannerliveAdds = DB::table('bannerliveadds')->whereDate('till_date', '>', date('Y-m-d'))->groupby('bannerad_id')->pluck('bannerad_id', 'bannerad_id');
        $bannerads = DB::table('bannerads')->get()->toArray();

        //dd($bannerads);die;
        $allbanner = bannerad::query();
        $allbanner = $allbanner->with(['livebanner' => function ($query) {
            $query->whereDate('till_date', '>', date('Y-m-d'))->where('active_status', 1);
        }]);
        $allbanner = $allbanner->orderBy('id')->get()->toArray();
        //dd($allbanner);die;

        return view('advertising.banner')->with('banner_list', $bannerAdds)->with('server', $myserver)->with('bannerliveAdds', $bannerliveAdds)->with('bannerads', $allbanner)/*->with('count',$count)*/;
    }

    public function advertising()
    {
        $date = date('Y-m-d H:i:s');

        $location = stream::select('location')->where('expired_date', '>=', $date)->where('status', '=', '1')->get();
        $a = [];
        foreach ($location as $key=>$value) {
            $a[$value->location] = $value;
        }

        $position = ['1'=>'First', '2'=>'Second', '3'=>'Third', '4'=>'Fourth', '5'=>'Fifth', '6'=>'Sixth'];
        $c = 0;
        foreach ($position as $key => $value) {
            if (! isset($a[$key])) {
                $c++;
            }
        }
        $text_live_count = DB::table('liveadds')->where('till_date', '>', date('Y-m-d'))->where('active_status', 1)->count();
        $text_add_count = DB::table('textads')->count();
        $text_free_counter = $text_add_count - $text_live_count ;
        return view('advertising.advertising', compact('c'),compact('text_free_counter'));
    }

    /**
     * Post MEthod get all
     * data.
     */
    public function confirm(Request $request)
    {            
    
        $this->validate($request, [
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'add_location' => 'required|integer',
            'server' => 'required|integer',
            'days' => 'required|integer',

        ]);

        $dimension = ['1'=>['height'=>'1000', 'width'=>'428'], '2'=>['height'=>'1000', 'width'=>'428'], '3'=>['height'=>'250', 'width'=>'300'], '4'=>['height'=>'178', 'width'=>'78'], '5'=>['height'=>'78', 'width'=>'178'], '6'=>['height'=>'78', 'width'=>'178'], '7'=>['height'=>'78', 'width'=>'178'], '8'=>['height'=>'78', 'width'=>'178']];

        $height = '78';
        $width = '178';
        if (isset($dimension[$request->input('add_location')])) {
            $height = $dimension[$request->input('add_location')]['height'];
            $width = $dimension[$request->input('add_location')]['width'];
        }

    
        $image = $request->file('banner');
        $file_Name = $image->getClientOriginalName();

        $uid = Auth::id();
        $imgnames = bannerliveadd::where('user_id','=',$uid)->select('liveimages')->get();
        // echo $imgname;
        foreach ($imgnames as $imgname) {
            if($imgname->liveimages == $file_Name)
            {
                return redirect()->back()->with('success','This image is already Uploaded');
                break;
            }
        }

        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize($width, $height);
        $image_resize->save(public_path('images/imagesAdd/'.$file_Name));

        // validation if this location not accupy by another on

        $loaction_count = bannerliveadd::where('bannerad_id', '=', $request->input('add_location'))->whereDate('till_date', '>', date('Y-m-d'))->where('active_status', '=', '1')->count();
        $banner = bannerad::where('id', '=', $request->input('add_location'))->first();
        $server = Server::where('id', '=', $request->input('server'))->first();

        $data = [];

        if ($loaction_count != 0) {
            return 'some one already grab this place';
        }
        $data['totalcost'] = (int) $request->input('days') * (int) $banner->cost;

        if (Auth::user()->hasMoneyB->amount < $data['totalcost']) {
            return 'you donot have sufficient money!';
        }
        $data['addname'] = $banner->name;
        $data['imagelocation'] = $banner->image;
        $data['days'] = $request->input('days');
        $data['uploadimages'] = $file_Name;
        $data['banner'] = $banner;
        $data['website'] = $this->addScheme($request->input('website'));
        $data['server'] = $server;
        Session::flash('bannerdata', $data);

        return view('advertising.bannerconfirm')->with('datab', $data);
    }

    /**
     * GET confirm.
     */
    public function creatadd()
    {
        if (! Session::has('bannerdata')) {
            abort(404);
        }

        try {
            $instance = Session::get('bannerdata');
            $userMoney = userMoney::where('user_id', Auth::id())->first();
            if ((int) $userMoney->amount >= (int) $instance['totalcost']) {
                Auth::user()->hasMoneyB->decrement('amount', (int) $instance['totalcost']);
                $date = Carbon::today();
                $bannerliveadds = new bannerliveadd;
                $bannerliveadds->user_id = Auth::id();
                $bannerliveadds->server_id = $instance['server']->id;
                $bannerliveadds->from_date = Carbon::today();
                $bannerliveadds->till_date = $date->addDays($instance['days']);
                $bannerliveadds->bannerad_id = $instance['banner']->id;
                $bannerliveadds->liveimages = $instance['uploadimages'];
                $bannerliveadds->website = $this->addScheme($instance['website']);
                $bannerliveadds->save();

                return redirect()->route('myBanneradd');
            } else {
                return 'you do not have sufficient money!';
            }
        } catch (Exception $e) {
            report($e);

            return false;
        }
    }

    /**
     * Show My banner list.
     */
    public function myBanneradd()
    {
        $myadd = bannerliveadd::select('bannerads.*', 'servers.*', 'bannerliveadds.*', 'bannerliveadds.active_status as active_flag')->leftJoin('bannerads', 'bannerliveadds.bannerad_id', '=', 'bannerads.id')
        ->leftJoin('servers', 'bannerliveadds.server_id', '=', 'servers.id')
        ->where('bannerliveadds.user_id', '=', Auth::id())->with('hasbannerad')->get();

        return view('advertising.bannerMy')->with('myBanners', $myadd);
    }

    public function stream()
    {
        $date = date('Y-m-d H:i:s');
        $location = stream::select('location')->where('expired_date', '>=', $date)->where('status', '=', '1')->get();

        $position[''] = 'Select location';
        $a = [];
        foreach ($location as $key=>$value) {
            $a[$value->location] = $value;
        }
        $position = ['1'=>'First', '2'=>'Second', '3'=>'Third', '4'=>'Fourth', '5'=>'Fifth', '6'=>'Sixth'];

        return view('advertising.stream', compact('position', 'a'));
    }

    public function addScheme($url, $scheme = 'http://')
    {
        return parse_url($url, PHP_URL_SCHEME) === null ?
        $scheme.$url : $url;
    }

    public function stream_confirm(Request $stream)
    {
        $this->validate($stream,[
         'twitch_title'=>'required',
         'twitch_url'=>'required',
         'streamprice'=>'required',
         'streamlocation'=>'required',
         'bgcolor'=>'required',
         'textcolor'=>'required', ],
         [
            'twitch_title.required' => 'Please enter the twitch title',
            'twitch_url.required' => 'Please enter the twitch url',
            'streamprice.required' => 'Please select the stream price',
            'streamlocation.required' => 'Please select the stream location',
            'bgcolor.required' => 'Please select she background-color',
            'textcolor.required' => 'Please select the text-color',
          ]);
        $stream_data = new stream();
        $stream_data->title = $stream->get('twitch_title');
        $stream_data->url = $stream->get('twitch_url');
        $stream_data->cost = $stream->get('streamprice');
        $stream_data->location = $stream->get('streamlocation');
        $stream_data->bgcolor = $stream->get('bgcolor');
        $stream_data->textcolor = $stream->get('textcolor');
        $stream_data->user_id = Auth::id();
        $stream_data->status = '0';
        if ($stream->get('streamprice') == '5') {
            $date = date('Y-m-d H:i:s');
            $stream_data->expired_date = date('Y-m-d H:i:s', strtotime($date.'+ 10 days'));
        } elseif ($stream->get('streamprice') == '10') {
            $date = date('Y-m-d H:i:s');
            $stream_data->expired_date = date('Y-m-d H:i:s', strtotime($date.'+ 25 days'));
        }
        if ($stream_data->save()) {
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $pin = mt_rand(1000000, 9999999).mt_rand(1000000, 9999999).$characters[rand(0, strlen($characters) - 1)];
            $string = str_shuffle($pin);

            $paymenttoken = new paymenttoken;
            $paymenttoken->token = $string;
            $paymenttoken->user_id = Auth::id();
            $paymenttoken->coins = $stream->get('streamprice');
            $paymenttoken->amount = $stream->get('streamprice');
            $paymenttoken->stream_id = $stream_data->id;
            $paymenttoken->save();

            $confirmdata['id'] = $stream_data->id;
            $confirmdata['token'] = $string;
            $confirmdata['title'] = $stream->get('twitch_title');
            $confirmdata['url'] = $stream->get('twitch_url');
            $confirmdata['price'] = $stream->get('streamprice');
            $confirmdata['location'] = $stream->get('streamlocation');
            $confirmdata['bgcolor'] = $stream->get('bgcolor');
            $confirmdata['textcolor'] = $stream->get('textcolor');

            return view('payment.buystream', compact('confirmdata'));
        } else {
            $msg['error'] = 'Stream Add Successfully.';

            return view('advertising.stream', compact('msg'));
        }
    }

    public function mystream()
    {
        $uid = Auth::id();
        $my_stream = DB::table('l2hotzone_stream')->select('l2hotzone_stream.*', 'paymenttokens.verify')->leftjoin('paymenttokens', 'paymenttokens.stream_id', '=', 'l2hotzone_stream.id')->where('l2hotzone_stream.user_id', '=', $uid)->get();

        return view('advertising.mystream', compact('my_stream'));
    }
}
