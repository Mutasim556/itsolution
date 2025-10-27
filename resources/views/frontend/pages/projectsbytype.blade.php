@extends('frontend.layouts.frontend')
@push('title')
     {{ request()->get('type') }}
@endpush
@push('css')
    <style>
        .fixed-card {
            width: 400px;
            height: 380px;
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background-color: #fff;
        }

        .fixed-card img {
            width: 100%;
            height: 300px;
            width: 400px;
            object-fit: cover;
            display: block;
        }

        .blog-card:hover .fixed-card {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        /* ensure no overlay / opacity */
        .blog-card,
        .fixed-card,
        .fixed-card img {
            opacity: 1 !important;
            background: none !important;
        }

        .card::before {
            content: "";
            position: absolute;
            inset: 0;
            background-color: rgba(0, 0, 0, 0);
            /* 👈 reduced opacity for lighter image */
            transition: background-color 0.3s ease;
            z-index: 1;
        }

        .card:hover::before {
            background-color: rgba(0, 0, 0, 0.2);
            /* slightly darker on hover */
        }

        .custom-badge {
            background-color: #f6921e;
            color: #fff;
            font-weight: 500;
            padding: 0.35rem 0.65rem;
            border-radius: 0.5rem;
            font-size: 0.85rem;
        }
    </style>
@endpush
@section('content')
    <section class="py-5 bg-light">
        <div class="container" style="padding-bottom: 50px !important;">
            <div class="container" style="margin-top: 60px !important;">
                <div class="row">
                    <div class="col-12">
                        <div class="ns-section mb-50 text-center">
                            <h2 class="ns-section-title mb-0" style="font-size:25px;">
                                {{ strtoupper(request()->get('type')) }}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                @foreach ($projects as $project)
                    <div class="col-md-4 col-sm-6">
                        <a href="{{ route('frontEnd.projectDetails',[\Str::slug($project->title)."?project=".\Vinkla\Hashids\Facades\Hashids::encode($project->id)]) }}" class="text-decoration-none blog-card">
                            <div class="card border-0 shadow-sm h-100">
                                @php
                                    $pImages = json_decode($project->images, true);
                                    $image = isset($pImages[0]) ? $pImages[0] : 'placeholder.jpg';
                                @endphp

                                <div class="position-relative">
                                    <img src="{{ asset($image) }}" class="card-img-top" alt="{{ $project->title }}">

                                    <!-- Badge -->
                                    <span class="custom-badge position-absolute top-1 end-0 m-2">
                                        {{ strtoupper(request()->get('type')) }}
                                    </span>
                                </div>

                                <div class="card-body text-center">
                                    <h5 class="card-title text-dark mb-2" style="font-size: 20px;">
                                        {{ $project->title }}
                                    </h5>
                                    {{-- <small class="text-muted">{{ date('F d, Y', strtotime($project->created_at)) }}</small> --}}
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
@endsection
