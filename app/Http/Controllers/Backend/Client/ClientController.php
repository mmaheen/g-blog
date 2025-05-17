<?php

namespace App\Http\Controllers\Backend\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //
    public function dashboard()
    {
        return view('backend.client.dashboard');
    }
}
