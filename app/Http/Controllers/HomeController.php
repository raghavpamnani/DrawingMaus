<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //$data = session()->all();
        $userid = Auth::id();
        $email = Auth::user()->email;
        session()->put('userId',$userid);
        return view('dashboard', compact('participants','userid'));

    }
}
