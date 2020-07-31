<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\user\testimony;
use Illuminate\Http\Request;
use Auth;

class TestimonialController extends Controller
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
        $testimonies = testimony::where('user', Auth::user()->id)->get();
        return view('user.testimonial', compact('testimonies'));
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
        $customMessages = [
            'text.regex' => 'Pls enter text appropriately',
            'text.required' => 'Pls fill the required field',
            'text.min' => 'Your text is too small, enter more',
        ];
        
        $this->validate($request,[
            'text' => 'required|min:3|string|regex:/(^([a-z A-Z]+)(\d+)?$)/u',
            'username' => 'required',
            'user' => 'required'
        ],$customMessages);

        $testimony = new testimony;
        $testimony->user = $request->user;
        $testimony->username = $request->username;
        $testimony->post = $request->text;
        $testimony->level = $request->level;
        $testimony->save();

        return redirect(route('testimony.index'))->with('message', 'Testimony Added');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        testimony::where('id', $id)->delete();
        return redirect()->back()->with('message', 'Testimony Removed!');
    }
}
