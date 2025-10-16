@extends('frontend.layouts.frontend')
@push('title')
    {{ __('admin_local.Home') }}
@endpush
@push('css')
    <style>
        .ns-brand-item {
            height: 150px !important;
            width: 180px !important;
        }
    </style>
@endpush
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
                            data-background="{{ asset('public/' . $slider->slider_image) }}">
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
                                            @if ($slider->slider_title != '')
                                                <h2 class="ns-banner-content-title">
                                                    {{ $slider->slider_title }}
                                                </h2>
                                            @endif
                                            @if ($slider->slider_short_description != '')
                                                <p>{{ $slider->slider_short_description }}</p>
                                            @endif
                                            <div class="ns-banner-action-btn">
                                                @if ($slider->slider_link != '')
                                                    <a href="{{ $slider->slider_link }}"
                                                        class="ns-header-btn ns-theme-btn">{{ $slider->slider_button_text }}
                                                        <i class="fal fa-arrow-right"></i></a>
                                                @endif
                                                @if ($slider->slider_video != '')
                                                    <a href="https://www.youtube.com/watch?v={{ $slider->slider_video }}"
                                                        onclick="return false;" class="ns-play-btn popup-video"><i
                                                            class="fas fa-play"></i></a>
                                                @endif
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
    {{-- <section class="ns-feature-area">
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
    </section> --}}
    <!-- feature area end -->
    @php
        $services = \App\Models\Admin\Service::where([['status', 1], ['delete', 0]])->get();
    @endphp
    @if (count($services) > 0)
        <section class="ns-service-area pt-110 pb-110">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="ns-section mb-50 text-center">
                            <span class="ns-section-subtitle">{{ __('admin_local.What We Do') }}</span>
                            <h2 class="ns-section-title mb-0">{{ __('admin_local.Our Popular Services') }}</h2>
                        </div>
                    </div>
                </div>

                <div class="ns-service-wrap">
                    <div class="swiper-container service-active">
                        <div class="swiper-wrapper">
                            @foreach ($services as $service)
                                <div class="swiper-slide">
                                    <div class="ns-service-item">
                                        <div class="ns-service-img w_img">
                                            <a href="project-details.html"><img
                                                    src="{{ asset($service->service_image ? $service->service_image : 'public/admin/images/images.png') }}"
                                                    alt="Not Found"></a>
                                        </div>
                                        <div class="ns-service-content">
                                            <h4 class="ns-service-content-title"><a
                                                    href="project-details.html">{{ $service->service_name }}</a></h4>
                                            <p>{{ $service->service_short_details }}
                                            </p>
                                            <a href="project-details.html"
                                                class="ns-service-btn">{{ __('admin_local.Read More') }}<i
                                                    class="icofont-plus"></i></a>
                                            <div class="ns-service-content-icon">
                                                <img height="60px" width="60px"
                                                    src="{{ asset($service->service_icon ? $service->service_icon : 'public/admin/images/images.png') }}"
                                                    alt="Not Found">
                                            </div>
                                            <span class="ns-service-shape-1"></span>
                                            <span class="ns-service-shape-2"></span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    {{-- <div class="ns-service-bottom mt-50">
                    <div class="ns-service-tagline">
                        <p><span>Service:</span>We best service it-solution for business.</p>
                    </div>
                    <div class="ns-service-pagination"></div>
                </div> --}}
                </div>

            </div>
        </section>
    @endif
    @php
        $counting = \App\Models\Admin\Counting::first();
    @endphp
    @if ($counting)
        <div class="ns-counter-area pt-110 pb-85">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="ns-section mb-50 text-center">
                            <span class="ns-section-subtitle">{{ __('admin_local.What we do?') }}</span>
                            <h2 class="ns-section-title mb-0">{{ __('This is the numbers , that we have done') }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="ns-counter-item mb-65">
                            <div class="ns-counter-item-content">
                                <h2 class="ns-counter-title"><span class="odometer counter_count"
                                        data-count="{{ $counting->counting1_value }}">00</span><span
                                        class="ns-counter-plus">+</span></h2>
                                <span class="ns-counter-subtitle">{{ $counting->counting1_name }}</span>
                                <div class="ns-counter-icon">
                                    <i class="icofont-life-ring"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="ns-counter-item mb-65">
                            <div class="ns-counter-item-content">
                                <h2 class="ns-counter-title"><span class="odometer counter_count"
                                        data-count="{{ $counting->counting2_value }}">00</span><span
                                        class="ns-counter-plus">+</span></h2>
                                <span class="ns-counter-subtitle">{{ $counting->counting2_name }}</span>
                                <div class="ns-counter-icon">
                                    <i class="icofont-site-map"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="ns-counter-item mb-65">
                            <div class="ns-counter-item-content">
                                <h2 class="ns-counter-title"><span class="odometer counter_count"
                                        data-count="{{ $counting->counting3_value }}">00</span><span
                                        class="ns-counter-plus">+</span></h2>
                                <span class="ns-counter-subtitle">{{ $counting->counting3_name }}</span>
                                <div class="ns-counter-icon">
                                    <i class="icofont-institution"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="ns-counter-item mb-65">
                            <div class="ns-counter-item-content">
                                <h2 class="ns-counter-title"><span class="odometer counter_count"
                                        data-count="{{ $counting->counting4_value }}">00</span><span
                                        class="ns-counter-plus">+</span></h2>
                                <span class="ns-counter-subtitle">{{ $counting->counting4_name }}</span>
                                <div class="ns-counter-icon">
                                    <i class="icofont-live-support"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- about area start -->
    @php
        $aboutus = \App\Models\Admin\AboutUs::first();
    @endphp
    @if ($aboutus)
        <section class="ns-about-area pt-35 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="ns-about-left bg-default mb-40"
                            data-background="{{ asset('public/frontend/assets/img/about/shape-2.png') }}">
                            <div class="ns-about-img-1 mb-10">
                                <div class="ns-about-img-inner">
                                    <img class="inner-img-1"
                                        src="{{ asset($aboutus->image1 ?? 'assets/img/about/about-1.jpg') }}"
                                        alt="Not Found">
                                    @if ($aboutus->video_link)
                                        <a class="ns-about-play-btn popup-video"
                                            href="https://www.youtube.com/watch?v={{ $aboutus->video_link }}"><img
                                                src="{{ asset('public/frontend/assets/img/about/play-btn.png') }}"
                                                alt="Not Found"></a>
                                    @endif
                                </div>
                                @if ($aboutus->experience)
                                    <div class="ns-about-img-content">
                                        <h4 class="ns-about-inner-title">{{ __('admin_local.Experince') }}</h4>
                                        <h5 class="ns-about-count">
                                            <span class="odometer about_count"
                                                data-count="{{ $aboutus->experience }}">00</span><span
                                                class="ns-about-plus">+</span>
                                        </h5>
                                    </div>
                                @endif
                            </div>
                            <div class="ns-about-img-wrap-2">
                                <div class="ns-about-img-inner-2">
                                    <img class="inner-img-2"
                                        src="{{ asset($aboutus->image2 ?? 'assets/img/about/about-2.jpg') }}"
                                        alt="Not Found">
                                    <img class="ns-about-shape"
                                        src="{{ asset('public/frontend/assets/img/about/shape-1.png') }}"
                                        alt="Not Found">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="ns-about-wrap mb-40">
                            <div class="ns-section mb-25">
                                <span class="ns-section-subtitle">{{ __('admin_local.About Our Company') }}</span>
                                <h2 class="ns-section-title mb-15">{{ $aboutus->about_us_title ?? '' }}</h2>
                                <p class="ns-section-text mb-0">{{ $aboutus->short_details ?? '' }}</p>
                            </div>
                            <div class="ns-about-content">
                                <div class="row row-20">
                                    <div class="col-xl-8 col-lg-8 col-md-7 col-sm-8">
                                        <div class="ns-about-content-info mb-55">
                                            <div class="ns-about-content-tab">
                                                <h5 class="ns-about-content-tab-title"><a
                                                        href="#">{{ __('admin_local.About Us') }}</a></h5>
                                                <div>
                                                    <a class="ns-about-content-tab-icon" href="#"><i
                                                            class="icofont-life-ring"></i></a>
                                                </div>
                                            </div>
                                            <div class="ns-about-content-tab">
                                                <h5 class="ns-about-content-tab-title"><a
                                                        href="#">{{ __('admin_local.Contact Us') }}</a></h5>
                                                <div>
                                                    <a class="ns-about-content-tab-icon" href="#"><i
                                                            class="icofont-live-support"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ns-about-content-list">
                                            <ul>
                                                @php
                                                    $afterExplode = explode('||', $aboutus->points);
                                                @endphp
                                                @foreach ($afterExplode as $point)
                                                    <li><i class="icofont-tick-boxed"></i>{{ $point }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-5 col-sm-4">
                                        <div class="ns-about-content-info-right mb-50">
                                            <h5 class="inner-title">{{ __('admin_local.Projects') }}</h5>
                                            <div class="ns-about-info-inner">
                                                <p><span></span>{{ $aboutus->project_line ?? '' }}
                                                </p>
                                                <a class="ns-about-info-inner-btn" href="project-details.html"><i
                                                        class="fas fa-chevron-circle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if ($aboutus->resp_person_name)
                                    <div class="ns-about-content-bottom">
                                        <div class="ns-about-content-admin">
                                            <div class="ns-about-content-admin-img">
                                                <img src="{{ asset($aboutus->resp_person_image ?? 'assets/img/about/about-admin.png') }}"
                                                    alt="Not Found">
                                            </div>
                                            <div class="ns-about-content-admin-info">
                                                <h4 class="ns-about-admin-title"><a
                                                        href="about.html">{{ $aboutus->resp_person_name }}</a></h4>
                                                <span>{{ $aboutus->resp_person_desig }}</span>
                                            </div>
                                        </div>
                                        <div class="ns-about-content-admin-signature">
                                            <img src="{{ asset($aboutus->resp_person_signature ?? 'assets/img/about/signature.png') }}"
                                                alt="Not Found">
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @php
        $projects = \App\Models\Admin\Project::where([['status', 1], ['delete', 0]])->get();
    @endphp
    @if (count($projects) > 0)
        <section class="ns-project-area pt-110 pb-115">
            <img class="ns-project-bg" src="{{ asset('public/frontend/assets/img/project/bg-project.jpg') }}"
                alt="Not Found">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="ns-section mb-50 text-center">
                            <span class="ns-section-subtitle">{{ __('admin_local.Our Project') }}</span>
                            <h2 class="ns-section-title mb-0">{{ __('admin_local.Here is some of the best work') }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" container-custom-1 container">
                <div class="ns-project-wrap">
                    <div class="project-active swiper-container">
                        <div class="swiper-wrapper">
                            @foreach ($projects as $project)
                                @php
                                    $projectImages = json_decode($project->project_images);
                                @endphp
                                <div class="swiper-slide">
                                    <div class="ns-project-item">
                                        <div class="ns-project-img w_img">
                                            <img src="{{ asset($projectImages[0] ?? 'assets/img/project/project-1.jpg') }}"
                                                alt="Not Found">
                                        </div>
                                        <div class="ns-project-content">
                                            <div class="ns-project-content-info">
                                                <h4 class="ns-project-content-title"><a
                                                        href="project-details.html">{{ $project->project_name }}</a></h4>
                                                <span>{{ $project->project_category }}</span>
                                            </div>
                                            <div class="ns-project-content-btn">
                                                <a href="project-details.html"><i
                                                        class="fas fa-chevron-circle-right"></i></a>
                                            </div>
                                        </div>
                                        <span class="ns-project-shape-1 ns-project-shape"></span>
                                        <span class="ns-project-shape-2 ns-project-shape"></span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="ns-project-pagination mt-50"></div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- project area end -->

    <!-- cta area start -->
    <div class="ns-cta-area bg-default pt-275 pb-115">
        <span class="ns-cta-shape-1 d-none d-md-block"></span>
        <span class="ns-cta-shape-2 d-none d-md-block"><img
                src="{{ asset('public/frontend/assets/img/cta/shape-2.png') }}" alt="Not Found"></span>
        <div class="ns-cta-play-btn">
            <a href="https://www.youtube.com/watch?v=SopsEuNKyPo" class="popup-video">
                <img class="ns-cta-play-bg" src="{{ asset('public/frontend/assets/img/cta/cta-play-bg.png') }}"
                    alt="Not Found">
                <img class="ns-btn-img" src="{{ asset('public/frontend/assets/img/cta/play-btn.png') }}"
                    alt="Not Found">
            </a>
        </div>
        <img class="ns-cta-map" src="{{ asset('public/frontend/assets/img/cta/cta-map.png') }}" alt="Not Found">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="ns-cta-content">
                        <span class="ns-cta-content-subtitle">{{ __('admin_local.Call To Action') }}</span>
                        {{-- <h2 class="ns-cta-content-title">Contact Some Easy To Steps</h2> --}}
                        @php
                            $contact = \App\Models\Admin\Contact::first();
                        @endphp
                        <span class="ns-cta-contact">{{ __('admin_local.Get Your Quote or Call') }}: <a
                                href="tel:+895400555">{{ $contact->phone }}</a></span>
                        <a href="contact.html" class="ns-theme-btn">{{ __('admin_local.Contact Us') }}<i
                                class="fal fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cta area end -->

    <!-- brand area start -->
    @php
        $partners = \App\Models\Admin\Partner::where([['status', 1], ['delete', 0]])->get();
    @endphp
    @if (count($partners) > 0)
        <div class="ns-brand-area pt-80 pb-80">
            <div class="container">
                <div class="brand-active swiper-container">
                    <div class="swiper-wrapper">

                        @foreach ($partners as $partner)
                            <div class="swiper-slide">
                                <div class="ns-brand-item">
                                    <img class="ns-brand-item-img"
                                        src="{{ asset($partner->partner_image ?? 'public/frontend/assets/img/brand/brand.png') }}"
                                        alt="Not Found">
                                    <img class="ns-brand-item-img-hover"
                                        src="{{ asset($partner->partner_image ?? 'assets/img/brand/brand-hover.png') }}"
                                        alt="Not Found">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
    @php
        $teams = \App\Models\Admin\Team::where([['status', 1], ['delete', 0]])->get();
    @endphp
    @if (count($teams) > 0)
        <section class="ns-team-area pt-110 pb-110">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="ns-section mb-50 text-center">
                            <span class="ns-section-subtitle">{{ __('admin_local.Team Members') }}</span>
                            <h2 class="ns-section-title mb-0">{{ __('admin_local.Amazing Team Members') }}</h2>
                        </div>
                    </div>
                </div>
                <div class="swiper-container team-active">
                    <div class="swiper-wrapper">
                        @foreach ($teams as $team)
                            <div class="swiper-slide">
                                <div class="ns-team-item">
                                    <div class="ns-team-item-img w_img">
                                        <a href="team-details.html"><img
                                                src="{{ asset($team->team_member_image ?? 'public/frontend/assets/img/team/team-1.jpg') }}"
                                                alt=""></a>
                                    </div>
                                    <div class="ns-team-item-content">
                                        <div class="ns-team-social">
                                            <div class="ns-team-social-btn">
                                                <span class="ns-team-social-plus ns-team-social-btn-icon"><i
                                                        class="fal fa-plus"></i></span>
                                                <span class="ns-team-social-minus ns-team-social-btn-icon"><i
                                                        class="fal fa-minus"></i></span>
                                            </div>
                                            <div class="ns-team-social-btn d-none">
                                                <span class="ns-team-social-plus ns-team-social-btn-icon"><i
                                                        class="icofont-plus"></i></span>
                                                <span class="ns-team-social-minus ns-team-social-btn-icon"><i
                                                        class="icofont-minus"></i></span>
                                            </div>
                                            <div class="ns-team-social-icon">
                                                <ul>
                                                    @if ($team->team_member_facebook)
                                                        <li><a target="__blank"
                                                                href="{{ $team->team_member_facebook }}"><i
                                                                    class="fab fa-facebook-f"></i></a></li>
                                                    @endif
                                                    @if ($team->team_member_linkedin)
                                                        <li><a target="__blank"
                                                                href="{{ $team->team_member_linkedin }}"><i
                                                                    class="fab fa-linkedin"></i></a></li>
                                                    @endif
                                                    @if ($team->team_member_instagram)
                                                        <li><a target="__blank"
                                                                href="{{ $team->team_member_instagram }}"><i
                                                                    class="fab fa-instagram"></i></a></li>
                                                    @endif
                                                    @if ($team->team_member_youtube)
                                                        <li><a target="__blank"
                                                                href="{{ $team->team_member_youtube }}"><i
                                                                    class="fab fa-youtube"></i></a></li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="ns-team-item-info">
                                            <h5 class="ns-team-info-title"><a
                                                    href="team-details.html">{{ $team->team_member_name }}</a></h5>
                                            <span>{{ $team->team_member_desig }}</span>
                                        </div>
                                        <div class="ns-team-item-contact px-1">
                                            @if ($team->team_member_phone)
                                                <a href="tel:{{ $team->team_member_phone }}" style="font-size: 14px"><i
                                                        class="icofont-phone"></i>{{ $team->team_member_phone }}</a>
                                            @endif
                                            @if ($team->team_member_phone)
                                                <a href="mailto:{{ $team->team_member_email }}"
                                                    style="font-size: 14px"><i
                                                        class="icofont-envelope-open"></i>{{ $team->team_member_email }}</a>
                                            @endif
                                        </div>
                                    </div>
                                    <span class="ns-team-shape-1 ns-team-shape"></span>
                                    <span class="ns-team-shape-2 ns-team-shape"></span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="ns-team-bottom mt-50">
                        <div class="ns-team-pagination"></div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @php
        $comments = \App\Models\Admin\Comment::where([['status', 1], ['delete', 0]])->get();
    @endphp
    @if (count($comments) > 0)
        <div class="ns-testimonial-area">
            <img class="ns-testimonial-bg d-none d-xl-block"
                src="{{ asset('public/frontend/assets/img/testimonial/testimonial-shape.png') }}" alt="Not Found">
            <div class="ns-testimonial-container container">
                <div class="ns-inner-wrap">
                    <div class="ns-testimonial-space">
                        <div class="ns-has-space">
                            <div class="ns-testimonial-thumb">
                                <div class="swiper-container testimonial-thumb">
                                    <div class="swiper-wrapper">
                                        @foreach ($comments as $comment)
                                            <div class="swiper-slide">
                                                <div class="ns-testimonial-img w_img">
                                                    <img src="{{ asset($comment->image ?? 'public/frontend/assets/img/testimonial/testimonial-1.png') }}"
                                                        alt="Not Found">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="ns-testimonial-single">
                                <div class="ns-testimonial-wrap">
                                    <div class="swiper-container testimonial-active">
                                        <div class="swiper-wrapper">
                                            @foreach ($comments as $comment)
                                                <div class="swiper-slide">
                                                    <div class="ns-testimonial-content">
                                                        <img src="{{ asset('public/frontend/assets/img/testimonial/qoute.png') }}"
                                                            alt="Not Found">
                                                        <p>{!! $comment->comments !!}</p>
                                                        <div class="ns-testimonial-admin">
                                                            <h4 class="ns-testimonial-admin-title">
                                                                {{ $comment->name }}
                                                            </h4>
                                                            <span>{{ $comment->designation }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
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
    @endif
    <!-- testimonial area end -->

    <!-- contact area start -->
    @if ($contact)
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
                                    <img class="ns-contact-shape ns-contact-shape-1"
                                        src="{{ asset('public/frontend/assets/img/contact/contact-map.png') }}"
                                        alt="Not Found">
                                    <img class="ns-contact-shape ns-contact-shape-2"
                                        src="{{ asset('public/frontend/assets/img/contact/contact-map.png') }}"
                                        alt="Not Found">
                                    <img class="ns-contact-shape ns-contact-shape-3"
                                        src="{{ asset('public/frontend/assets/img/contact/contact-map.png') }}"
                                        alt="Not Found">
                                    <div class="ns-contact-item ns-phone">
                                        <div class="ns-contact-item-icon">
                                            <i class="icofont-ui-call"></i>
                                        </div>
                                        <div class="ns-contact-item-details">
                                            <span>{{ __('admin_local.Call Us') }}</span>
                                            <div>
                                                @php
                                                    $cPhone = explode(',', $contact->phone);
                                                @endphp
                                                @foreach ($cPhone as $phone)
                                                    <a href="tel:{{ $phone }}">{{ $phone }}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    @if ($contact->email)
                                        <div class="ns-contact-item ns-mail">
                                            <div class="ns-contact-item-icon">
                                                <i class="icofont-envelope"></i>
                                            </div>
                                            <div class="ns-contact-item-details">
                                                <span>{{ __('admin_local.Mail Us') }}</span>
                                                <div>
                                                    <a
                                                        href="mailto:{{ $contact->email }}
                                                    ">{{ $contact->email }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($contact->address)
                                        <div class="ns-contact-item ns-address">
                                            <div class="ns-contact-item-icon">
                                                <i class="icofont-location-pin"></i>
                                            </div>
                                            <div class="ns-contact-item-details">
                                                <span>{{ __('admin_local.Address') }}</span>
                                                <p>{{ $contact->address }}</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                @if ($contact->location)
                                    <div class="ns-contact-map">
                                        <iframe
                                            src="https://www.google.com/maps/embed?pb={{ $contact->location }}"></iframe>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    @endif

@endsection
