@extends('frontend.layouts.frontend')
@push('title')
    {{ __('admin_local.About Us') }}
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
                                        src="{{ asset('public/frontend/assets/img/about/shape-1.png') }}" alt="Not Found">
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
                                                    <a class="ns-about-content-tab-icon" href="{{ route('frontEnd.aboutUs') }}"><i
                                                            class="icofont-life-ring"></i></a>
                                                </div>
                                            </div>
                                            <div class="ns-about-content-tab">
                                                <h5 class="ns-about-content-tab-title"><a
                                                        href="#">{{ __('admin_local.Contact Us') }}</a></h5>
                                                <div>
                                                    <a class="ns-about-content-tab-icon" href="{{ route('frontEnd.contactUs') }}"><i
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
                                                <a class="ns-about-info-inner-btn" href="{{ route('frontEnd.projects') }}"><i
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
                                                href="{{ route('frontEnd.aboutUs') }}">{{ $aboutus->resp_person_name }}</a></h4>
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
                                            <a href="{{ route('frontEnd.serviceDetails',[\Str::slug($service->service_name)."?service=".\Vinkla\Hashids\Facades\Hashids::encode($service->id)]) }}"><img
                                                    src="{{ asset($service->service_image ? $service->service_image : 'public/admin/images/images.png') }}"
                                                    alt="Not Found"></a>
                                        </div>
                                        <div class="ns-service-content">
                                            <h4 class="ns-service-content-title"><a
                                                    href="{{ route('frontEnd.serviceDetails',[\Str::slug($service->service_name)."?service=".\Vinkla\Hashids\Facades\Hashids::encode($service->id)]) }}">{{ $service->service_name }}</a></h4>
                                            <p>{{ $service->service_short_details }}
                                            </p>
                                            <a href="{{ route('frontEnd.serviceDetails',[\Str::slug($service->service_name)."?service=".\Vinkla\Hashids\Facades\Hashids::encode($service->id)]) }}"
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
                </div>
            </div>
        </section>
    @endif

@endsection
