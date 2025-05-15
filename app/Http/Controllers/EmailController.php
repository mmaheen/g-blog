<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
