<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class OtpController extends Controller
{
    function mobileLogin(Request $request){
		
		$code = rand(1111,9999);
        $phone = $request->phone; 
        $res = User::where('phone',$phone)->get();	
		
        if(sizeof($res)>0){  

            $msg = "OTP for Mobile login:- ".$code;
            //For sending OTP

			 $url="http://sms.mobidowonders.com/api/otp.php";
			$postData = array(
				'authkey' => "68320AnKaEx2Z5a9d1bcf",
				'mobile' => $phone,
				'message' => $msg,
				'sender' => "OTPSMS",
				'otp' => $code
			 );
            $paramArr['url'] = $url;
            $paramArr['postData'] = $postData;
           
            $output = $this->sendRequest($paramArr);
            
            $array=explode(",",$output); 
            $array2=explode(":",$array[1]); 
            $status=$array2[1];
           
           if($status=='"success"}'){
                session()->put('mblForOtp',$phone);
                User::where('phone',$phone)->update(array('code'=>$code));
                session()->flash('message','OTP is sent on your phone No.');
                return redirect('/OTPverification');
           }else{
                 return redirect()->back()->with('message','Server Error'); 
            }
        }else{
            session()->flash('message','Mobile No. is not registered.');
            return redirect()->back(); 
        } 
    }

    function sendRequest($param){
        $url = $param['url'];
        $postData = $param['postData'];
    
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData
            //,CURLOPT_FOLLOWLOCATION => true
        ));
    
    
        //Ignore SSL certificate verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    
    
        //get response
        $output = curl_exec($ch);
    
        //Print error if any
        if(curl_errno($ch))
        {
            return curl_error($ch);
        }
    
        curl_close($ch);
    
        return $output;
    }

	 function loginWithOtp(Request $request) {
         
        $phone = session()->get('mblForOtp');
        $condition = array('phone'=>$phone,'code'=>$request->otp);
        $user = User::where($condition)->get(); 
		
        if(sizeof($user)>0){
            $request->session()->put('userId',$user[0]['id']);
			$request->session()->put('email',$user[0]['email']);
            return view('dashboard');
        }else{
            return redirect()->back()->with('message','Invalid Otp'); 
        }
    }
}
