<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\user\withdrawal;
use App\Model\user\user;
use Illuminate\Http\Request;

class ConfirmWithdrawalController extends Controller
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
		$withdrawals = withdrawal::all();

		return view('admin.withdrawal.show', compact('withdrawals'));
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
		//
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
		//$user = User::select('id')->pluck('id');
		
       $withdrawal = withdrawal::where('id', $id)->first();
	   
	   $user = $withdrawal->userid;
	   
       $usered = User::where('id', $user)->get();
	   
       return view('admin.withdrawal.edit', compact('withdrawal', 'usered'));
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
        
		$withdrawal = withdrawal::find($id);
		$withdrawal->status = $request->status;
		$withdrawal->save();
		
		return redirect(route('confirm-withdrawal.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         withdrawal::where('id', $id)->delete();
		return redirect()->back();
    }
}
