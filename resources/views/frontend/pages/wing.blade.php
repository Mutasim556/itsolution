@extends('frontend.layouts.frontend')
@push('title')
    {{ __('admin_local.Wings') }}
@endpush
@push('css')
    <style>
        .news-logo-box {
            width: 100%;
            /* height: 150px; */
            /* Fixed height for uniform boxes */
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: #fff;
            border-radius: 8px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .news-logo-box:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .wing-logo {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            display: block;
        }
    </style>
@endpush
@section('content')

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
                            <a target="__blank" href="{{ $wing->link??'#' }}">
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
