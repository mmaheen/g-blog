@extends('backend.client.layouts.layout')

@section('title')
    Create Blog
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Blog Upload</h4>
                        <div class="basic-form">
                            <form action="{{ route('dashboard.client.blog.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name = "title" value = "{{ old('title') }}" class="form-control input-default" placeholder="Blog Title">
                                    @error('title')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>                                      
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Select Category</label>
                                    <select class="form-control" name = "category">
                                        <option value="" selected>Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected':'' }}>{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>              
                                    @enderror
                                </div>

                                <div class="form-group">                                 
                                    <label for="">Description</label>
                                    <textarea class="form-control" rows="12" name = "description">{{old('description')}}</textarea>
                                    @error('description')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>                                      
                                    @enderror
                                </div>

                                <div class="form-group custom-file">                                  
                                    <input type="file" class="custom-file-input" name = "image">
                                    <label class="custom-file-label">Choose Photo</label>
                                    @error('image')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>                                       
                                    @enderror
                                </div>
                                <div class="form-group d-flex mt-3 justify-content-end">
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





































































































