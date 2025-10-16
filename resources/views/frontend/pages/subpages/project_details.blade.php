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
    <main>
        <div class="ns-project-details-area pt-115 pb-70">
            <div class="container">
                <div class="row">

                    {{-- <div class="col-xl-5 col-lg-5">
                        @php
                            $projects = \App\Models\Admin\Project::where([
                                ['status', 1],
                                ['delete', 0],
                                // ['id', '!=', $project->id],
                            ])
                                ->orderBy('id', 'desc')
                                ->limit(5)
                                ->get();
                        @endphp
                        @if (count($projects) > 0)
                            <div class="ns-project-details-tab pb-15 pt-10" style="border: 1px solid lightgrey">
                                <u>
                                    <h4 class="text-center">{{ __('admin_local.Other Projects') }}</h4>
                                </u>
                                <ul>

                                    @foreach ($projects as $value)
                                        <li><a style="font-size: 18px"
                                                href="#"><span></span>{{ $value->project_name }}</a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        @endif
                    </div> --}}

                    <div class="col-12">
                        <u>
                            <h3 class="text-center">{{ $project->project_name }}</h3>
                        </u>
                    </div>
                    <div class="col-8">
                        <p class="ns-project-details-text">{!! $project->project_details !!}</p>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="ns-project-details-img pb-50">
                            @php
                                $projectImages = json_decode($project->project_images);
                            @endphp
                            <img style="float:right"
                                src="{{ asset($projectImages[0] ?? 'assets/img/project/project-details-1.jpg') }}"
                                alt="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-5">
                        <div class="ns-project-details-img-2 w_img mb-40">
                            <img src="{{ asset($projectImages[1] ?? 'assets/img/project/project-details-1.jpg') }}"
                                alt="">
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7 col-md-7">
                        <div class="ns-project-details-content mb-40">
                            {{-- <p class="ns-project-details-content-text">In job gives you handcrafted options such as front
                                adm in psum, you need to be sure
                                the middle of text. All the Lorem Ipsum generators on the Internet tend to
                                repeat looking at its layout.</p> --}}
                            <blockquote class="ns-project-details-quote mt-3" style="max-width: 100%">
                                <i class="icofont-quote-left"></i>
                                <p>{{ $project->project_quotes }}</p>
                            </blockquote>
                            @php
                                $projectPoints = json_decode($project->project_points);
                            @endphp
                            @if (count($projectPoints) > 0)
                                <div class="ns-project-details-list">
                                    <ul>

                                        @foreach ($projectPoints as $projectPoint)
                                            <li><i class="icofont-tick-boxed"></i>{{ $projectPoint }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @php
            $counting = \App\Models\Admin\Counting::first();
        @endphp
        @if ($counting)
            <div class="ns-counter-area pt-10 pb-85">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="ns-section mb-50 text-center">
                                <span class="ns-section-subtitle">{{ __('admin_local.What we do?') }}</span>
                                <h2 class="ns-section-title mb-0">{{ __('This is the numbers , that we have done') }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <div class="ns-counter-item mb-65">
                                <div class="ns-counter-item-content">
                                    <h2 class="ns-counter-title"><span class="odometer counter_count"
                                            data-count="{{ $counting->counting1_value }}">00</span><span
                                            class="ns-counter-plus">+</span></h2>
                                    <span class="ns-counter-subtitle">{{ $counting->counting1_name }}</span>
                                    <div class="ns-counter-icon">
                                        <i class="icofont-life-ring"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <div class="ns-counter-item mb-65">
                                <div class="ns-counter-item-content">
                                    <h2 class="ns-counter-title"><span class="odometer counter_count"
                                            data-count="{{ $counting->counting2_value }}">00</span><span
                                            class="ns-counter-plus">+</span></h2>
                                    <span class="ns-counter-subtitle">{{ $counting->counting2_name }}</span>
                                    <div class="ns-counter-icon">
                                        <i class="icofont-site-map"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <div class="ns-counter-item mb-65">
                                <div class="ns-counter-item-content">
                                    <h2 class="ns-counter-title"><span class="odometer counter_count"
                                            data-count="{{ $counting->counting3_value }}">00</span><span
                                            class="ns-counter-plus">+</span></h2>
                                    <span class="ns-counter-subtitle">{{ $counting->counting3_name }}</span>
                                    <div class="ns-counter-icon">
                                        <i class="icofont-institution"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <div class="ns-counter-item mb-65">
                                <div class="ns-counter-item-content">
                                    <h2 class="ns-counter-title"><span class="odometer counter_count"
                                            data-count="{{ $counting->counting4_value }}">00</span><span
                                            class="ns-counter-plus">+</span></h2>
                                    <span class="ns-counter-subtitle">{{ $counting->counting4_name }}</span>
                                    <div class="ns-counter-icon">
                                        <i class="icofont-live-support"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </main>
@endsection
