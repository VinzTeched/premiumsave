<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\user\user;
use App\Model\user\earning;
use App\Model\user\deposit;
use Carbon\Carbon;

class PurchaseController extends Controller
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
		$deposits = deposit::where('status', null)->where('receiverid', null)->get();

		return view('admin.buy.show', compact('deposits'));
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
       $deposit = deposit::where('id', $id)->first();
	   
	   $user = $deposit->payid;
	   
       $usered = User::where('id', $user)->first();
	   
       return view('admin.buy.edit', compact('deposit', 'usered'));
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
		$deposit = deposit::find($id);
        $deposit->status = $request->status;
        $deposit->save();

        $checkLast = earning::where('id', $request->payid)->get();

        if($checkLast->count() > 2){
            $earning = new earning;
            $earning->amount = $request->amount;
            $earning->userid = $request->payid;
            $earning->nooftimes = $request->amount;
            $earning->collection_date = Carbon::now()->addDays(7);
            $earning->save();

        }else{

            $earning = new earning;
            $earning->amount = $request->amount;
            $earning->userid = $request->userid;
            $earning->nooftimes = $request->amount;
            $earning->collection_date = Carbon::now()->addDays(3);
            $earning->save();
        }
		
		return redirect(route('purchase.index'))->with('buy_message', 'Payment confirmed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
