@extends('frontend.layouts.frontend')

@section('content')
    <!-- banner area start -->
    <section class="ns-banner-area">
        <div class="swiper-container slider-active">
            <div class="swiper-wrapper">
                @php
                    $sliders = \App\Models\Admin\HomepageSilder::where([['status', 1], ['delete', 0]])->get();
                @endphp
                @foreach ($sliders as $slider)
                    <div class="swiper-slide">
                        <div class="ns-banner-single bg-default"
                            data-background="{{ asset('public/'.$slider->slider_image) }}">
                            <img class="ns-banner-shape-1 ns-shape-img d-none d-md-block"
                                src="{{ asset('public/frontend/assets/img/banner/shape-1.png') }}" alt="Not Found">
                            <img class="ns-banner-shape-2 ns-shape-img d-none d-xxl-block"
                                src="{{ asset('public/frontend/assets/img/banner/shape-2.png') }}" alt="Not Found">
                            <img class="ns-banner-shape-3 ns-shape-img"
                                src="{{ asset('public/frontend/assets/img/banner/shape-3.png') }}" alt="Not Found">
                            <img class="ns-banner-shape-4 ns-shape-img d-none d-md-block"
                                src="{{ asset('public/frontend/assets/img/banner/shape-4.png') }}" alt="Not Found">
                            <img class="ns-banner-shape-5 ns-shape-img"
                                src="{{ asset('public/frontend/assets/img/banner/shape-5.png') }}" alt="Not Found">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-7">
                                        <div class="ns-banner-content">
                                            <span class="ns-banner-content-subtitle">Welcome To Nosei</span>
                                            @if($slider->slider_title!='')<h2 class="ns-banner-content-title">
                                                {{ $slider->slider_title }}
                                            </h2>@endif
                                            @if($slider->slider_short_description!='')<p>{{ $slider->slider_short_description }}</p>@endif
                                            <div class="ns-banner-action-btn">
                                                @if($slider->slider_link!='')<a href="{{ $slider->slider_link }}" class="ns-header-btn ns-theme-btn">{{ $slider->slider_button_text }}
                                                    <i class="fal fa-arrow-right"></i></a>@endif
                                                 @if($slider->slider_link!='')<a href="https://www.youtube.com/watch?v={{ $slider->slider_video }}"
                                                    onclick="return false;" class="ns-play-btn popup-video"><i class="fas fa-play"></i></a>@endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination ns-slide-pagination" style="margin-top: -20px;"></div>
        </div>
    </section>
    <!-- banner area end -->

    <!-- feature area start -->
    <section class="ns-feature-area">
        <div class="ns-feature-single pt-95 pb-150 bg-default" data-background="assets/img/feature/feature-map.png">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="ns-section text-center">
                            <span class="ns-section-subtitle">Best features</span>
                            <h2 class="ns-section-title ns-section-title-white mb-0">We Are Business Features</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ns-feature-wrap pb-40">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="ns-feature-item mb-70">
                            <img class="ns-feature-item-img" src="assets/img/feature/feature-bg-1.jpg" alt="Not Found">
                            <h4 class="ns-feature-item-title">Business Network</h4>
                            <p>Nullam vitae tempor molestie exthe.</p>
                            <div class="ns-feature-item-icon"><i class="icofont-network"></i></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="ns-feature-item mb-70">
                            <img class="ns-feature-item-img" src="assets/img/feature/feature-bg-2.jpg" alt="Not Found">
                            <h4 class="ns-feature-item-title">60 For Mobiles</h4>
                            <p>Nullam vitae tempor molestie exthe.</p>
                            <div class="ns-feature-item-icon"><i class="icofont-contrast"></i></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="ns-feature-item mb-70">
                            <img class="ns-feature-item-img" src="assets/img/feature/feature-bg-3.jpg" alt="Not Found">
                            <h4 class="ns-feature-item-title">Line Streaming</h4>
                            <p>Nullam vitae tempor molestie exthe.</p>
                            <div class="ns-feature-item-icon"><i class="icofont-signal"></i></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="ns-feature-item mb-70">
                            <img class="ns-feature-item-img" src="assets/img/feature/feature-bg-4.jpg" alt="Not Found">
                            <h4 class="ns-feature-item-title">Fiber Broads</h4>
                            <p>Nullam vitae tempor molestie exthe.</p>
                            <div class="ns-feature-item-icon"><i class="icofont-network-tower"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- feature area end -->

    <!-- about area start -->
    <section class="ns-about-area pt-35 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="ns-about-left bg-default mb-40" data-background="assets/img/about/shape-2.png">
                        <div class="ns-about-img-1 mb-10">
                            <div class="ns-about-img-inner">
                                <img class="inner-img-1" src="assets/img/about/about-1.jpg" alt="Not Found">
                                <a class="ns-about-play-btn popup-video"
                                    href="https://www.youtube.com/watch?v=SopsEuNKyPo"><img
                                        src="assets/img/about/play-btn.png" alt="Not Found"></a>
                            </div>
                            <div class="ns-about-img-content">
                                <h4 class="ns-about-inner-title">Experince</h4>
                                <h5 class="ns-about-count">
                                    <span class="odometer about_count" data-count="26">00</span><span
                                        class="ns-about-plus">+</span>
                                </h5>
                            </div>
                        </div>
                        <div class="ns-about-img-wrap-2">
                            <div class="ns-about-img-inner-2">
                                <img class="inner-img-2" src="assets/img/about/about-2.jpg" alt="Not Found">
                                <img class="ns-about-shape" src="assets/img/about/shape-1.png" alt="Not Found">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="ns-about-wrap mb-40">
                        <div class="ns-section mb-25">
                            <span class="ns-section-subtitle">About Our Company</span>
                            <h2 class="ns-section-title mb-15">About 26+ Experince Hands
                                Such As Front Admin </h2>
                            <p class="ns-section-text mb-0">In job gives you handcrafted options such as front adm
                                in reviews or email notifications. It also gives employer management fo apps ial
                                media in area.</p>
                        </div>
                        <div class="ns-about-content">
                            <div class="row row-20">
                                <div class="col-xl-8 col-lg-8 col-md-7 col-sm-8">
                                    <div class="ns-about-content-info mb-55">
                                        <div class="ns-about-content-tab">
                                            <h5 class="ns-about-content-tab-title"><a href="#">Our
                                                    Mission</a></h5>
                                            <div>
                                                <a class="ns-about-content-tab-icon" href="#"><i
                                                        class="icofont-life-ring"></i></a>
                                            </div>
                                        </div>
                                        <div class="ns-about-content-tab">
                                            <h5 class="ns-about-content-tab-title"><a href="#">Team
                                                    Support</a></h5>
                                            <div>
                                                <a class="ns-about-content-tab-icon" href="#"><i
                                                        class="icofont-live-support"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ns-about-content-list">
                                        <ul>
                                            <li><i class="icofont-tick-boxed"></i>Business ndisse suscipit sagittis
                                                leo.</li>
                                            <li><i class="icofont-tick-boxed"></i>We gives employer management</li>
                                            <li><i class="icofont-tick-boxed"></i>Media in this area of the
                                                solution.</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-5 col-sm-4">
                                    <div class="ns-about-content-info-right mb-50">
                                        <h5 class="inner-title">Project Job</h5>
                                        <div class="ns-about-info-inner">
                                            <p><span></span> In handcraft job gives you
                                                as
                                                front adm in
                                                reviews.
                                            </p>
                                            <a class="ns-about-info-inner-btn" href="project-details.html"><i
                                                    class="fas fa-chevron-circle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ns-about-content-bottom">
                                <div class="ns-about-content-admin">
                                    <div class="ns-about-content-admin-img">
                                        <img src="assets/img/about/about-admin.png" alt="Not Found">
                                    </div>
                                    <div class="ns-about-content-admin-info">
                                        <h4 class="ns-about-admin-title"><a href="about.html">Rubel Islam</a></h4>
                                        <span>Co- Founder</span>
                                    </div>
                                </div>
                                <div class="ns-about-content-admin-signature">
                                    <img src="assets/img/about/signature.png" alt="Not Found">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about area end -->

    <!-- service area start -->
    <section class="ns-service-area pt-110 pb-110">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="ns-section mb-50 text-center">
                        <span class="ns-section-subtitle">What We Do</span>
                        <h2 class="ns-section-title mb-0">We High Service That Stand</h2>
                    </div>
                </div>
            </div>
            <div class="ns-service-wrap">
                <div class="swiper-container service-active">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="ns-service-item">
                                <div class="ns-service-img w_img">
                                    <a href="project-details.html"><img src="assets/img/service/service-1.jpg"
                                            alt="Not Found"></a>
                                </div>
                                <div class="ns-service-content">
                                    <h4 class="ns-service-content-title"><a href="project-details.html">Product To
                                            Satelite</a></h4>
                                    <p>We job gives you handcrafted options
                                        such as front admin reviews or It
                                        also gives It business
                                    </p>
                                    <a href="project-details.html" class="ns-service-btn">Read More<i
                                            class="icofont-plus"></i></a>
                                    <div class="ns-service-content-icon">
                                        <i class="icofont-mega-phone"></i>
                                    </div>
                                    <span class="ns-service-shape-1"></span>
                                    <span class="ns-service-shape-2"></span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="ns-service-item">
                                <div class="ns-service-img w_img">
                                    <a href="project-details.html"><img src="assets/img/service/service-2.jpg"
                                            alt="Not Found"></a>
                                </div>
                                <div class="ns-service-content">
                                    <h4 class="ns-service-content-title"><a href="project-details.html">Business
                                            For Network</a></h4>
                                    <p>We job gives you handcrafted options
                                        such as front admin reviews or It
                                        also gives It business
                                    </p>
                                    <a href="project-details.html" class="ns-service-btn">Read More<i
                                            class="icofont-plus"></i></a>
                                    <div class="ns-service-content-icon">
                                        <i class="icofont-bars"></i>
                                    </div>
                                    <span class="ns-service-shape-1"></span>
                                    <span class="ns-service-shape-2"></span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="ns-service-item">
                                <div class="ns-service-img w_img">
                                    <a href="project-details.html"><img src="assets/img/service/service-3.jpg"
                                            alt="Not Found"></a>
                                </div>
                                <div class="ns-service-content">
                                    <h4 class="ns-service-content-title"><a href="project-details.html">Computer
                                            Of Solution</a></h4>
                                    <p>We job gives you handcrafted options
                                        such as front admin reviews or It
                                        also gives It business
                                    </p>
                                    <a href="project-details.html" class="ns-service-btn">Read More<i
                                            class="icofont-plus"></i></a>
                                    <div class="ns-service-content-icon">
                                        <i class="icofont-contrast"></i>
                                    </div>
                                    <span class="ns-service-shape-1"></span>
                                    <span class="ns-service-shape-2"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ns-service-bottom mt-50">
                    <div class="ns-service-tagline">
                        <p><span>Service:</span>We best service it-solution for business.</p>
                    </div>
                    <div class="ns-service-pagination"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- service area end -->

    <!-- choose area start -->
    <section class="ns-choose-area">
        <img src="assets/img/choose/shape-1.png" alt="Not Found"
            class="ns-choose-shape choose-shape-1 d-none d-lg-block">
        <img src="assets/img/choose/shape-2.png" alt="Not Found"
            class="ns-choose-shape choose-shape-2 d-none d-md-block">
        <img src="assets/img/choose/shape-3.png" alt="Not Found"
            class="ns-choose-shape choose-shape-3 d-none d-md-block">
        <div class="ns-choose-bg d-none d-md-block">
            <img src="assets/img/choose/choose-bg.png" alt="Not Found">
        </div>
        <div class="ns-choose-wrap pt-110 pb-115">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6 order-2 order-lg-1">
                        <div class="ns-section mb-25">
                            <span class="ns-section-subtitle">Why Choose Us?</span>
                            <h2 class="ns-section-title mb-15">About Gives You Hand Best Such As Front Admin</h2>
                            <p class="ns-section-text mb-0 mr-70">In job gives you handcrafted options such as
                                front adm in reviews or email notifications. It also gives employer management fo
                                apps ial media in area.</p>
                        </div>
                        <div class="ns-choose-contain mr-70">
                            <blockquote class="ns-choose-contain-qoute">
                                <span><i class="icofont-quote-left"></i></span>
                                <p>There are many variations of passages of Fasts by injected humour, or randomised
                                    ere we must-have solution to satisfy most.</p>
                            </blockquote>
                            <div class="ns-choose-contain-list">
                                <ul>
                                    <li><i class="icofont-tick-boxed"></i>Business ndisse suscipit sagittis leo.
                                    </li>
                                    <li><i class="icofont-tick-boxed"></i>We gives employer management</li>
                                    <li><i class="icofont-tick-boxed"></i>Media in this area of the solution.</li>
                                </ul>
                            </div>
                            <div class="ns-choose-btn">
                                <a href="about.html" class="ns-theme-btn">Read More<i class="fal fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 order-1 order-lg-2">
                        <div class="ns-choose-img bg-default" data-background="assets/img/choose/choose-1.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- choose area end -->

    <!-- project area start -->
    <section class="ns-project-area pt-110 pb-115">
        <img class="ns-project-bg" src="assets/img/project/bg-project.jpg" alt="Not Found">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="ns-section mb-50 text-center">
                        <span class="ns-section-subtitle">Our Project</span>
                        <h2 class="ns-section-title mb-0">We Case Studies Best Work</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class=" container-custom-1 container">
            <div class="ns-project-wrap">
                <div class="project-active swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="ns-project-item">
                                <div class="ns-project-img w_img">
                                    <img src="assets/img/project/project-1.jpg" alt="Not Found">
                                </div>
                                <div class="ns-project-content">
                                    <div class="ns-project-content-info">
                                        <h4 class="ns-project-content-title"><a href="project-details.html">Business
                                                Network</a></h4>
                                        <span>Design / Business</span>
                                    </div>
                                    <div class="ns-project-content-btn">
                                        <a href="project-details.html"><i class="fas fa-chevron-circle-right"></i></a>
                                    </div>
                                </div>
                                <span class="ns-project-shape-1 ns-project-shape"></span>
                                <span class="ns-project-shape-2 ns-project-shape"></span>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="ns-project-item">
                                <div class="ns-project-img w_img">
                                    <img src="assets/img/project/project-2.jpg" alt="Not Found">
                                </div>
                                <div class="ns-project-content">
                                    <div class="ns-project-content-info">
                                        <h4 class="ns-project-content-title"><a href="project-details.html">Business
                                                Network</a></h4>
                                        <span>Design / Business</span>
                                    </div>
                                    <div class="ns-project-content-btn">
                                        <a href="project-details.html"><i class="fas fa-chevron-circle-right"></i></a>
                                    </div>
                                </div>
                                <span class="ns-project-shape-1 ns-project-shape"></span>
                                <span class="ns-project-shape-2 ns-project-shape"></span>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="ns-project-item">
                                <div class="ns-project-img w_img">
                                    <img src="assets/img/project/project-3.jpg" alt="Not Found">
                                </div>
                                <div class="ns-project-content">
                                    <div class="ns-project-content-info">
                                        <h4 class="ns-project-content-title"><a href="project-details.html">Business
                                                Network</a></h4>
                                        <span>Design / Business</span>
                                    </div>
                                    <div class="ns-project-content-btn">
                                        <a href="project-details.html"><i class="fas fa-chevron-circle-right"></i></a>
                                    </div>
                                </div>
                                <span class="ns-project-shape-1 ns-project-shape"></span>
                                <span class="ns-project-shape-2 ns-project-shape"></span>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="ns-project-item">
                                <div class="ns-project-img w_img">
                                    <img src="assets/img/project/project-4.jpg" alt="Not Found">
                                </div>
                                <div class="ns-project-content">
                                    <div class="ns-project-content-info">
                                        <h4 class="ns-project-content-title"><a href="project-details.html">Business
                                                Network</a></h4>
                                        <span>Design / Business</span>
                                    </div>
                                    <div class="ns-project-content-btn">
                                        <a href="project-details.html"><i class="fas fa-chevron-circle-right"></i></a>
                                    </div>
                                </div>
                                <span class="ns-project-shape-1 ns-project-shape"></span>
                                <span class="ns-project-shape-2 ns-project-shape"></span>
                            </div>
                        </div>
                    </div>
                    <div class="ns-project-pagination mt-50"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- project area end -->

    <!-- cta area start -->
    <div class="ns-cta-area bg-default pt-275 pb-115" data-background="assets/img/cta/cta-bg.jpg">
        <span class="ns-cta-shape-1 d-none d-md-block"></span>
        <span class="ns-cta-shape-2 d-none d-md-block"><img src="assets/img/cta/shape-2.png" alt="Not Found"></span>
        <div class="ns-cta-play-btn">
            <a href="https://www.youtube.com/watch?v=SopsEuNKyPo" class="popup-video">
                <img class="ns-cta-play-bg" src="assets/img/cta/cta-play-bg.png" alt="Not Found">
                <img class="ns-btn-img" src="assets/img/cta/play-btn.png" alt="Not Found">
            </a>
        </div>
        <img class="ns-cta-map" src="assets/img/cta/cta-map.png" alt="Not Found">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="ns-cta-content">
                        <span class="ns-cta-content-subtitle">Call To Action</span>
                        <h2 class="ns-cta-content-title">Contact Some Easy To Steps</h2>
                        <span class="ns-cta-contact">Get Your Quote or Call: <a
                                href="tel:+895400555">(+89)5400555</a></span>
                        <a href="contact.html" class="ns-theme-btn">Read More<i class="fal fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cta area end -->

    <!-- brand area start -->
    <div class="ns-brand-area pt-80 pb-80">
        <div class="container">
            <div class="brand-active swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="ns-brand-item">
                            <img class="ns-brand-item-img" src="assets/img/brand/brand.png" alt="Not Found">
                            <img class="ns-brand-item-img-hover" src="assets/img/brand/brand-hover.png" alt="Not Found">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ns-brand-item">
                            <img class="ns-brand-item-img" src="assets/img/brand/brand.png" alt="Not Found">
                            <img class="ns-brand-item-img-hover" src="assets/img/brand/brand-hover.png" alt="Not Found">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ns-brand-item">
                            <img class="ns-brand-item-img" src="assets/img/brand/brand.png" alt="Not Found">
                            <img class="ns-brand-item-img-hover" src="assets/img/brand/brand-hover.png" alt="Not Found">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ns-brand-item">
                            <img class="ns-brand-item-img" src="assets/img/brand/brand.png" alt="Not Found">
                            <img class="ns-brand-item-img-hover" src="assets/img/brand/brand-hover.png" alt="Not Found">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ns-brand-item">
                            <img class="ns-brand-item-img" src="assets/img/brand/brand.png" alt="Not Found">
                            <img class="ns-brand-item-img-hover" src="assets/img/brand/brand-hover.png" alt="Not Found">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- brand area end -->

    <!-- counter area start -->
    <div class="ns-counter-area pt-110 pb-85">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="ns-section mb-50 text-center">
                        <span class="ns-section-subtitle">What we do?</span>
                        <h2 class="ns-section-title mb-0">We High Service That Stand </h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="ns-counter-item mb-65">
                        <div class="ns-counter-item-img w_img">
                            <img src="assets/img/counter/counter-1.jpg" alt="Not Found">
                        </div>
                        <div class="ns-counter-item-content">
                            <h2 class="ns-counter-title"><span class="odometer counter_count"
                                    data-count="26">00</span><span class="ns-counter-plus">+</span></h2>
                            <span class="ns-counter-subtitle">Planing Solution</span>
                            <div class="ns-counter-icon">
                                <i class="icofont-life-ring"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="ns-counter-item mb-65">
                        <div class="ns-counter-item-img w_img">
                            <img src="assets/img/counter/counter-1.jpg" alt="Not Found">
                        </div>
                        <div class="ns-counter-item-content">
                            <h2 class="ns-counter-title"><span class="odometer counter_count"
                                    data-count="35">00</span><span class="ns-counter-plus">k</span></h2>
                            <span class="ns-counter-subtitle">Projects Analizs</span>
                            <div class="ns-counter-icon">
                                <i class="icofont-site-map"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="ns-counter-item mb-65">
                        <div class="ns-counter-item-img w_img">
                            <img src="assets/img/counter/counter-1.jpg" alt="Not Found">
                        </div>
                        <div class="ns-counter-item-content">
                            <h2 class="ns-counter-title"><span class="odometer counter_count"
                                    data-count="96">00</span><span class="ns-counter-plus">k</span></h2>
                            <span class="ns-counter-subtitle">Growing Business</span>
                            <div class="ns-counter-icon">
                                <i class="icofont-institution"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="ns-counter-item mb-65">
                        <div class="ns-counter-item-img w_img">
                            <img src="assets/img/counter/counter-1.jpg" alt="Not Found">
                        </div>
                        <div class="ns-counter-item-content">
                            <h2 class="ns-counter-title"><span class="odometer counter_count"
                                    data-count="55">00</span><span class="ns-counter-plus">+</span></h2>
                            <span class="ns-counter-subtitle">Team Support</span>
                            <div class="ns-counter-icon">
                                <i class="icofont-live-support"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- counter area end -->

    <!-- testimonial area start -->
    <div class="ns-testimonial-area">
        <img class="ns-testimonial-bg d-none d-xl-block" src="assets/img/testimonial/testimonial-shape.png"
            alt="Not Found">
        <div class="ns-testimonial-container container">
            <div class="ns-inner-wrap">
                <div class="ns-testimonial-space">
                    <div class="ns-has-space">
                        <div class="ns-testimonial-thumb">
                            <div class="swiper-container testimonial-thumb">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="ns-testimonial-img w_img">
                                            <img src="assets/img/testimonial/testimonial-1.png" alt="Not Found">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="ns-testimonial-img w_img">
                                            <img src="assets/img/testimonial/testimonial-2.png" alt="Not Found">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="ns-testimonial-img w_img">
                                            <img src="assets/img/testimonial/testimonial-3.png" alt="Not Found">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ns-testimonial-single">
                            <div class="ns-testimonial-wrap">
                                <div class="swiper-container testimonial-active">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="ns-testimonial-content">
                                                <img src="assets/img/testimonial/qoute.png" alt="Not Found">
                                                <p>We understand the important of to approaching <br> work
                                                    integrallysand believe in the power simple <br> and we easy
                                                    cation growth always act like <br> adipisicing elit, sed do
                                                    eiusmod.</p>
                                                <div class="ns-testimonial-admin">
                                                    <h4 class="ns-testimonial-admin-title">
                                                        Romes Barson
                                                    </h4>
                                                    <span>Manager</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="ns-testimonial-content">
                                                <img src="assets/img/testimonial/qoute.png" alt="Not Found">
                                                <p>We understand the important of to approaching work integrallysand
                                                    believe in the power simple and we easy cation growth always act
                                                    like adipisicing elit, sed do eiusmod.</p>
                                                <div class="ns-testimonial-admin">
                                                    <h4 class="ns-testimonial-admin-title">
                                                        Sergio Ramos
                                                    </h4>
                                                    <span>Director</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="ns-testimonial-content">
                                                <img src="assets/img/testimonial/qoute.png" alt="Not Found">
                                                <p>We understand the important of to approaching work integrallysand
                                                    believe in the power simple and we easy cation growth always act
                                                    like adipisicing elit, sed do eiusmod.</p>
                                                <div class="ns-testimonial-admin">
                                                    <h4 class="ns-testimonial-admin-title">
                                                        Robert Clive
                                                    </h4>
                                                    <span>CEO</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ns-testimonial-pagination mt-30"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testimonial area end -->

    <!-- contact area start -->
    <section class="pt-110 pb-115">
        <div class="ns-contact-container container">
            <div class="ns-inner-wrap">
                <div class="ns-contact-space">
                    <div class="ns-contact-wrap">
                        <div class="ns-contact-left">
                            <div class="ns-section mb-35">
                                <span class="ns-section-subtitle">Contact Now</span>
                                <h2 class="ns-section-title mb-15">Live Sports This Contacts Us</h2>
                                <p class="ns-section-text mb-0">Promote your blog posts, case udie, and product
                                    ouncems <br> with the the branded videoscustomers coming back for <br> services
                                    Makes best effort.</p>
                            </div>
                            <div class="ns-contact-form">
                                <form action="#">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <input type="text" placeholder="Your Name">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="email" placeholder="Your Email">
                                        </div>
                                        <div class="col-12">
                                            <textarea name="message" cols="30" rows="10" placeholder="Message"></textarea>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="ns-theme-btn ns-contact-btn">Send
                                                Request</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="ns-contact-right">
                            <div class="ns-contact-info">
                                <span class="ns-contact-circle-1"></span>
                                <span class="ns-contact-circle-2"></span>
                                <img src="assets/img/contact/contact.jpg" alt="Not Found" class="ns-contact-bg-img">
                                <img class="ns-contact-shape ns-contact-shape-1" src="assets/img/contact/contact-map.png"
                                    alt="Not Found">
                                <img class="ns-contact-shape ns-contact-shape-2" src="assets/img/contact/contact-map.png"
                                    alt="Not Found">
                                <img class="ns-contact-shape ns-contact-shape-3" src="assets/img/contact/contact-map.png"
                                    alt="Not Found">
                                <div class="ns-contact-item ns-phone">
                                    <div class="ns-contact-item-icon">
                                        <i class="icofont-ui-call"></i>
                                    </div>
                                    <div class="ns-contact-item-details">
                                        <span>Call Me</span>
                                        <div>
                                            <a href="tel:+880254615566">+880254615566</a>
                                            <a href="tel:+826542556455">+826542556455</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="ns-contact-item ns-mail">
                                    <div class="ns-contact-item-icon">
                                        <i class="icofont-envelope"></i>
                                    </div>
                                    <div class="ns-contact-item-details">
                                        <span>Mail Us</span>
                                        <div>
                                            <a
                                                href="mailto:rubel@eobi.com
                                                    ">rubel@eobi.com
                                            </a>
                                            <a
                                                href="mailto:moraty@bara.com
                                                    ">moraty@bara.com
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="ns-contact-item ns-address">
                                    <div class="ns-contact-item-icon">
                                        <i class="icofont-location-pin"></i>
                                    </div>
                                    <div class="ns-contact-item-details">
                                        <span>Address</span>
                                        <p>20, 25 Dhaka,0123 <br>
                                            Ratrba baraj,20</p>
                                    </div>
                                </div>
                            </div>
                            <div class="ns-contact-map">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d12677670.27170986!2d26.611266975183028!3d49.282320776259766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1646059574165!5m2!1sen!2sbd"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- contact area end -->

    <!-- blog area start -->
    <section class="ns-blog-area pt-110 pb-115">
        <img src="assets/img/blog/blog-shape-1.png" alt="Not Found" class="ns-blog-bg-shape-1 ns-blog-shape-bg">
        <img src="assets/img/blog/blog-shape-2.png" alt="Not Found" class="ns-blog-bg-shape-2 ns-blog-shape-bg">
        <img src="assets/img/blog/blog-shape-3.png" alt="Not Found" class="ns-blog-bg-shape-3 ns-blog-shape-bg">
        <img src="assets/img/blog/blog-shape-4.png" alt="Not Found" class="ns-blog-bg-shape-4 ns-blog-shape-bg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="ns-section mb-50 text-center">
                        <span class="ns-section-subtitle">Largest Blog</span>
                        <h2 class="ns-section-title mb-0">Our largest News Blog</h2>
                    </div>
                </div>
            </div>
            <div class="swiper-container blog-active">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="ns-blog-item">
                            <div class="ns-blog-img w_img">
                                <a href="blog-details.html"><img src="assets/img/blog/blog-1.jpg" alt="Not Found"></a>
                                <span class="ns-blog-tag">Business</span>
                                <span class="ns-blog-img-shape-1"></span>
                                <span class="ns-blog-img-shape-2"></span>
                            </div>
                            <div class="ns-blog-content">
                                <div class="ns-blog-content-meta"><span class="ns-blog-admin">By: <a
                                            href="#">Admin</a></span><span class="ns-blog-date">January 6,
                                        2022</span></div>
                                <h3 class="ns-blog-content-title"><a href="blog-details.html">We are best It
                                        solution company</a></h3>
                                <p>World’s best organizations, for 19+
                                    years and runninh...</p>
                                <a href="blog-details.html" class="ns-blog-btn">Read More<i class="icofont-plus"></i></a>
                                <span class="ns-blog-shape-1"></span>
                                <span class="ns-blog-shape-2"></span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ns-blog-item">
                            <div class="ns-blog-img w_img">
                                <a href="blog-details.html"><img src="assets/img/blog/blog-2.jpg" alt="Not Found"></a>
                                <span class="ns-blog-tag">Business</span>
                                <span class="ns-blog-img-shape-1"></span>
                                <span class="ns-blog-img-shape-2"></span>
                            </div>
                            <div class="ns-blog-content">
                                <div class="ns-blog-content-meta"><span class="ns-blog-admin">By: <a
                                            href="#">Admin</a></span><span class="ns-blog-date">January 6,
                                        2022</span></div>
                                <h3 class="ns-blog-content-title"><a href="blog-details.html">5 Ways Technology
                                        Has Improved Today</a></h3>
                                <p>World’s best organizations, for 19+
                                    years and runninh...</p>
                                <a href="blog-details.html" class="ns-blog-btn">Read More<i class="icofont-plus"></i></a>
                                <span class="ns-blog-shape-1"></span>
                                <span class="ns-blog-shape-2"></span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ns-blog-item">
                            <div class="ns-blog-img w_img">
                                <a href="blog-details.html"><img src="assets/img/blog/blog-3.jpg" alt="Not Found"></a>
                                <span class="ns-blog-tag">Business</span>
                                <span class="ns-blog-img-shape-1"></span>
                                <span class="ns-blog-img-shape-2"></span>
                            </div>
                            <div class="ns-blog-content">
                                <div class="ns-blog-content-meta"><span class="ns-blog-admin">By: <a
                                            href="#">Admin</a></span><span class="ns-blog-date">January 6,
                                        2022</span></div>
                                <h3 class="ns-blog-content-title"><a href="blog-details.html">Wireless Technology
                                        is Change Business</a></h3>
                                <p>World’s best organizations, for 19+
                                    years and runninh...</p>
                                <a href="blog-details.html" class="ns-blog-btn">Read More<i class="icofont-plus"></i></a>
                                <span class="ns-blog-shape-1"></span>
                                <span class="ns-blog-shape-2"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ns-blog-pagination mt-50"></div>
            </div>
        </div>
    </section>
    <!-- blog area end -->

    <!-- newsletter area start -->
    <div class="ns-newsletter-area pt-155 pb-115">
        <div class="container">
            <div class="ns-newsletter-wrap">
                <div class="ns-newsletter-icon">
                    <img src="assets/img/newsletter/newsletter-icon.png" alt="Not Found">
                </div>
                <div class="ns-newsletter-inner">
                    <img src="assets/img/newsletter/map.png" alt="Not Found" class="ns-newsletter-shape-3">
                    <img src="assets/img/newsletter/shape-1.png" alt="Not Found" class="ns-newsletter-shape-1">
                    <img src="assets/img/newsletter/shape-2.png" alt="Not Found" class="ns-newsletter-shape-2">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-6">
                            <div class="ns-newsletter-content mb-30">
                                <h3 class="ns-newsletter-title">
                                    News Latter to connect our services in your area
                                </h3>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="ns-newsletter-input mb-30">
                                <input type="email" placeholder="Your Email">
                                <button class="ns-newsletter-btn" type="submit">Subscribe</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- newsletter area end -->
@endsection
