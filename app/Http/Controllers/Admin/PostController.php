<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\user\Post;
use App\Model\user\tag;
use App\Model\user\course;
use App\Model\user\department;
use App\Model\user\category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$posts = post::all(); //->orderBy('created_at', 'DESC');

		return view('admin.post.show', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		if(Auth::user()->can('posts.create')){
			$tags = tag::all();
			$courses = course::all();
			$categories = category::all();
			$departments = department::all();
			return view('admin.post.post', compact('tags', 'categories', 'courses', 'departments'));
		}
		return redirect(route('admin.home'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$this->validate($request, [
			'title' => 'required',
			'body' => 'required',
			'file' => 'required|mimes:csv,pdf,doc,docx',
		]);
		
		if($request->hasFile('file')){
			$image = $request->file('file');
			$name = $request->title.'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('public');
			$image->storeAs('public', $name);
			
		}
		$post = new Post;
		$post->title = $request->title;
		$post->slug = Str::slug($request->title, '-');
		$post->status = $request->status;
		$post->body = $request->body;
		$post->posted_by = $request->category;
		$post->image = $name;
		$post->save();
		$post->tags()->sync($request->tags);
		$post->courses()->sync($request->courses);
		$post->categories()->sync($request->category);
		$post->departments()->sync($request->departments);
		
		return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		if(Auth::user()->can('posts.update')){
			$post = post::with('tags', 'categories', 'courses', 'departments')->where('id', $id)->first();
			$tags = tag::all();
			$courses = course::all();
			$categories = category::all();
			$departments = department::all();
			return view('admin.post.edit', compact('tags', 'categories', 'post', 'courses', 'departments'));
		}
		return redirect(route('admin.home'));
		
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {	
        $this->validate($request, [
			'title' => 'required',
			'body' => 'required',
			'file' => 'required|mimes:csv,pdf,doc,docx',
		]);
		
		if($request->hasFile('file')){
			$image = $request->file('file');
			$name = $request->title.'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('public');
			$image->storeAs('public', $name);
			 
		}

		$post = post::find($id);
		$post->title = $request->title;
		$post->slug = Str::slug($request->title, '-');
		$post->status = $request->status;
		$post->body = $request->body;
		$post->posted_by = $request->category;
		$post->image = $name;
		$post->tags()->sync($request->tags);
		$post->courses()->sync($request->courses);
		$post->categories()->sync($request->category);
		$post->departments()->sync($request->departments);
		$post->save();
		
		return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        post::where('id', $id)->delete();
		return redirect()->back();
    }
}
