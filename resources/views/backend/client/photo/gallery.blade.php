@extends('backend.client.layouts.layout')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/backend/client/css/jquery.fancybox.css')}}" />
@endsection

@section('title', 'Photo Gallery')

@section('content')
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>Media Gallery</h2>
            </div>
        </div>
    </div>
    <div class="row column4 graph">
        <!-- Gallery section -->
        <div class="col-md-12">
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="heading1 margin_0">
                    <h2>Media Gallery Design Elements</h2>
                    </div>
                </div>
                <div class="full gallery_section_inner padding_infor_info">
                    <div class="row">
                    @foreach ($photos as $photo)
                        <div class="col-sm-4 col-md-3 margin_bottom_30">
                            <div class="column">
                                <a data-fancybox="gallery" href="{{ asset('uploads/photos/'.$photo->image) }}"><img class="img-responsive" src="{{ asset('uploads/photos/'.$photo->image) }}" alt="#" /></a>
                            </div>
                            <div class="heading_section">
                                <h4>{{ $photo->title }}</h4>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<!-- fancy box js -->
    <script src="{{ asset('assets/backend/client/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('assets/backend/client/js/jquery.fancybox.min.js')}}"></script>
    <script src="{{ asset('assets/backend/client')}}/js/semantic.min.js"></script>
@endsection