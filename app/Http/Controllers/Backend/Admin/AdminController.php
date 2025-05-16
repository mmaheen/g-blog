<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //
    public function dashboard(){
        $users = User::select('name','role','image')->take(4)->inRandomOrder()->get(); //card
        $users_table = User::select('name','email','role','image')->inRandomOrder()->paginate(10); //Table
        return view('backend.admin.dashboard',compact('users','users_table'));
    }
}
