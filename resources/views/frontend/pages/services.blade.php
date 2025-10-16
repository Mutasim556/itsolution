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
    @php
        $services = \App\Models\Admin\Service::where([['status', 1], ['delete', 0]])->get();
    @endphp
    @if (count($services)>0)
        <section class="ns-service-area-2 pt-110 pb-25 p-relative">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="ns-section mb-50 text-center">
                            <span class="ns-section-subtitle">{{ __('admin_local.What We Do') }}</span>
                            <h2 class="ns-section-title mb-0">{{ __('admin_local.Here is our best services') }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($services as $service)
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="ns-service-item ns-service-item-2 mb-30">
                                <div class="ns-service-img ns-service-img-2 w_img">
                                    <a href="service.html"><img
                                            src="{{ asset($service->service_image ? $service->service_image : 'public/admin/images/images.png') }}"
                                            alt="Not Found"></a>
                                    <div class="ns-service-content-icon ns-service-content-icon-2">
                                        <img height="60px" width="60px"
                                            src="{{ asset($service->service_icon ? $service->service_icon : 'public/admin/images/images.png') }}"
                                            alt="Not Found">
                                    </div>
                                </div>
                                <div class="ns-service-content ns-service-content-2">
                                    <h4 class="ns-service-content-title ns-service-content-title-2"><a
                                            href="project-details.html">{{ $service->service_name }}</a></h4>
                                    <p>{!! $service->service_short_details !!} {{  \Str::slug($service->service_name) }}</p>
                                    <a href="{{ route('frontEnd.serviceDetails',[\Str::slug($service->service_name)."?service=".\Vinkla\Hashids\Facades\Hashids::encode($service->id)]) }}" class="ns-service-btn ns-service-btn-2">{{ __('admin_local.Read More') }}<i
                                            class="icofont-plus"></i></a>
                                    <span class="ns-service-shape-1 ns-service-shape-21"></span>
                                    <span class="ns-service-shape-2 ns-service-shape-22"></span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
