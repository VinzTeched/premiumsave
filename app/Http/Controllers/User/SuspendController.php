<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\user\User;

class SuspendController extends Controller
{
    public function suspend(Request $request, $id)
    {
    	$suspend = user::find($id);
    	$suspend->suspend = 1;
    	$suspend->save();

    	return view('errors.403');
    }
}
