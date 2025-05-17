<?php

namespace App\Http\Controllers\Backend\Client;

use Exception;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ClientBlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('user_id', Auth::user()->id)->with('category')->latest()->paginate(10);
        return view('backend.client.blog.table', compact('blogs'));
    }

    public function create()
    {
        $categories = Category::select('id','title')->get();
        return view('backend.client.blog.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        try {
            if (isset($request->image)) {
                $image_name = 'Blog-' . time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/blogs'), $image_name);
            } else {
                $image_name = null;
            }
            $blog = new Blog();
            $blog->title = $request->title;
            $blog->category_id = $request->category;
            $blog->user_id = Auth::user()->id;
            $blog->description = $request->description;
            $blog->image = $image_name;
            $blog->save();
            session()->flash('create', 'Blog created successfully.');
            return redirect()->route('dashboard.client.blog.index');
        } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Error: ' . $error->getMessage());
        }
    }

    public function show(string $id)
    {
        //
        $blog = Blog::find($id);
        return view('backend.client.blog.show', compact('blog'));
    }

    public function edit(string $id)
    {
        $blog = Blog::find($id);
        $categories = Category::select('id','title')->get();
        return view('backend.client.blog.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        try {
            $blog = Blog::find($id);
            if (isset($request->image)) {
                $image_name = 'Blog-updated' . time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/blogs'), $image_name);
                $blog->image = $image_name;
            }
            else {
                $blog->image = $blog->image;
            }
            $blog->title = $request->title;
            $blog->category_id = $request->category;
            $blog->description = $request->description;
            $blog->update();
            session()->flash('update', 'Blog updated successfully.');
            return redirect()->route('dashboard.client.blog.index');
        } catch (Exception $error) {
            return redirect()->back()->with('error', 'Error: ' . $error->getMessage());
        }
    }

    public function destroy(string $id)
    {
        try {
            $blog = Blog::find($id);
            if ($blog->image) {
                unlink(public_path('uploads/blogs/' . $blog->image));
            }
            else {
                $blog->image = null;
            }
            $blog->delete();
            session()->flash('delete', 'Blog deleted successfully.');
            return redirect()->route('dashboard.client.blog.index');
        } catch (Exception $error) {
            return redirect()->back()->with('error', 'Error: ' . $error->getMessage());
        }
    }
}
