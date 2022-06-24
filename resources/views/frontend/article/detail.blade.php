@extends('layouts.mainblog')

@section('page-css')
@endsection

@section('content')
    <!-- Page Title -->
    <section class="page-title" style="background-image: url(assets/images/background/bg-26.jpg);">
        <div class="auto-container">
            <div class="content-box">
                <div class="content-wrapper">
                    <div class="title">
                        <h1>1 Column With Sidebar</h1>
                    </div>
                    <ul class="bread-crumb style-two">
                        <li><a href="index.html">Home </a></li>
                        <li><a href="#">Blog </a></li>
                        <li class="active">1 Column With Sidebar</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section class="sidebar-page-container">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="news-block-two blog-single-post">
                        <div class="inner-box">
                            <div class="upper-content">
                                <div class="category">[ <i class="far fa-folder-open"></i> Manufacturing ]</div>
                                <h3>{{ $articles->title }}</h3>
                                <ul class="post-meta">
                                    <li><a href="#"><i class="far fa-user"></i>Nathan Felix</a></li>
                                    <li><a href="#"><i class="far fa-clock"></i>{{ $articles->created_at }}</a></li>
                                    <li><a href="#"><i class="far fa-comment"></i>Comments: 08</a></li>
                                </ul>
                            </div>
                            <div class="image">
                                <img src="{{ Storage::url($articles->cover) }}" alt="{{ $articles->title }}">
                            </div>
                            <div class="lower-content">
                                {!! $articles->desc !!}
                                {!! $articles->content !!}
                            </div>
                        </div>
                        <div class="blog-post-pagination">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="prev-post">
                                        <a href="#"> Prev</a>
                                        <h4>Gas Shield Solution Developed for the Aerospace</h4>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="next-post">
                                        <a href="#">Next </a>
                                        <h4>Building Back a Sustainable Manufacturing Sector</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comments-area">
                            <div class="group-title">
                                <h3>Comments</h3>
                            </div>
                            <!--Comment Box-->
                            <div class="comment-box">
                                <div class="comment">
                                    <div class="author-thumb"><img src="assets/images/resource/author-22.jpg"
                                            alt=""></div>
                                    <div class="comment-inner">
                                        <div class="comment-info">Isaac Herman<span class="date">February 28, 2020 [
                                                11.00am]</span></div>
                                        <div class="text">On the other hand, we denounce with righteous indignation
                                            dislike men which toil and some great pleasure.</div>
                                        <a class="reply-comment-btn" href="#"><i class="flaticon-reply"></i> Reply</a>
                                    </div>
                                </div>
                            </div>

                            <!--Comment Box-->
                            <div class="comment-box reply-comment">
                                <div class="comment">
                                    <div class="author-thumb"><img src="assets/images/resource/author-23.jpg"
                                            alt=""></div>
                                    <div class="comment-inner">
                                        <div class="comment-info">William Cobus <span class="date">February 28, 2020
                                                [11.12am]</span></div>
                                        <div class="text">How all this mistaken idea of denouncing pleasure and praising
                                            pain was born and I will give you a complete account of the system.</div>
                                        <a class="reply-comment-btn" href="#"><i class="flaticon-reply"></i>
                                            Reply</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comment-form">
                            <div class="group-title">
                                <h3>Send Your Comments</h3>
                            </div>
                            <div class="text">Your email address will not be published. Required fields are marked *
                            </div>
                            <form method="post">
                                <div class="row row-5">
                                    <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="username" placeholder="Name*" required="">
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                        <input type="email" name="email" placeholder="Email*" required="">
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="email" placeholder="Company" required="">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <textarea name="message" placeholder="Your Comment..."></textarea>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <button class="theme-btn btn-style-one" type="submit" name="submit-form"><span
                                                class="btn-title"><i class="flaticon-up-arrow"></i>Post
                                                Comment</span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <aside class="col-lg-4 sidebar">
                    <div class="blog-sidebar">
                        <div class="widget widget_search">
                            <form action="#" method="post" class="search-form">
                                <div class="form-group">
                                    <input type="search" name="search-field" placeholder="Enter Keyword ..."
                                        required="">
                                    <button type="submit"><i class="fas fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <!-- category -->
                        <div class="widget widget_categories">
                            <h4 class="widget_title">Categories</h4>
                            <div class="widget-content">
                                <ul class="categories-list clearfix">
                                    @foreach ($category as $categories)
                                        <li><a href="#">{{ $categories->name }} <span>(04)</span></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- news widget -->
                        <div class="news-widget widget">
                            <h4 class="widget_title">Latest Post</h4>
                            @foreach($recent as $recents)
                            <div class="news-content">
                              <h4>
                                  <a href="blog-details.html">{{ $recents->title     }} ... <i
                                          class="flaticon-arrow-1"></i>
                                  </a>
                              </h4>
                          </div>
                          @endforeach
                        </div>
                        <!-- Instagram widget -->
                        <div class="instagram-widget widget">
                            <h4 class="widget_title">Our Gallery</h4>
                            <div class="wrapper-box">
                                <div class="image">
                                    <img src="assets/images/resource/image-16.jpg" alt="">
                                    <div class="overlay-link"><a href="assets/images/resource/image-16.jpg"
                                            class="lightbox-image" data-fancybox="gallery"><span
                                                class="flaticon-zoom"></span></a></div>
                                </div>
                                <div class="image">
                                    <img src="assets/images/resource/image-17.jpg" alt="">
                                    <div class="overlay-link"><a href="assets/images/resource/image-17.jpg"
                                            class="lightbox-image" data-fancybox="gallery"><span
                                                class="flaticon-zoom"></span></a></div>
                                </div>
                                <div class="image">
                                    <img src="assets/images/resource/image-18.jpg" alt="">
                                    <div class="overlay-link"><a href="assets/images/resource/image-18.jpg"
                                            class="lightbox-image" data-fancybox="gallery"><span
                                                class="flaticon-zoom"></span></a></div>
                                </div>
                                <div class="image">
                                    <img src="assets/images/resource/image-19.jpg" alt="">
                                    <div class="overlay-link"><a href="assets/images/resource/image-19.jpg"
                                            class="lightbox-image" data-fancybox="gallery"><span
                                                class="flaticon-zoom"></span></a></div>
                                </div>
                                <div class="image">
                                    <img src="assets/images/resource/image-20.jpg" alt="">
                                    <div class="overlay-link"><a href="assets/images/resource/image-20.jpg"
                                            class="lightbox-image" data-fancybox="gallery"><span
                                                class="flaticon-zoom"></span></a></div>
                                </div>
                                <div class="image">
                                    <img src="assets/images/resource/image-21.jpg" alt="">
                                    <div class="overlay-link"><a href="assets/images/resource/image-21.jpg"
                                            class="lightbox-image" data-fancybox="gallery"><span
                                                class="flaticon-zoom"></span></a></div>
                                </div>
                            </div>
                        </div>
                        <!-- Tag-cloud Widget -->
                        <div class="widget tag-cloud-widget mb-0">
                            <h4 class="widget_title">Popular Tags</h4>
                            <ul class="clearfix">
                                <li><a href="#">Industry</a></li>
                                <li><a href="#">Chemical</a></li>
                                <li><a href="#">Idea</a></li>
                                <li><a href="#">Manufacturing</a></li>
                                <li><a href="#">Tool</a></li>
                                <li><a href="#">Future</a></li>
                                <li><a href="#">Brand</a></li>
                                <li><a href="#">Magazine</a></li>
                                <li><a href="#">2020</a></li>
                                <li><a href="#">Transport</a></li>
                                <li><a href="#">Technology</a></li>
                            </ul>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <!-- CTA section -->
    <section class="cta-section">
        <div class="auto-container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h2>Delivering Results with Solid Dependability</h2>
                </div>
                <div class="col-lg-5">
                    <div class="link-btn">
                        <a href="#" class="theme-btn"><span>Get a Quote</span></a>
                        <a href="#" class="theme-btn style-three"><span><i class="flaticon-phone-call"></i> +089
                                636 - 48018</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
