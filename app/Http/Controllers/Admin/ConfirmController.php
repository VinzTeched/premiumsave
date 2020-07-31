<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\user\deposit;
use App\Model\user\user;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ConfirmController extends Controller
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
		$confirms = deposit::all();

		return view('admin.confirm.show', compact('confirms'));
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
		
       $confirm = deposit::where('id', $id)->first();
	   
	   $user = $confirm->payid;
	   
       $usered = User::where('id', $user)->first();
	   
       return view('admin.confirm.edit', compact('confirm', 'usered'));
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

        $deposit = deposit::find($request->depositid);
        $deposit->status = $request->status;
        $deposit->save();

        $checkLast = earning::where('id', $request->payid)->get();

        if($checkLast->count() > 2){
            $earning = new earning;
            $earning->amount = $request->amount;
            $earning->userid = $request->payid;
            $earning->nooftimes = 1;
            $earning->collection_date = Carbon::now()->addDays(7);
            $earning->save();

        }else{

            $earning = new earning;
            $earning->amount = $request->amount;
            $earning->userid = $request->payid;
            $earning->nooftimes = $request->amount;
            $earning->collection_date = Carbon::now()->addDays(3);
            $earning->save();
        }
		
		return redirect(route('confirm-deposit.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         deposit::where('id', $id)->delete();
		return redirect()->back();
    }
}
