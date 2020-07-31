<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Request\ContactRequest;
use App\Model\User\message;

class ContactController extends Controller
{
	public function index(){
		return view('app.contact');
	}

    public function submit(ContactRequest $request){
		//dd($request);
		$message = new Message();
		$message->name = $request->input('name');
		$message->email = $request->input('email');
		$message->phone = $request->input('phone');
		$message->subject = $request->input('subject');
		$message->message = $request->input('message');
		$message->save();
		
		
		return redirect()->route('contact')->with('conmessage', 'Message sent successfully');
		
	}
	
	public function getMessages(){
		$messages = Message::all();
		return view('messages', ['messages' => $messages]);
		
	}
}
