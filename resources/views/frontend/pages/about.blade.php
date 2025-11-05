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

        .ns-cta-area {
            padding-top: 6rem;
            /* ~96px */
            padding-bottom: 6rem;
        }

        @media (max-width: 768px) {
            .ns-cta-area {
                padding-top: 3rem;
                /* ~48px */
                padding-bottom: 3rem;
            }
        }

        .ns-banner-single {
            height: calc(100vh - 0px);
            /* remove padding influence */
            background-size: cover;
            background-position: center;
        }

        .ns-brand-item,
        .news-logo-box {
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            /* prevents image overflow */
        }

        .ns-brand-item img,
        .news-logo-box img {
            max-height: 100%;
            max-width: 100%;
            object-fit: contain;
            /* keeps image inside container */
        }

        html,
        body {
            overflow-x: hidden;
        }
    </style>
@endpush
@section('content')
    @php
        $aboutus = \App\Models\Admin\AboutUs::first();
    @endphp
    @if ($aboutus)
        <div class="row pt-5">
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
                <div class="row ">
                    <div class="col-xl-12">
                        <div class="ns-cta-content" style="text-align:left">
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
@endsection
