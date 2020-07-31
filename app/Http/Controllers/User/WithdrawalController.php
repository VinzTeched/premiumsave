<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\user\withdrawal;
use App\Model\user\deposit;
use App\Model\user\buy;
use App\Model\user\User;
use Auth;
use DB;
use Illuminate\Http\Request;

class WithdrawalController extends Controller
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
		$withdrawals = withdrawal::all();

		return view('home', compact('withdrawals'));
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
			'myamount' => 'required|numeric|min:100|regex:/(^([0-9]+$)+)/',
			'userid' => 'required',
		]);

        $withdrawal = new withdrawal;
        $withdrawal->amount = $request->myamount;
        $withdrawal->userid = $request->userid;
        $withdrawal->name = $request->account_name;
        $withdrawal->bank = $request->bank;
        $withdrawal->acct_no = $request->account_no;
        $withdrawal->phone = $request->phone;
        $withdrawal->save();
        
        return redirect(route('home'))->with('message', 'Withdrawal Requested');
		
		/*if($request->amount > $request->amt)
		{
			
            return redirect(route('withdrawal.create'))->with('w_message', 'Insufficient Fund to Withdraw');
		}
        elseif($request->ref_money == '' && $request->ref_moneys == '')
        {
            return redirect(route('withdrawal.create'))->with('w_message', 'You cannot withdraw until you deposit or buy product');
        }else
		{
			$withdrawal = new withdrawal;
			$withdrawal->amount = $request->amount;
			$withdrawal->userid = $request->userid;
			$withdrawal->method = $request->method;
			$withdrawal->save();
			
			return redirect(route('home'))->with('message', 'Withdrawal Requested');
		}*/
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
        withdrawal::where('id', $id)->delete();
		return redirect()->back();    
    }
}
