<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    //
        public function index(){
        $categories = Category::select('id','image')->get();
        $random_categories = Category::inRandomOrder()->select('id','title')->take(10)->get();
        $users = User::select('name','id','image','role')->inRandomOrder()->take(4)->get();
        $photos = Photo::latest()->paginate(15);
        $testimonials = Testimonial::inRandomOrder()->take(5)->get();
        $blogs = Blog::latest()->take(6)->get();
        $skills = Skill::all();
        $faker = Factory::create();
        return view ('frontend.index',compact('categories','photos','random_categories','users','testimonials','blogs','skills','faker'));
    }
}
