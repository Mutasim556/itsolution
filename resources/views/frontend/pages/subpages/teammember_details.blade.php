@extends('frontend.layouts.frontend')
@push('title')
    {{ $teamMs->team_member_name }}
@endpush
@push('css')
    <style>
        .ns-brand-item {
            height: 150px !important;
            width: 180px !important;
        }

        :root {
            --theme-color: #f6921e;
        }

        .ns-team-member-details {
            background-color: #f9f9f9;
        }

        .ns-member-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .ns-member-img:hover img {
            transform: scale(1.05);
        }

        .ns-member-content h2 {
            color: #333;
        }

        .ns-member-content h5 {
            color: var(--theme-color);
        }

        .ns-member-content a {
            color: var(--theme-color);
            text-decoration: none;
        }

        .ns-member-content a:hover {
            text-decoration: underline;
        }

        /* Social Icons */
        .social-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border: 2px solid var(--theme-color);
            border-radius: 50%;
            color: var(--theme-color);
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background-color: var(--theme-color);
            color: #fff;
        }
    </style>
@endpush
@section('content')
    <section class="ns-team-member-details bg-light py-5">
        <div class="container" style="margin-top: 60px !important;">
            <div class="row">
                <div class="col-12">
                    <div class="ns-section mb-50 text-center">
                        <h2 class="ns-section-title mb-0" style="font-size:25px;">
                            {{ __('admin_local.Team Member Details') }}
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">

            <div class="row align-items-center g-5">
                <!-- Member Image -->
                <div class="col-lg-5 text-center">
                    <div class="ns-member-img position-relative overflow-hidden rounded shadow-sm">
                        <img src="{{ asset($teamMs->team_member_image ?? 'public/frontend/assets/img/team/default.jpg') }}"
                            alt="{{ $teamMs->team_member_name }}" class="img-fluid rounded">
                    </div>
                </div>

                <!-- Member Details -->
                <div class="col-lg-7">
                    <div class="ns-member-content">
                        <h3 class="fw-bold mb-2">{{ $teamMs->team_member_name }}</h3>
                        <h5 class="text-muted mb-4">{{ $teamMs->team_member_desig }}</h5>

                        <p class="text-secondary mb-4">
                            {!! $teamMs->team_member_about ??'' !!}
                        </p>

                        <!-- Contact Info -->
                        <ul class="list-unstyled mb-4">
                            <li><strong>Email:</strong> <a href="mailto:{{ $teamMs->team_member_email }}">{{ $teamMs->team_member_email }}</a></li>
                            <li><strong>Phone:</strong> <a href="tel:{{ $teamMs->team_member_phone }}">{{ $teamMs->team_member_phone }}</a></li>
                        </ul>

                        <!-- Social Icons -->
                        <div class="ns-member-social d-flex gap-3">
                            @if ($teamMs->team_member_facebook)
                                <a href="{{ $teamMs->team_member_facebook }}" target="_blank" class="social-link"><i
                                        class="fab fa-facebook-f"></i></a>
                            @endif
                            @if ($teamMs->team_member_youtube)
                                <a href="{{ $teamMs->team_member_youtube }}" target="_blank" class="social-link"><i
                                        class="fab fa-youtube"></i></a>
                            @endif
                            @if ($teamMs->team_member_linkedin)
                                <a href="{{ $teamMs->team_member_linkedin }}" target="_blank" class="social-link"><i
                                        class="fab fa-linkedin-in"></i></a>
                            @endif
                            @if ($teamMs->team_member_instagram)
                                <a href="{{ $teamMs->team_member_instagram }}" target="_blank" class="social-link"><i
                                        class="fab fa-instagram"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
