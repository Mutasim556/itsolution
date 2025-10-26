@extends('frontend.layouts.frontend')
@push('title')
    {{ __('admin_local.Home') }}
@endpush
@push('css')
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
    @php
        $members = \App\Models\Admin\Member::where([['delete', 0], ['status', 1]])->get();
    @endphp
    @if (count($members) > 0)
        <section class="py-5 bg-light my-5">
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
                            <img src="{{ asset($member->logo??'public/frontend/assets/img/pub_dip/bbc.png') }}" style="height: 100%" class="img-fluid"
                                alt="BBC">
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
