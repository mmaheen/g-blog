@extends('backend.client.layouts.layout')
@section('title', 'Edit Photo')
@section('content')
    <div class="container">
        <h1>Edit Photo</h1>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('dashboard.client.photo.update', $photo->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $photo->title }}" required>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>            
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $photo->description }}</textarea>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" id="category" name="category" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $photo->category_id == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                    @endforeach
                </select>
                @error('category')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image">    
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <small class="form-text text-muted">Leave blank if you don't want to change the image.</small>
                @if($photo->image)
                    <img src="{{ asset('uploads/photos/' . $photo->image) }}" alt="{{ $photo->title }}" width="100">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Update Photo</button>
            <a href="{{ route('dashboard.client.photo.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>  
@endsection
@section('scripts') 
    <script>
        // Add any custom scripts here
    </script>   
@endsection