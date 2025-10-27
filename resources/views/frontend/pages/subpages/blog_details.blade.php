@extends('frontend.layouts.frontend')
@push('title')
    {{ $blog->title }}
@endpush
@push('css')
    <style>
        /* Theme Color */
        :root {
            --theme-color: #ffab17;
        }

        .ns-blog-details-section {
            background-color: #f9f9f9;
        }

        .ns-read-more-btn {
            display: inline-block;
            padding: 0.5rem 1.2rem;
            border: 2px solid var(--theme-color);
            color: var(--theme-color);
            border-radius: 0.25rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .ns-read-more-btn:hover {
            background-color: var(--theme-color);
            color: #fff;
            text-decoration: none;
        }

        .ns-blog-content p {
            line-height: 1.8;
            color: #555;
            margin-bottom: 1rem;
        }

        .ns-blog-sidebar h5 {
            border-left: 4px solid var(--theme-color);
            padding-left: 10px;
        }

        .breadcrumb a:hover {
            color: var(--theme-color);
        }

        .d-flex.flex-wrap.justify-content-center.align-items-center>div {
            margin-bottom: 5px;
        }

        .ns-blog-img-wrap {
            width: 100%;
            height: 250px;
            /* Set desired uniform height */
            overflow: hidden;
            border-radius: 10px;
            position: relative;
        }

        .ns-blog-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Ensures full coverage without distortion */
            transition: transform 0.4s ease, opacity 0.4s ease;
            border-radius: 10px;
        }

        .ns-blog-img-wrap:hover img {
            transform: scale(1.05);
            opacity: 0.9;
        }

        /* .fw-bold{
                                    font-size: 25px;
                                    color: white;
                                } */
    </style>
@endpush
@section('content')
    <section class="breadcrumb-section text-white d-flex align-items-center"
        style="background-color: #343a40; min-height: 250px;">
        <div class="container text-center">
            <h3 class="fw-bold mb-2" style="color:white">Blog Details</h3>

        </div>
    </section>


    <section class="ns-blog-details-section py-5">
        <div class="container">
            <div class="row g-4 justify-content-center">
                <!-- Blog Content -->
                <div class="col-lg-12">
                    <div class="ns-blog-details border rounded shadow-sm p-4 bg-white">
                        <!-- Featured Image -->
                        {{-- @php
                            $images = json_decode($blog->images);
                        @endphp --}}
                        {{-- <img src="{{ asset($images[0] ?? 'public/frontend/assets/img/project/project-41.jpg') }}"
                            alt="Blog Image" class="img-fluid rounded mb-4"> --}}

                        <!-- Blog Title -->
                        <h3 class="fw-bold mb-3 text-center">{{ $blog->title }}</h3>

                        <!-- Meta Info -->
                        <div
                            class="d-flex flex-wrap justify-content-center align-items-center mb-4 text-muted small text-center">
                            <div class="me-3">
                                <i class="fas fa-user text-warning"></i>
                                <span>Created by: {{ $blog->admin->name ?? 'Admin' }}</span>
                            </div>
                            <div class="me-3">
                                <i class="far fa-calendar-alt text-warning"></i>
                                <span>{{ $blog->created_at->format('M d, Y') }}</span>
                            </div>
                        </div>


                        <!-- Blog Content -->
                        <div class="ns-blog-content text-right">
                            {!! $blog->details !!}
                        </div>
                        <section class="ns-blog-gallery py-5">
                            <div class="container">
                                <div class="row g-4 justify-content-center">
                                    <!-- Blog Image Item -->
                                    @php
                                        $images = json_decode($blog->images);
                                    @endphp
                                    @foreach ($images as $image)
                                        <div class="col-6 col-md-3">
                                            <div class="ns-blog-img-wrap">
                                                <img src="{{ asset($image) }}" alt="Blog Image" class="img-fluid rounded">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </section>
                        <!-- Read More or Back Button -->
                        <div class="mt-4 text-center">
                            <a href="{{ route('frontEnd.blogs') }}" class="ns-read-more-btn text-uppercase fw-bold">
                                ← Back to Blog
                            </a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection
