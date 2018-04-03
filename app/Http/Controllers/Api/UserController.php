<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\FormValidation;
use Illuminate\Support\Facades\Auth;
use Hash;

class UserController extends Controller
{
    // public function register(Request $request)
    // {
    	// //	return $request->all();
    	// User::create($request->all());
    	// return response('Created',201);
    // }
	
	function register(){
		
    	return view('register');		
	}
	
    public function login()
    {
    	// Auth::attempt($request->all());
    	// return response('Logged in',201);
		return view('auth.login');
    }
	
	function validateLogin(Request $request){
		 
		$username = $request->username;
		$password = $request->password;
    	$user = User::where(array('email'=>$username))->get(); 
		
        if(count($user)>0){
			$hashpass = $user[0]['password'];			
			$hash = Hash::make($password);
			if(Hash::check($hash, $hashpass))
				return response('Logged in',201);
			else
				return response('error',401);
        }else{
            return redirect('/login')->with('message','Username or password is incorrect.');
        } 
		
    }
	public function store(Request $request)
    {
        User::create($request->all());
        return response('çreated',201);
    }
	
	function forgetPassword(Request $request){
        $code = rand(1111,9999);
        $email = $request->email; 
        $res = User::where('username',$email)->get();
		
        if(sizeof($res)>0){  

            $msg = "OTP for Diet Plan login:- ".$code;

            //send OTP on Mail
            Mail::send([],[],function($message) use ($email,$msg) {
                $message->to($email)->subject("OTP for Diet Plan login")->setBody($msg, 'text/html');; 
            });

            session()->put('emailForOtp',$email);
            User::where('username',$email)->update(array('code'=>$code));
            session()->flash('message','OTP is sent on your Email.');
            return redirect('/OTPverification');
        }else{
            session()->flash('message','Email Id is not registered.');
            return redirect()->back(); 
        } 
    }

    function loginWithOtp(Request $request) {
        $email = session()->get('emailForOtp');
        $condition = array('username'=>$email,'code'=>$request->otp);
        $user = User::where($condition)->get();
        if(sizeof($user)>0){
            $request->session()->put('user',$user[0]['id']);
            $request->session()->put('name',$user[0]['name']);
			$request->session()->put('email',$user[0]['username']);
            return redirect('/home');
        }else{
            return redirect()->back()->with('message','Invalid Otp'); 
        }
    }
	
}
