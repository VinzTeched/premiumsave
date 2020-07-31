<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\user\User;
use App\Model\user\commit;
use App\Model\user\earning;
use App\Model\user\withdrawal;
use App\Model\user\bonus;
use Carbon\Carbon;

class ReferralController extends Controller
{
	public function referral(user $referral)
	{
		return view('auth.register', compact('referral'));		
	}

	public function referralbonus(Request $request, $id)
	{        
        $bonus_referral = bonus::find($id);
        $bonus_referral->paidStatus = 1;
        $bonus_referral->save();

        $user = user::find($bonus_referral->payid);
        $user->status = 1;
        $user->save();

        $checkLast = earning::where('id', $bonus_referral->payerid)->get();

        $earning = new earning;
        $earning->amount = $request->amount;
        $earning->userid = $request->payid;
        $earning->nooftimes = 1;
        $earning->collection_date = Carbon::now()->addDays(3);
        $earning->save();

        $findreceiver = withdrawal::where('selected', null)->where('status', null)->first();

            if(!empty($findreceiver)){
                $id = $findreceiver->id;
                $userid = $findreceiver->userid;
                $receivename = $findreceiver->name;
                $receivenumber = $findreceiver->phone;
                $receiveaccount = $findreceiver->acct_no;
                $receivebank = $findreceiver->bank;
                $money = $findreceiver->amount - $bonus_referral->pendingTransaction;
               
                    if($money > 0){
                        $newwithdraw = new withdrawal;
                        $newwithdraw->userid = $findreceiver->userid;
                        $newwithdraw->amount = $money;
                        $newwithdraw->name = $findreceiver->name;
                        $newwithdraw->bank = $findreceiver->bank;
                        $newwithdraw->acct_no = $findreceiver->acct_no;
                        $newwithdraw->phone = $findreceiver->phone;
                        $newwithdraw->save();
                    }

            $withdrawal = withdrawal::find($id);
            $withdrawal->selected = 1;
            $withdrawal->reamount = $bonus_referral->payment;
            $withdrawal->payerid = $bonus_referral->payid;
            $withdrawal->payername = $bonus_referral->payername;
            $withdrawal->payerphone = $bonus_referral->payerphone;
            $withdrawal->save();

        }else{
            $id = null;
            $userid = 1;
            $receivename = 'Testing One';
            $receivenumber = '+2348122334455';
            $receiveaccount = '1234567899';
            $receivebank = 'Eko Bank';
        }
        
        $newdeposit = new commit;
        $newdeposit->amount = $request->pendingTransaction; 
        $newdeposit->recommit = $request->payment; 
        $newdeposit->invest = 1;
        $newdeposit->pendingTransaction = $bonus_referral->payment;
        $newdeposit->deptableid = $id;
        $newdeposit->payid = $bonus_referral->payid;
        $newdeposit->receiverid = $userid;
        $newdeposit->receivername = $receivename;
        $newdeposit->receiverphone = $receivenumber;
        $newdeposit->receiverbank = $receivebank;
        $newdeposit->receiveraccount = $receiveaccount;
        $newdeposit->save();
        
        return redirect(route('home'))->with('buy_message', 'Payment confirmed');
	}

}
