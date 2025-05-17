@extends('backend.admin.layouts.layout')

@section('title')
    Create Blog
@endsection

@section('content')
    <div class="content-body">

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Blog Upload</h4>
                            <div class="basic-form">
                                <form action="{{ route('dashboard.admin.blog.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name = "title" class="form-control input-default" placeholder="Blog Title">
                                    </div>

                                    <div class="form-group">
                                        <label>Select Category</label>
                                        <select class="form-control" name = "category">
                                            <option value="" selected>Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea class="form-control" rows="12" name = "description"></textarea>
                                    </div>

                                    <div class="form-group custom-file">
                                        <input type="file" class="custom-file-input" name = "image">
                                        <label class="custom-file-label">Choose Photo</label>
                                    </div>
                                    <div class="form-group d-flex justify-content-end">
                                        <button class = "btn btn-primary btn-lg" type = "submit">Upload</button>                                        
                                    </div>            
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
    
    
            
                {{-- <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Radio Inline</h4>
                            <div class="basic-form">
                                <form>
                                    <div class="form-group">
                                        <label class="radio-inline mr-3">
                                            <input type="radio" name="optradio"> Option 1</label>
                                        <label class="radio-inline mr-3">
                                            <input type="radio" name="optradio"> Option 2</label>
                                        <label class="radio-inline">
                                            <input type="radio" name="optradio"> Option 3</label>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> --}}

                {{-- <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Bootstrap Input File</h4>
                            <div class="basic-form">
                                <form>
                                    <div class="form-group">
                                        <input type="file" class="form-control-file">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection





































































































