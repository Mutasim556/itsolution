@extends('frontend.layouts.frontend')
@push('title')
    {{ __('admin_local.Public Diplomacy') }}
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
    </style>
@endpush
@section('content')
    <div class="container" style="padding-top: 60px !important;">
        <div class="row">
            <div class="col-12">
                <div class="ns-section mb-50 text-center">
                    <h2 class="ns-section-title mb-0" style="font-size:25px;">
                        {{ __('admin_local.Public Diplomacy') }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    @php
        $countries = \App\Models\Admin\CountryRepresentation::where([['delete', 0], ['status', 1]])->get();
    @endphp
    @if (count($countries) > 0)
        <section class="ns-logo-section  py-5">
            <div class="container">
                <div class="row g-4 justify-content-center">
                    @foreach ($countries as $key => $country)
                        <div class="col-6 col-md-4 col-lg-2 text-center">
                            <a href="{{ route('frontEnd.publicDiplomacy') . '?pd=' . \Vinkla\Hashids\Facades\Hashids::encode($country->id) }}"
                                class="ns-logo-link text-decoration-none">
                                <div
                                    class="ns-logo-card p-3 {{ request()->pd && \Vinkla\Hashids\Facades\Hashids::encode($country->id) == request()->pd ? 'active' : '' }}">
                                    <div class="ns-logo-img mb-3">
                                        <img src="{{ asset($country->logo ?? 'public/frontend/assets/img/pub_dip/bbc.png') }}"
                                            alt="{{ $country->name }}" class="img-fluid">
                                    </div>
                                    <h6 class="ns-logo-name m-0">{{ $country->name }}</h6>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <section class="ns-news-section bg-light py-5">
        <div class="container">
            <div class="row g-4 justify-content-center" id="project-container">
                @foreach ($publicdiplomacies as $pdKey => $publicdiplomacy)
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <a target="__blank" href="{{ $publicdiplomacy->link }}" class="ns-news-link text-decoration-none">
                            <div class="ns-news-card">
                                <div class="ns-news-img position-relative">
                                    <img src="{{ asset($publicdiplomacy->image ?? 'public/frontend/assets/img/project/project-41.jpg') }}"
                                        alt="News Image" class="img-fluid">
                                    <span class="ns-news-badge">{{ $publicdiplomacy->country->name }}</span>
                                </div>
                                <div class="ns-news-content p-3">
                                    <h5 class="ns-news-title mb-2">{{ $publicdiplomacy->title }}</h5>
                                    <p class="ns-news-author mb-0"><strong>{{ $publicdiplomacy->name }}</strong></p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
        @if ($publicdiplomacyC > 6)
            <section class="text-center mt-5">
                <button type="button" class="btn ns-theme-btn px-4 py-2" data-offset="6" id="load-more-btn">
                    View More
                </button>
            </section>
        @endif
    </section>


@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('#load-more-btn').on('click', function() {
                $(this).text('Please Wait ...')
                let offset = $(this).data('offset');
                let getData = `{{ request()->has('pd') ? '?pd=' . request()->get('pd') : '' }}`;
                $.ajax({
                    url: "{{ route('frontEnd.loadMore') }}" + getData,
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
