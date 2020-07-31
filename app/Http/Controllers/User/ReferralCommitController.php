<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\user\bonus;

class ReferralCommitController extends Controller
{
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
        $this->validate($request, [
            'amount' => 'required|numeric|min:100|regex:/(^([0-9]+$)+)/',
            'userid' => 'required',
        ]);
        
        $personToPay = user::where('ref_no', $request->upline)->first();
        $bonus = $request->amount*10/100;
        $pendingTransaction = $request->amount - $bonus;

        $commit = new bonus;
        $commit->amount = $bonus;
        $commit->payid = $request->userid;
        $commit->receiverid = $personToPay->id;
        $commit->receivername = $personToPay->account_name;
        $commit->receiverphone = $personToPay->phoneprefix.$personToPay->phonenumber;
        $commit->receiverbank = $personToPay->bank;
        $commit->receiveraccount = $personToPay->account_no;
        $commit->save();

        return redirect(route('home'))->with('buy_message', 'You have been assigned to pay your upline a bonus of 10% of your donation which is ₦'.$bonus.'. Please make this payment immediately and contact the user for confirmation.');
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
            'amount' => 'required|numeric|min:100|regex:/(^([0-9]+$)+)/',
            'payid' => 'required',
            'medium' => 'required',
            'pop' => 'required|mimes:png,jpg,jpeg,gif',
        ]);

        if($request->hasFile('pop')){
            $ImageName = $request->pop->store('public');
        }

        $bonus = bonus::find($id);
        $bonus->hepaid = 1;
        $bonus->notify = 1;
        $bonus->payername = $request->payername;
        $bonus->payerphone = $request->payerphone;
        $bonus->medium = $request->medium;
        $bonus->bank = $request->payBank;
        $bonus->image = $ImageName;
        $bonus->save();
        
        return redirect(route('home'))->with('buy_message', 'You have succesfully uploaded payment detail. Pls call '.$request->receivename.' for confirmation');

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
