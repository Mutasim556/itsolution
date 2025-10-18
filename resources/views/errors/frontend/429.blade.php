@extends('frontend.layouts.frontend')
@push('title')
    429 ({{ __('admin_local.Too Many Request') }})
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
                                    <img src="{{ asset('public/frontend/assets/img/error/429.jpg') }}" alt="">
                                </div>
                                <div class="ns-error-content">
                                    <p>{{ $message??__('admin_local.Sorry ! too many request to process.Please try after 1 minutes') }}</p>
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
