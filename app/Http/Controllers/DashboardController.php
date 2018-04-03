<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\model\Profile;
use App\model\User;
use App\Library\Common;
use Auth;

class DashboardController extends Controller
{	

	public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function index()
    {    $userid = Auth::id();
        return view('dashboard', compact('userid'));
    }

   
}
