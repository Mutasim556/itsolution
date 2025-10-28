@extends('frontend.layouts.frontend')
@push('title')
    {{ __('admin_local.Projects') }}
@endpush
@push('css')
@endpush
@section('content')
    <div class="container" style="padding-top: 60px !important;">
        <div class="row">
            <div class="col-12">
                <div class="ns-section mb-50 text-center">
                    <h2 class="ns-section-title mb-0" style="font-size:25px;">
                        {{ __('admin_local.PROJECTS') }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <section class="image-grid bg-light">

        <div class="card" style="background-image: url({{ asset('public/frontend/assets/img/ppp/2.jpg') }});">
            <div class="overlay">
                <h3>{{ __('admin_local.Branding') }}</h3>
                <a href="{{ route('frontEnd.projects')."?type=Branding" }}">{{ __('admin_local.Read More') }}</a>
            </div>
        </div>

        <div class="card" style="background-image: url({{ asset('public/frontend/assets/img/ppp/3.jpg') }});">
            <div class="overlay">
                <h3>{{ __('admin_local.Campaign') }}</h3>
                <a href="{{ route('frontEnd.projects')."?type=Campaign" }}">{{ __('admin_local.Read More') }}</a>
            </div>
        </div>

        <div class="card" style="background-image: url({{ asset('public/frontend/assets/img/ppp/1.jpg') }});">
            <div class="overlay">
                <h3>{{ __('admin_local.Tech') }}</h3>
                <a href="{{ route('frontEnd.projects')."?type=Tech" }}">{{ __('admin_local.Read More') }}</a>
            </div>
        </div>

        <div class="card" style="background-image: url({{ asset('public/frontend/assets/img/ppp/4.jpg') }});">
            <div class="overlay">
                <h3>{{ __('admin_local.Event') }}</h3>
                <a href="{{ route('frontEnd.projects')."?type=Event" }}">{{ __('admin_local.Read More') }}</a>
            </div>
        </div>
    </section>
@endsection
