<?php

namespace App\Http\Controllers\Backend\Client;

use App\Models\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    //
    public function dashboard()
    {
        return view('backend.client.dashboard');
    }

    public function gallery()
    {
        $photos = Photo::where('user_id', Auth::user()->id)->select('id','title','image')->get();
        return view('backend.client.photo.gallery', compact('photos'));
    }
}
