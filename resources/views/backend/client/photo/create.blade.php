@extends('backend.client.layouts.layout')
@section('title', 'Photo Create')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create Photo</h4>
                        <form action="{{ route('dashboard.client.photo.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" value ="{{ old('title') }}" name="title" required>
                                @error('title')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>                                   
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                @error('description')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>                                   
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="category_id" class="form-label">Category</label>
                                <select class="form-select" id="category_id" name="category" required>
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected':'' }}>{{ $category->title }}</option>
                                    @endforeach   
                                </select>
                                @error('category')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>                                   
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                                @error('image')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>                                   
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Create</button>
                                <a href="{{ route('dashboard.client.photo.index') }}" class="btn btn-secondary">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection      
