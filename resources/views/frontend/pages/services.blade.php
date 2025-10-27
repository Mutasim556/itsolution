@extends('frontend.layouts.frontend')
@push('title')
    {{ __('admin_local.Capabilities') }}
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
        $services = \App\Models\Admin\Service::where([['status', 1], ['delete', 0]])
            ->orderBy('id', 'DESC')
            ->limit(6)
            ->get();
    @endphp
    @if (count($services) > 0)
        <section class="ns-service-area pt-110 pb-110">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="ns-section mb-50 text-center">
                            <h2 class="ns-section-title mb-0" style="font-size:25px;">{{ __('admin_local.Capabilities') }}
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="ns-service-wrap">
                    <div class="container">
                        <div class="row g-4">
                            @foreach ($services as $key => $service)
                                @if ($key == 3)
                                    <div class="col-12 col-md-3 col-lg-2">

                                    </div>
                                @endif
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="ns-service-item">
                                        <div class="ns-service-img w_img">
                                            <a
                                                href="{{ route('frontEnd.serviceDetails', [\Str::slug($service->service_name) . '?service=' . \Vinkla\Hashids\Facades\Hashids::encode($service->id)]) }}">
                                                <img src="{{ asset($service->service_image ? $service->service_image : 'public/admin/images/images.png') }}"
                                                    alt="Not Found">
                                            </a>
                                        </div>
                                        <div class="ns-service-content">
                                            <h4 class="ns-service-content-title">
                                                <a
                                                    href="{{ route('frontEnd.serviceDetails', [\Str::slug($service->service_name) . '?service=' . \Vinkla\Hashids\Facades\Hashids::encode($service->id)]) }}">
                                                    {{ $service->service_name }}
                                                </a>
                                            </h4>
                                            <p>{!! $service->service_short_details !!}</p>

                                            <a href="{{ route('frontEnd.serviceDetails', [\Str::slug($service->service_name) . '?service=' . \Vinkla\Hashids\Facades\Hashids::encode($service->id)]) }}"
                                                class="ns-service-btn">
                                                {{ __('admin_local.Read More') }}<i class="icofont-plus"></i>
                                            </a>

                                            <div class="ns-service-content-icon">
                                                <img style="border-radius: 30px;" height="60px" width="60px"
                                                    src="{{ asset($service->service_icon ? $service->service_icon : 'public/admin/images/images.png') }}"
                                                    alt="Not Found">
                                            </div>

                                            <span class="ns-service-shape-1"></span>
                                            <span class="ns-service-shape-2"></span>
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
            </div>
        </section>
    @endif
@endsection
