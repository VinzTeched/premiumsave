<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Model\user\Post;
use App\Model\user\tag;
use App\Model\user\course;
use App\Model\user\category;
use Illuminate\Http\Request;

class MainController extends Controller
{

	public function index(){
		return view('app.index');
	}

	public function about(){
		return view('app.about');
	}

	public function testimonial(){
		return view('app.testimonial');
	}

	public function privacy(){
		return view('app.privacy');
	}

}
