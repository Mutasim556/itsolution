@extends('frontend.layouts.frontend')
@push('title')
    {{ __('admin_local.Team Members') }}
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
        $teams = \App\Models\Admin\Team::where([['status', 1], ['delete', 0]])
            ->orderBy('id', 'DESC')
            ->limit(6)
            ->get();
    @endphp
    @if (count($teams) > 0)
        <section class="ns-team-area pt-110 pb-110">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="ns-section mb-50 text-center">
                            <h2 class="ns-section-title mb-0">{{ __('admin_local.Team Members') }}</h2>
                        </div>
                    </div>
                </div>
                <div class="swiper-container ">
                    <div class="swiper-wrapper">
                        <div class="container">
                            <div class="row g-4">
                                @foreach ($teams as $key => $team)
                                    @if ($key == 3)
                                        <div class="col-12 col-md-3 col-lg-2">
                                            &nbsp;
                                        </div>
                                    @endif
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="swiper-slide">
                                            <div class="ns-team-item">
                                                <div class="ns-team-item-img w_img">
                                                    <a
                                                        href="{{ route('frontEnd.teamMemberDetails', [\Str::slug($team->team_member_name) . '?team=' . \Vinkla\Hashids\Facades\Hashids::encode($team->id)]) }}"><img
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
                                                                href="{{ route('frontEnd.teamMemberDetails', [\Str::slug($team->team_member_name) . '?team=' . \Vinkla\Hashids\Facades\Hashids::encode($team->id)]) }}">{{ $team->team_member_name }}</a>
                                                        </h5>
                                                        <span>{{ $team->team_member_desig }}</span>
                                                    </div>
                                                    <div class="ns-team-item-contact px-1 text-center">
                                                        @if ($team->team_member_phone)
                                                            <a href="tel:{{ $team->team_member_phone }}"
                                                                style="font-size: 13px"><i
                                                                    class="icofont-phone"></i>{{ $team->team_member_phone }}</a>
                                                        @endif
                                                        @if ($team->team_member_phone)
                                                            <a href="mailto:{{ $team->team_member_email }}"
                                                                style="font-size: 13px"><i
                                                                    class="icofont-envelope-open"></i>{{ $team->team_member_email }}</a>
                                                        @endif
                                                    </div>
                                                </div>
                                                <span class="ns-team-shape-1 ns-team-shape"></span>
                                                <span class="ns-team-shape-2 ns-team-shape"></span>
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
                    <div class="ns-team-bottom mt-50">
                        <div class="ns-team-pagination"></div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
