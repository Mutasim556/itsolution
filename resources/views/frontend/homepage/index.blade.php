@extends('frontend.layouts.frontend')
@push('title')
    {{ __('admin_local.Home') }}
@endpush
@push('css')
    <style>
        .ns-brand-item {
            height: 139px !important;
            width: 180px !important;
            /* border: 1px solid red; */
        }

        .ns-brand-item-img {
            height: 100%;
            width: 100%;
        }

        .ns-brand-item-img-hover {
            height: 100%;
            width: 100%;
        }

        .ns-team-item {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
            position: relative;
            transition: all 0.3s ease;
        }

        .ns-team-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        }

        .ns-team-item-img img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .ns-team-info-title a {
            color: #000;
            font-weight: 600;
            text-decoration: none;
        }

        .ns-team-info-title a:hover {
            color: #ffab17;
            /* theme color */
        }

        .ns-team-social-icon ul {
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 10px;
            padding: 0;
            margin: 10px 0;
        }

        .ns-team-social-icon ul li a {
            background: #ffab17;
            color: #fff;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }

        .ns-team-social-icon ul li a:hover {
            background: #000;
        }

        .ns-contact-map {
            width: 100%;
            min-height: 500px;
            /* Minimum height for mobile */
            height: 100%;
            /* Full height on desktop */
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .ns-contact-map iframe {
            width: 100%;
            height: 500px;
            border: 0;
        }

        /* Remove grey overlay on slider */
        .ns-banner-single::before,
        .ns-banner-single::after,
        .ns-banner-overlay {
            background: none !important;
            opacity: 0 !important;
        }

        #aboutus_details p {
            color: #fff;
        }

        .ns-cta-play-btn {
            position: absolute;
            left: 0;
            top: -245px;
            width: 210px;
            height: 363px;
            right: 0;
            margin: 0 auto;
        }

        .ns-cta-play-btn a .ns-btn-img {
            bottom: 50px !important;
        }

        .image-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            padding: 100px 120px;
            background-color: #f9f9f9;
            box-sizing: border-box;
        }

        .card {
            position: relative;
            height: 250px;
            background-size: cover;
            background-position: center;
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.4s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card::before {
            content: "";
            position: absolute;
            inset: 0;
            background-color: rgba(0, 0, 0, 0.75);
            /* 👈 reduced opacity for lighter image */
            transition: background-color 0.3s ease;
            z-index: 1;
        }

        .card:hover::before {
            background-color: rgba(0, 0, 0, 0.6);
            /* slightly darker on hover */
        }


        .card:hover {
            transform: scale(1.03);
        }



        .overlay {
            position: relative;
            z-index: 2;
            text-align: center;
            color: #fff;
        }

        .overlay h3 {
            font-size: 24px;
            color: #fff;
            margin-bottom: 20px;
        }

        .overlay button {
            background-color: transparent;
            /* transparent background */
            border: 2px solid #fff;
            /* white border */
            padding: 7px 20px;
            border-radius: 6px;
            color: #fff;
            /* white text */
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            /* smooth hover transition */
        }

        .overlay button:hover {
            background-color: #ffab17;
            /* your theme color on hover */
            border-color: #ffab17;
            /* match border to background */
            color: #fff;
            /* keep text white */
        }

        /* Responsive layout */
        @media (max-width: 992px) {
            .image-grid {
                grid-template-columns: repeat(2, 1fr);
                padding: 40px 30px;
            }
        }

        @media (max-width: 600px) {
            .image-grid {
                grid-template-columns: 1fr;
                padding: 30px 20px;
            }
        }


        .ns-section-title {
            font-size: 25px;
            font-weight: 700;
            color: #222;
            position: relative;
            display: inline-block;
            text-transform: uppercase;
            padding: 0 20px;
            /* spacing between lines and text */
        }

        .ns-section-title::before,
        .ns-section-title::after {
            content: "";
            position: absolute;
            top: 50%;
            width: 80px;
            /* length of the line */
            height: 3px;
            /* thickness */
            background-color: #ffab17;
            /* your theme color */
            transform: translateY(-50%);
        }

        .ns-section-title::before {
            left: -75px;
            /* move line to the left of text */
        }

        .ns-section-title::after {
            right: -75px;
            /* move line to the right of text */
        }

        /* Responsive tweak: shorter lines on small screens */
        @media (max-width: 600px) {

            .ns-section-title::before,
            .ns-section-title::after {
                width: 50px;
            }

            .ns-section-title::before {
                left: -35px;
                /* move line to the left of text */
            }

            .ns-section-title::after {
                right: -35px;
                /* move line to the right of text */
            }

            .ns-section-title {
                font-size: 20px !important;
            }
        }


        @media (max-width: 991.98px) {

            .ns-banner-area .swiper-container,
            .ns-banner-area .swiper-slide {
                height: 60vh;
                /* adjust as needed */
            }

            /* Optional: adjust content vertical alignment */
            .ns-banner-content {
                padding-top: 50px;
                /* reduce padding from top */
            }

            .ns-banner-single {
                background-size: cover;
                /* cover the entire slide */
                background-position: center;
                /* center the image */
                background-repeat: no-repeat;
                /* prevent tiling */
                width: 100%;
                height: 100%;
                /* will take parent height */
            }
        }

        .news-logo-box {
            background: #fff;
            height: 130px;
            /* same height for every box */
            padding-left: 10px;
            padding-right: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .news-logo-box img {
            height: 55px;
            width: auto;
            object-fit: contain;
            display: block;
        }

        .news-logo-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
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
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-7 ">
                                        <div class="ns-banner-content">
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

    @php
        $services = \App\Models\Admin\Service::where([['status', 1], ['delete', 0]])
            ->orderBy('id', 'DESC')
            ->limit(6)
            ->get();
    @endphp
    @if (count($services) > 0)
        <section class="ns-service-area pt-110 pb-110">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="ns-section mb-50 text-center">
                            <h2 class="ns-section-title mb-0" style="font-size:25px;">{{ __('admin_local.Capabilities') }}
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="ns-service-wrap">
                    <div class="container">
                        <div class="row g-4">
                            @foreach ($services as $key => $service)
                                @if ($key == 3)
                                    <div class="col-12 col-md-3 col-lg-2">

                                    </div>
                                @endif
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="ns-service-item">
                                        <div class="ns-service-img w_img">
                                            <a
                                                href="{{ route('frontEnd.serviceDetails', [\Str::slug($service->service_name) . '?service=' . \Vinkla\Hashids\Facades\Hashids::encode($service->id)]) }}">
                                                <img src="{{ asset($service->service_image ? $service->service_image : 'public/admin/images/images.png') }}"
                                                    alt="Not Found">
                                            </a>
                                        </div>
                                        <div class="ns-service-content">
                                            <h4 class="ns-service-content-title">
                                                <a
                                                    href="{{ route('frontEnd.serviceDetails', [\Str::slug($service->service_name) . '?service=' . \Vinkla\Hashids\Facades\Hashids::encode($service->id)]) }}">
                                                    {{ $service->service_name }}
                                                </a>
                                            </h4>
                                            <p>{!! $service->service_short_details !!}</p>

                                            <a href="{{ route('frontEnd.serviceDetails', [\Str::slug($service->service_name) . '?service=' . \Vinkla\Hashids\Facades\Hashids::encode($service->id)]) }}"
                                                class="ns-service-btn">
                                                {{ __('admin_local.Read More') }}<i class="icofont-plus"></i>
                                            </a>

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
                                @if ($key == 4)
                                    <div class="col-12 col-md-3 col-lg-2">

                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @php
        $aboutus = \App\Models\Admin\AboutUs::first();
    @endphp
    @if ($aboutus)
        <div class="ns-cta-area bg-default pt-115 pb-115">
            <span class="ns-cta-shape-1 d-none d-md-block"></span>
            @if ($aboutus->video_link)
                <div class="ns-cta-play-btn">
                    <a href="https://www.youtube.com/watch?v={{ $aboutus->video_link }}" class="popup-video">
                        <img class="ns-cta-play-bg" src="{{ asset('public/frontend/assets/img/cta/cta-play-bg.png') }}"
                            alt="Not Found">
                        <img class="ns-btn-img" src="{{ asset('public/frontend/assets/img/cta/play-btn.png') }}"
                            alt="Not Found">
                    </a>
                </div>
            @endif
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-12">
                        <div class="ns-cta-content">
                            <span class="ns-cta-content-subtitle"
                                style="font-size:40px">{{ $aboutus->company_name }}</span>
                            @php
                                $contact = \App\Models\Admin\Contact::first();
                            @endphp
                            <span class="ns-cta-contact" id="aboutus_details">{!! $aboutus->details !!}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <section class="image-grid">
        <div class="card" style="background-image: url({{ asset('public/frontend/assets/img/ppp/2.jpg') }});">
            <div class="overlay">
                <h3>{{ __('admin_local.Branding') }}</h3>
                <button>{{ __('admin_local.Read More') }}</button>
            </div>
        </div>

        <div class="card" style="background-image: url({{ asset('public/frontend/assets/img/ppp/3.jpg') }});">
            <div class="overlay">
                <h3>{{ __('admin_local.Campaign') }}</h3>
                <button>{{ __('admin_local.Read More') }}</button>
            </div>
        </div>

        <div class="card" style="background-image: url({{ asset('public/frontend/assets/img/ppp/1.jpg') }});">
            <div class="overlay">
                <h3>{{ __('admin_local.Tech') }}</h3>
                <button>{{ __('admin_local.Read More') }}</button>
            </div>
        </div>

        <div class="card" style="background-image: url({{ asset('public/frontend/assets/img/ppp/4.jpg') }});">
            <div class="overlay">
                <h3>{{ __('admin_local.Event') }}</h3>
                <button>{{ __('admin_local.Read More') }}</button>
            </div>
        </div>
    </section>
    @php
        $partners = \App\Models\Admin\Partner::where([['status', 1], ['delete', 0]])->get();
    @endphp
    @if (count($partners) > 0)
        <div class="ns-brand-area pt-80 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="ns-section mb-50 text-center">
                            <h2 class="ns-section-title mb-0" style="font-size:25px;">{{ __('admin_local.Our Brands') }}
                            </h2>
                        </div>
                    </div>
                </div>
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
        $contact = \App\Models\Admin\Contact::first();
    @endphp

    <section class="py-5 bg-light my-5" >
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="ns-section mb-50 text-center">
                        <h2 class="ns-section-title mb-0" style="font-size:25px;">{{ __('admin_local.MEMEBER OF') }}
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row g-4 justify-content-center align-items-center">
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <div class="news-logo-box">
                        <img src="{{ asset('public/frontend/assets/img/pub_dip/bbc.png') }}" class="img-fluid"
                            alt="BBC">
                    </div>
                </div>

                <!-- News Channel 2 -->
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <div class="news-logo-box">
                        <img src="{{ asset('public/frontend/assets/img/pub_dip/cnn.png') }}" style="height: 100%"
                            class="img-fluid" alt="CNN">
                    </div>
                </div>

                <!-- News Channel 3 -->
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <div class="news-logo-box">
                        <img src="{{ asset('public/frontend/assets/img/pub_dip/aljazeera.png') }}" style="height: 100%"
                            class="img-fluid" alt="Al Jazeera">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5 bg-white mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="ns-section mb-50 text-center">
                        <h2 class="ns-section-title mb-0" style="font-size:25px;">
                            {{ __('admin_local.COUNTRY REPRESENTATION') }}
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row g-4 justify-content-center align-items-center">
                <!-- News Channel 1 -->
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <div class="news-logo-box">
                        <img src="{{ asset('public/frontend/assets/img/pub_dip/bbc.png') }}" class="img-fluid"
                            alt="BBC">
                    </div>
                </div>

                <!-- News Channel 2 -->
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <div class="news-logo-box">
                        <img src="{{ asset('public/frontend/assets/img/pub_dip/cnn.png') }}" style="height: 100%"
                            class="img-fluid" alt="CNN">
                    </div>
                </div>

                <!-- News Channel 3 -->
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <div class="news-logo-box">
                        <img src="{{ asset('public/frontend/assets/img/pub_dip/aljazeera.png') }}" style="height: 100%"
                            class="img-fluid" alt="Al Jazeera">
                    </div>
                </div>

                <!-- News Channel 4 -->
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <div class="news-logo-box">
                        <img src="{{ asset('public/frontend/assets/img/pub_dip/bloomberg.png') }}" style="height: 100%"
                            class="img-fluid" alt="bloomberg">
                    </div>
                </div>

                <!-- News Channel 5 -->
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <div class="news-logo-box">
                        <img src="{{ asset('public/frontend/assets/img/pub_dip/euronews.png') }}" style="height: 100%"
                            class="img-fluid" alt="euronews">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- @if ($contact)
        <section class="pt-110 pb-115">
            <div class="container">
                <div class="row g-5 align-items-start">
                    <!-- Contact Form Column -->
                    <div class="col-lg-6">
                        <div class="ns-section mb-35 text-center">
                            <span class="ns-section-subtitle">{{ __('admin_local.Contact Now') }}</span>
                        </div>

                        <div class="ns-contact-form">
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            <form action="{{ route('frontEnd.contactUsStore') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="{{ __('admin_local.Your Name') }} *"
                                            value="{{ old('name') }}" required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12 mb-3">
                                        <input type="tel" name="phone"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            placeholder="{{ __('admin_local.Your Phone') }} *"
                                            value="{{ old('phone') }}" required>
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12 mb-3">
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="{{ __('admin_local.Your Email') }}"
                                            value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12 mb-3">
                                        <textarea name="message" rows="5" class="form-control @error('message') is-invalid @enderror"
                                            placeholder="{{ __('admin_local.Message') }} *" required>{{ old('message') }}</textarea>
                                        @error('message')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <button type="submit"
                                            class="btn ns-theme-btn ns-contact-btn float-end">{{ __('admin_local.Send Request') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Map Column -->
                    <div class="col-lg-6">
                        @if ($contact->location)
                            <div class="ns-contact-map">
                                <iframe src="https://www.google.com/maps/embed?pb={{ $contact->location }}"
                                    frameborder="0" allowfullscreen="" loading="lazy">
                                </iframe>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif --}}

@endsection
