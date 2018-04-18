<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\Controller;

use App\User;
use App\Gh;
use App\Ph;
use App\MergeInsurance;
use App\MergeMain;
use App\ReferalBonus;
use App\RegistrationBonus;
use App\PhConfig;

class MergeRemainingController extends Controller
{
    //



    //
    public function showAvailablePH($gh_id)
    {



    	$phs=Ph::where('reminance','>', 0)->orderBy('id', 'desc')->get();

    	$gh=Gh::where('id', $gh_id)->first();

    	return view('admin.merge.remaining.listAvailablePH', ['phs'=>$phs, 'gh_id'=>$gh_id, 'gh'=>$gh]);
    }



    public function merge(Request $request)
    {
    	


    		$gh_id=$request->gh_id;

    		$gh=Gh::where('id', $gh_id)->first();
    	
    	foreach ($request->all() as $key => $value) {

    		if($key == 'gh_id'){    //remove RS ID
    			continue;
    		}

            if($key == '_token'){    //remove remember token
                continue;
            }

            if($value == 0){    //Remove 0
                continue;
            }

    		$ph_id=$key;

            $amountToRemove=intval($value);



            $ph=Ph::where('id', $ph_id)->first();

    	
            $checkNegativity=$ph->reminance-$amountToRemove;

            if($checkNegativity<0){
            	continue;
            }

//update insurance merge table
        		//populate all fields

        	$merge = new MergeMain;

        	$merge->ph_user_id=$ph->user->id;

        	$merge->gh_user_id=$gh->user->id;

        	$merge->ph_id=$ph->id;

        	$merge->gh_id=$gh->id;

        	$merge->amount=$amountToRemove;


        	if($ph->user->currency=='eth' || $ph->user->currency=='etn')
        	{
        		$merge->is_crypto=1;
        	}

        	$merge->save();


        	 //send sms to paying end

                //SMS API

        //sendSMS section
               	$json_url = "http://api.ebulksms.com:8080/sendsms.json";
                $xml_url = "http://api.ebulksms.com:8080/sendsms.xml";
                $username = null;
                $apikey = null;
                    
                    $username = "verleenplatform@gmail.com";
                    $apikey = "7aaaa6e48995cd2e89bf6b7c9f876e78bcb7e055";
                    $sendername = substr("Notice", 0, 11);
                    $recipients = $ph->user->phone;
                    $message = "You have been merged to pay out on verleen. Kindly proceed to make Payment.";

                    $recipients1 = $gh->user->phone;
                    $message1 = "You have been merged to receive on verleen. Login to dashboard for more details.";

                    $flash = 0;
                    if (get_magic_quotes_gpc()) {
                        $message = stripslashes($message);
                    }
                    $message = substr($message, 0, 160);
                #Use the next line for HTTP POST with JSON
                    $result = $this->useJSON($json_url, $username, $apikey, $flash, $sendername, $message, $recipients);

                     $result2 = $this->useJSON($json_url, $username, $apikey, $flash, $sendername, $message1, $recipients1);
                #Uncomment the next line and comment the one above if you want to use HTTP POST with XML
                    //$result = useXML($xml_url, $username, $apikey, $flash, $sendername, $message, $recipients);
              

                //sendSMS section




        	//update ph table
        	   //update reminance

        		$ph_remainance=$ph->reminance-$amountToRemove;
        		
        		Ph::where('id', $ph->id)->update(['reminance'=>$ph_remainance]);	

        	//update gh table
        		//update remainance

        		$gh_remainance=$gh->remainance-$amountToRemove;
        		
        		Gh::where('id', $gh->id)->update(['remainance'=>$gh_remainance]);



    	}


    	return Redirect::to(route('admin.merge.list', ['filterBy'=>'remaining']))->with('notification','Merging succesfully.');




    	//end
    }


       //SMS gateway RestFul API functions

public function useJSON($url, $username, $apikey, $flash, $sendername, $messagetext, $recipients) {
    $gsm = array();
    $country_code = '234';
    $arr_recipient = explode(',', $recipients);
    foreach ($arr_recipient as $recipient) {
        $mobilenumber = trim($recipient);
        if (substr($mobilenumber, 0, 1) == '0'){
            $mobilenumber = $country_code . substr($mobilenumber, 1);
        }
        elseif (substr($mobilenumber, 0, 1) == '+'){
            $mobilenumber = substr($mobilenumber, 1);
        }
        $generated_id = uniqid('int_', false);
        $generated_id = substr($generated_id, 0, 30);
        $gsm['gsm'][] = array('msidn' => $mobilenumber, 'msgid' => $generated_id);
    }
    $message = array(
        'sender' => $sendername,
        'messagetext' => $messagetext,
        'flash' => "{$flash}",
    );

    $request = array('SMS' => array(
            'auth' => array(
                'username' => $username,
                'apikey' => $apikey
            ),
            'message' => $message,
            'recipients' => $gsm
    ));
    $json_data = json_encode($request);
    if ($json_data) {
        $response = $this->doPostRequest($url, $json_data, array('Content-Type: application/json'));
        $result = json_decode($response);
        return $result->response->status;
    } else {
        return false;
    }
}

//Function to connect to SMS sending server using HTTP POST

public function doPostRequest($url, $data, $headers = array('Content-Type: application/x-www-form-urlencoded')) {
    $php_errormsg = '';
    if (is_array($data)) {
        $data = http_build_query($data, '', '&');
    }
    $params = array('http' => array(
            'method' => 'POST',
            'content' => $data)
    );
    if ($headers !== null) {
        $params['http']['header'] = $headers;
    }
    $ctx = stream_context_create($params);
    $fp = fopen($url, 'rb', false, $ctx);
    if (!$fp) {
        return "Error: gateway is inaccessible";
    }
    //stream_set_timeout($fp, 0, 250);
    try {
        $response = stream_get_contents($fp);
        if ($response === false) {
            throw new Exception("Problem reading data from $url, $php_errormsg");
        }
        return $response;
    } catch (Exception $e) {
        $response = $e->getMessage();
        return $response;
    }
}

//SMS gateway RestFul API functions



}
