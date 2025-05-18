<?php

namespace App\Http\Controllers\Backend\Client;

use App\Models\Photo;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ClientPhotoController extends Controller
{
    public function index()
    {
        $photos = Photo::where('user_id', Auth::user()->id)->with('category')->latest()->get();
        return view('backend.client.photo.table', compact('photos'));
    }

    public function create()
    {
        $categories = Category::select('id', 'title')->get();
        return view('backend.client.photo.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ],
        [
            'title.required' => 'Photo should have a title',
            'category.required' => 'Please select a category',
            'image.required' => 'You must upload an image file in photo',
            'image.image' => 'The file must be an image',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif',
            'image.max' => 'The image may not be greater than 2MB',
        ]);

        try {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $path = public_path('uploads/photos');
                $image->move($path, $filename);
            }
            else{
                $image = null;
            }
            $photo = new Photo();
            $photo->user_id = Auth::user()->id;
            $photo->title = $request->title;
            $photo->description = $request->description;
            $photo->category_id = $request->category;
            $photo->image = $filename;
            $photo->save();
            return redirect()->route('dashboard.client.photo.index')->with('success', 'Photo uploaded successfully');
        }
        catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
        return redirect()->route('dashboard.client.photo.index');

    }

    public function show(string $id)
    {
        $photo = Photo::find($id);
        if ($photo->user_id != Auth::user()->id) {
            session()->flash('error', 'You are not authorized to view this photo');
            return redirect()->back();
        }
        return view('backend.client.photo.show', compact('photo'));
    }

    public function edit(string $id)
    {
        $categories = Category::select('id', 'title')->get();
        $photo = Photo::find($id);
        return view('backend.client.photo.edit', compact('photo', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ],
        [
            'title.required' => 'Photo should have a title',
            'category.required' => 'Please select a category',
            'image.image' => 'The file must be an image',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif',
            'image.max' => 'The image may not be greater than 2MB',
        ]);

        try {
            $photo = Photo::find($id);
            if ($request->hasFile('image')) {
                if ($photo->image != null) {
                    $image_path = public_path('uploads/photos/' . $photo->image);
                    if (file_exists($image_path)) {
                        unlink($image_path);
                    }
                }
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $path = public_path('uploads/photos');
                $image->move($path, $filename);            
            }
            else{
                $filename = $photo->image;
            }
            $photo->image = $filename;
            $photo->title = $request->title;
            $photo->description = $request->description;
            $photo->category_id = $request  ->category;
            $photo->update();
            return redirect()->route('dashboard.client.photo.index')->with('success', 'Photo updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function destroy(string $id)
    {
        try {
            $photo = Photo::find($id);
            if ($photo->image != null) {
                $image_path = public_path('uploads/photos/' . $photo->image);
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            $photo->delete();
            return redirect()->back()->with('success', 'Photo deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }
}
