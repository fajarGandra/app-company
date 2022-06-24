@extends('layouts.mainblog')

@section('page-css')
@endsection

@section('content')
    <!-- Bnner Section -->
    <section class="banner-section style-two">
        <div class="swiper-container banner-slider">
            <div class="swiper-wrapper">
                @foreach ($caroseul as $caroseuls)
                    <!-- Slide Item -->
                    <div class="swiper-slide"
                        style="background-image: url({{ Storage::url($caroseuls->image) }});color:#6a1010 !important;">
                        <div class="content-outer">
                            <div class="content-box">
                                <div class="inner">
                                    <h1 style="color:{{ $caroseuls->text_color }} !important;">{{ $caroseuls->title }}
                                    </h1>
                                    <div class="text" style="color:{{ $caroseuls->text_color }} !important;">
                                        {!! $caroseuls->description !!}
                                    </div>
                                    <div class="link-box">
                                        <a href="{{ $caroseuls->btn_link }}"
                                            class="theme-btn style-four"><span>{{ $caroseuls->btn_name }}</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="banner-slider-nav">
            <div class="banner-slider-control banner-slider-button-prev"><span><i class="flaticon-arrow-1"></i></span></div>
            <div class="banner-slider-control banner-slider-button-next"><span><i class="flaticon-arrow-1"></i></span>
            </div>
        </div>
    </section>
    <!-- End Bnner Section -->

    <!-- Services Section Two -->
    <section class="services-section-two">
        <div class="auto-container">
            <div class="wrapper-box">
                <div class="sec-title text-center">
                    <div class="sub-title">Services
                    </div>
                    <h2>Services We Offered</h2>
                    <div class="text">We have facility to produce advance work various industrial applications based on
                        <br> specially developed technology.
                    </div>
                </div>
                <div class="row">
                    <div class="theme_carousel owl-theme owl-carousel"
                        data-options='{"loop": true, "center": false, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 1000, "responsive":{ "0" :{ "items": "1" }, "480" :{ "items" : "1" }, "768" :{ "items" : "2" } , "992":{ "items" : "3" }, "1200":{ "items" : "3" }}}'>
                        <div class="col-lg-12 service-block-two">
                            <div class="inner-box">
                                <div class="icon">
                                    <i class="flaticon-machinery"></i>
                                    <div class="shape"><img src="{{ asset('frontend/assets/images/shape/shape-6.png') }}"
                                            alt=""></div>
                                </div>
                                <div class="image"><img src="{{ asset('frontend/assets/images/resource/image-36.jpg') }}"
                                        alt=""></div>
                                <div class="lower-content">
                                    <h5>Centerless</h5>
                                    <h4>Grinding & Polishing</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 service-block-two">
                            <div class="inner-box">
                                <div class="icon">
                                    <i class="flaticon-laser"></i>
                                    <div class="shape"><img src="{{ asset('frontend/assets/images/shape/shape-6.png') }}"
                                            alt=""></div>
                                </div>
                                <div class="image"><img src="{{ asset('frontend/assets/images/resource/image-37.jpg') }}"
                                        alt=""></div>
                                <div class="lower-content">
                                    <h5>Cutting</h5>
                                    <h4>Laser & Plasma</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 service-block-two">
                            <div class="inner-box">
                                <div class="icon">
                                    <i class="flaticon-welder"></i>
                                    <div class="shape"><img
                                            src="{{ asset('frontend/assets/images/shape/shape-6.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="image"><img
                                        src="{{ asset('frontend/assets/images/resource/image-38.jpg') }}" alt="">
                                </div>
                                <div class="lower-content">
                                    <h5>Welding</h5>
                                    <h4>Metal & Tungsten</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 service-block-two">
                            <div class="inner-box">
                                <div class="icon">
                                    <i class="flaticon-machinery"></i>
                                    <div class="shape"><img
                                            src="{{ asset('frontend/assets/images/shape/shape-6.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="image"><img
                                        src="{{ asset('frontend/assets/images/resource/image-36.jpg') }}" alt="">
                                </div>
                                <div class="lower-content">
                                    <h5>Centerless</h5>
                                    <h4>Grinding & Polishing</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 service-block-two">
                            <div class="inner-box">
                                <div class="icon">
                                    <i class="flaticon-laser"></i>
                                    <div class="shape"><img
                                            src="{{ asset('frontend/assets/images/shape/shape-6.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="image"><img
                                        src="{{ asset('frontend/assets/images/resource/image-37.jpg') }}" alt="">
                                </div>
                                <div class="lower-content">
                                    <h5>Cutting</h5>
                                    <h4>Laser & Plasma</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 service-block-two">
                            <div class="inner-box">
                                <div class="icon">
                                    <i class="flaticon-welder"></i>
                                    <div class="shape"><img
                                            src="{{ asset('frontend/assets/images/shape/shape-6.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="image"><img
                                        src="{{ asset('frontend/assets/images/resource/image-38.jpg') }}" alt="">
                                </div>
                                <div class="lower-content">
                                    <h5>Welding</h5>
                                    <h4>Metal & Tungsten</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 service-block-two">
                            <div class="inner-box">
                                <div class="icon">
                                    <i class="flaticon-machinery"></i>
                                    <div class="shape"><img
                                            src="{{ asset('frontend/assets/images/shape/shape-6.png') }}"
                                            alt="">
                                    </div>
                                </div>
                                <div class="image"><img
                                        src="{{ asset('frontend/assets/images/resource/image-36.jpg') }}"
                                        alt=""></div>
                                <div class="lower-content">
                                    <h5>Centerless</h5>
                                    <h4>Grinding & Polishing</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 service-block-two">
                            <div class="inner-box">
                                <div class="icon">
                                    <i class="flaticon-laser"></i>
                                    <div class="shape"><img
                                            src="{{ asset('frontend/assets/images/shape/shape-6.png') }}"
                                            alt=""></div>
                                </div>
                                <div class="image"><img
                                        src="{{ asset('frontend/assets/images/resource/image-37.jpg') }}"
                                        alt=""></div>
                                <div class="lower-content">
                                    <h5>Cutting</h5>
                                    <h4>Laser & Plasma</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 service-block-two">
                            <div class="inner-box">
                                <div class="icon">
                                    <i class="flaticon-welder"></i>
                                    <div class="shape"><img
                                            src="{{ asset('frontend/assets/images/shape/shape-6.png') }}"
                                            alt=""></div>
                                </div>
                                <div class="image"><img
                                        src="{{ asset('frontend/assets/images/resource/image-38.jpg') }}"
                                        alt=""></div>
                                <div class="lower-content">
                                    <h5>Welding</h5>
                                    <h4>Metal & Tungsten</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section style-two">
        <div class="auto-container">
            <div class="wrapper-box">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <h2><i class="flaticon-machinery-1"></i> Delivering Results with Solid Dependability</h2>
                    </div>
                    <div class="col-lg-5">
                        <div class="link-btn">
                            <a href="contact.html" class="theme-btn style-five"><span>Get a Quote</span></a>
                            <a href="tel:08963648078" class="theme-btn style-three"><span><i
                                        class="flaticon-phone-call"></i> +089 636 - 48018</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Facts section -->
    <section class="facts-section-two" style="background-image: url(frontend/assets/images/background/bg-3.jpg);">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="feature-video">
                        <div class="video-box">
                            <div class="video-btn"><a href="https://www.youtube.com/watch?v=nfP5N9Yc72A&amp;t=28s"
                                    class="overlay-link play-now ripple" data-fancybox="gallery" data-caption=""><i
                                        class="flaticon-play-button"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="wrapper-box" style="background-image: url(frontend/assets/images/resource/image-40.jpg);">
                        <div class="row">
                            <div class="col-md-6 column facts-block-two">
                                <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                    <div class="content">
                                        <div class="icon"><i class="flaticon-machinery-2"></i></div>
                                        <div class="count-outer count-box">
                                            <span class="count-text" data-speed="3000"
                                                data-stop="6.4">0</span><span>K</span>
                                        </div>
                                        <div class="text">Projects <br>
                                            Done Successfully</div>
                                        <div class="link"><a href="#" class="link-btn">Our Projects <i
                                                    class="flaticon-right-arrow-3"></i></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 column facts-block-two">
                                <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                    <div class="content">
                                        <div class="icon"><i class="flaticon-factory-2"></i></div>
                                        <div class="count-outer count-box">
                                            <span>+</span><span class="count-text" data-speed="3000"
                                                data-stop="49">0</span>
                                        </div>
                                        <div class="text">Branches <br>
                                            Running Worldwide</div>
                                        <div class="link"><a href="#" class="link-btn">Our Location <i
                                                    class="flaticon-right-arrow-3"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About section two -->
    <section class="about-section-two">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="image"><img src="{{ asset('frontend/assets/images/resource/image-22.jpg') }}"
                            alt=""></div>
                </div>
                <div class="col-lg-6">
                    <div class="sec-title mb-30">
                        <div class="sub-title">About Company</div>
                        <h2>Leading Industrial Solution <br> Provider <span>Since 1988</span></h2>
                        <div class="text">It is a long established fact that a readers will be distracted by readable
                            content tof a page when looking at its layout. The point of using is that it has a more-or-less
                            normal distribution.</div>
                    </div>
                    <div class="icon-box">
                        <div class="icon"><i class="flaticon-low-price"></i></div>
                        <h4>Reduce Your Cost</h4>
                        <div class="text">Find fault with a man who chooses to enjoy. </div>
                        <div class="skills">
                            <!--Skill Item-->
                            <div class="skill-item">
                                <div class="skill-bar">
                                    <div class="bar-inner">
                                        <div class="bar progress-line" data-width="84">
                                            <div class="skill-percentage">
                                                <div class="count-box"><span class="count-text" data-speed="2000"
                                                        data-stop="84">0</span>%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="icon-box">
                        <div class="icon"><i class="flaticon-timer"></i></div>
                        <h4>Shorten Delivery Time</h4>
                        <div class="text">Undertakes laborious physical exercise except to obtain. </div>
                        <div class="skills">
                            <!--Skill Item-->
                            <div class="skill-item">
                                <div class="skill-bar">
                                    <div class="bar-inner">
                                        <div class="bar progress-line" data-width="65">
                                            <div class="skill-percentage">
                                                <div class="count-box"><span class="count-text" data-speed="2000"
                                                        data-stop="65">0</span>%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="link-btn">
                        <a href="about.html" class="theme-btn style-six"><span>Read More</span></a>
                        <a href="#" class="theme-btn style-seven"><i class="flaticon-download-1"></i><span> Our
                                Report</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Whychoose us section -->
    <section class="whychoose-us-section" style="background-image: url(frontend/assets/images/background/bg-7.jpg);">
        <div class="auto-container">
            <div class="row m-0 top-content justify-content-between align-items-center">
                <div class="sec-title light">
                    <div class="sub-title">Highlights</div>
                    <h2>Reason for Choosing Us</h2>
                </div>
                <div class="text">We have facility to produce advance work various industrial applications <br> based on
                    specially developed technology.</div>
            </div>
            <div class="wrapper-box">
                <div class="row">
                    <div class="col-lg-4 col-md-6 why-choose-us-block">
                        <div class="inner-box">
                            <div class="icon"><i class="flaticon-clock-4"></i></div>
                            <h4>On Time Delivery</h4>
                            <div class="text">Indignation dislike beguiled demoralized by the charms of pleasure blinded.
                            </div>
                            <div class="link"><a href="#" class="link-btn">Read More <i
                                        class="flaticon-right-arrow-3"></i></a></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 why-choose-us-block">
                        <div class="inner-box">
                            <div class="icon"><i class="flaticon-robot-arm-1"></i></div>
                            <h4>Smart Technology</h4>
                            <div class="text">Foresee the pain & trouble
                                that are bound ensue equal
                                blame their duty.</div>
                            <div class="link"><a href="#" class="link-btn">Read More <i
                                        class="flaticon-right-arrow-3"></i></a></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 why-choose-us-block">
                        <div class="inner-box">
                            <div class="icon"><i class="flaticon-winner-1"></i></div>
                            <h4>Easy & Affordable</h4>
                            <div class="text">These cases are perfectly simple easy too distinguish free hour prevents.
                            </div>
                            <div class="link"><a href="#" class="link-btn">Read More <i
                                        class="flaticon-right-arrow-3"></i></a></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 why-choose-us-block">
                        <div class="inner-box">
                            <div class="icon"><i class="flaticon-engineer-1"></i></div>
                            <h4>Qualified Specialists</h4>
                            <div class="text">Foresee the pain & trouble
                                that are bound ensue equal
                                blame their duty.</div>
                            <div class="link"><a href="#" class="link-btn">Read More <i
                                        class="flaticon-right-arrow-3"></i></a></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 why-choose-us-block">
                        <div class="inner-box">
                            <div class="icon"><i class="flaticon-global-warming"></i></div>
                            <h4>Clean & Unpolluted</h4>
                            <div class="text">These cases are perfectly simple easy too distinguish free hour prevents.
                            </div>
                            <div class="link"><a href="#" class="link-btn">Read More <i
                                        class="flaticon-right-arrow-3"></i></a></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 why-choose-us-block">
                        <div class="inner-box">
                            <div class="icon"><i class="flaticon-support"></i></div>
                            <h4>24/7 Support</h4>
                            <div class="text">Indignation dislike beguiled demoralized by the charms of pleasure blinded.
                            </div>
                            <div class="link"><a href="#" class="link-btn">Read More <i
                                        class="flaticon-right-arrow-3"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Team Section two -->
    <section class="team-section-two pb-0">
        <div class="auto-container">
            <div class="sec-title text-center">
                <div class="sub-title">Behind Our Success</div>
                <h2>Our Professional Team </h2>
                <div class="text">We have facility to produce advance work various industrial applications based on <br>
                    specially developed technology.</div>
            </div>
            <div class="row">
                <div class="theme_carousel owl-theme owl-carousel"
                    data-options='{"loop": true, "center": false, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 1000, "responsive":{ "0" :{ "items": "1" }, "480" :{ "items" : "1" }, "768" :{ "items" : "2" } , "992":{ "items" : "3" }, "1200":{ "items" : "3" }}}'>
                    @foreach ($teams as $team)
                        <div class="col-lg-12 team-block-two">
                            <div class="inner-box">
                                <div class="image">
                                    <img src="{{ Storage::url($team->image) }}" alt="{{ $team->name }}">
                                </div>
                                <div class="designation">{{ $team->jabatan }}</div>
                                <div class="overlay">
                                    <div>
                                        <h4>{{ $team->name }}</h4>
                                        <div class="text">
                                            {{ $team->deskripsi }}
                                        </div>
                                        <ul class="social-icon">
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Section Two -->
    <section class="projects-section-two">
        <div class="sec-bg" style="background-image: url(frontend/assets/images/background/bg-4.jpg);"></div>
        <div class="auto-container">
            <div class="row m-0 top-content justify-content-between">
                <div class="sec-title">
                    <div class="sub-title">Our Works</div>
                    <h2>Recently Completed Works</h2>
                </div>
                <div class="text">We have facility to produce advance work various industrial applications <br> based on
                    specially developed technology.</div>
            </div>
            <!--Filter-->
            <div class="filters">
                <ul class="filter-tabs filter-btns">
                    <li class="filter active" data-role="button" data-filter=".all">All Cases</li>
                    <li class="filter" data-role="button" data-filter=".cat-1">Cutting</li>
                    <li class="filter" data-role="button" data-filter=".cat-2">Engineering </li>
                    <li class="filter" data-role="button" data-filter=".cat-3">Machining</li>
                    <li class="filter" data-role="button" data-filter=".cat-4">Technology</li>
                    <li class="filter" data-role="button" data-filter=".cat-5">Welding</li>
                </ul>
                <div class="link"><a href="#" class="link-btn">All Projects <i
                            class="flaticon-right-arrow-3"></i></a></div>
            </div>

            <!--Sortable Galery-->
            <div class="sortable-masonry">

                <div class="items-container row">
                    <!-- Project Block -->
                    <div class="col-lg-3 col-md-6 project-block masonry-item all cat-1">
                        <div class="inner-box">
                            <div class="image">
                                <img src="{{ asset('frontend/assets/images/resource/image-23.jpg') }}" alt="">
                            </div>
                            <div class="overlay-content">
                                <div>
                                    <div class="category"># Welding</div>
                                    <h4>Pipeline Welding</h4>
                                </div>
                                <div class="link-btn"><a href="project-details.html"><span
                                            class="flaticon-arrow-1"></span></a></div>
                            </div>
                        </div>
                    </div>
                    <!-- Project Block -->
                    <div class="col-lg-3 col-md-6 project-block masonry-item all cat-4">
                        <div class="inner-box">
                            <div class="image">
                                <img src="{{ asset('frontend/assets/images/resource/image-24.jpg') }}" alt="">
                            </div>
                            <div class="overlay-content">
                                <div>
                                    <div class="category"># Welding</div>
                                    <h4>Pipeline Welding</h4>
                                </div>
                                <div class="link-btn"><a href="project-details.html"><span
                                            class="flaticon-arrow-1"></span></a></div>
                            </div>
                        </div>
                    </div>
                    <!-- Project Block -->
                    <div class="col-lg-3 col-md-6 project-block masonry-item all cat-1 cat-3">
                        <div class="inner-box">
                            <div class="image">
                                <img src="{{ asset('frontend/assets/images/resource/image-25.jpg') }}" alt="">
                            </div>
                            <div class="overlay-content">
                                <div>
                                    <div class="category"># Welding</div>
                                    <h4>Pipeline Welding</h4>
                                </div>
                                <div class="link-btn"><a href="project-details.html"><span
                                            class="flaticon-arrow-1"></span></a></div>
                            </div>
                        </div>
                    </div>
                    <!-- Project Block -->
                    <div class="col-lg-3 col-md-6 project-block masonry-item all cat-2 cat-5">
                        <div class="inner-box">
                            <div class="image">
                                <img src="{{ asset('frontend/assets/images/resource/image-26.jpg') }}" alt="">
                            </div>
                            <div class="overlay-content">
                                <div>
                                    <div class="category"># Welding</div>
                                    <h4>Pipeline Welding</h4>
                                </div>
                                <div class="link-btn"><a href="project-details.html"><span
                                            class="flaticon-arrow-1"></span></a></div>
                            </div>
                        </div>
                    </div>
                    <!-- Project Block -->
                    <div class="col-lg-3 col-md-6 project-block masonry-item all cat-3 cat-2">
                        <div class="inner-box">
                            <div class="image">
                                <img src="{{ asset('frontend/assets/images/resource/image-27.jpg') }}" alt="">
                            </div>
                            <div class="overlay-content">
                                <div>
                                    <div class="category"># Welding</div>
                                    <h4>Pipeline Welding</h4>
                                </div>
                                <div class="link-btn"><a href="project-details.html"><span
                                            class="flaticon-arrow-1"></span></a></div>
                            </div>
                        </div>
                    </div>
                    <!-- Project Block -->
                    <div class="col-lg-3 col-md-6 project-block masonry-item all cat-1">
                        <div class="inner-box">
                            <div class="image">
                                <img src="{{ asset('frontend/assets/images/resource/image-28.jpg') }}" alt="">
                            </div>
                            <div class="overlay-content">
                                <div>
                                    <div class="category"># Welding</div>
                                    <h4>Pipeline Welding</h4>
                                </div>
                                <div class="link-btn"><a href="project-details.html"><span
                                            class="flaticon-arrow-1"></span></a></div>
                            </div>
                        </div>
                    </div>
                    <!-- Project Block -->
                    <div class="col-lg-3 col-md-6 project-block masonry-item all cat-4 cat-5">
                        <div class="inner-box">
                            <div class="image">
                                <img src="{{ asset('frontend/assets/images/resource/image-29.jpg') }}" alt="">
                            </div>
                            <div class="overlay-content">
                                <div>
                                    <div class="category"># Welding</div>
                                    <h4>Pipeline Welding</h4>
                                </div>
                                <div class="link-btn"><a href="project-details.html"><span
                                            class="flaticon-arrow-1"></span></a></div>
                            </div>
                        </div>
                    </div>
                    <!-- Project Block -->
                    <div class="col-lg-3 col-md-6 project-block masonry-item all cat-1 cat-5 cat-3">
                        <div class="inner-box">
                            <div class="image">
                                <img src="{{ asset('frontend/assets/images/resource/image-30.jpg') }}" alt="">
                            </div>
                            <div class="overlay-content">
                                <div>
                                    <div class="category"># Welding</div>
                                    <h4>Pipeline Welding</h4>
                                </div>
                                <div class="link-btn"><a href="project-details.html"><span
                                            class="flaticon-arrow-1"></span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials section Two -->
    <section class="testimonials-section-two style-two">
        <div class="auto-container">
            <div class="sec-title text-center">
                <div class="sub-title">Testimonials</div>
                <h2>Trusted From Our Clients</h2>
            </div>
            <div class="row">
                <div class="theme_carousel owl-theme owl-carousel"
                    data-options='{"loop": true, "center": false, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 1000, "responsive":{ "0" :{ "items": "1" }, "600" :{ "items" : "1" }, "768" :{ "items" : "1" } , "992":{ "items" : "2" }, "1200":{ "items" : "2" }}}'>
                    <div class="col-lg-12 testimonial-block-two">
                        <div class="inner-box">
                            <div class="rating">
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                            </div>
                            <div class="text">Indasto manufacturing has been a great supplier to our company. Their quick
                                turn around is [fantastic] and they are very responsive.</div>
                            <div class="image">
                                <div class="image-wrapper"><img
                                        src="{{ asset('frontend/assets/images/resource/author-4.jpg') }}"
                                        alt=""></div>
                            </div>
                            <h4>Lillian Grace</h4>
                            <div class="designation">Green Valley Intenational</div>
                            <div class="border-shape">
                                <div class="quote-icon"><span class="flaticon-right-quote-1"></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 testimonial-block-two">
                        <div class="inner-box">
                            <div class="rating">
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                            </div>
                            <div class="text">I also was given great feedback on the quality, the product manager was
                                excited about how good they looked. Thank you so very much.</div>
                            <div class="image">
                                <div class="image-wrapper"><img
                                        src="{{ asset('frontend/assets/images/resource/author-5.jpg') }}"
                                        alt=""></div>
                            </div>
                            <h4>Nathan Felix</h4>
                            <div class="designation">Novartis Pharmaceuticals</div>
                            <div class="border-shape">
                                <div class="quote-icon"><span class="flaticon-right-quote-1"></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 testimonial-block-two">
                        <div class="inner-box">
                            <div class="rating">
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                            </div>
                            <div class="text">Indasto manufacturing has been a great supplier to our company. Their quick
                                turn around is [fantastic] and they are very responsive.</div>
                            <div class="image">
                                <div class="image-wrapper"><img
                                        src="{{ asset('frontend/assets/images/resource/author-4.jpg') }}"
                                        alt=""></div>
                            </div>
                            <h4>Lillian Grace</h4>
                            <div class="designation">Green Valley Intenational</div>
                            <div class="border-shape">
                                <div class="quote-icon"><span class="flaticon-right-quote-1"></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 testimonial-block-two">
                        <div class="inner-box">
                            <div class="rating">
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                            </div>
                            <div class="text">I also was given great feedback on the quality, the product manager was
                                excited about how good they looked. Thank you so very much.</div>
                            <div class="image">
                                <div class="image-wrapper"><img
                                        src="{{ asset('frontend/assets/images/resource/author-5.jpg') }}"
                                        alt=""></div>
                            </div>
                            <h4>Nathan Felix</h4>
                            <div class="designation">Novartis Pharmaceuticals</div>
                            <div class="border-shape">
                                <div class="quote-icon"><span class="flaticon-right-quote-1"></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 testimonial-block-two">
                        <div class="inner-box">
                            <div class="rating">
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                            </div>
                            <div class="text">Indasto manufacturing has been a great supplier to our company. Their quick
                                turn around is [fantastic] and they are very responsive.</div>
                            <div class="image">
                                <div class="image-wrapper"><img
                                        src="{{ asset('frontend/assets/images/resource/author-4.jpg') }}"
                                        alt=""></div>
                            </div>
                            <h4>Lillian Grace</h4>
                            <div class="designation">Green Valley Intenational</div>
                            <div class="border-shape">
                                <div class="quote-icon"><span class="flaticon-right-quote-1"></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 testimonial-block-two">
                        <div class="inner-box">
                            <div class="rating">
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                            </div>
                            <div class="text">I also was given great feedback on the quality, the product manager was
                                excited about how good they looked. Thank you so very much.</div>
                            <div class="image">
                                <div class="image-wrapper"><img
                                        src="{{ asset('frontend/assets/images/resource/author-5.jpg') }}"
                                        alt=""></div>
                            </div>
                            <h4>Nathan Felix</h4>
                            <div class="designation">Novartis Pharmaceuticals</div>
                            <div class="border-shape">
                                <div class="quote-icon"><span class="flaticon-right-quote-1"></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 testimonial-block-two">
                        <div class="inner-box">
                            <div class="rating">
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                            </div>
                            <div class="text">Indasto manufacturing has been a great supplier to our company. Their quick
                                turn around is [fantastic] and they are very responsive.</div>
                            <div class="image">
                                <div class="image-wrapper"><img
                                        src="{{ asset('frontend/assets/images/resource/author-4.jpg') }}"
                                        alt=""></div>
                            </div>
                            <h4>Lillian Grace</h4>
                            <div class="designation">Green Valley Intenational</div>
                            <div class="border-shape">
                                <div class="quote-icon"><span class="flaticon-right-quote-1"></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 testimonial-block-two">
                        <div class="inner-box">
                            <div class="rating">
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                                <span class="fas fa-star"></span>
                            </div>
                            <div class="text">I also was given great feedback on the quality, the product manager was
                                excited about how good they looked. Thank you so very much.</div>
                            <div class="image">
                                <div class="image-wrapper"><img
                                        src="{{ asset('frontend/assets/images/resource/author-5.jpg') }}"
                                        alt=""></div>
                            </div>
                            <h4>Nathan Felix</h4>
                            <div class="designation">Novartis Pharmaceuticals</div>
                            <div class="border-shape">
                                <div class="quote-icon"><span class="flaticon-right-quote-1"></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="pricing-section">
        <div class="sec-bg" style="background-image: url(frontend/assets/images/background/bg-5.jpg);"></div>
        <div class="auto-container">
            <div class="row m-0 top-content justify-content-between align-items-center">
                <div class="sec-title light">
                    <div class="sub-title">Pricing & Plans</div>
                    <h2>Our Flexible Pricing Plans</h2>
                </div>
                <div class="text">We have facility to produce advance work various industrial applications <br> based on
                    specially developed technology.</div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 pricing-block">
                    <div class="inner-box wow fadeInUp" data-wow-duration="1500ms">
                        <div class="category-wrapper">
                            <div class="category">Basic Plan</div>
                        </div>
                        <div class="text">*rates are subject to change</div>
                        <div class="link-btn"><a href="#" class="theme-btn"><span>Get Started <i
                                        class="flaticon-right-arrow-3"></i></span></a></div>
                        <ul class="content">
                            <li>Laser Cutting</li>
                            <li>Machining</li>
                            <li>Fabrication</li>
                            <li class="unavailable">Welding</li>
                            <li class="unavailable">Poweder Coating</li>
                        </ul>
                        <div class="price"><sup>$</sup>144.00<sub>/Month</sub></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pricing-block style-two">
                    <div class="inner-box wow fadeInUp" data-wow-duration="1500ms">
                        <div class="category-wrapper">
                            <div class="category">Standard Plan</div>
                        </div>
                        <div class="text">*rates are subject to change</div>
                        <div class="link-btn"><a href="#" class="theme-btn"><span>Get Started<i
                                        class="flaticon-right-arrow-3"></i></span></a></div>
                        <ul class="content">
                            <li>Laser Cutting</li>
                            <li>Machining</li>
                            <li>Fabrication</li>
                            <li>Welding</li>
                            <li class="unavailable">Poweder Coating</li>
                        </ul>
                        <div class="price"><sup>$</sup>299.00<sub>/Month</sub></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pricing-block">
                    <div class="inner-box wow fadeInUp" data-wow-duration="1500ms">
                        <div class="category-wrapper">
                            <div class="category">Advanced Plan</div>
                        </div>
                        <div class="text">*rates are subject to change</div>
                        <div class="link-btn"><a href="#" class="theme-btn"><span>Get Started<i
                                        class="flaticon-right-arrow-3"></i></span></a></div>
                        <ul class="content">
                            <li>Laser Cutting</li>
                            <li>Machining</li>
                            <li>Fabrication</li>
                            <li>Welding</li>
                            <li>Poweder Coating</li>
                        </ul>
                        <div class="price"><sup>$</sup>344.00<sub>/Month</sub></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form section -->
    <section class="contact-form-section style-two"
        style="background-image: url(frontend/assets/images/background/bg-6.jpg);">
        <div class="auto-container">
            <div class="sec-title text-center">
                <div class="sub-title">Estimation</div>
                <h2>Request for a Free Quote</h2>
                <div class="text">We have facility to produce advance work various industrial applications based on <br>
                    specially developed technology.</div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="wrapper-box">
                        <!--Contact Form-->
                        <div class="contact-form">
                            <form method="post" action="{{ asset('frontend/assets/inc/sendmail.php') }}"
                                id="contact-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input id="name" type="text" name="form_name" value=""
                                                placeholder="Your Name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input id="email" type="text" name="email" value=""
                                                placeholder="Your Email" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="service">Service</label>
                                            <select id="service" class="selectpicker" name="form_subject">
                                                <option value="*">Chemical Research</option>
                                                <option value=".category-1">About Company </option>
                                                <option value=".category-3">Leadership Team</option>
                                                <option value=".category-4">Global Networks</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="message">Message</label>
                                            <textarea id="message" name="form_message" placeholder="Enter Your Massage"></textarea>
                                        </div>
                                        <div class="form-group-two">
                                            <div class="form-btn">
                                                <input id="form_botcheck" name="form_botcheck" class="form-control"
                                                    type="hidden" value="">
                                                <button class="theme-btn btn-style-one" type="submit"
                                                    data-loading-text="Please wait..."><span>Send Now</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--End Contact Form-->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feature-block-two style-two">
                        <div class="inner-box">
                            <div class="icon"><img src="{{ asset('frontend/assets/images/icons/icon-43.png') }}"
                                    alt=""></div>
                            <h4>Subscribe Our <br> Newsletter</h4>
                            <div class="text">Subscribe us & get updates in inbox</div>
                            <div class="link-btn"><a href="#" class="theme-btn style-three"><span>Enter
                                        Email</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section style-two -->
    <section class="news-section style-two">
        <div class="auto-container">
            <div class="sec-title">
                <div class="sub-title">News & Updates</div>
                <h2>Latest From Our Blog</h2>
            </div>
            <div class="row">
                <div class="theme_carousel owl-theme owl-carousel"
                    data-options='{"loop": true, "center": false, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 1000, "responsive":{ "0" :{ "items": "1" }, "600" :{ "items" : "1" }, "768" :{ "items" : "2" } , "992":{ "items" : "3" }, "1200":{ "items" : "3" }}}'>
                    @foreach($articles as $article)
                    <div class="col-lg-12 news-block">
                        <div class="inner-box">
                            <div class="image">
                                <img src="{{ Storage::url($article->cover) }}" alt="">
                                <div class="overlay-two">
                                    <a href="{{ Storage::url($article->cover) }}"
                                        class="lightbox-image" data-fancybox="gallery"><span
                                            class="flaticon-zoom-in"></span></a>
                                    <a href="{{ route('article.categories.detail', $article->slug) }}"><span class="flaticon-link"></span></a>
                                </div>
                            </div>
                            <div class="lower-content">
                                <div class="category">[<i class="fas fa-folder"></i> Manufacturing ]</div>
                                <h3><a href="{{ route('article.categories.detail', $article->slug) }}">{{ $article->title }}</a>
                                </h3>
                                <ul class="post-meta">
                                    <li><a href="#"><i class="far fa-clock"></i>{{ $article->created_at }}</a></li>
                                    <li><a href="#"><i class="far fa-eye"></i>{{ views($article)->count() }}</a></li>
                                </ul>
                                <div class="post-share-btn">
                                    <div class="social-links-wrapper">
                                        <div class="icon"><span class="flaticon-share"></span>Share</div>
                                        <ul class="social-links">
                                            <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                            <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                            <li><a href="#"><span class="fab fa-google-plus-g"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- CTA section two -->
    <section class="cta-section-two">
        <div class="auto-container">
            <div class="wrapper-box" style="background-image: url(frontend/assets/images/background/bg-8.jpg);">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="left-content">
                            <div class="icon"><i class="flaticon-portfolio-1"></i></div>
                            <h3>Looking for a Job Opportunity? Apply Now.</h3>
                            <div class="text">These cases are perfectly simple & easy to distinguish.</div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="link-btn"><a href="#" class="theme-btn style-three"><span>Job
                                    Opening</span></a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
