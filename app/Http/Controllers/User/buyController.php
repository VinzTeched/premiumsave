<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\user\Post;
use App\Model\user\buy;
use App\Model\user\withdrawal;
use App\Model\user\deposit;
use App\Model\user\User;
use Auth;
use DB;

class buyController extends Controller
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
        $this->validate($request, [
			'amount' => 'required|numeric|min:100|regex:/(^([0-9]+$)+)/',
			'userid' => 'required',
			'method' => 'required',
		]);
		
		if($request->method == 3)
		{
			if($request->amount > $request->amt)
				return redirect()->back()->with('w_message', 'Insufficient Fund to Process Purchase');
			else{
				$withdrawal = new withdrawal;
				$withdrawal->amount = $request->amount;
				$withdrawal->userid = $request->userid;
				$withdrawal->method = $request->method;
				$withdrawal->status = 1;
				$withdrawal->save();	
				
				$buy = new buy;
				$buy->book_id = $request->book_id;
				$buy->userid = $request->userid;
				$buy->amount = $request->amount;
				$buy->method = $request->method;
				$buy->status = 1;
				$buy->save();
				
				return redirect(route('post', $request->slug))->with('buys_message', ' Acquired Successfully');	
			}
		}else
		{
		$buy = new buy;
		$buy->book_id = $request->book_id;
		$buy->userid = $request->userid;
		$buy->amount = $request->amount;
		$buy->method = $request->method;
		$buy->save();
		
		if($request->method == 1)
			return redirect(route('home'))->with('buy_message', 'Product Requested. Please Pay Exactly '.'&#8358;'.$request->amount.' to the following account: '.'</br>'.'SoftWorkPro'.'</br>'.'0123223323'.'<br>'.'GT Bank');
		else
			return redirect(route('home'))->with('message', 'Follow this to complete Purchase');
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$post = post::find($id);//where('posted_by', $id)->get();
		
		
		$id = Auth::user()->id;
		
		$depots = deposit::where('userid', $id)->where('status', 1)->groupBy('userid')->get(['userid', DB::raw('SUM(amount) AS total')]);
		
		$withdrawals = withdrawal::where('userid', $id)->where('status', 1)->groupBy('userid')->get(['userid', DB::raw('SUM(amount) AS total')]);
		
		return view('user.buy', compact('post', 'depots', 'withdrawals'));
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
        //
    }
}
