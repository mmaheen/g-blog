@extends('frontend.layouts.layout')

@section('title')
  Photo Details
@endsection

@section('content')
    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="container">
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ route('index') }}">Home</a></li>
            <li class="current">Photo Details</li>
          </ol>
        </nav>
        <h1>Photo Details</h1>
      </div>
    </div><!-- End Page Title -->

    <!-- Portfolio Details Section -->
    <section id="portfolio-details" class="portfolio-details section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper init-swiper">

              <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": "auto",
                  "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                  }
                }
              </script>

              <div class="swiper-wrapper align-items-center">

                <div class="swiper-slide">
                  <img src="{{ asset('uploads/photos') }}/{{ $photo->image }}" alt="">
                </div>

                <div class="swiper-slide">
                  <img src="{{ asset('assets/frontend') }}/assets/img/portfolio/portfolio-10.webp" alt="">
                </div>

                <div class="swiper-slide">
                  <img src="{{ asset('assets/frontend') }}/assets/img/portfolio/portfolio-7.webp" alt="">
                </div>

                <div class="swiper-slide">
                  <img src="{{ asset('assets/frontend') }}/assets/img/portfolio/portfolio-4.webp" alt="">
                </div>

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info" data-aos="fade-up" data-aos-delay="200">
              <h3>Project information</h3>
              <ul>
                <li><strong>Category</strong>: {{ $photo->category->title }}</li>
                <li><strong>Client</strong>: {{ $photo->user->name }}</li>
                <li><strong>Project date</strong>: {{date('j F, Y',strtotime( $photo->created_at ))}}</li>
                <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li>
              </ul>
            </div>
            <div class="portfolio-description" data-aos="fade-up" data-aos-delay="300">
              <h2>{{ $photo->title }}</h2>
              <p>
                {{ $photo->description }}
              </p>
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Portfolio Details Section -->
@endsection