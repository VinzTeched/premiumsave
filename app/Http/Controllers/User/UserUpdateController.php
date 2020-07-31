<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\user\user;
use App\Model\user\deposit;
use Auth;

class UserUpdateController extends Controller
{ 
    public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function index($id)
    {

        if(Auth::user()->suspend == 1){
            return view('auth.login')->with('regMessage', 'Account Suspended. Pls contact our team if you think this may have been in error');
        }
        
        $user = user::find($id);
		$deposits = deposit::where('payid', $id)->get();

        return view('user.myaccount', compact('user', 'deposits'));
    }
}
