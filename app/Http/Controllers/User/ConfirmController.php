<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Model\user\commit;
use App\Model\user\earning;
use App\Model\user\withdrawal;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ConfirmController extends Controller
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
        //
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
            //
        ]);
        
        $withdrawal = withdrawal::find($id);
        $withdrawal->status = $request->status;
        $withdrawal->save();

        $deposit = commit::find($request->depositid);
        $deposit->paidStatus = 1;
        $deposit->recommit = $request->amount;
        $deposit->earning = $request->amount+$request->amount*50/100;
        $deposit->collection_date = Carbon::now()->addDays(3);
        $deposit->save();

        if(!empty($request->commitmentID)){
            $commit = commit::where('id', $request->commitmentID)->first();
            $commit->withdrawStatus = 1;
            $commit->save();
        }

        $earning = new earning;
        $earning->amount = $request->amount;
        $earning->userid = $request->payid;
        $earning->nooftimes = 1;
        $earning->collection_date = Carbon::now()->addDays(3);
        $earning->save();
  
        return redirect(route('home'))->with('buy_message', 'Payment confirmed');
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
