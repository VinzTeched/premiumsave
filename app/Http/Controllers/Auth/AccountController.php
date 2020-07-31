<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\user\User;

class AccountController extends Controller
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
        return view('auth.account');
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
        $customMessages = [
            'name.regex' => 'Pls enter your account name correctly',
            'account.numeric' => 'Pls enter a correct account number'
        ];
        
        $this->validate($request,[
            'name' => 'required|max:100|string|regex:/(^([a-z A-Z]+)(\d+)?$)/u',
            'account' => 'required|min:10|numeric',
            'bank' => 'required|max:100|string'
        ],$customMessages);

        $user = user::find($id);
        $user->account_added = $request->status;
        $user->name = $request->name;
        $user->account_name = $request->name;
        $user->bank = $request->bank;
        $user->account_no = $request->account;
        $user->save();

        return redirect(route('home'))->with('message', 'Congratulations '.$user->name.', You have completed your account registration process');
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
