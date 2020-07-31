<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\user\User;
use Illuminate\Support\Facades\Hash;

class ProfileUpdateController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function updateprofile(Request $request, $id){
    	$customMessages = [
            'phonenumber.numeric' => 'Pls enter a correct Phonenumber'
        ];
        
        $this->validate($request,[
            'phonenumber' => 'min:11|numeric',
        ],$customMessages);

        $user = user::find($id);
        $user->phonenumber = $request->phonenumber;
        $user->phoneprefix = $request->phone_prefix;
        $user->save();
    }

    public function updateBank(Request $request, $id){
    	$customMessages = [
            'name.regex' => 'Pls enter your account name correctly',
            'account.numeric' => 'Pls enter a correct account number'
        ];
        
        $this->validate($request,[
            'name' => 'max:100|string|regex:/(^([a-z A-Z]+)(\d+)?$)/u',
            'account' => 'min:10|numeric',
        ],$customMessages);

        $user = user::find($id);
        $user->account_name = $request->acctname;
        $user->bank = $request->bank;
        $user->account_no = $request->account;
        $user->save();

        return redirect()->back()->with('message', 'Bank details updated successfully');
    }

    public function updatePassword(Request $request, $id)
    {   
        $this->validate($request,[
            'password' => 'required|min:8|confirmed',
        ]);

        $oldpass = user::find($id);

        if(Hash::check($request->password, $oldpass->password)){
        	$oldpass->fill([
        		'password' => Hash::make($request->password)
        	])->save;


        return redirect()->back()->with('message', 'Password updated successfully');
        }else{
        	return redirect()->back()->with('wrong', 'Your old password is incorrect');
        }


    }
}
