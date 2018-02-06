<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request)
    {
    	//	return $request->all();
    	User::create($request->all());
    	return response('Created',201);
    }

    public function login(Request $request)
    {
    	Auth::attempt($request->all());
    	return response('Logged in',201);
    }
}
