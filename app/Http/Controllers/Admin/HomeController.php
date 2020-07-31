<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
/*	public function __construct()
    {
        $this->middleware('auth:admin');
    }
	*/
    public function index(){
		return view('admin.home');
	}
	
	public function __construct()
    {
        $this->middleware('guest:admin')->except('admin.login');
    }
	
}
