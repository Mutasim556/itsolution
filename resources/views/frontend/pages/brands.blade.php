@extends('frontend.layouts.frontend')
@push('title')
    {{ __('admin_local.Brands') }}
@endpush
@push('css')
    <style>
        .news-logo-box {
            width: 100%;
            height: 120px;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 0px 0px rgba(0, 0, 0, 0.08);
            border: 0;
        }

        .news-logo-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border: 1px solid lightgrey;
            border-radius: 10px;
            box-shadow: 0 3px 4px rgba(0, 0, 0, 0.08);
        }

        .news-logo-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 0px 0px rgba(0, 0, 0, 0.15);
        }
        .news-logo-box img:hover {
            border: 1px solid #ffab17;
        }
    </style>
@endpush
@section('content')

    @php
        $partners = \App\Models\Admin\Partner::where([['status', 1], ['delete', 0]])->get();
    @endphp
    @if (count($partners) > 0)
        {{-- <div class="ns-brand-area pt-80 pb-80">
            <div class="container">
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
        </div> --}}
        <section class="py-5 bg-white my-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="ns-section mb-50 text-center">
                            <h2 class="ns-section-title mb-0" style="font-size:25px;">
                                {{ __('admin_local.Our Brands') }}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row g-4 justify-content-center align-items-center">
                    @foreach ($partners as $partner)
                        <div class="col-6 col-sm-4 col-md-3 col-lg-3">
                            <div class="news-logo-box ">
                                <img src="{{ asset($partner->partner_image ?? 'public/frontend/assets/img/brand/brand.png') }}"
                                    class="img-fluid" alt="BBC">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
