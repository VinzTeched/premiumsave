<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Model\user\deposit;
use App\Model\user\earning;
use App\Model\user\commit;
use App\Model\user\deposit_confirm;
use App\Model\user\withdrawal;
use App\Model\user\account_main;
use App\Model\user\bonus_referral;
use App\Model\user\bonus;
use App\Model\user\User;
use Carbon\Carbon;
use Auth;
use DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function index()
    {	
		$id = Auth::user()->id;

		$date = Carbon::now();

		if(Auth::user()->account_added == null){
			return view('auth.account')->with('regMessage', 'Account created. Please add your banking details to complete your registration.');
		}

		if(Auth::user()->suspend == 1){
			return view('auth.login')->with('regMessage', 'Account Suspended. Pls contact our team if you think this may have been in error');
		}
		
		$commits = commit::where('payid', $id)->where('paidStatus', null)->first();

		$commit_paid = commit::where('payid', $id)->where('recommitStatus', null)->first();

		if(!empty($commits)){
			if($commits->created_at > $date && $commits->status == null){
				return redirect(route('suspend', $id));
			}
		}

		$earnings = commit::where('payid', $id)->where('withdrawStatus', null)->where('recommitStatus', 1)->where('collection_date', '<', $date)->groupBy('payid')->get(['payid', DB::raw('SUM(amount) AS total')]);

		$withdrawals = withdrawal::where('userid', $id)->where('status', null)->first();
		if(!empty($withdrawals)){
			$findpayer = commit::where('payid', $withdrawals->payerid)->where('paidStatus', null)->first();
		}else{
			$findpayer = "";
		}

		$accounts = commit::where('payid', $id)->where('recommitStatus', 1)->where('withdrawStatus', null)->orderBy('created_at', 'ASC')->first();

		$amountToWithdraw = commit::where('payid', $id)->where('recommitStatus', 1)->where('withdrawStatus', null)->where('collection_date', '<', $date)->orderBy('created_at', 'ASC')->first();

		$bonus_referral = bonus::where('receiverid', $id)->where('paidStatus',null)->first();

		$bonuses = bonus::where('payid', $id)->where('paidStatus',null)->first();


		$total_deposits = commit::where('paidStatus', 1)->where('payid', $id)->groupBy('payid')->get(['payid', DB::raw('SUM(recommit) AS total')]);

		$total_withdrawals = withdrawal::where('userid', $id)->where('status', 1)->groupBy('userid')->get(['userid', DB::raw('SUM(reamount) AS total')]);

		$total_bonuses = bonus::where('receiverid', $id)->groupBy('receiverid')->get(['receiverid', DB::raw('SUM(amount) AS total')]);

		return view('home', compact('commits', 'accounts', 'withdrawals', 'findpayer', 'total_deposits', 'total_withdrawals', 'amountToWithdraw','total_bonuses', 'earnings', 'bonuses', 'commit_paid', 'bonus_referral'));
		
    }
}
