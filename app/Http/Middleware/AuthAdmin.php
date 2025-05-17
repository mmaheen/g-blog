<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class AuthAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            if(Auth::user()->role == 'admin'){
                return $next($request);
            }else{
                Session::flush();
                session()->flash('error', 'You do not have admin access.');
                return redirect('login');
            }
        }
        else{
            Session::flush();
            session()->flash('error', 'You are not logged in.');
            return redirect('login');
        }
    }
}
