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
        <section class="ns-team-area ns-team-details-area pt-115 pb-95 p-relative">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-5 col-md-6 col-sm-9">
                        <div class="ns-team-item mb-40 ns-team-details-item">
                            <div class="ns-team-item-img w_img">
                                <a
                                    href="{{ route('frontEnd.teamMemberDetails', [\Str::slug($teamMs->team_member_name) . '?team=' . \Vinkla\Hashids\Facades\Hashids::encode($teamMs->id)]) }}"><img
                                        src="{{ asset($teamMs->team_member_image ?? 'public/frontend/assets/img/team/team-1.jpg') }}"
                                        alt=""></a>
                            </div>
                            <div class="ns-team-item-content ns-team-details-item-content">
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
                                            @if ($teamMs->team_member_facebook)
                                                <li><a target="__blank" href="{{ $teamMs->team_member_facebook }}"><i
                                                            class="fab fa-facebook-f"></i></a></li>
                                            @endif
                                            @if ($teamMs->team_member_linkedin)
                                                <li><a target="__blank" href="{{ $teamMs->team_member_linkedin }}"><i
                                                            class="fab fa-linkedin"></i></a></li>
                                            @endif
                                            @if ($teamMs->team_member_instagram)
                                                <li><a target="__blank" href="{{ $teamMs->team_member_instagram }}"><i
                                                            class="fab fa-instagram"></i></a></li>
                                            @endif
                                            @if ($teamMs->team_member_youtube)
                                                <li><a target="__blank" href="{{ $teamMs->team_member_youtube }}"><i
                                                            class="fab fa-youtube"></i></a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="ns-team-item-info">
                                    <h5 class="ns-team-info-title"><a
                                            href="{{ route('frontEnd.teamMemberDetails', [\Str::slug($teamMs->team_member_name) . '?team=' . \Vinkla\Hashids\Facades\Hashids::encode($teamMs->id)]) }}">{{ $teamMs->team_member_name }}</a>
                                    </h5>
                                    <span>{{ $teamMs->team_member_desig }}</span>
                                </div>
                            </div>
                            <span class="ns-team-shape-1 ns-team-shape"></span>
                            <span class="ns-team-shape-2 ns-team-shape"></span>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-6">
                        <div class="ns-team-details-content">
                            <h5 class="ns-team-details-content-title">{{ __('admin_local.About Me') }}:</h5>
                            <p>{!! $teamMs->team_member_about !!}</p>
                        </div>
                        <div class="ns-team-details-progressbar">
                            @php
                                $team_member_expertise = json_decode($teamMs->team_member_expertise);
                                $team_member_exp_lavel = json_decode($teamMs->team_member_exp_lavel);
                            @endphp
                            @foreach ($team_member_expertise as $key => $value)
                                <div class="ns-team-details-progressbar-item mb-25">
                                    <div class="ns-team-details-progressbar-label mb-15">
                                        <h5 class="ns-team-details-progressbar-label-title">+ {{ $value }}</h5>
                                        <span>{{ $team_member_exp_lavel[$key] }}</span>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar w-{{ $team_member_exp_lavel[$key] }} wow slideInLeft"
                                            role="progressbar" aria-valuenow="{{ $team_member_exp_lavel[$key] }}"
                                            aria-valuemin="0" aria-valuemax="100" data-wow-duration="2s"
                                            data-wow-delay=".1s">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="ns-team-details-contact mb-30">
                            <div class="row">
                                 @if ($teamMs->team_member_phone)
                                <div class="col-xl-5 col-lg-5 col-md-12 col-sm-5">
                                    <div class="ns-team-details-contact-item mb-10">
                                        <span><i class="icofont-ui-call"></i></span>
                                        <a style="font-size: 16px;" href="tel:{{ $teamMs->team_member_phone }}">{{ $teamMs->team_member_phone }}</a>
                                    </div>
                                </div>
                                @endif
                                @if ($teamMs->team_member_email)
                                <div class="col-xl-7 col-lg-7 col-md-12 col-sm-7">
                                    <div class="ns-team-details-contact-item mb-10">
                                        <span><i class="icofont-email"></i></span>
                                        <a style="font-size: 16px;" href="mailto:{{ $teamMs->team_member_email }}">{{ $teamMs->team_member_email }}</a>
                                    </div>
                                </div>
                                @endif
                                 @if ($teamMs->team_member_address)
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="ns-team-details-contact-item">
                                        <span><i class="icofont-location-pin"></i></span>
                                        <p style="font-size: 16px;">{{ $teamMs->team_member_address }}</p>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-12">
                        <div class="ns-team-details-text">
                            <p>The majority have suffered alteration in some form, by injected humour, or randomised words
                                which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum,
                                you need to be sure there isn't anything embarr assing hidden in ge editors now the middle
                                of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunk
                                readable content of a page when looking at its layout. The point of using Lorem Ipsum is
                                that it has a more-or-less normal distribution of letters, as opposed to using' Content
                                here, content here', making it look like readable English.</p>
                        </div>
                    </div> --}}
                </div>
            </div>
        </section>
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
                                <h2 class="ns-section-title mb-0">{{ __('admin_local.This is the numbers , that we have done') }}</h2>
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
