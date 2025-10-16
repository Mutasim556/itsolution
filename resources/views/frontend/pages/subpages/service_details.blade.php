@extends('frontend.layouts.frontend')
@push('title')
    {{ __('admin_local.Services') }}
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
    <main>
        <div class="ns-project-details-area pt-115 pb-70">
            <div class="container">
                <u>
                    <h3 class="text-center mb-5">{{ $service->service_name }}</h3>
                </u>
                <div class="row">
                    <div class="col-xl-5 col-lg-5">
                        <div class="ns-project-details-tab pb-15">
                            <ul>
                                <li><a href="#"><span></span>{{ $service->service_name }}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7">
                        <p class="ns-project-details-text">{{ $service->service_short_details }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-5">
                        <div class="ns-project-details-img-2 w_img mb-40">
                            <img src="{{ asset($service->service_image ?? 'public/frontend/assets/img/project/project-details-2.jpg') }}"
                                alt="">
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7 col-md-7">
                        <div class="ns-project-details-content mb-40">
                            <p class="ns-project-details-content-text">{!! $service->service_details !!}</p>
                            {{-- <blockquote class="ns-project-details-quote">
                                <i class="icofont-quote-left"></i>
                                <p>There are many variations of passages of Fasts
                                    by injected humour, or randomised ere we must-have solution to satisfy most.</p>
                            </blockquote>
                            <div class="ns-project-details-list">
                                <ul>
                                    <li><i class="icofont-tick-boxed"></i>Business ndisse suscipit sagittis leo.</li>
                                    <li><i class="icofont-tick-boxed"></i>We gives employer management</li>
                                    <li><i class="icofont-tick-boxed"></i>Media in this area of the solution.</li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @php
            $counting = \App\Models\Admin\Counting::first();
        @endphp
        @if ($counting)
            <div class="ns-counter-area pt-10 pb-85">
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
        @php
            $partners = \App\Models\Admin\Partner::where([['status', 1], ['delete', 0]])->get();
        @endphp
        @if (count($partners) > 0)
            <div class="ns-brand-area pt-80 pb-80">
                <div class="container">
                    <h3 class="text-center">{{ __('admin_local.Here Is Our Honorable Partners') }}</h3>
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
    </main>
@endsection
