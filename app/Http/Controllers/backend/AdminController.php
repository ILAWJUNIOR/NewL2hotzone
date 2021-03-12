<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Model\backend\User;
use App\model\bannerliveadd;
use App\model\fieldmeta_value;
use App\model\liveadd;
use App\model\Premiumserver;
use App\model\review;
use App\model\Server;
use App\model\Server as modelServer;
use App\model\stream;
use App\model\Textad as MTextad;
use Auth;
use Carbon\Carbon;
use DB;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;
use Validator;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        $banner_count = bannerliveadd::where('delete_flag', 0)->get();
        $server_count = modelServer::where('delete_flag', 0)->get();
        $payment_count = DB::table('paymenttokens')
        ->join('l2hotzone_devDb_members', 'l2hotzone_devDb_members.id_member', '=', 'paymenttokens.user_id')
        ->where('l2hotzone_devDb_members.delete_flag', '=', 0)
        ->get();
        $count['server_count'] = $banner_count->count();
        $count['banner_count'] = $server_count->count();
        $count['payment_count'] = $payment_count->count();

        return view('backend.dashboard', ['count'=>$count]);
    }

    public function add_new_server()
    {
        return view('backend.add_new_server');
    }

    public function server_list()
    {
        $servers = modelServer::join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')->where('servers.delete_flag', '=', 0)->where('member.delete_flag', '=', 0)->get()->toArray();

        return view('backend.list', ['servers'=>$servers]);
    }

    public function server_edit($server_id = '')
    {
        $servers = modelServer::where('id', $server_id)->first()->toArray();

        return view('backend.server_edit', ['servers'=>$servers]);
    }

    public function server_update(Request $request)
    {
        if ($request->servertype_1 == 3) {
            DB::table('uptime_history')->insert(['server_id' => $id, 'first_section_status' => 1, 'second_section_status' => 1, 'created_at'=> date('Y-m-d')]);
        }
        if ($request->servertype_1 == 1 && $request->date == null) {
            return redirect()->back()->with('errordate', 'Please Select Comming Soon Date');
        } else {
            $server = new modelServer;
            $server->id = $request->id;
            $id = $request->id;
            //dd($request->all());die;
            modelServer::findOrFail($id)->update($request->all());

            /* echo "dd";die;
             $server->user_id = $request->user_id;
             $server->fill($request->all());
             if(!$server->save()) App::abort(500, 'Error');
             $metaField = array_intersect_key($request->all() ,
             array_flip(["SPrate", "NPCbuffer", "GlobalGK", "Customzone", "Customweapon", "Customarmor", "Offlineshop"] ));
             $server->metaField()->createMany($this->array_combine_(array_keys($metaField),array_values($metaField)));*/
            $servers = modelServer::join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')->where('servers.delete_flag', '=', 0)->where('member.delete_flag', '=', 0)->get()->toArray();

            return view('backend.list', ['servers'=>$servers]);
        }
    }

    private function array_combine_($keys, $values)
    {
        $combin_return = [];

        foreach ($values as $key => $value) {
            $combin_return[$key]['metaKey'] = $keys[$key];
            $combin_return[$key]['metaValue'] = $value;
        }

        return $combin_return;
    }

    public function banner_list()
    {
        $servers = modelServer::pluck('server_name', 'id');
        $banners = bannerliveadd::where('delete_flag', 0)->get()->toArray();

        return view('backend.banners', ['banners'=>$banners, 'servers'=>$servers]);
    }

    public function advertisement_edit($ad_id = '')
    {
        $bannerAdds = DB::table('bannerads')
        ->leftJoin('bannerliveadds', 'bannerads.id', '=', 'bannerliveadds.bannerad_id')
        ->select('bannerads.*', 'bannerads.id as idc', 'bannerliveadds.*')
        ->get();
        $ad = bannerliveadd::where('id', $ad_id)->first()->toArray();
        $myserver = modelServer::where('user_id', '=', $ad['user_id'])->get();

        return view('backend.ad_edit', ['ad'=>$ad, 'banner_list'=>$bannerAdds, 'server'=>$myserver]);
    }

    public function server_active($server_id = '')
    {
        //modelServer::findOrFail($server_id)->update(['active_status'=>1]);
        modelServer::findOrFail($server_id)->update(['status'=>1]);

        return redirect()->back()->with('flash_success', 'Server Activated');
    }

    public function server_inactive($server_id = '')
    {
        //echo "dd";die;
        //modelServer::findOrFail($server_id)->update(['active_status'=>0]);
        modelServer::findOrFail($server_id)->update(['status'=>0]);

        return redirect()->back()->with('flash_success', 'Server Deactivated');
    }

    public function server_delete(Request $request)
    {
        $server_id = $request->server_id;
        modelServer::findOrFail($server_id)->update(['delete_flag'=>1]);
        echo 'Server Deleted successfully';
        die;
    }

    public function advertisement_active($ad_id = '')
    {
        bannerliveadd::findOrFail($ad_id)->update(['active_status'=>1]);

        return redirect()->back()->with('flash_success', 'Advertisement Activated');
    }

    public function advertisement_inactive($ad_id = '')
    {
        bannerliveadd::findOrFail($ad_id)->update(['active_status'=>0]);

        return redirect()->back()->with('flash_success', 'Advertisement Deactivated');
    }

    public function ad_active($ad_id = '')
    {
        $date = Carbon::today();
        $till_date = $date->addDays(10);
        $update_array = ['active_status'=>1, 'till_date'=> $till_date];
        bannerliveadd::findOrFail($ad_id)->update($update_array);
        echo bannerliveadd::findOrFail($ad_id)->update(['active_status'=>1, 'till_date'=>$date->addDays(10)]);

        return redirect()->back()->with('flash_success', 'Advertisement Activated');
    }

    public function advertisement_delete(Request $request)
    {
        $ad_id = $request->ad_id;
        bannerliveadd::findOrFail($ad_id)->update(['delete_flag'=>1]);
        echo 'Advertisement Deleted successfully';
        die;
    }

    public function advertisement_update(Request $request)
    {
        $uid = $request->user_id;
        $id = $request->id;
        //$bannerliveadds = new bannerliveadd;
        $date = Carbon::today();
        $ad_details = ['user_id'=>$request->user_id, 'server_id'=>$request->server_id, 'from_date'=>$date, 'till_date'=> $date->addDays($request->days), 'bannerad_id'=>$request->add_location, 'website'=>$this->addScheme($request->website)];

        $dimension = ['1'=>['height'=>'1000', 'width'=>'428'], '2'=>['height'=>'1000', 'width'=>'428'], '3'=>['height'=>'250', 'width'=>'300'], '4'=>['height'=>'178', 'width'=>'78'], '5'=>['height'=>'78', 'width'=>'178'], '6'=>['height'=>'78', 'width'=>'178'], '7'=>['height'=>'78', 'width'=>'178'], '8'=>['height'=>'78', 'width'=>'178']];

        $height = '78';
        $width = '178';
        if (isset($dimension[$request->add_location])) {
            $height = $dimension[$request->input('add_location')]['height'];
            $width = $dimension[$request->input('add_location')]['width'];
        }

        if ($request->hasFile('banner')) {
            //$imageName = time() . '.' .$request->file('banner')->getClientOriginalExtension();

            $image = $request->file('banner');
            $file_Name = $image->getClientOriginalName();

            $imgnames = bannerliveadd::where('user_id', '=', $uid)->select('liveimages')->get();
            // echo $imgname;
            // foreach ($imgnames as $imgname) {
            //     $path = $request->file('banner')->getRealPath();
            //     $logo = file_get_contents($path);
            //     $base64 = base64_encode($logo);
            //     $entntion = $image->getClientOriginalExtension();
            //     $base64 = 'data:image/'.$entntion.';base64,'.$base64;
            //     if($imgname->liveimages == $base64)
            //     {
            //         return redirect()->back()->with('success1','This image is already Uploaded');
            //         break;
            //     }
            // }
            if (isset($image)) {
                if ($image->getClientOriginalExtension() == 'gif') {
                    // $image = $request->file('banner');
                    // $extension = $image->getClientOriginalExtension();
                    // $name = $image->getClientOriginalName();
                    // $file_Name = $name;
                    // $tmp_name = $_FILES["banner"]["tmp_name"];
                    // $name = basename($_FILES["banner"]["name"]);
                    // move_uploaded_file($tmp_name, public_path('images/imagesAdd/'.$name));
                    $path = $request->file('banner')->getRealPath();
                    $logo = file_get_contents($path);
                    $base64 = base64_encode($logo);
                    $file_Name = 'data:image/gif;base64,'.$base64;
                // echo public_path('images/imagesAdd/'.$file_Name);
                    // die;
                    // $image->move(public_path('images/imagesAdd/'.$file_Name));
                } else {
                    $image = $request->file('banner');
                    $extension = $image->getClientOriginalExtension();
                    // $image_resize = Image::make($image->getRealPath());
                    // $image_resize->resize($width, $height);
                    // $image_resize->save(public_path('images/imagesAdd/'.$file_Name));
                    $path = $request->file('banner')->getRealPath();
                    $logo = file_get_contents($path);
                    $base64 = base64_encode($logo);
                    $file_Name = 'data:image/'.$extension.';base64,'.$base64;
                }
            }

            /*$request->file('banner')->move(
            public_path('images/imagesAdd/'), $imageName
            );*/
            $ad_details['liveimages'] = $file_Name;
        }

        //dd($ad_details);die;
        bannerliveadd::findOrFail($id)->update($ad_details);

        return redirect()->back()->with('flash_success', 'Updated successfully');
    }

    public function payment_list()
    {
        $payment_info = DB::table('paymenttokens')
        ->join('l2hotzone_devDb_members', 'l2hotzone_devDb_members.id_member', '=', 'paymenttokens.user_id')
        ->select('paymenttokens.*', 'l2hotzone_devDb_members.member_name')
        ->whereNotNull('paymenttokens.verify')
        ->where('l2hotzone_devDb_members.delete_flag', '=', 0)
        //->orderby('paymenttokens.created_at','desc')
        ->get()->toArray();

        return view('backend.payment_list', ['payment'=>$payment_info]);
    }

    public function addScheme($url, $scheme = 'http://')
    {
        return parse_url($url, PHP_URL_SCHEME) === null ?
        $scheme.$url : $url;
    }

    public function text_banner_lsiting()
    {
        $servers = modelServer::pluck('server_name', 'id');
        /*$addlist = MTextad::select('textads.id','Name','category','cType','image','cost','server_id','till_date','textad_id','textads.active_status')->leftjoin('liveadds', 'textads.id', '=' ,'liveadds.textad_id')
        ->get()->sortBy('till_date')->groupBy('cType')->toArray();
        ksort($addlist);*/
        //dd($addlist);die;

        $addlist = DB::table('liveadds')
                        ->join('textads', 'liveadds.textad_id', '=', 'textads.id')
                        ->select('liveadds.*', 'textads.Name', 'textads.cost')
                        ->where('liveadds.delete_flag', 0)->get()->toArray();

        return view('backend.text_banner_list')->with('addlist', $addlist)->with('servers', $servers);
    }

    public function banner_advertisement_edit($ad_id = '')
    {
        $ad_details = DB::table('liveadds')->where('id', $ad_id)->first();
        $servers = modelServer::where('user_id', $ad_details->user_id)->pluck('server_name', 'id')->toArray();
        $addlist = MTextad::select('textads.id', 'Name', 'category', 'cType', 'image', 'cost', 'server_id', 'till_date', 'textad_id', 'liveadds.active_status')->leftjoin('liveadds', 'textads.id', '=', 'liveadds.textad_id')
        ->get()->sortBy('till_date')->groupBy('cType')->toArray();
        ksort($addlist);
        //dd($servers);die;
        return view('backend.text_banner_edit')->with('addlist', $addlist)->with('servers', $servers)->with('ad_details', $ad_details);
    }

    public function banner_advertisement_update(Request $request)
    {
        //dd($request->all());die;
        $id = $request->id;
        $server_id = $request->server_id;
        $date = Carbon::today();
        $ad_details = DB::table('liveadds')->where('id', $id)->first();
        $ad_details_update = ['user_id'=>$ad_details->user_id, 'server_id'=>$request->server_id, 'from_date'=>$date, 'till_date'=> $date->addDays($request->days), 'textad_id'=>$request->addlocation];
        /* dd($ad_details_update);
         echo $server_id;die;*/
        liveadd::findOrFail($id)->update($ad_details_update);

        return redirect()->back()->with('flash_success', 'Updated successfully');
    }

    public function banner_advertisement_active($id = '')
    {
        $ad_details_update = ['active_status'=>1];
        liveadd::findOrFail($id)->update($ad_details_update);

        return redirect()->back()->with('flash_success', 'Updated successfully');
    }

    public function banner_advertisement_inactive($id = '')
    {
        $ad_details_update = ['active_status'=>0];
        liveadd::findOrFail($id)->update($ad_details_update);

        return redirect()->back()->with('flash_success', 'Updated successfully');
    }

    public function banner_advertisement_delete(Request $request)
    {
        $text_id = $request->text_id;
        liveadd::findOrFail($text_id)->update(['delete_flag'=>1]);
        echo 'Banner Advertisement Deleted Successfully';
        die;
    }

    public function banner_advertisement_add_active($text_id = '')
    {
        $date = Carbon::today();
        $till_date = $date->addDays(10);
        $update_array = ['active_status'=>1, 'till_date'=> $till_date];

        liveadd::findOrFail($text_id)->update($update_array);

        return redirect()->back()->with('flash_success', 'Banner Advertisement activated Successfully');
    }

    public function premium_banner_lsiting()
    {
        $mypremium = DB::table('premiumservers')
                     ->join('servers', 'servers.id', '=', 'premiumservers.server_id')
                     ->join('l2hotzone_devDb_members', 'l2hotzone_devDb_members.id_member', '=', 'servers.user_id')
                     ->select('servers.user_id', 'premiumservers.id as main_id', 'servers.id', 'servers.server_name', 'premiumservers.till_date', 'premiumservers.created_at', 'l2hotzone_devDb_members.member_name', 'premiumservers.active_status')
                     ->where('premiumservers.delete_flag', 0)->where('l2hotzone_devDb_members.delete_flag', '=', 0)->get();

        return view('backend.premium_banner_list')->with('mypre', $mypremium);
    }

    public function premium_advertisement_delete(Request $request)
    {
        $text_id = $request->text_id;
        Premiumserver::findOrFail($text_id)->update(['delete_flag'=>1]);
        echo 'Premium Advertisement Deleted Successfully';
        die;
    }

    public function premium_banner_active($id = '')
    {
        $ad_details_update = ['active_status'=>1];
        Premiumserver::findOrFail($id)->update($ad_details_update);

        return redirect()->back()->with('flash_success', 'Updated successfully');
    }

    public function premium_banner_inactive($id = '')
    {
        $ad_details_update = ['active_status'=>0];
        Premiumserver::findOrFail($id)->update($ad_details_update);

        return redirect()->back()->with('flash_success', 'Updated successfully');
    }

    public function premium_advertisement_add_active($ad_id = '')
    {
        $date = Carbon::today();
        $till_date = $date->addDays(10);
        $update_array = ['active_status'=>1, 'till_date'=> $till_date];

        Premiumserver::findOrFail($ad_id)->update($update_array);

        return redirect()->back()->with('flash_success', 'Premium Advertisement activated Successfully');
    }

    public function premium_advertisement_edit($ad_id = '')
    {
        $ad_details = DB::table('premiumservers')->join('servers', 'servers.id', '=', 'premiumservers.server_id')->select('premiumservers.id as main_id', 'servers.user_id', 'servers.id as server_id')->where('premiumservers.id', $ad_id)->first();
        $server_list = modelServer::where('user_id', $ad_details->user_id)->pluck('server_name', 'id')->toArray();
        $viewdate['ad_details'] = $ad_details;
        $viewdate['server_list'] = $server_list;
        $viewdate['premuim'] = fieldmeta_value::where('meta_field', 'premuim')->get();

        return view('backend.premium_banner_edit', ['data'=>$viewdate]);
    }

    public function premium_advertisement_update(Request $request)
    {
        $id = $request->id;
        $server_id = $request->server_id;
        $field_id = $request->months;
        $date = Carbon::today();
        $field = fieldmeta_value::where(['meta_field'=>'premuim', 'id'=>$field_id])->first();
        $premium_till_date = $date->addDays($field->days);

        $ad_details_update = ['server_id'=>$server_id, 'till_date'=> $premium_till_date];

        modelServer::where('id', '=', $server_id)->update(['status'=>1]);

        $a = Premiumserver::findOrFail($id)->update($ad_details_update);

        return redirect()->back()->with('flash_success', 'Updated successfully');
    }

    public function streamlisting()
    {
        $stream_list = DB::table('l2hotzone_stream')->select('l2hotzone_stream.*', 'paymenttokens.verify')->leftjoin('paymenttokens', 'paymenttokens.stream_id', '=', 'l2hotzone_stream.id')->get();

        return view('backend.stream_list', compact('stream_list'));
    }

    public function stream_active($id)
    {
        $sdata = stream::find($id);
        $sdata->status = '1';
        $sdata->save();

        return redirect('costa/stream-advertisement/list');
    }

    public function stream_inactive($id)
    {
        $sdata = stream::find($id);
        $sdata->status = '0';
        $sdata->save();

        return redirect('costa/stream-advertisement/list');
    }

    public function stream_reactive($id)
    {
        $reactive_data = stream::find($id);
        $reactive_data->status = '1';
        $date = date('Y-m-d H:i:s');
        $reactive_data->expired_date = ($reactive_data['cost'] == '5') ? date('Y-m-d H:i:s', strtotime($date.'+ 10 days')) : date('Y-m-d H:i:s', strtotime($date.'+ 25 days'));
        /*if($reactive_[0]->cost == "5")
        {

        }
        elseif($reactive_data[0]->cost == "10")
        {

            $reavive_data->expired_date=date('Y-m-d H:i:s',strtotime($date. '+ 25 days'));
        }*/

        $reactive_data->save();

        return redirect('costa/stream-advertisement/list');
    }

    public function stream_delete($id)
    {
        $sdata = stream::find($id);
        $sdata->delete_flag = '1';
        $sdata->save();

        return redirect('costa/stream-advertisement/list');
    }

    public function stream_edit($id)
    {
        $stream_update = DB::table('l2hotzone_stream')->where('id', '=', $id)->get();
        $date = date('Y-m-d H:i:s');
        $location = stream::select('location')->where('expired_date', '>=', $date)->where('status', '=', '1')->get();

        $position[''] = 'Select location';
        $a = [];
        foreach ($location as $key=>$value) {
            $a[$value->location] = $value;
        }
        $position = ['1'=>'First', '2'=>'Second', '3'=>'Third', '4'=>'Fourth', '5'=>'Fifth', '6'=>'Sixth'];

        return view('backend.stream_edit', compact('stream_update', 'position', 'a'));
    }

    public function stream_update(Request $stream, $id)
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
            'twitch_url.required' => 'Please tnter the twitch url',
            'streamprice.required' => 'Please select the stream price',
            'streamlocation.required' => 'Please telect the stream location',
            'bgcolor.required' => 'Please select the background-color',
            'textcolor.required' => 'Please select the text-color',
          ]);
        $date = date('Y-m-d H:i:s');
        $scount = DB::table('l2hotzone_stream')->where('location', '=', $stream->get('streamlocation'))->where('status', '=', '1')->where('expired_date', '>=', $date)->count();
        $update = stream::find($id);

        if ($update->location == $stream->get('streamlocation') || $scount == '0') {
            $update->title = $stream->get('twitch_title');
            $update->url = $stream->get('twitch_url');
            $update->cost = $stream->get('streamprice');
            $update->location = $stream->get('streamlocation');
            $update->bgcolor = $stream->get('bgcolor');
            $update->textcolor = $stream->get('textcolor');
            $update->save();

            return redirect('costa/stream-advertisement/list');
        } else {
            $stream_update = DB::table('l2hotzone_stream')->where('id', '=', $id)->get();
            $date = date('Y-m-d H:i:s');
            $location = stream::select('location')->where('expired_date', '>=', $date)->where('status', '=', '1')->get();

            $position[''] = 'Select location';
            $a = [];
            foreach ($location as $key=>$value) {
                $a[$value->location] = $value;
            }
            $msg['error'] = 'Location Alerdy purchased';
            $position = ['1'=>'First', '2'=>'Second', '3'=>'Third', '4'=>'Fourth', '5'=>'Fifth', '6'=>'Sixth'];

            return view('backend.stream_edit', compact('stream_update', 'position', 'a', 'msg'));
        }
    }

    public function advertisement_options()
    {
        $allads = MTextad::where('delete_flag', 0)->orderBy('id')->get()->toArray();

        return view('backend.advertisement-options')->with('allads', $allads);
        //return redirect('costa/stream-advertisement/list');
    }

    public function textoptions_create()
    {
        return view('backend.textoption_add');
    }

    public function textoptions_save(Request $request)
    {
        $name = $request->name;
        $category = $request->category;
        $ctype = $request->ctype;
        $cost = $request->cost;

        $MTextad = new MTextad;
        $MTextad->Name = $name;
        $MTextad->category = $category;
        $MTextad->cType = $ctype;
        $MTextad->cost = $cost;

        if ($request->hasFile('banner')) {
            $image = $request->file('banner');
            $file_Name = time().'_'.$image->getClientOriginalName();

            $image_resize = Image::make($image->getRealPath());
            $width = '450';
            $height = '285';
            $image_resize->resize($width, $height);
            $image_resize->save(public_path('images/text-advertisement/'.$file_Name));

            /*$request->file('banner')->move(
            public_path('images/imagesAdd/'), $imageName
            );*/
            $MTextad->image = 'images/text-advertisement/'.$file_Name;
        }

        //dd($ad_details);die;

        $MTextad->save();

        return redirect()->route('costa/advertisement-options/list');

        //return redirect()->back()->with('flash_success', 'Added successfully');
    }

    public function textoptions_edit($text_option_id = '')
    {
        $textoptions = MTextad::where('id', $text_option_id)->first()->toArray();

        return view('backend.textoption_edit', ['textoptions'=>$textoptions]);
    }

    public function textoptions_update(Request $request)
    {
        $name = $request->name;
        $category = $request->category;
        $ctype = $request->ctype;
        $cost = $request->cost;
        $id = $request->id;
        $textoption_detaisl = ['Name'=>$name, 'category'=>$category, 'cost'=>$cost, 'ctype'=>$ctype];
        if ($request->hasFile('banner')) {
            $image = $request->file('banner');
            $file_Name = time().'_'.$image->getClientOriginalName();

            $image_resize = Image::make($image->getRealPath());
            $width = '450';
            $height = '285';
            $image_resize->resize($width, $height);
            $image_resize->save(public_path('images/text-advertisement/'.$file_Name));

            /*$request->file('banner')->move(
            public_path('images/imagesAdd/'), $imageName
            );*/
            $textoption_detaisl['image'] = 'images/text-advertisement/'.$file_Name;
        }

        //dd($ad_details);die;
        MTextad::findOrFail($id)->update($textoption_detaisl);

        return redirect()->back()->with('flash_success', 'Updated successfully');
    }

    public function textoptions_active($textoption_id = '')
    {
        MTextad::findOrFail($textoption_id)->update(['status'=>1]);

        return redirect()->back()->with('flash_success', 'Text Advertisement Option Activated');
    }

    public function textoptions_inactive($textoption_id = '')
    {
        MTextad::findOrFail($textoption_id)->update(['status'=>0]);

        return redirect()->back()->with('flash_success', 'Text Advertisement Option Deactivated');
    }

    public function textoptions_delete(Request $request)
    {
        $textoption_id = $request->textoption_id;
        MTextad::findOrFail($textoption_id)->update(['delete_flag'=>1]);
        echo 'Text Advertisement Option Deleted Successfully';
        die;
    }

    public function reviews()
    {
        $reviews = review::where('delete_flag', 0)->orderBy('id')->get()->toArray();

        return view('backend.reviews')->with('reviews', $reviews);
    }

    public function reviews_active($review_id = '')
    {
        review::findOrFail($review_id)->update(['status'=>1]);

        return redirect()->back()->with('flash_success', 'Review Activated');
    }

    public function reviews_inactive($review_id = '')
    {
        review::findOrFail($review_id)->update(['status'=>0]);

        return redirect()->back()->with('flash_success', 'Review Deactivated');
    }

    public function reviews_delete(Request $request)
    {
        $review_id = $request->review_id;
        review::findOrFail($review_id)->update(['delete_flag'=>1]);
        echo 'Review Deleted Successfully';
        die;
    }

    public function check_expired()
    {
        /* $date=date('Y-m-d H:i:s');
         $streamData = array(array('expired_date','<',$date) , array('status' ,'=','1'));
          $stream = (new stream())->getTable();
         DB::table($stream)->where($streamData)->update(array('status' => 0));

          $date=date('Y-m-d H:i:s');
         $bannerliveadd = (new bannerliveadd())->getTable();
         $livebannerData = array(array('till_date','<',$date) , array('active_status' ,'=','1'));
         DB::table($bannerliveadd)->where($livebannerData)->update(array('active_status' => 0));

          $date=date('Y-m-d H:i:s');
         $liveadd = (new liveadd())->getTable();
         $liveaddData = array(array('till_date','<',$date) , array('active_status' ,'=','1'));
         DB::table($liveadd)->where($liveaddData)->update(array('active_status' => 0));

         $date=date('Y-m-d H:i:s');
         $premiumserver = (new Premiumserver())->getTable();
         $premiumData = array(array('till_date','<',$date) , array('active_status' ,'=','1'));
         DB::table($premiumserver)->where($premiumData)->update(array('active_status' => 0));*/
    }

    //User Management

    public function user_members(Request $request)
    {
        $server_counter = DB::table('servers')->select('*', DB::raw('COUNT(servers.user_id) as counter'))->where('servers.delete_flag', 0)->groupBy('user_id')->get();

        if ($request->get('query') != '') {
            $searchTerm = $request->get('query');
            $members = DB::table('l2hotzone_devDb_members')->where('l2hotzone_devDb_members.delete_flag', '=', 0)->where('l2hotzone_devDb_members.is_activated', 1)->where('member_name', 'like', '%'.$searchTerm.'%')->orWhere('email_address', 'like', '%'.$searchTerm.'%')->paginate(15);
        } else {
            $members = DB::table('l2hotzone_devDb_members')->where('l2hotzone_devDb_members.delete_flag', '=', 0)->where('l2hotzone_devDb_members.is_activated', 1)->paginate(15);
        }

        $usermoney = DB::table('usermoney')->groupBy('user_id')->get();

        return view('backend.members', ['members'=>$members, 'server_counter'=> $server_counter, 'usermoney'=>$usermoney]);

        // return view('backend.members');
    }

    public function serachmembers(Request $request)
    {
        if ($request->page != '') {
            return redirect('costa/members?query='.$request->get('query').'&page='.$request->get('page'));
        }
        $searchTerm = $request->get('query');
        $members = DB::table('l2hotzone_devDb_members')
        ->where('l2hotzone_devDb_members.delete_flag', '=', 0)
        ->where('l2hotzone_devDb_members.is_activated', 1)
        ->where('member_name', 'like', '%'.$searchTerm.'%')
        ->orWhere('email_address', 'like', '%'.$searchTerm.'%')
        ->paginate(20);

        $usermoney = DB::table('usermoney')->groupBy('user_id')->get();

        return view('backend.search_member', compact('members', 'usermoney'));
    }

    public function ban_members(Request $request)
    {
        $member_id = $request->input('id');

        $user_banned_status = DB::table('l2hotzone_devDb_members')->where('id_member', '=', $member_id)->first();

        if ($user_banned_status->is_banned == 0) {
            DB::table('l2hotzone_devDb_members')->where('id_member', '=', $member_id)->update(['is_banned'=>1]);

            if (modelServer::where('user_id', '=', $member_id)->where('is_banned', '=', 0)->update(['delete_flag' => 1, 'is_banned'=>1])) {
                echo  json_encode($user_banned_status->is_banned);
            } else {
                echo false;
            }
        } elseif ($user_banned_status->is_banned == 1) {
            DB::table('l2hotzone_devDb_members')->where('id_member', '=', $member_id)->update(['is_banned'=>0]);

            if (modelServer::where('user_id', '=', $member_id)->where('is_banned', '=', 1)->update(['delete_flag' => 0, 'is_banned'=>0])) {
                echo  json_encode($user_banned_status->is_banned);
            } else {
                echo false;
            }
        }

        //modelServer
    }

    public function edit_members($member_id = '')
    {
        if ($member_id != '') {
            $member_detail = DB::table('l2hotzone_devDb_members')->where(['id_member'=>$member_id])->first();
            if (! empty($member_detail)) {
                return view('backend.members_edit', ['member_details'=>$member_detail]);
            } else {
                return redirect()->back();
            }
        }
    }

    public function edit_members_details(Request $request)
    {
        // /Array ( [_token] => kIAq4bvVxrkfNoU1w35gLyHjcZJVrxIoYmUGR3WT [username] => AbelFloren [email] => Abel-FlorenceAbel@cleantalkorg5.ru [member_id] => 485 )
        // dd($request);
        // $rules=[
        //     'member_name'=>'required|unique:l2hotzone_devDb_members|max:255',
        //     'email_address'=>'required|email|unique:l2hotzone_devDb_members',
        //     'password'=>'confirmed'
        // ];

        // $messages=[
        //     'member_name.required'=>'Please Enter Member Name',
        //     'member_name.unique'=>'This name is already taken, Please use different.',
        //     'member_name.max'=>'Max 255 allowed',
        //     'email_address.required'=>"Please enter valid email",
        //     'email_address.email'=>'Please enter valid email',
        //     'email_address.unique'=>'This email is already taken, Please use different.',
        //     'password'=>'Password amd Confirm Password doesn\'t match'
        // ];

        // $errors= Validator::make($request->all(),$rules,$messages);

        // if($errors->fails())
        // {
        //       return redirect()->back()->withErrors($errors)->withInput();
        // }
        // else
        // {
        $member_name = $request->input('member_name');
        $member_email = $request->input('email_address');
        $member_id = $request->input('member_id');
        $member_password = $request->input('password');

        if ($member_password == '') {
            $update = DB::table('l2hotzone_devDb_members')->where(['id_member'=>$member_id])->update(['member_name'=>$member_name, 'email_address'=>$member_email]);
        } else {
            $member_password = sha1(strtolower($member_name).$member_password);
            // $member_password=sha1($member_password);
            $rules = ['password'=>'confirmed|required|string|min:6'];
            $messages = ['password.required'=>'Enter new password',
                            'password.confirmed'=>'Password and Confirm Password doesn\'t match',
                            'min.min'=>'Minimum 6 character require', ];
            // $errors= Validator::make($request->all(),$rules,$messages);

            // if($errors->fails()){ return redirect()->back()->withErrors($errors)->withInput(); }
            // else{
            $update = DB::table('l2hotzone_devDb_members')->where(['id_member'=>$member_id])->update(['member_name'=>$member_name, 'email_address'=>$member_email, 'passwd'=>$member_password]);
            // }
        }

        if ($update) {
            return redirect()->back()->with('success', 'Successfully Details Added');
        } else {
            return redirect()->back()->with('error', 'Something went wrong ! Please try again later');
        }
        // }
    }

    public function delete_members_details(Request $request)
    {
        $user_id = $_POST;

        $data1 = DB::table('l2hotzone_devDb_members')->where('id_member', '=', $user_id['id'])->update(['delete_flag'=>1, 'is_banned'=>1, 'is_activated'=>0]);

        $data = DB::table('l2hotzone_devDb_members')->where('id_member', '=', $user_id['id'])->first();

        echo json_encode($data);
    }

    public function redirection_server_log()
    {
        $redirection_counter = DB::table('server_redirect_user_counter')->select('*', DB::raw('COUNT(server_redirect_user_counter.server_id) as counter'))->groupBy('server_id')->get();

        $servers = modelServer::join('l2hotzone_devDb_members as member', 'member.id_member', '=', 'servers.user_id')->where('servers.delete_flag', '=', 0)->get()->toArray();

        return view('backend.redirection_server_log', ['redirection_counter'=>$redirection_counter, 'servers'=>$servers]);
    }

    public function update_members_coin_details(Request $request)
    {
        $userdetails = $request->input('userdata');

        $check_exist_or_not = DB::table('usermoney')->where('user_id', '=', $userdetails['user_id'])->first();

        if (! empty($check_exist_or_not)) {
            $usermoneyupdate = DB::table('usermoney')->where('id', '=', $check_exist_or_not->id)
                ->update(['amount'=>$userdetails['usercoin'], 'created_at'=>NOW(), 'updated_at'=>NOW()]);
        } else {
            $usermoneyupdate = DB::table('usermoney')->insert(['user_id'=>$userdetails['user_id'], 'amount'=>$userdetails['usercoin'], 'created_at'=>NOW(), 'updated_at'=>NOW()]);
        }

        if ($usermoneyupdate) {
            echo true;
        } else {
            echo false;
        }
    }
}
