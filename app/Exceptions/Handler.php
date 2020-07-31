<?php

namespace App\Exceptions;

//use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Arr;
use Auth;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        return parent::render($request, $exception);
		
    }
	
	protected function unauthenticated($request, AuthenticationException $exception)
	{
		if($request->expectsjson()){
			return response()->json(['error' => 'Unauthenticated.'], 401);
		}
		if($request->is('admin/home') || $request->is('admin/*')){
			return redirect()->guest(route('admin.login'));
		}
		return redirect()->guest(route('login'));
	}
}