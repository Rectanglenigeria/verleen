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

class MergeDownPaymentController extends Controller
{
    //
    public function showDPR($ph_id)
    {
    	$ph=Ph::where('id', $ph_id)->first();

    	$ghs=Gh::where('remainance','>', 0)->orderBy('id', 'desc')->get();

    	return view('admin.merge.downpayment.listDPR', ['ghs'=>$ghs, 'ph_id'=>$ph_id, 'ph'=>$ph]);
    }



    public function merge(Request $request)
    {
    	

    	$formData=$request->all();

        $rule=array(

            'ph_id'=>"required",
            'gh_id'=>"required"
            );

        $message=array(
            
            'gh_id.required'=>'This field is required'
            );

        $validator=Validator::make($formData, $rule, $message);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();

        }else{

        	//merge
        	$ph=Ph::where('id', $request->ph_id)->first();

        	$gh=Gh::where('id', $request->gh_id)->first();

        	$ph_amount=$ph->reminance;

        	//extract downpayment amount

        	$downpaymentPercent=PhConfig::where('currency', $ph->user->currency)->first()->downpayment;


        	$downpaymentAmount=($downpaymentPercent/100)*$ph->reminance;





        	//update insurance merge table
        		//populate all fields

        	$merge = new MergeInsurance;

        	$merge->ph_user_id=$ph->user->id;

        	$merge->gh_user_id=$gh->user->id;

        	$merge->ph_id=$ph->id;

        	$merge->gh_id=$gh->id;

        	$merge->amount=$downpaymentAmount;


        	if($ph->user->currency=='eth' || $ph->user->currency=='etn')
        	{
        		$merge->is_crypto=1;
        	}

        	$merge->save();




        	//update ph table
        	   //update reminance

        		$ph_remainance=$ph->reminance-$downpaymentAmount;
        		
        		Ph::where('id', $ph->id)->update(['reminance'=>$ph_remainance]);	

        	//update gh table
        		//update remainance

        		$gh_remainance=$gh->remainance-$downpaymentAmount;
        		
        		Gh::where('id', $gh->id)->update(['remainance'=>$gh_remainance]);

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
                    $flash = 0;
                    if (get_magic_quotes_gpc()) {
                        $message = stripslashes($message);
                    }
                    $message = substr($message, 0, 160);
                #Use the next line for HTTP POST with JSON
                    $result = $this->useJSON($json_url, $username, $apikey, $flash, $sendername, $message, $recipients);
                #Uncomment the next line and comment the one above if you want to use HTTP POST with XML
                    //$result = useXML($xml_url, $username, $apikey, $flash, $sendername, $message, $recipients);
              

                //sendSMS section


    		return Redirect::to(route('admin.merge.list', ['filterBy'=>'downpayment']))->with('notification','Merging succesfully.');

    	}





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

