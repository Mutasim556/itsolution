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
        <div class="row mt-5">
            <div class="col-12">
                <div class="ns-section mb-50 text-center">
                    <h2 class="ns-section-title mb-0" style="font-size:25px;">{{ __('admin_local.About Us') }}
                    </h2>
                </div>
            </div>
        </div>
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
                            <span class="ns-cta-content-subtitle" style="font-size:40px">{{ $aboutus->company_name }}</span>
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
@endsection
