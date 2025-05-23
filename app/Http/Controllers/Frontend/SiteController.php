<?php

namespace App\Http\Controllers\Frontend;

use Faker\Factory;
use App\Models\Blog;
use App\Models\User;
use App\Models\Photo;
use App\Models\Skill;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    //
    public function index(){
        $categories = Category::select('id','image')->get(); //Category image 
        $skills = Skill::select('title','percentage')->get();
        $photo_categories = Category::inRandomOrder()->select('id','title')->take(10)->get(); //Photo category
        $photos = Photo::latest()->select('title','id','image','category_id')->with('category')->paginate(15);
        $blogs = Blog::latest()->select('title','created_at','category_id','user_id','id','image','slug')->with('category','user')->take(6)->get();
        $users = User::select('name','id','image','role')->inRandomOrder()->take(4)->get(); //Team
        $testimonials = Testimonial::inRandomOrder()->select('user_id','rating','review')->with('user')->take(5)->get();
        $faker = Factory::create();
        return view ('frontend.index',compact('categories','photos','photo_categories','users','testimonials','blogs','skills','faker'));
    }

    public function blog(){
        $categories = Category::select('id','title')->withCount('blogs')->inRandomOrder()->take(10)->get();
        $blogs = Blog::inRandomOrder()->select('id','title','user_id','created_at','description','image','slug')->with('user','comments')->paginate(6);
        $recent_blogs = Blog::latest()->select('id','title','created_at','image')->take(10)->get();
        return view ('frontend.blog.index',compact('blogs','categories','recent_blogs'));
    }

    public function blogDetails(string $slug){
        $id = Blog::where('slug',$slug)->value('id');
        $blog = Blog::find($id);
        $comments = Comment::where('blog_id',$id)->with('user','blog','replies')->get();
        // return $comments;
        return view ('frontend.blog.details',compact('blog','comments'));
    }

    public function photoDetails($id){
        // return $id;
        $photo = Photo::find($id);
        return view ('frontend.photo.details',compact('photo'));
    }
}
