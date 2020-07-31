<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\User\message;
use Illuminate\Http\Request;

class CourseController extends Controller
{
	
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
        
        $messages = Message::all();
		
        return view('admin.course.show', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
			'name' => 'required',
			'slug' => 'required',
		]);
		
		$course = new course;
		$course->name = $request->name;
		$course->slug = $request->slug;
		$course->save();
		
		return redirect(route('course.index'));
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
        $course = course::where('id', $id)->first();
        return view('admin.course.edit', compact('course'));
        //
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
			'name' => 'required',
			'slug' => 'required',
		]);
		
		$course = course::find($id);
		$course->name = $request->name;
		$course->slug = $request->slug;
		$course->save();
		
		return redirect(route('course.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        course::where('id', $id)->delete();
		return redirect()->back();
    }
}
