<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    //
    public function contact(Request $request){
        $name = $request->name;
        $to = $request->email;
        $subject = $request->subject;
        $email_content = $request->message;
        Mail::to($to)->send(new Contact($name,$subject,$email_content));
        return redirect()->back();
    }
}
