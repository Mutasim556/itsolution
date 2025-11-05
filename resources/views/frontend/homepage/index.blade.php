@extends('frontend.layouts.frontend')
@push('title')
    {{ __('admin_local.Home') }}
@endpush
@push('css')
    <style>
        .bg-light {
            background: #f1f0ef !important;
        }

        .ns-slider-area {
            position: relative;
            overflow: hidden;
        }

        .ns-slider-single {
            background-size: cover !important;
            background-position: center center !important;
            background-repeat: no-repeat !important;
            width: 100%;
            height: 110vh;
            display: flex;
            align-items: center;
            position: relative;
        }


        .ns-slider-content {
            position: relative;
            z-index: 2;
            color: #fff;
        }

        .ns-slider-title {
            font-size: 3rem;
            font-weight: 700;
            line-height: 1.2;
            color: #fff;
        }

        .ns-slider-text {
            font-size: 1.1rem;
            margin-top: 1rem;
            color: #f1f1f1;
        }

        .ns-theme2-btn {
            background: #ff6b00;
            color: #fff;
            padding: 12px 25px;
            border-radius: 30px;
            display: inline-block;
            transition: 0.3s;
        }

        .ns-theme2-btn:hover {
            background: #e95c00;
            color: #fff;
        }

        .ns-play-btn {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            border: 2px solid #fff;
            color: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-left: 15px;
            transition: 0.3s;
        }

        .ns-play-btn:hover {
            background: #ff6b00;
            border-color: #ff6b00;
        }

        /* Dots (pagination) styling */
        .swiper-pagination-bullet {
            background: #fff;
            opacity: 0.6;
            width: 10px;
            height: 10px;
            margin: 0 6px !important;
            transition: all 0.3s ease;
        }

        .swiper-pagination-bullet-active {
            background: #ff6b00;
            opacity: 1;
            transform: scale(1.2);
        }

        .swiper-pagination {
            bottom: 30px !important;
            text-align: center;
        }

        @media(max-width:601px) {
            .ns-slider-single {
                background-size: cover !important;
                background-position: center center !important;
                background-repeat: no-repeat !important;
                width: 100%;
                height: 50vh;
                /* 50% of screen height */
                display: flex;
                align-items: center;
                justify-content: center;
                position: relative;
                overflow: hidden;
                /* prevent overflow issues */
            }
        }
    </style>
@endpush
@section('content')
    <!-- banner area start -->
    <section class="ns-slider-area relative">
        <div class="swiper-container ns-slider-active">
            <div class="swiper-wrapper">
                @php
                    $sliders = \App\Models\Admin\HomepageSilder::where([['status', 1], ['delete', 0]])->get();
                @endphp
                @foreach ($sliders as $slider)
                    <div class="swiper-slide">
                        <div class="ns-slider-single"
                            style="background-image: url('{{ asset('public/' . $slider->slider_image) }}');">
                            {{-- <div class="ns-slider-overlay"></div> --}}
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-7 col-lg-8 col-md-10">
                                        <div class="ns-slider-content">
                                            @if ($slider->slider_title)
                                                <h2 class="ns-slider-title animate__animated animate__fadeInDown">
                                                    {{ $slider->slider_title }}
                                                </h2>
                                            @endif

                                            @if ($slider->slider_short_description)
                                                <p
                                                    class="ns-slider-text animate__animated animate__fadeInUp animate__delay-1s">
                                                    {{ $slider->slider_short_description }}
                                                </p>
                                            @endif

                                            <div class="ns-slider-btns mt-4">
                                                @if ($slider->slider_link)
                                                    <a href="{{ $slider->slider_link }}"
                                                        class="ns-theme-btn animate__animated animate__fadeInUp animate__delay-2s">
                                                        {{ $slider->slider_button_text ?? 'Learn More' }}
                                                        <i class="fal fa-arrow-right"></i>
                                                    </a>
                                                @endif

                                                @if ($slider->slider_video)
                                                    <a href="https://www.youtube.com/watch?v={{ $slider->slider_video }}"
                                                        class="ns-play-btn popup-video animate__animated animate__fadeInUp animate__delay-3s">
                                                        <i class="fas fa-play"></i>
                                                    </a>
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

            <!-- Dots only -->
            <div class="swiper-pagination"></div>
        </div>
    </section>




    @php
        $services = \App\Models\Admin\Service::where([['status', 1], ['delete', 0]])
            ->orderBy('id', 'DESC')
            ->limit(6)
            ->get();
    @endphp
    @if (count($services) > 0)
        <section class="ns-service-area bg-light pt-110 pb-110">
            <div class="container">
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
                                                <img style="border-radius: 30px;" height="60px" width="60px"
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
                <div class="row">
                    <div class="col-xl-12">
                        <div class="ns-cta-content" style="text-align:left;">
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
    <section class="image-grid bg-light">
        <div class="card" style="background-image: url({{ asset('public/frontend/assets/img/ppp/2.jpg') }});">
            <div class="overlay">
                <h3>{{ __('admin_local.Branding') }}</h3>
                <a href="{{ route('frontEnd.projects') . '?type=Branding' }}">{{ __('admin_local.Read More') }}</a>
            </div>
        </div>

        <div class="card" style="background-image: url({{ asset('public/frontend/assets/img/ppp/3.jpg') }});">
            <div class="overlay">
                <h3>{{ __('admin_local.Campaign') }}</h3>
                <a href="{{ route('frontEnd.projects') . '?type=Campaign' }}">{{ __('admin_local.Read More') }}</a>
            </div>
        </div>

        <div class="card" style="background-image: url({{ asset('public/frontend/assets/img/ppp/1.jpg') }});">
            <div class="overlay">
                <h3>{{ __('admin_local.Tech') }}</h3>
                <a href="{{ route('frontEnd.projects') . '?type=Tech' }}">{{ __('admin_local.Read More') }}</a>
            </div>
        </div>

        <div class="card" style="background-image: url({{ asset('public/frontend/assets/img/ppp/4.jpg') }});">
            <div class="overlay">
                <h3>{{ __('admin_local.Event') }}</h3>
                <a href="{{ route('frontEnd.projects') . '?type=Event' }}">{{ __('admin_local.Read More') }}</a>
            </div>
        </div>
    </section>
    @php
        $partners = \App\Models\Admin\Partner::where([['status', 1], ['delete', 0]])->get();
    @endphp
    @if (count($partners) > 0)
        <div class="ns-brand-area bg-light pt-80 pb-80">
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
        $wings = \App\Models\Admin\Wing::where([['delete', 0], ['status', 1]])->get();
    @endphp
    @if (count($wings) > 0)
        <section class="py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="ns-section mb-50 text-center">
                            <h2 class="ns-section-title mb-0" style="font-size:25px;">
                                {{ __('admin_local.Our Wings') }}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row g-4 justify-content-center align-items-center">
                    @foreach ($wings as $wing)
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                            <a target="__blank" href="{{ $wing->link ?? '#' }}">
                                <div class="news-logo-box">
                                    <img src="{{ asset($wing->logo ?? 'public/frontend/assets/img/pub_dip/bbc.png') }}"
                                        style="height: 100%" class="img-fluid" alt="BBC">
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    @php
        $contact = \App\Models\Admin\Contact::first();
    @endphp
    @php
        $members = \App\Models\Admin\Member::where([['delete', 0], ['status', 1]])->get();
    @endphp
    @if (count($members) > 0)
        <section class="py-5 bg-light">
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
                    @foreach ($members as $member)
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                            <div class="news-logo-box">
                                <img src="{{ asset($member->logo ?? 'public/frontend/assets/img/pub_dip/bbc.png') }}"
                                    style="height: 100%" class="img-fluid" alt="BBC">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    @php
        $countries = \App\Models\Admin\CountryRepresentation::where([['delete', 0], ['status', 1]])->get();
    @endphp
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="ns-section mb-50 text-center">
                        <h2 class="ns-section-title mb-0" style="font-size:25px;">
                            {{ __('admin_local.Public Diplomacy') }}
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row g-4 justify-content-center align-items-center">
                @foreach ($countries as $country)
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                        <div class="news-logo-box">
                            <img src="{{ asset($country->logo ?? 'public/frontend/assets/img/pub_dip/bbc.png') }}"
                                style="height: 100%" class="img-fluid" alt="BBC">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


@endsection

@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const sliderContainer = document.querySelector(".ns-slider-active .swiper-wrapper");
            const slides = sliderContainer.querySelectorAll(".swiper-slide");

            // 👇 Duplicate if only one slide (so it keeps sliding)
            if (slides.length === 1) {
                const clone = slides[0].cloneNode(true);
                sliderContainer.appendChild(clone);
            }

            // ✅ Initialize Swiper
            new Swiper(".ns-slider-active", {
                loop: true,
                autoplay: {
                    delay: 5000, // ⏱ 5 seconds
                    disableOnInteraction: false,
                    reverseDirection: false, // false = right → left
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                speed: 1000, // smooth transition
                direction: "horizontal", // 👈 ensures horizontal sliding
                effect: "slide", // 👈 slide instead of fade
            });
        });
    </script>
@endpush
