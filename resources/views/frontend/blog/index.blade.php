@extends('frontend.layouts.layout')

@section('title')
  Blogs
@endsection

@section('content')
        <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="container">
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ route('index') }}">Home</a></li>
            <li class="current">Blog</li>
          </ol>
        </nav>
        <h1>Blog</h1>
      </div>
    </div><!-- End Page Title -->

    <div class="container">
      <div class="row">

        <div class="col-lg-8">

          <!-- Blog Posts Section -->
          <section id="blog-posts" class="blog-posts section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

              <div class="row gy-4">

                @foreach($blogs as $blog)
                <div class="col-lg-6">
                  <article>

                    <div class="post-img">
                      <img src="{{ asset('uploads/blogs/'.$blog->image) }}" alt="" class="img-fluid">
                    </div>

                    <h2 class="title">
                      <a href="{{ route('blog.details', $blog->id) }}">{{substr( $blog->title, 0 , 75 )}}</a>
                    </h2>

                    <div class="meta-top">
                      <div class= "row">
                        <div class="col-12 d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-details.html">{{$blog->user->name}}</a></div> 
                      </div>
                      <div class="row mt-2">
                        <div class="col-6 d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="2022-01-01">{{date ('M j, Y', strtotime( $blog->created_at )) }}</time></a></div>
                        <div class="col-6 d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-details.html">{{$blog->comments->count()}} Comments</a></div>
                      </div>
                    </div>

                    <div class="content">
                      <p>
                        {{substr($blog->description, 0 , 150)}}
                        @if(strlen($blog->description)>150)
                          <a href="{{ route('blog.details', $blog->id) }}">...</a>
                        @endif
                      </p>

                      <div class="read-more">
                        <a href="{{ route('blog.details', $blog->id) }}">Read More</a>
                      </div>
                    </div>

                  </article>
                </div><!-- End post list item -->
                @endforeach

              </div><!-- End blog posts list -->

            </div>

          </section><!-- /Blog Posts Section -->

          <!-- Pagination 2 Section -->
          <section id="pagination-2" class="pagination-2 section">
            <div class = "d-flex justify-content-center">
              {{$blogs->links('pagination::bootstrap-4')}}
            </div>
            {{--<div class="container">
              <div class="d-flex justify-content-center">
                <ul>
                  <li><a href="#"><i class="bi bi-chevron-left"></i></a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#" class="active">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li>...</li>
                  <li><a href="#">10</a></li>
                  <li><a href="#"><i class="bi bi-chevron-right"></i></a></li>
                </ul>
              </div>
            </div>--}}

          </section><!-- /Pagination 2 Section -->

        </div>

        <div class="col-lg-4 sidebar">

          <div class="widgets-container" data-aos="fade-up" data-aos-delay="200">

            <!-- Search Widget -->
            <div class="search-widget widget-item">

              <h3 class="widget-title">Search</h3>
              <form action="">
                <input type="text">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
              </form>

            </div><!--/Search Widget -->

            <!-- Recent Posts Widget -->
            <div class="recent-posts-widget widget-item">

              <h3 class="widget-title">Recent Posts</h3>

              @foreach($recent_blogs as $blog)
                <div class="post-item">
                  <img src="{{ asset('uploads/blogs/'.$blog->image) }}" alt="" class="flex-shrink-0">
                  <div>
                    <h4>
                      <a href="{{ route('blog.details',$blog->id) }}">
                        {{substr($blog->title, 0 , 60)}}
                        @if(strlen($blog->title)>50)
                          ...
                        @endif
                      </a>
                    </h4>
                    <time datetime="2020-01-01">{{date('F j, Y',strtotime($blog->created_at))}}</time>
                  </div>
                </div><!-- End recent post item-->
              @endforeach

            </div><!--/Recent Posts Widget -->

            <!-- Categories Widget -->
            <div class="categories-widget widget-item">

              <h3 class="widget-title">Categories</h3>
              <ul class="mt-3">
                @foreach($categories as $category)
                  <li><a href="#">{{$category->title}} <span>({{$category->blogs_count}})</span></a></li>
                @endforeach
              </ul>

            </div><!--/Categories Widget -->

            <!-- Tags Widget -->
            <div class="tags-widget widget-item">

              <h3 class="widget-title">Tags</h3>
              <ul>
                <li><a href="#">App</a></li>
                <li><a href="#">IT</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">Mac</a></li>
                <li><a href="#">Design</a></li>
                <li><a href="#">Office</a></li>
                <li><a href="#">Creative</a></li>
                <li><a href="#">Studio</a></li>
                <li><a href="#">Smart</a></li>
                <li><a href="#">Tips</a></li>
                <li><a href="#">Marketing</a></li>
              </ul>

            </div><!--/Tags Widget -->

          </div>

        </div>

      </div>
    </div>
@endsection