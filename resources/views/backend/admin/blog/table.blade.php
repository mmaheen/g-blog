@extends('backend.admin.layouts.layout')

@section('title')
    Blog Table
@endsection

@section('content')

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

        @if (session('delete'))
            <div class="card-body">
                <div class="card-content">
                    <div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" 
                        class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button> <strong>Success!</strong> {{ session('delete') }}
                    </div>
                </div>
            </div>        
        @endif

        @if (session('update'))
            <div class="card-body">
                <div class="card-content">
                    <div class="alert alert-secondary alert-dismissible fade show">
                        <button type="button" 
                        class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button> <strong>Error!</strong> {{ session('update') }}
                    </div>
                </div>
            </div>        
        @endif

        @if (session('error'))
            <div class="card-body">
                <div class="card-content">
                    <div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" 
                        class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button> <strong>Success!</strong> {{ session('error') }}
                    </div>
                </div>
            </div>
            
        @endif
  
     
                      
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row d-flex justify-content-between">
                            <h4 class="card-title">Data Table</h4>
                            <a href="{{ route('dashboard.admin.blog.create') }}" class = "btn btn-link">Create</a>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th class= "d-flex justify-content-center">Image</th>
                                        <th>Description</th>
                                        <th>Author</th>
                                        <th>Category</th>
                                        <th>At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blogs as $blog)
                                        <tr>
                                        <td>
                                            {{ substr($blog->title, 0,30) }}
                                            @if(strlen($blog->title)>40)
                                                ...
                                            @endif
                                        </td>
                                        <td class= "d-flex justify-content-center">
                                            <img class = "rounded" src="{{ asset('uploads/blogs') }}/{{ $blog->image }}" height ="40px" alt="">
                                        </td>
                                        <td>
                                            {{ substr($blog->description, 0, 50) }}
                                            @if (strlen($blog->description)>50)
                                                ...
                                            @endif
                                        </td>
                                        <td>
                                            @if ($blog->user->image == null)
                                                <img class = "rounded-circle mr-2" src="{{ asset('assets/default-user.jpg') }}" height ="30px" alt="">                                            
                                            @else
                                                <img class = "rounded-circle mr-2" src="{{ asset('uploads/users/'.$blog->user->image) }}" height ="30px" alt="">
                                            @endif
                                            {{ $blog->user->name }}
                                        </td>
                                        <td>{{ $blog->category->title }}</td>
                                        <td>{{ date('M j, Y',strtotime($blog->created_at)) }}</td>
                                        <td>
                                            <div class = "d-flex">
                                                <a href = "{{ route('dashboard.admin.blog.show',$blog->id) }}" class= "btn btn-rounded btn-info btn-sm mr-2">Show</a>
                                                @if ($blog->user_id == Auth::user()->id)
                                                    <a href = "{{ route('dashboard.admin.blog.edit',$blog->id) }}" class= "btn btn-warning text-white btn-sm mr-2">Edit</a>
                                                @else
                                                    <a href = "{{ route('dashboard.admin.blog.edit',$blog->id) }}" class= "btn btn-warning text-white btn-sm mr-2 disabled">Edit</a>
                                                @endif

                                                <form action="{{ route('dashboard.admin.blog.destroy',$blog->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class= "btn btn-rounded btn-danger btn-sm">Delete</button>
                                                </form>
                                            </div>
                                            
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Title</th>
                                        <th class= "d-flex justify-content-center">Image</th>
                                        <th>Description</th>
                                        <th>Author</th>
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
    
    <script src="./{{ asset('assets/backend') }}/plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="./{{ asset('assets/backend') }}/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="./{{ asset('assets/backend') }}/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>

@endsection