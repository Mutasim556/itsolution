@extends('frontend.layouts.frontend')
@push('title')
    {{ $project->title ?? 'Project Title' }}
@endpush
@push('css')
    <style>
        .ns-brand-item {
            height: 150px !important;
            width: 180px !important;
        }

        img.img-fluid {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        img.img-fluid:hover {
            transform: scale(1.05);
        }

        .breadcrumb-section {
            min-height: 250px;
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .fw-bold {
            color: #fff
        }

        .breadcrumb-section h1 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .breadcrumb-section .breadcrumb {
            background: transparent;
            padding: 0;
            margin-bottom: 0;
        }

        .breadcrumb-section .breadcrumb a {
            color: #f6921e;
            /* accent color */
            text-decoration: none;
        }

        .breadcrumb-section .breadcrumb-item.active {
            color: #fff;
        }

        #p_details ul {
            list-style: square !important;
            margin-left: 20px !important;
        }

        #p_details table {
            border-collapse: collapse !important;
            font-family: Arial, sans-serif !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1) !important;
        }

        #p_details tbody {
            background-color: #f6921e !important;
            color: #fff !important;
        }

        #p_details th,
        #p_details td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        #p_details tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        #p_details tbody tr {
            color: #343a40
        }

        #p_details tbody tr:hover {
            /* background-color: #ffe0a3; */
            /* hover effect */
        }

        #p_details th:first-child,
        #p_details td:first-child {
            text-align: center;
        }

        .project-image {
            width: 400px;
            height: 300px;
            object-fit: cover;
            display: block;
        }
    </style>

    </style>
@endpush
@section('content')
    <section class="breadcrumb-section text-white d-flex align-items-center"
        style="background-color: #343a40; min-height: 250px;">
        <div class="container text-center">
            <h1 class="fw-bold mb-2">{{ $project->title ?? 'Project Title' }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center bg-transparent mb-0">
                    <li class="breadcrumb-item active text-white" aria-current="page">
                        {{ $project->type ?? 'Project Type' }}</li>
                </ol>
            </nav>
        </div>
    </section>


    <section class="py-3 bg-light">
        <div class="container">
            <div class="mb-4" id="p_details">
                <div id="p_details" class="ck-content">
                    <div class="table-responsive">
                        {!! $project->details !!}
                    </div>
                </div>

            </div>
            <div class="row g-3 my-5 ">
                @php
                    $pImages = json_decode($project->images, true);
                @endphp

                @if (!empty($pImages))
                    @foreach ($pImages as $image)
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                            <img src="{{ asset($image) }}" class="project-image rounded" alt="Project Image">
                        </div>
                    @endforeach
                @endif
            </div>

            <!-- YouTube Video -->
            @if (!empty($project->video_link))
                <div class="ratio ratio-16x9 mb-5">
                        {!! $project->video_link !!}
                </div>
            @endif

        </div>
    </section>

@endsection
