@extends('frontend.layouts.frontend')
@push('title')
    {{ __('admin_local.Projects') }}
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
        $projects = \App\Models\Admin\Project::where([['status', 1], ['delete', 0]])->get();
    @endphp
    @if (count($projects) > 0)
        <section class="ns-project-area pt-110 pb-25 ns-project-page">
            <div class="container container-custom-3">
                <div class="row">
                    <div class="col-12">
                        <div class="ns-section mb-50 text-center">
                            <span class="ns-section-subtitle">Our Projects</span>
                            <h2 class="ns-section-title mb-0">We Case Studies Best Work</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($projects as $project)
                    @php
                        $projectImages = json_decode($project->project_images);
                    @endphp
                    <div class="col-xxl-3 col-xl-4 col-lg-4 order-lg-2 order-xxl-0 col-md-6">
                        <div class="ns-project-item mb-30">
                            <div class="ns-project-img w_img">
                                <img src="{{ asset($projectImages[0] ?? 'assets/img/project/project-1.jpg') }}" alt="Not Found">
                            </div>
                            <div class="ns-project-content">
                                <div class="ns-project-content-info">
                                    <h4 class="ns-project-content-title"><a href="{{ route('frontEnd.projectDetails',[\Str::slug($project->project_name)."?project=".\Vinkla\Hashids\Facades\Hashids::encode($project->id)]) }}">{{ $project->project_name }}</a>
                                    </h4>
                                    <span>{{ $project->project_category }}</span>
                                </div>
                                <div class="ns-project-content-btn">
                                    <a href="{{ route('frontEnd.projectDetails',[\Str::slug($project->project_name)."?project=".\Vinkla\Hashids\Facades\Hashids::encode($project->id)]) }}"><i class="fas fa-chevron-circle-right"></i></a>
                                </div>
                            </div>
                            <span class="ns-project-shape-1 ns-project-shape"></span>
                            <span class="ns-project-shape-2 ns-project-shape"></span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
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
@endsection
