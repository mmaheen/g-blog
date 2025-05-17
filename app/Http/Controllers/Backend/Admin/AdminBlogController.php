<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Auth;

class AdminBlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('user','category')->latest()->paginate(10);
        return view('backend.admin.blog.table',compact('blogs'));
    }

    public function create()
    {
        $categories = Category::select('id','title')->get();
        return view('backend.admin.blog.create', compact('categories'));
    }

    public function store(Request $request)
    {
        try{
            if(isset($request->image)){
                $image_name = 'Blog-'.time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/blogs'),$image_name);
            }
            else{
                $image_name = null;
            }
            $blog = new Blog();
            $blog->title = $request->title;
            $blog->category_id = $request->category;
            $blog->user_id = Auth::user()->id;
            $blog->description = $request->description;
            $blog->image = $image_name;
            $blog->save();
            return $blog;
        }
        catch(Exception $error){
            return $error->getMessage();
        }
        
    }

    public function show(string $id)
    {
        $blog = Blog::find($id);
        return view ('backend.admin.blog.show',compact('blog'));
    }

    public function edit(string $id)
    {
        $blog = Blog::find($id);
        $categories = Category::select('title','id')->get();
        return view ('backend.admin.blog.edit',compact('blog','categories'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        try{
            $blog = Blog::find($id);
            if(isset($request->image)){
                $image_name = 'Blog-Updated'.time().'.'.$request->image->extension();
                $request->image->move(public_path('uploads/blogs'),$image_name);
                $blog->image = $image_name;
            }
            else{
                $blog->image = $blog->image;
            }
            $blog->title = $request->title;
            $blog->category_id = $request->category;
            $blog->description = $request->description;
            $blog->update();
            session()->flash('update','Blog Updated Successfully');
            return redirect()->route('dashboard.admin.blog.index');
        }
        catch(Exception $error){
            return redirect()->back()->with('error',$error->getMessage());
        }
    }

    public function destroy(string $id)
    {
        try{
            $blog = Blog::find($id);
            if($blog->image != null){
                $image_path = public_path('uploads/blogs/'.$blog->image);
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $blog->delete();
            session()->flash('delete','Blog Deleted Successfully');
            return redirect()->route('dashboard.admin.blog.index');
        }
        catch(Exception $error){
            return redirect()->back()->with('error',$error->getMessage());
        }
        
    }
}
