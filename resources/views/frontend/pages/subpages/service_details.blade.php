@extends('frontend.layouts.frontend')

@push('title')
    {{ $service->service_name ?? 'Service Details' }}
@endpush

@push('css')
    <style>
        /* Breadcrumb Section */
        .breadcrumb-section {
            min-height: 250px;
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            position: relative;
            color: #fff;
        }

        .breadcrumb-section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .breadcrumb-section .container {
            position: relative;
            text-align: center;
            z-index: 2;
        }

        .breadcrumb-section h1 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .breadcrumb-section .breadcrumb {
            background: transparent;
            margin-bottom: 0;
            padding: 0;
        }

        .breadcrumb-section .breadcrumb a {
            color: #f6921e;
            text-decoration: none;
        }

        .breadcrumb-section .breadcrumb-item.active {
            color: #fff;
        }

        /* Service Content Section */
        .service-details {
            padding: 60px 0;
        }

        .service-details .service-image {
            width: 100%;
            /* height: 100%; */
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 30px;
        }

        .service-details .service-description img {
            max-width: 100%;
            height: auto;
        }

        .service-details .service-description {
            font-size: 16px;
            line-height: 1.8;
            color: #333;
        }

        /* Responsive Video */
        .ratio iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        /* Features List */
        .feature-list {
            margin-top: 30px;
        }

        .feature-list li {
            margin-bottom: 10px;
            padding-left: 25px;
            position: relative;
        }

        .feature-list li::before {
            content: "✓";
            position: absolute;
            left: 0;
            color: #f6921e;
            font-weight: bold;
        }
    </style>
@endpush

@section('content')
    <!-- Breadcrumb Section -->
    <section class="breadcrumb-section"
        style="background-image: url('{{ asset($service->banner_image ?? 'frontend/images/service-banner.jpg') }}');">
        <div class="container">
            <h1 style="color:white">{{ $service->service_name ?? 'Service Title' }}</h1>

        </div>
    </section>

    <!-- Service Details Section -->
    <section class="service-details bg-light">
        <div class="container">
            <div class="row align-items-start">
                <!-- Left Column: Details -->
                <div class="col-lg-8 mb-4">
                    <!-- Service Image -->


                    <!-- Service Description (CKEditor content) -->
                    <div class="service-description" id="service_description">
                        {!! $service->service_details ?? '<p>Service description goes here...</p>' !!}
                    </div>

                    <!-- YouTube Video -->
                    @if (!empty($service->video_link))
                        <div class="ratio ratio-16x9 mt-4">
                            <iframe src="{{ $service->video_link }}" title="Service Video" allowfullscreen></iframe>
                        </div>
                    @endif
                </div>

                <!-- Right Column: Features -->
                <div class="col-lg-4">
                    {{-- <div class="card shadow-sm border-0 p-4"> --}}
                        @if (!empty($service->service_image))
                            <img src="{{ asset($service->service_image) }}" class="service-image"
                                alt="{{ $service->service_name }}">
                        @endif
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </section>
@endsection
