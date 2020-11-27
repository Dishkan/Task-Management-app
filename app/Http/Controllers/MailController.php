<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\TestMail;

class MailController extends Controller
{
    //
	public function sendMail() {
	  $details = [
	   'title' => 'Hello from email sender!',
	   'body' => 'This message you got is checking info'
	  ];
	  
	  Mail::to('dilshodkhudayarov@gmail.com')->send(new TestMail($details));
	  return 'Email is sent!';
	}
}
