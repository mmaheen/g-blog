@extends('backend.client.layouts.layout')
@section('title', 'Dashboard')
@section('content')     
    
        <div class="container-fluid">
            <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Dashboard</h2>
                </div>
            </div>
            </div>
            <div class="row column1">
                <div class="col-md-6 col-lg-3">
                    <div class="full counter_section margin_bottom_30">
                        <div class="couter_icon">
                            <div> 
                            <i class="fa fa-user yellow_color"></i>
                            </div>
                        </div>
                        <div class="counter_no">
                            <div>
                            <p class="total_no">2500</p>
                            <p class="head_couter">Welcome</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="full counter_section margin_bottom_30">
                        <div class="couter_icon">
                            <div> 
                            <i class="fa fa-clock-o blue1_color"></i>
                            </div>
                        </div>
                        <div class="counter_no">
                            <div>
                            <p class="total_no">123.50</p>
                            <p class="head_couter">Average Time</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="full counter_section margin_bottom_30">
                        <div class="couter_icon">
                            <div> 
                            <i class="fa fa-cloud-download green_color"></i>
                            </div>
                        </div>
                        <div class="counter_no">
                            <div>
                            <p class="total_no">1,805</p>
                            <p class="head_couter">Collections</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="full counter_section margin_bottom_30">
                        <div class="couter_icon">
                            <div> 
                            <i class="fa fa-comments-o red_color"></i>
                            </div>
                        </div>
                        <div class="counter_no">
                            <div>
                            <p class="total_no">54</p>
                            <p class="head_couter">Comments</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row column3">
                <!-- testimonial -->
                <div class="col-md-6">
                    <div class="dark_bg full margin_bottom_30">
                        <div class="full graph_head">
                            <div class="heading1 margin_0">
                            <h2>Testimonial</h2>
                            </div>
                        </div>
                        <div class="full graph_revenue">
                            <div class="row">
                            <div class="col-md-12">
                                <div class="content testimonial">
                                    <div id="testimonial_slider" class="carousel slide" data-ride="carousel">
                                        <!-- Wrapper for carousel items -->
                                        <div class="carousel-inner">
                                        <div class="item carousel-item active">
                                            <div class="img-box"><img src="{{ asset('assets/backend/client') }}/images/layout_img/user_img.jpg" alt=""></div>
                                            <p class="testimonial">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae..</p>
                                            <p class="overview"><b>Michael Stuart</b>Seo Founder</p>
                                        </div>
                                        <div class="item carousel-item">
                                            <div class="img-box"><img src="{{ asset('assets/backend/client') }}/images/layout_img/user_img.jpg" alt=""></div>
                                            <p class="testimonial">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae..</p>
                                            <p class="overview"><b>Michael Stuart</b>Seo Founder</p>
                                        </div>
                                        <div class="item carousel-item">
                                            <div class="img-box"><img src="{{ asset('assets/backend/client') }}/images/layout_img/user_img.jpg" alt=""></div>
                                            <p class="testimonial">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae..</p>
                                            <p class="overview"><b>Michael Stuart</b>Seo Founder</p>
                                        </div>
                                        </div>
                                        <!-- Carousel controls -->
                                        <a class="carousel-control left carousel-control-prev" href="#testimonial_slider" data-slide="prev">
                                        <i class="fa fa-angle-left"></i>
                                        </a>
                                        <a class="carousel-control right carousel-control-next" href="#testimonial_slider" data-slide="next">
                                        <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end testimonial -->
            </div>
            <div class="row column1 social_media_section">
                <div class="col-md-6 col-lg-3">
                    <div class="full socile_icons fb margin_bottom_30">
                        <div class="social_icon">
                            <i class="fa fa-facebook"></i>
                        </div>
                        <div class="social_cont">
                            <ul>
                            <li>
                                <span><strong>35k</strong></span>
                                <span>Friends</span>
                            </li>
                            <li>
                                <span><strong>128</strong></span>
                                <span>Feeds</span>
                            </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="full socile_icons tw margin_bottom_30">
                        <div class="social_icon">
                            <i class="fa fa-twitter"></i>
                        </div>
                        <div class="social_cont">
                            <ul>
                            <li>
                                <span><strong>584k</strong></span>
                                <span>Followers</span>
                            </li>
                            <li>
                                <span><strong>978</strong></span>
                                <span>Tweets</span>
                            </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="full socile_icons linked margin_bottom_30">
                        <div class="social_icon">
                            <i class="fa fa-linkedin"></i>
                        </div>
                        <div class="social_cont">
                            <ul>
                            <li>
                                <span><strong>758+</strong></span>
                                <span>Contacts</span>
                            </li>
                            <li>
                                <span><strong>365</strong></span>
                                <span>Feeds</span>
                            </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="full socile_icons google_p margin_bottom_30">
                        <div class="social_icon">
                            <i class="fa fa-google-plus"></i>
                        </div>
                        <div class="social_cont">
                            <ul>
                            <li>
                                <span><strong>450</strong></span>
                                <span>Followers</span>
                            </li>
                            <li>
                                <span><strong>57</strong></span>
                                <span>Circles</span>
                            </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
@endsection