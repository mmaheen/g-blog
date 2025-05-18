@extends('backend.client.layouts.layout')

@section('title', 'Photo')

@section('content')
    <div class="row">
        @if (session('success'))
            <div class="card-body">
                <div class="card-content">
                    <div class="alert alert-primary alert-dismissible fade show">
                        <button type="button" 
                        class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button> <strong>Success!</strong> {{ session('success') }}
                    </div>
                </div>
            </div>
        @endif
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row d-flex justify-content-between">
                        <h4 class="card-title">Data Table</h4>
                        <a href="{{ route('dashboard.client.photo.create') }}" class = "btn btn-link">Create</a>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th class= "d-flex justify-content-center">Image</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($photos as $photo)
                                    <tr>
                                    <td>
                                        {{ substr($photo->title, 0,30) }}
                                        @if(strlen($photo->title)>40)
                                            ...
                                        @endif
                                    </td>
                                    <td class= "d-flex justify-content-center">
                                        <img class = "rounded" src="{{ asset('uploads/photos/'.$photo->image)}}" height ="40px" alt="">
                                    </td>
                                    <td>
                                        {{ substr($photo->description, 0, 50) }}
                                        @if (strlen($photo->description)>50)
                                            ...
                                        @endif
                                    </td>
                                
                                    <td>{{ $photo->category->title }}</td>
                                    <td>{{ date('M j, Y',strtotime($photo->created_at)) }}</td>
                                    <td>
                                        <div class = "d-flex">
                                            <a href = "{{ route('dashboard.client.photo.show',$photo->id) }}" class= "btn btn-info btn-sm mr-2">Show</a>
                                            <a href = "{{ route('dashboard.client.photo.edit',$photo->id) }}" class= "btn btn-warning text-white btn-sm mr-2">Edit</a>

                                            <form action="{{ route('dashboard.client.photo.destroy',$photo->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class= "btn btn-danger btn-sm">Delete</button>
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
                                    <th>Category</th>
                                    <th>At</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                        {{-- {{ $photos->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
        </div>
@endsection