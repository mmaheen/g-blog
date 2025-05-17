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

    public function register(){
        return view('backend.admin.register');
    }
    public function store(Request $request){
        // return $request->all();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'role' => 'required',
        ],
        [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Email must be a valid email address',
            'email.unique' => 'Email already exists',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 8 characters',
            'password.confirmed' => 'Password confirmation does not match',
            'role.required' => 'Role is required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/users'),$filename);
            $user->image = $filename;
        }
        $user->save();
        return redirect()->route('dashboard.admin.index')->with('success','User Created Successfully');
    }
}
