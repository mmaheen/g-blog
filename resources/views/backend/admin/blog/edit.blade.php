@extends('backend.admin.layouts.layout')

@section('title')
    Blog Edit
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Blog Edit</h4>
                        <div class="basic-form">
                            <form action="{{ route('dashboard.admin.blog.update',$blog->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="title">Change Title</label>
                                    <input type="text" name = "title" class="form-control input-default" value = "{{ $blog->title }}" placeholder="Blog Title">
                                </div>
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>             
                                @enderror

                                <div class="form-group">
                                    <label>Change Selected Category</label>
                                    <select class="form-control" name = "category">
                                        <option value="" selected>Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $blog->category->id == $category->id ? 'selected' : '' }}>
                                                {{ $category->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category')
                                    <div class="alert alert-danger">{{ $message }}</div>                       
                                @enderror

                                <div class="form-group">
                                    <label for="">Change Description</label>
                                    <textarea class="form-control" rows="12" name = "description">{{ $blog->description }}</textarea>
                                </div>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>               
                                @enderror

                                <div class="form-group custom-file">
                                    <input type="file" class="custom-file-input" name = "image">
                                    <label class="custom-file-label">Choose Photo</label>
                                </div>
                                @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>                                       
                                    @enderror
                                <div class="form-group d-flex justify-content-end">
                                    <button class = "btn btn-primary btn-lg" type = "submit">Upload</button>                                        
                                </div>            
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection