<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Requests;
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



class ApiController extends Controller
{
    
    public function check_api(Request $api)
    {
    	$ip= $api->get('IP');

        $server_id= $api->get('SERVER_ID');
       
    	$ipv="";
    	$api_key = $api->get('API_KEY');    
    	$messsage = "Ok";
        $voter_ip = $api->get('VOTER_IP'); 
    	$flag = true;
    	if($ip == "")
    	{
            $flag = false;
    		$messsage = "IP address is blank";
    	}
        if($voter_ip == "")
        {
            $flag = false;
            $messsage = "Voter IP address is blank";
        }
    	elseif($api_key == "")
    	{
    		$flag = false;
    		$messsage = "API_KEY is blank";
    	}
        elseif($server_id == "")
        {   
            $flag = false;
            $messsage = "SERVER_ID is blank";
        }

    	if($flag == true)
    	{       
                $id_counter = modelServer::where("id","=",$server_id)->count();
                if($id_counter == "1")
                {
                    $api_counter = modelServer::where("api_key","=",$api_key)->count();
                    if($api_counter == "1")
                    {
                        $api_id_counter = modelServer::where("api_key","=",$api_key)->where("id",$server_id)->count();
                        if($api_id_counter == "1")
                        {

                            if(filter_var($ip, FILTER_VALIDATE_IP))
                            {
                                if(filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4))
                                {
                                    $flag = true;
                                    $ipv="IP version4";
                                }
                                elseif( filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) )
                                {
                                    $flag = true;
                                    $ipv="IP version6";
                                }
                                else
                                {
                                    $flag = false;
                                    $messsage = "IP addrress is not in proper version";
                                }
                            }
                            else
                            {
                                $flag = false;
                                $messsage = "IP you want to check is not  valid IP address";
                            }
                        }
                        else
                        {
                            $flag = false;
                            $messsage = "API_KEY does not match with server id;";
                        }
                    }
                    else
                    {
                        $flag = false;
                        $messsage = "API_KEY does not exists";
                    }
                }
                else
                {
                    $flag = false;
                    $messsage = "SERVER_ID does not exists";
                }
                if($flag == true)
                {
                    $server_details = modelServer::where("api_key","=",$api_key)->first();
                    if(!empty($server_details->toArray()))
                    {
                        $user_id = $server_details->user_id;
                        $data = voter_list::where(['server_id'=>$server_id,'voter_ip'=>$voter_ip])->where('updated_at', '>', Carbon::now()->subHours(12)->toDateTimeString())->first();
                        /*echo "user_id".$user_id;
                        echo "server_id".$server_id;
                        echo "voter_ip".$voter_ip;die;
                        echo '<pre>';print_r($data);die;*/
                    }
                    $voted = "false";
                    if(!empty($data))
                    {
                        $voted = "true";

                    }
                    //echo "<pre>";print_r($data);die;
                    

    				$final_data = array(
    			    "status" => "valid",
                    "error_code" => "0",
    			    "result" => array(
                    "Server Id" => $server_id,    
    			    "ip address" => $ip,
    			    "Api-Key" => $api_key,
    			    "Ip version" => $ipv,
                    "voted" => $voted
    				));
                }
                else
                {
                    $final_data = array(
                    "status" => "invalid",
                    "error_code" => "404",
                    "error" => $messsage,
                    "result" => "",);
                }
		  	
		  	
    	}
    	else
    	{
				 $final_data = array(
                    "ok" => $flag,
                    "error_code" => "404",
                    "description" => $messsage,
                    "result" => "",);	  	
		  	

    	}
    	return response()->json($final_data);

/*    		if($api_key != "")
    		{
	    		if($api_counter == "1")
	    		{
					if(filter_var($ip, FILTER_VALIDATE_IP))
					{
						if(filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4))
						{
						  	$ip = array(
							    "success" => "True",
							    "messsage" => "This is valid Ipv4",
							    "data" => array(
							    "ip address" => $ip,
							    "Api-Key" => $api_key
								));
						  	// echo json_encode($book);
						  	return response()->json($ip, 200);
						}
						elseif(filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) 
						{
			  				echo "ip address is version IP6";
						}
						else
						{
						  	echo "ip address not version 4 or 6";
						}	 	
					}
					else
					{
					 	 echo "ip address not Validator";
					}
				}
				else
				{
					echo "api key does not exists";
				}
			}
			else
			{
				echo "Ip address or api key is blank";
			}*/

    }

}
