@extends('backend.admin.layouts.layout')

@section('title')
    Blog 
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <div class="card">
                    <img class="img-fluid" src="{{ asset('uploads/blogs') }}/{{ $blog->image }}" alt="">
                    <div class="card-body">
                        <h4 class="card-title text-justify">{{ $blog->title}}</h4>
                        <h6 class="card-title">
                            <img height = "25px" class = "rounded-circle mr-2" src="{{ asset('uploads/users') }}/{{ $blog->user->image }}" alt="">
                            <span class = "mr-5 font-weight-bold">{{ $blog->user->name}}</span>
                            <span class = "ml-5 text-muted font-italic">Category: {{ $blog->category->title}}</span>
                        </h6>
                        <p class="card-text text-justify">{{ $blog->description }}</p>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <p class="card-text d-inline"><small class="text-muted">Posted {{ $blog->created_at->diffForHumans()}}</small>
                        @if (isset($blog->updated_at))
                            <p class="card-text d-inline"><small class="text-muted">Updated {{ $blog->updated_at->diffForHumans()}}</small>
                        @endif
                    </div>
                </div>
            </div>
 
        </div>
    </div>
@endsection