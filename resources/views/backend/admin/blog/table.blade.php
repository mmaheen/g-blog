@extends('backend.admin.layouts.layout')

@section('title')
    Blog Table
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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data Table</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Description</th>
                                            <th>User</th>
                                            <th>Category</th>
                                            <th>At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($blogs as $blog)
                                            <tr>
                                            <td>{{ substr($blog->title, 0,40) }}</td>
                                            <td>
                                                <img src="{{ asset('uploads/blogs') }}/{{ $blog->image }}" height ="40px" alt="">
                                            </td>
                                            <td>{{ substr($blog->description, 0, 50) }}</td>
                                            <td>{{ $blog->user->name }}</td>
                                            <td>{{ $blog->category->title }}</td>
                                            <td>{{ $blog->created_at }}</td>
                                            <td>
                                                <div class = "d-flex">
                                                    <button class= "btn btn-rounded btn-info btn-sm mr-2">Show</button>
                                                    <button class= "btn btn-warning btn-sm mr-2 text-white">Edit</button>
                                                    <button class= "btn btn-rounded btn-danger btn-sm">Delete</button>
                                                </div>
                                                
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Description</th>
                                            <th>User</th>
                                            <th>Category</th>
                                            <th>At</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                {{ $blogs->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>
@endsection