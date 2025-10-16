@extends('frontend.layouts.frontend')
@push('title')
    404 ({{ __('admin_local.Not Found') }})
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
            <!-- error area start -->
            <div class="ns-error-area pt-70 pb-110">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="ns-error-wrap text-center">
                                <div class="ns-error-img">
                                    <img src="{{ asset('public/frontend/assets/img/error/error.png') }}" alt="">
                                </div>
                                <div class="ns-error-content">
                                    <p>{{ $message??__('admin_local.Sorry this page not found.Take a look at our most popular services and projects') }}</p>
                                    <a href="{{ url('/') }}" class="ns-theme-btn">{{ __('admin_local.Go To Home') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- error area end -->
        </main>

@endsection
