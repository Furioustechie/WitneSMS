<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class SmsApi {

public function smssendApi($to,$message)
    {
        //sendsms start//

                $token = "61d621ade00357ebcd1e9d09f515d3c2";
                $url = "http://api.greenweb.com.bd/api.php";
                $data= array(
                'to'=>"$to",
                'message'=>"$message",
                'token'=>"$token"
                ); // Add parameters in key value
                $ch = curl_init(); // Initialize cURL
                curl_setopt($ch, CURLOPT_URL,$url);
                curl_setopt($ch, CURLOPT_ENCODING, '');
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
                $smsresult = curl_exec($ch);
                return $smsresult;

            //sendsms end//
    }

    public function test()
    {return "test";}
}

