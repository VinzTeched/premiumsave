<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\user\buy;
use App\Model\user\Post;
use App\Model\user\User;
use Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function post(post $post)
	{
		$book_id = $post->id;
		$id = Auth::user()->id;
		if($post->status!=1)
			$buys = buy::where('book_id', $book_id)->where('userid', $id)->where('status', 1)->get();
		else
			$buys = post::where('id', $post->id)->get();
		
		return view('blog.post', compact('post', 'buys'));
	}

    public function book(post $post)
	{	

		if($post->status!=1){
			$buys = buy::where('id', $post->id)->get();
		}else{
			$buys = post::where('id', $post->id)->get();
		}

		return view('blog.post', compact('post', 'buys'));
	}
	
}
