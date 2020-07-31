<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\user\post;
use App\Model\user\category;
use App\Model\user\buy;
use App\Model\user\tag;
use App\Model\user\department;
use App\Model\user\course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
		$posts = post::where('posted_by', 2)->orderBy('created_at', 'DESC')->paginate(50);
		
		$buy = buy::all();
		
		return view('blog.index', compact('posts', 'buy'));
	}

    public function question(){
		$posts = post::where('posted_by', 1)->orderBy('created_at', 'DESC')->paginate(50);		
		
		$buy = buy::all();
		
		return view('blog.index', compact('posts', 'buy'));
	}
	
	public function course(course $course){
		
		$posts = $course->posts();
		
		return view('blog.tag', compact('posts'));	
	}
	
	public function school(tag $school){
		
		$posts = $school->posts();
		
		return view('blog.index', compact('posts'));	
	}
	
	public function category(category $category){
		
		$posts = $category->posts();
		
		return view('blog.index', compact('posts'));	
	}
	
	public function department(department $department){
		
		$posts = $department->posts();
		
		return view('blog.index', compact('posts'));	
	}
}
