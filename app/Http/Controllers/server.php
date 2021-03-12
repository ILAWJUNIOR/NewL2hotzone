<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Server as modelServer;
use Auth;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Http\Requests\freeServer;
use Validator;
use App\User;
use DB;
// use Redirect;
use Session;
use App\model\Premiumserver as premiumserver;
use App\model\serverpremiumcontent;
use App\model\news;
use App\model\fieldmeta_value;
use Carbon\Carbon;
use App\model\voter_list;
    // use App\model\usermoney;



class server extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $data = modelServer::where('user_id', Auth::id())->where('delete_flag',0)->get()->toArray();
        $withToken = array_map(function($server){
        $token = route('votetoken', $this->tokenGenrate($server['id']) );
        $server['token'] = $token;
        return $server;

    }, $data);

        
        return view('server.serverlist')->with('servers' ,$withToken)->with('data',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(freeServer $request)
    {
        

        if($request->servertype_1 == 1 && $request->date == NULL)
        {
            return redirect()->back()->with('errordate','Please Select Comming soon date');
        }
        else{


            if(!isset($_POST['g-recaptcha-response']))
        {
             $errMsg = 'Robot verification failed, please try again.';

             return redirect()->back()->with('error',$errMsg);
          
         
        }
        else if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
        {
             $secretKey = '6LfPZ7gUAAAAAK3sdf4tpFCnY4smf0pwTKgV3QCy';
             $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']);
             $responseData = json_decode($verifyResponse);
             if($responseData->success)
             {

             }
             else{
                 $errMsg = 'Robot verification failed, please try again.';
                  return redirect()->back()->with('error',$errMsg);
                  
             } 
        }
        else if(empty($_POST['g-recaptcha-response']))
        {
             $errMsg = 'Robot verification failed, please try again.';
              return redirect()->back()->with('error',$errMsg);
        }


      
        try {
            
            $server = new modelServer;
            $api_key = implode('-', str_split(substr(strtolower(md5(microtime().rand(1000, 999999))), 0, 30), 6));
          
          

     

            $api_counter = modelServer::where("api_key","=",$api_key)->count();
            
                $server->user_id = auth::id();
                $server->api_key = $api_key;
                $server->fill($request->all());

                

                $server->save();
                if(!$server->save()) App::abort(500, 'Error');
                /*$metaField = array_intersect_key($request->all() ,
                array_flip(["SPrate", "NPCbuffer", "GlobalGK", "Customzone", "Customweapon", "Customarmor", "Offlineshop"] ));
                $server->metaField()->createMany($this->array_combine_(array_keys($metaField),array_values($metaField)));*/


           $SPrateflag=$request->get('SPrate') ? "1" : "0";
           $NPCbufferflag=$request->get('NPCbuffer') ? "1" : "0";
           $GlobalGKflag=$request->get('GlobalGK') ? "1" : "0";
           $Customzoneflag=$request->get('Customzone') ? "1" : "0";
           $Customweaponflag=$request->get('Customweapon') ? "1" : "0";
           $Customarmorflag=$request->get('Customarmor') ? "1" : "0";
           $Offlineshopflag=$request->get('Offlineshop') ? "1" : "0";

              

                $server->metaField()->createMany([
                    ["metaKey"=>"SPrate","metaValue"=>"SP rate","flag"=>$SPrateflag],
                    ["metaKey"=>"NPCbuffer","metaValue"=>"NPC buffer","flag"=>$NPCbufferflag],
                    ["metaKey"=>"GlobalGK","metaValue"=>"Global GK","flag"=>$GlobalGKflag],
                    ["metaKey"=>"Customzone","metaValue"=>"Custom zone","flag"=>$Customzoneflag],
                    ["metaKey"=>"Customweapon","metaValue"=>"Custom weapon","flag"=>$Customweaponflag],
                    ["metaKey"=>"Customarmor","metaValue"=>"Custom armor","flag"=>$Customarmorflag],
                    ["metaKey"=>"Offlineshop","metaValue"=>"Offline shop","flag"=>$Offlineshopflag],
                    
                ]);
                return redirect('/server-list');

        }catch(Exception $e){
            report($e);
            return false;
        }

        }

       

    }

    private function array_combine_($keys, $values){

        $combin_return = [];

        foreach($values as $key => $value){
            $combin_return[$key]["metaKey"] = $keys[$key];
            $combin_return[$key]["metaValue"] = $value; 
            // $combin_return[$key]["flag"] = "1";
        }
        return $combin_return;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$serverId = decrypt($id);

        $serverId = $id;

        try {
            $s = modelServer::leftJoin('premiumservers','servers.id','=','premiumservers.server_id')
            ->leftJoin('serverpremiumcontents','servers.id','=','serverpremiumcontents.server_id')->leftJoin('languages', 'servers.language', '=', 'languages.code') ->leftJoin('total_votes', 'servers.id', '=', 'total_votes.server_id')
            ->where(['user_id'=> Auth::id(),'servers.id'=>$serverId])->first();
            $newsshow = news::where('server_id',$serverId )->orderBy('id','desc')->get();
            $server_id = $serverId;


                 $vote_count = DB::table('voter_lists')->where("server_id",$id)->where("cron_status","0")->count();

            $meta_field=DB::table('servermetas')->where("server_id",$server_id)->where("flag","1")->get();

            $data = voter_list::where(['server_id'=>$server_id,'voter_ip'=>$_SERVER['REMOTE_ADDR']])->where('updated_at', '>', Carbon::now()->subHours(12)->toDateTimeString())->first();
            $voted = "false";
            if(!empty($data))
            {
                $voted = "true";

            }
           
             $meta =array();
                        	foreach ($meta_field as $key => $value) 
                        	{
                        		$meta[] = $value->metaValue;
                        	}
            if($s){
                
                return view('server.editserver', ['updateData' => $s,'form_id' => $id])
                ->with('votecode', route('votetoken', $this->tokenGenrate($id) ))
                ->with('oldeNes', $newsshow)
                ->with('server_id',$server_id)
                ->with('meta',$meta)
                ->with('vote_count',$vote_count)
                ->with('voted',$voted);

            }else{

                return response()->view('errors.custome',["message"=>'Server No more exist'],404);    

            }
            
            
        } catch (DecryptException $e) {

            return response()->view('errors.custome',["message"=>'server does not exist!'],505);

        }
    }
    public function new_api_key(Request $request)
    {
      		 $api_key = implode('-', str_split(substr(strtolower(md5(microtime().rand(1000, 999999))), 0, 30), 6));

    	     $server = new modelServer;
    	     $api_update = modelServer::find($request->get('id'));
    	     $api_update->api_key =$api_key;
    	     $api_update->save();
    	     echo $api_key;
            
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    private function commonValidation($id){
        
        try {
            $decrypted = decrypt($id);
            return $decrypted;
            
        } catch (DecryptException $e) {
            
        }
    }

     public function updateStatus(Request $status)
    {
        $id = $status->get('id');
        $update_status = new modelServer;
        $update_status = modelServer::find($status->get('id'));
        $update_status->servertype_1 =$status->get('status');
        if($status->get('status') == 3)
        {
            DB::table('uptime_history')->insert(['server_id' => $id,'first_section_status' => 1,'second_section_status' => 1,'created_at'=> date('Y-m-d')]);
        }   
        else
        {
            $update_status->date =$status->get('date');
        }
        $update_status->save();
    }
    public function updateIp(Request $ip)
    {
          $this->validate($ip,[
         'login_ip'=>'required|ip',
         'login_port' => 'required|integer|digits:4',
         'game_port' => 'required|integer|digits:4',
         'game_ip' => 'required|ip',

        ],
        [
          'login_ip.required' => "Please Enter The login server ip",
          'login_port.required' => "Please Enter The login server port",
          'game_port.required' => "Please Enter The game server port",
          'game_ip.required' => "Please Enter The game server ip",
          
        ]);
           $update_ip = new modelServer;
           $update_ip = modelServer::find($ip->get('id'));
           $update_ip->loginIp =$ip->get('login_ip');
           $update_ip->serverIp =$ip->get('game_ip');
           $update_ip->loginPort =$ip->get('login_port');
           $update_ip->serverPort =$ip->get('game_port');
           if($update_ip->save())
           {
               echo "update successfully";
           }      

    }
    public function updateSettings(Request $setting)
    {


        $this->validate($setting,[
         'chronicle'=>'required',
         'language'=>'required',
         'xprate' => 'required|integer|digits_between:1,5',
         'droprate' => 'required|integer|digits_between:1,5',
         'saferate' => 'required|integer|digits_between:1,5',
         'sprate' => 'required|integer|digits_between:1,5',
         'adenarate' => 'required|integer|digits_between:1,5',
         'maxrate' => 'required|integer|digits_between:1,5',
         
        ],
        [
          'chronicle.required' => "Please select the chronicle",
          'language.required' => "Please select the language",

        ]);

    	


    	$update_server_setting = modelServer::find($setting->get('id'));
    	$update_server_setting->chronicle = $setting->get('chronicle');
    	$update_server_setting->language = $setting->get('language');
    	$update_server_setting->xpRate = $setting->get('xprate');
    	$update_server_setting->dropRate = $setting->get('droprate');
    	$update_server_setting->safeRate = $setting->get('saferate');
    	$update_server_setting->spRate = $setting->get('sprate');
    	$update_server_setting->adenaRate = $setting->get('adenarate');
    	$update_server_setting->maxRate = $setting->get('maxrate');
    	$update_server_setting->save();

        $metavalue=$setting->get('meta');
       
        foreach ($metavalue as  $value)
        {
            $update = DB::table('servermetas')->where("metaValue",$value)->update(["flag"=>"1"]);
        }   

       $update_meta = DB::table('servermetas')->where("server_id",$setting->get('id'))->get();

		$meta = array();

      foreach ($update_meta as $key => $value) 
      {
      	$meta[$key] = $value->metaValue;	
      }

        $result = array_diff($meta,$metavalue);

        foreach ($result as  $value)
        {
            $update = DB::table('servermetas')->where("metaValue",$value)->update(["flag"=>"0"]);
        }


    }
    public function updateDescription(Request $desc)
    {
        $this->validate($desc,[
         'url'=>'required|url',
         'description' => 'required||between:1000,1500'
        ]);
        // |regex:/^((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)$/
           $update_desc_url = new modelServer;
           $update_desc_url = modelServer::find($desc->get('id'));
           $update_desc_url->desc =$desc->get('description');
           $update_desc_url->website =$desc->get('url');
           if($update_desc_url->save())
           {
               echo "update successfully";
           }
            
    }
    // news add
    public function updateNews(Request $news_insert)
    {   
                $this->validate($news_insert,[
         'news'=>'required|min:20|max:300',
        ],
         [
          'news.required' => "Please enter The news",
          
        ]);
         // $news =new news;
                // $news_count =DB::table('news')->where("server_id","=",$news_insert->get('id'))->count();
                

       /*  $news->server_id = $news_insert->get('id');
         $news->news = $news_insert->get('news');
         $news->save();*/
/*         if($news_count == 1) 
         {      $up_date =DB::table('news')->where("server_id","=",$news_insert->get('id'))->get();
                $update_date = $up_date[0]->updated_at;
                
                $database_date_time =  date('Y-m-d H:i:s',strtotime('+1 hour',strtotime($update_date)));
                $current_date = date('Y-m-d H:i:s'); 
                if($current_date>=$database_date_time)
                {
                    echo "data is big";
                }
                else
                {
                    echo "data is small";
                }
                 $news_date =DB::table('news')->where("server_id","=",$news_insert->get('id'))->get();
                 $id= $news_date[0]->id;
                 $update = new modelServer;
                   $update = news::find($id);
                   $update->news =$news_insert->get('news');
                   $update->save();

                 
                DB::table('news')
                ->where('server_id',$news_insert->get('id'))
                ->update(['news' => $news_insert->get('news')]);
         }*/
        /* if($news_count == 0)
         {  */
             // $up_date =DB::table('news')->where("server_id","=",$news_insert->get('id'))->orderBy('id','desc')->get()->first();
             $up_date=DB::table('news')->where("server_id","=",$news_insert->get('id'))->orderBy('id', 'DESC')->first();
            if(isset($up_date))
            {    $update_date = $up_date->created_at;
                $database_date_time =  date('Y-m-d H:i:s',strtotime('+1 hour',strtotime($update_date)));
                $current_date = date('Y-m-d H:i:s');
                if($current_date>=$database_date_time)
                {   
                    
                    $news =new news;
                    $news->server_id = $news_insert->get('id');
                    $news->news = $news_insert->get('news');
                    $news->save();           
                    $message = "insert";
                    echo json_encode($message);
                }
                else
                {
                    $message = "error";
                    echo json_encode($message);
                }
           }
           else
           {
                    $news =new news;
                    $news->server_id = $news_insert->get('id');
                    $news->news = $news_insert->get('news');
                    $news->save();           
                    $message = "insert";
                    echo json_encode($message);
           } 
         /*}*/


/*        echo $news->get('news');
        die;
        $serverId = $this->commonValidation($id);
        
        $validator = Validator::make($request->all(), [
            'news'=>'required|max:100'
        ]);
        if($validator->fails()){

            return redirect("/server/$id/edit/#News-tab");
        }
        $news = news::create([
            'news' => $request->input('news'),
            'server_id' => $serverId
        ]);
            
        return redirect("/server/$id/edit/#News-tab");*/
        
    }
    public function deleteNews(Request $news)
    {
            $news= news::destroy($news->get('id'));

    }
    public function displayNews(Request $id)
    {
        $newsshow = DB::table('news')->where("server_id","=",$id->get('id'))->orderBy('id','desc')->get();
        echo json_encode($newsshow);



    }    
    public function updateReward(Request $request, $id)
    {
        $serverId = $this->commonValidation($id);
        dd($serverId);    
    }

    /**
     * Premium image content add update section
     * 
     */
    public function updatePremium(Request $request, $id)
    {
        $serverId = $this->commonValidation($id);
        
        $validator = Validator::make($request->all(), [
            'premiumcontentt' => 'max:100',
            'thumbnailbanner' => 'image|dimensions:width=120,height=90'
        ]);
        if($validator->fails()){

            return redirect("/server/$id/edit/#Premium-tab");
        }

        if($request->file('thumbnailbanner')){

            $image  = $request->file('thumbnailbanner');
            $file_Name = time().'_'.$image->getClientOriginalName();
            $destinationPath = public_path('images/imagesAdd/');
            $movelocation = $image->move($destinationPath, $file_Name);
            if(serverpremiumcontent::where('server_id',$id )->exists()){

               serverpremiumcontent::where('server_id','=',$id)->update(['thumbnail' => $file_Name ]);

            }else{
               serverpremiumcontent::create([
                    'server_id' => $id,
                    'thumbnail' => $file_Name
                ]);
            }
            
        }
        if($request->input('premiumcontentt')){
            
            if(serverpremiumcontent::where('server_id',$id )->exists()){

                serverpremiumcontent::where('server_id','=',$id)->update(['premiumcontent' => $request->input('premiumcontentt') ]);

           }else{
               serverpremiumcontent::create([
                   'server_id' => $id,
                   'premiumcontent' => $request->input('premiumcontentt')
               ]);
           }
        
        }
        return redirect("/server/$id/edit/#Premium-tab");

    }
    public function updatePlatformtype(Request $plateform)
    {      
            /*echo $plateform->get('id');
            die;*/

        $this->validate($plateform,[
         'plateform'=>'required',
         'type' => 'required',
        ]);
           $update = new modelServer;
           $update = modelServer::find($plateform->get('id'));
           $update->serverplatform =$plateform->get('plateform');
           $update->type =$plateform->get('type');
           $update->save();
    }



/*

// createServer/premium/buy



*/
    public function buy(){
        
        $viewdate = [];
        
        $viewdate['server_list'] = Auth::user()->servers()->withCount('hasPremiumAble')->where('delete_flag','=',0)->get();
        /* $viewdate['server_list'] = Auth::user()::with('servers')->withCount('hasPremiumAble')->get();
         echo "dd";die;*/
        $viewdate['premuim'] = fieldmeta_value::where('meta_field','premuim')->get();
        
        return view('server.buy',['data'=>$viewdate]);

    }

    // buy now post request handler
    public function buyconfirm(Request $request){
        
       $validation = Validator::make($request->all(),[
        'server' =>'required|integer',
        'months' =>'required|integer',
        'g-recaptcha-response'=>'required'
       ]);

        if($validation->fails()){
            return redirect('buypremium')
            ->withErrors($validator)
            ->withInput();
        }
        try {
            $viewdate = [];
            $viewdate['server_list'] = Auth::user()->servers()->where('id', $request->input('server'))->first();
            $viewdate['premuim'] = fieldmeta_value::where(['meta_field'=>'premuim','id'=>$request->input('months')])->first();
            Session::flash('premium', $viewdate);
            
            return view("server.confirm")->with( "data", $viewdate );
          
        } catch (Exception $e) {
           
            report($e);
            return false;
        }

    }
    /**
     * create premium server
     * debit user wallet amount
     * @session has premium dependency
     * 
     * 
     */
    public function buynow(Request $request)
    {
       
        if(!Session::has('premium')){

            abort(404);
      
        }
        try {
            
            $server = Session::get('premium')['server_list'];
            $premuim = Session::get('premium')['premuim'];

            //decresing amount in user wallet                      
            if(Auth::user()->hasMoneyB->decrement('amount', $premuim->value));
            {
                 //mew server instance 
                  $premium = new premiumserver;
                  $premium->server_id = $server->id;
                  modelServer::where('id','=',$server->id)->update(['status'=>1]);
                  
                  //create date
                  $date = Carbon::today();
                  $premium->till_date = $date->addDays($premuim->days); 
                  $premium->save();
                
                  return redirect()->route('premiumdashboard');
         
            }//payment done.
          
        }catch (Exception $e)
        {
            report($e);

            return false;
        }

    }

/**
 *  Get request full fill my Premium
 *  server with their current and old
 *  records
 */
    public function myPremium()
    {
        // $mypremium = Auth::user()->with(['wihasPremium' => function (Builder $query){  $query->select('id', 'server_id'); }])->first();
        $mypremium = Auth::user()->join('servers','l2hotzone_devDb_members.id_member','=', 'servers.user_id' )
                                 ->join('premiumservers','servers.id','=', 'premiumservers.server_id' )
                                 ->select('servers.user_id','servers.id','servers.server_name','premiumservers.till_date','premiumservers.created_at','premiumservers.active_status')
                                 ->where('l2hotzone_devDb_members.delete_flag','=',0)
        ->where('servers.user_id','=',Auth::id())->where('servers.delete_flag','=',0)->get();
        // dd($mypremium);


        return view('server.mypremium')->with('mypre',$mypremium);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function vote($token, Request $request){

        if(!Auth::id()){
            
            $pre = url()->previous();
            $_SESSION['larvel_login'] = url()->previous();
            return redirect (url("smf/index.php?action=login&page="));
        
        }

        if($server = $this->getDecrpt($token)){

            $data = voter_list::firstOrCreate(['user_id'=>Auth::id(), 'server_id' =>$server]);
            return view('votethanks');
           

        }else{
            return 'something wrong!';
        }

        /**
         * Y
         */
        // if(array_key_exists('larvel_login', $_SESSION )){
		
        //     $_SESSION['login_url'] = $_SESSION['larvel_login'];
        
        // }

    }

 private function tokenGenrate($serverId = ''){

        return encrypt($serverId);

    }
    private function verifyTokken($serverId = ''){

        return encrypt($serverId);

    }
    private function getDecrpt($serverId = ''){
       
        try {
        
            return decrypt($serverId);
        
        } catch (DecryptException $e) {
            
            return "Bad Location!";    
        
        }
        

    }
    public function voteview($id = '')
    {
        $voter_ip = $_SERVER['REMOTE_ADDR'];
        $data = [];
        $time = [];
        $url = url('/vote/id/'.$id);
        if(Auth::id())
        {
          $data = voter_list::where(['user_id'=>Auth::id(),'server_id'=>$id,'voter_ip'=>$voter_ip])->where('updated_at', '>', Carbon::now()->subHours(12)->toDateTimeString())->first();
          $server_name = modelServer::where('id',$id)->first()->server_name;


          $server_redirect_user_counter=DB::table('server_redirect_user_counter')->where(['server_id'=>$id,'user_id'=>Auth::id(),'clon_status'=>0])->first();

          if(empty($server_redirect_user_counter))
          {
            DB::table('server_redirect_user_counter')->insert([
                 'server_id'=>$id,
                 'user_id'=>Auth::id(),
                 'created_at'=>now(),
                 'updated_at'=>now(),
                 'clon_status'=>0                   
                ]);
          }
        
          if(!empty($data))
          {
             $to = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->updated_at)->addHours(12);
             $from = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s'));
             /*$actual = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:s:i'));
             echo $to;
             echo '-----';
             echo $from;
             echo '-----';
             echo $actual;
              echo '-----';*/
              //echo gmdate('H:i:s',$from->diffInSeconds($to));die;
             $time['days'] =  $from->diffInDays($to);
             $time['hours'] =  gmdate('H',$from->diffInSeconds($to));
             $time['minutes'] =  gmdate('i',$from->diffInSeconds($to));
             $time['seconds'] =  gmdate('s',$from->diffInSeconds($to));
             //print_r($time);die;
          }
        }

     
        return view('server.voteview')->with('data',$data)->with('time',$time)->with('url',$url)->with('server_name',$server_name);
    }
    public function votemanage($id)
    {
       
        if(!Auth::id())
        {
            
            $pre = url()->previous();
            $_SESSION['larvel_login'] = url()->previous();
            return redirect (url("smf/index.php?action=login&page="));
        
        }

        if($id)
        {
            $voter_ip = $_SERVER['REMOTE_ADDR'];
           
            $data = voter_list::Create(['user_id'=>Auth::id(), 'server_id' =>$id,'cron_status'=>0,'voter_ip'=>$voter_ip]);
            voter_list::where(array('user_id'=> Auth::id(),'server_id' =>$id,'voter_ip'=>$voter_ip))
            ->update([
              'voting_count'=> DB::raw('voting_count+1')

            ]);
            $_SESSION['vote'] = 'You are successfully given your vote';
            return redirect (url('/vote/id/'.$id))->with('vote','You are successfully given your vote');
           

        }
        else
        {
            return 'something wrong!';
        }
    }


}
