@extends('frontend.layouts.frontend')
@push('title')
    {{ __('admin_local.Innovation and Tech') }}
@endpush
@push('css')
    <style>
        .ns-logo-section {
            background-color: #313131;
        }

        .ns-logo-link {
            display: block;
            color: inherit;
            text-decoration: none;
        }

        .ns-logo-card {
            border: 2px solid #f6921e;
            border-radius: 14px;
            background-color: #fff;
            transition: 0.3s ease;
            height: 100%;
        }

        .ns-logo-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 6px 14px rgba(255, 171, 23, 0.35);
        }

        /* 👇 Active div style */
        .ns-logo-card.active {
            background-color: #f6921e;
            color: #fff;
            box-shadow: 0 0 15px rgba(255, 171, 23, 0.6);
        }

        .ns-logo-card.active .ns-logo-name {
            color: #fff;
        }

        .ns-logo-img {
            height: 110px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .ns-logo-img img {
            max-height: 100px;
            object-fit: contain;
        }

        .ns-logo-name {
            font-weight: 800;
            color: #333;
            font-size: 16px;
        }

        .ns-news-section {
            background-color: #fffaf3;
        }

        .ns-news-card {
            border: 1px solid #eee;
            border-radius: 20px 0px 20px 0px;
            /* 🔸 top-left & bottom-right rounded */
            overflow: hidden;
            background-color: #fff;
            transition: 0.3s ease;
            height: 100%;
            position: relative;
        }

        .ns-news-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 6px 14px rgba(255, 171, 23, 0.3);
            border-color: #f6921e;
        }

        .ns-news-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* ✅ makes image fill the div properly */
            object-position: center;
            /* centers the image */
            display: block;
        }

        .ns-news-badge {
            position: absolute;
            top: 12px;
            right: 12px;
            background-color: #3a3a3a;
            color: #fff;
            font-size: 14px;
            padding: 4px 10px;
            border-radius: 10px;
            font-weight: 600;
        }


        .ns-news-title {
            font-size: 18px;
            font-weight: 700;
            color: #222;
            line-height: 1.4;
        }

        .ns-news-author {
            color: #666;
            font-size: 14px;
        }

        .ns-theme-btn {
            background-color: transparent;
            /* transparent background */
            color: #f6921e;
            /* theme color text */
            border: 2px solid #f6921e;
            /* theme color border */
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .ns-theme-btn:hover {
            background-color: #f6921e;
            /* fill with theme color on hover */
            color: #fff;
            /* white text on hover */
            transform: scale(1.05);
            /* subtle hover animation */
        }

        .ns-read-more-btn {
            display: inline-block;
            padding: 0.5rem 1.2rem;
            border: 2px solid #f6921e;
            color: #f6921e;
            border-radius: 0.25rem;
            text-decoration: none;
            transition: all 0.3s ease;
            max-width: 160px;
            /* <-- Set the desired width */
            font-size: 16px !important;
            text-align: center;
            margin-top: 20px !important;
        }

        .ns-read-more-btn:hover {
            background-color: #f6921e;
            color: #fff;
            text-decoration: none;
        }
    </style>
@endpush
@section('content')
    <div class="container" style="margin-top: 60px !important;">
        <div class="row">
            <div class="col-12">
                <div class="ns-section mb-50 text-center">
                    <h2 class="ns-section-title mb-0" style="font-size:25px;">
                        {{ __('admin_local.Innovation and Tech') }}
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <section class="ns-news-section py-5 my-4">
        <div class="container">
            <div class="row g-4 justify-content-center" id="project-container">
                @foreach ($blogs as $blogKey => $blog)
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <a href="{{ route('frontEnd.blogDetails',[\Str::slug($blog->title)."?blog=".\Vinkla\Hashids\Facades\Hashids::encode($blog->id)]) }}" class="ns-news-link text-decoration-none">
                            <div class="ns-news-card">
                                <div class="ns-news-img position-relative">
                                    @php
                                        $images = json_decode($blog->images);
                                    @endphp
                                    <img src="{{ asset($images[0] ?? 'public/frontend/assets/img/project/project-41.jpg') }}"
                                        alt="News Image" class="img-fluid">
                                    {{-- <span class="ns-news-badge">{{ $blog->country->name }}</span> --}}
                                </div>
                                <div class="ns-news-footer d-flex justify-content-between px-3 pb-3">
                                    <div class="ns-news-author text-muted">
                                        <small>Posted by: {{ $blog->admin->name ?? 'Adminsd' }}</small>
                                    </div>
                                    <div class="ns-news-date text-muted">
                                        <small>{{ $blog->created_at->format('M d, Y') }}</small>
                                    </div>
                                </div>
                                <div class="ns-news-content p-3 text-center">
                                    <h5 class="ns-news-title mb-2">{{ $blog->title }}</h5>
                                    <div class="mt-auto">
                                        <a href="{{ route('frontEnd.blogDetails',[\Str::slug($blog->title)."?blog=".\Vinkla\Hashids\Facades\Hashids::encode($blog->id)]) }}"
                                            class="ns-read-more-btn w-100 text-center text-uppercase fw-bold">
                                            Read More
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
        @if ($blogsC > 6)
            <section class="text-center mt-5">
                <button type="button" class="btn ns-theme-btn px-4 py-2" data-offset="6" id="load-more-btn">
                    View More
                </button>
            </section>
        @endif
    </section>
    <!-- Blog Section End -->
@endsection

@push('js')
    @push('js')
        <script>
            $(document).ready(function() {
                $('#load-more-btn').on('click', function() {
                    $(this).text('Please Wait ...')
                    let offset = $(this).data('offset');
                    $.ajax({
                        url: "{{ route('frontEnd.blogLoadMore') }}",
                        type: "GET",
                        data: {
                            offset: offset

                        },
                        success: function(response) {
                            if (response.html.trim() !== '') {
                                $('#project-container').append(response.html);
                                $('#load-more-btn').data('offset', offset + 6);
                            } else {
                                $('#load-more-btn').hide(); // hide when no more data
                            }

                            $('#load-more-btn').text('View More')
                        }
                    });
                });
            });
        </script>
    @endpush
@endpush
