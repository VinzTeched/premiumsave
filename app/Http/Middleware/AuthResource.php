<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\user\user;
use Auth;

class AuthResource
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

     /*   if ($request->route('referral')) {
            $user = user::find($request->route('referral'));
            if ($user && $user->ref_no) {
                return redirect(route('register'))->with('message', 'Unable To Access Requested Page');
            }
            elseif (empty($user->ref_no)) {
                return redirect(route('register'))->with('wrong', 'Unable To Access Requested Page');
            }
        }*/


    if ($request->route('userid')) {
        $user = user::find($request->route('userid'));
        if ($user && $user->id != Auth::user()->id) {
            return redirect(route('home'))->with('wrong', 'Unable To Access Requested Page');
        }
        elseif (empty($user->id)) {
            return redirect(route('home'))->with('wrong', 'Unable To Access Requested Page');
        }
    }

        return $next($request);
    }
}
