<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Redirect;


/*use EbulkSMS\Authentication\Initialize;
use EbulkSMS\Response\Response;
use EbulkSMS\Request\SendSMS;*/

use App\Testimony;
use App\Config;
use App\ReferalBonus;
use App\User;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm($phone=null)
    {
        $testimonies=Testimony::orderBy('id','desc')->limit('6')->get();

        $config=Config::where('id', 1)->first();

        if($phone==null){

            return view('auth.register',['testimonies'=>$testimonies, 'config'=>$config]);

        }else{

            $referal=User::where('phone', $phone)->first();

            return view('auth.register',['testimonies'=>$testimonies, 'config'=>$config,'referal'=>$referal]);
        }

        
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));



        //populate referrer table

        if(isset($request->referal_name)){

        $user1=User::where('email', $request->email)->first();

        if(!empty($user1)){

            $user_id=$user1->id;

            $user2=User::where('phone',$request->referal_phone)->first();

            $user2_id=$user2->id;

            $referal= new ReferalBonus;

            $referal->referal_id=$user2_id;

            $referal->referee_id= $user_id;

            $referal->remember_token=$request->_token;

            $referal->save();

        }

    }



   //populate referrer table
       


        $code="VN".mt_rand(1000, 100000);

        $referal_link='https:://www.verleen.online/ref/'.$request->phone;

        User::where('email', $request->email)->update(['verification_code'=>$code, 'referal_link'=>$referal_link,'phone'=>$request->phone]);

        //SMS API

        //sendSMS section
                $json_url = "http://api.ebulksms.com:8080/sendsms.json";
                $xml_url = "http://api.ebulksms.com:8080/sendsms.xml";
                $username = null;
                $apikey = null;
                    
                    $username = "verleenplatform@gmail.com";
                    $apikey = "7aaaa6e48995cd2e89bf6b7c9f876e78bcb7e055";
                    $sendername = substr("Activation", 0, 11);
                    $recipients = $request->phone;
                    $message = $code." is your verleen verification code";
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




        if($result=="SUCCESS"){

            $user_id=User::where('phone', $request->phone)->first()->id;

                   return Redirect::to(route('activate.user', ['id'=>$user_id])); 
                   //return Redirect::to('activate_user/'.$user_id);
        }


       // $this->guard()->login($user);

       // return $this->registered($request, $user)
                       // ?: redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {

        //return true;
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
