<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\user\User;
use Auth;

class MyReferralController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Auth::user()->suspend == 1){
            return view('auth.login')->with('regMessage', 'Account Suspended. Pls contact our team if you think this may have been in error');
        }
        
        $myreferrals = user::where('upline', Auth::user()->ref_no)->get();   
        return view('user.referral', compact('myreferrals'));
    }
}
