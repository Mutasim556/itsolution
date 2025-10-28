<!Doctype html>
<html class="no-js" lang="zxx">

<head>
    @php
        $logo = \App\Models\Admin\Logo::first();
        $aboutus = \App\Models\Admin\AboutUs::first();
    @endphp
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $aboutus ? $aboutus->company_name : env('APP_FRONTEND_NAME') }} -@stack('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon"
        href="{{ asset($logo ? $logo->main_site_icon : 'assets/img/favicon.png') }}">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/icofont.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/odometer.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/swipper.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/main.css?v=').time() }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/style.css?v=').time() }}">
    {{-- <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/style.css') }}"> --}}

    <style>
        .ns-slide-pagination {
            position: relative;
            /* or absolute if you want bottom aligned */
            z-index: 10;
            /* make sure it's above the slides */
            margin-top: 15px;
            /* avoid negative margin */
            text-align: center;
        }

        .swiper-pagination-bullet {
            width: 14px;
            /* dot width */
            height: 14px;
            /* dot height */
            background: #ccc;
            /* inactive dot color */
            opacity: 1;
            /* make sure it’s visible */
            margin: 0 6px !important;
            /* spacing between dots */
            transition: background 0.3s;
            border-radius: 50%;
            /* keep them round */
        }

        /* Active dot */
        .swiper-pagination-bullet-active {
            background: #f6921e;
            /* your custom color */
            transform: scale(1.2);
            /* optional: make active dot bigger */
        }

        .btn-theme {
            background-color: #f6921e;
            color: white;
            font-weight: 600;
            border-radius: 8px;
        }

        .btn-theme:hover {
            background-color: #f6921e;
        }

        .dropdown-menu {
            min-width: 100%;
            /* ensures dropdown is at least the width of button */
        }

        /* @media(max-width:600px){
            .mean-container .mean-nav ul li a{
                text-align: center;
            }
        } */
        .ns-header-wrap {
            padding-top: 25px;
            padding-bottom: 25px;
            box-shadow: 0 !important;
        }

        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #fff;
            /* You can change background */
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }

        #preloader.fade-out {
            opacity: 0;
            visibility: hidden;
        }

        .spinner-border {
            width: 3rem;
            height: 3rem;
            color: #f6921e !important;
            /* Match your theme color */
        }

        .loader {
            width: 80px;
            height: 80px;
            border: 6px solid #f3f3f3;
            border-top: 6px solid #f6921e;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .loader img {
            width: 170px;
            /* Increased image size */
            height: auto;
        }

        .ns-header {
            position: sticky;
            top: 0;
            z-index: 1050;
            background: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        /* ===== Sticky Header ===== */
        /* Default header: transparent */
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1050;
            background: transparent;
            transition: background 0.3s ease, box-shadow 0.3s ease;
        }

        /* Header after scrolling past slider */
        /* Bottom-only shadow for header after scroll */
        /* header.scrolled .ns-header-wrap {
            box-shadow: 0 4px 10px -2px rgba(0, 0, 0, 0.1);
        } */



        /* Add spacing so content isn't hidden behind fixed header */
        body {
            padding-top: 100px;
            /* Adjust based on your header height */
        }

        /* Optional: compact header effect on scroll */


        header,
        header.scrolled {
            box-shadow: none !important;
            /* remove any shadow */
            border-bottom: none !important;
            /* remove bottom border if any */
        }

        header.scrolled {
            background-color: #b8b8b8 !important;
        }

        header a,
        header .ns-header-logo img {
            transition: color 0.3s ease;
        }

        header.scrolled a {
            color: #333;
            /* darker for light grey background */
        }

        #backToTop {
            display: none;
            /* Hidden by default */
            position: fixed;
            bottom: 40px;
            /* Distance from bottom */
            right: 40px;
            /* Distance from right */
            z-index: 9999;
            background-color: #f6921e;
            /* Your theme color */
            color: #fff;
            border: none;
            border-radius: 50%;
            padding: 12px 16px;
            font-size: 18px;
            cursor: pointer;
            transition: opacity 0.3s ease, transform 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        #backToTop:hover {
            background-color: #f6921e;
            /* Darker on hover */
            transform: translateY(-2px);
        }

        @media(max-width:601px) {
            .ns-header-wrap {
                padding-top: 0px;
                padding-bottom: 0px;
            }
        }

        .ns-footer-copyright {
            padding: 10px 0px !important;
        }

        .ns-header-btn.ns-theme-btn {
            background: transparent;
            border: 2px solid #f6921e;
            /* your theme color */
            color: #f6921e;
            transition: all 0.3s ease;
        }

        .ns-header-btn.ns-theme-btn:hover {
            background: #f6921e;
            color: #fff;
        }
    </style>
    @stack('css')
</head>

<body>
    <div id="preloader">
        <div class="loader">
            <img src="{{ asset($logo ? $logo->main_site_header_logo : 'public/frontend/assets/img/logo/logo.png') }}"
                alt="Logo">
        </div>
    </div>

    <div class="sidebar-info side-info sticky-top">
        <div class="sidebar-logo-wrapper">
            <div class="row align-items-center">
                <div class="col-xl-6 col-8">
                    <div class="sidebar-logo" style="float: right">
                        <a href="{{ url('/') }}"><img
                                src="{{ asset($logo ? $logo->main_site_footer_logo : 'public/frontend/assets/img/logo/logo.png') }}"
                                alt="logo-img"></a>
                    </div>
                </div>
                <div class="col-xl-6 col-4">
                    <div class="sidebar-close-wrapper text-end">
                        <button class="sidebar-close side-info-close"><i class="fal fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="sidebar-menu-wrapper fix text-center">
            <div class="mobile-menu-2">

            </div>
        </div>

        <div class="sidebar-contact-wrapper mt-40">

        </div>
    </div>
    <div class="offcanvas-overlay"></div>
    <!-- sidebar-information-area-end -->

    <!-- header area start -->
    <header>
        <div class="ns-header-area">
            <div class="ns-header-wrap">
                <div class="ns-header-logo">
                    <div class="ns-header-logo-img">
                        <a href="{{ url('/') }}"><img
                                src="{{ asset($logo ? $logo->main_site_header_logo : 'public/frontend/assets/img/logo/logo.png') }}"
                                alt="Not Found"></a>
                    </div>
                </div>
                <div class="ns-header-right">
                    <div class="ns-header-navbar">
                        <div class="ns-header-menu">
                            <nav class="ns-header-main-menu mobile-menu-2" id="mobile-menu-2">
                                <ul>
                                    <li><a href="{{ route('frontEnd.aboutUs') }}">{{ __('admin_local.About Us') }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('frontEnd.services') }}">{{ __('admin_local.Capabilities') }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('frontEnd.blogs') }}">{{ __('admin_local.Innovation and Tech') }}</a>
                                    </li>
                                    <li class="menu-has-child">
                                        <a href="{{ route('frontEnd.projects') }}"
                                            class="">{{ __('admin_local.Projects') }}</a>
                                        <ul class="submenu">
                                            <li><a href="{{ route('frontEnd.projects')."?type=Branding" }}">{{ __('admin_local.Branding') }}</a></li>
                                            <li><a href="{{ route('frontEnd.projects')."?type=Campaign" }}">{{ __('admin_local.Campaign') }}</a></li>
                                            <li><a href="{{ route('frontEnd.projects')."?type=Tech" }}">{{ __('admin_local.Tech') }}</a></li>
                                            <li><a href="{{ route('frontEnd.projects')."?type=Event" }}">{{ __('admin_local.Event') }}</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{ route('frontEnd.brands') }}">{{ __('admin_local.Brands') }}</a>
                                    </li>
                                    <li><a href="{{ route('frontEnd.teamMembers') }}">{{ __('admin_local.Team') }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('frontEnd.publicDiplomacy') }}">{{ __('admin_local.Public Diplomacy') }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('frontEnd.contactUs') }}">{{ __('admin_local.Find Us') }}</a>
                                    </li>
                                </ul>
                            </nav>
                            <div class="ns-header-menu-right p-xl-0">
                                <div class="menu-bar ml-25">
                                    <span class="navbar-sign side-toggle ">
                                        <i class="fal fa-bars"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header area end -->

    <!-- search start area -->
    <div class="ba-search-popup">
        <div class="ba-color-layer"></div>
        <div class="ba-search-popup-inner">
            <form action="#">
                <input type="text" placeholder="Search here..." name="search" id="search-input">
                <button type="submit"><i class="fal fa-search"></i></button>
            </form>
        </div>
    </div>
    <!-- search start end -->

    <main class="bg-light">
        @yield('content')
    </main>
    <!-- footer area start -->
    @php
        $contact = \App\Models\Admin\Contact::first();
    @endphp
    <footer class="ns-footer-area bg-default" data-background="">
        {{-- <img src="{{ asset('public/frontend/assets/img/footer/footer-shape-1.png') }}" alt="Not Found"
            class="ns-footer-shape-1 ns-footer-shape">
        <img src="{{ asset('public/frontend/assets/img/footer/footer-map.png') }}" alt="Not Found"
            class="ns-footer-shape-2 ns-footer-shape"> --}}
        <div class="ns-footer-top pt-55">
            <div class="container">
                <div class="row justify-content-between">

                    <div class="col-xl-4 col-lg-5 col-md-6">
                        <div class="ns-footer-widget mb-40">
                            <div class="ns-footer-logo">
                                <a href="{{ url('/') }}"><img
                                        src="{{ asset($logo ? $logo->main_site_footer_logo : 'public/frontend/assets/img/logo/logo.png') }}"
                                        alt="Not Found"></a>
                            </div>
                            <h3 class="ns-footer-widget-title"></h3>
                            <div class="ns-footer-widget-contact mb-3">
                                <p>{{ __('admin_local.Address') }} : {{ $contact->address }}</p>
                                <div class="ns-footer-widget-contact-info mb-15">
                                    <span>{{ __('admin_local.Phone') }}:<a
                                            href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a></span>
                                </div>
                                <div class="ns-footer-widget-contact-info">
                                    <span>{{ __('admin_local.Email') }}:<a
                                            href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></span>
                                </div>
                            </div>

                            @if (!Auth::check())
                                <a href="{{ route('user.loginIndex') }}"
                                    class="ns-header-btn ns-theme-btn">{{ __('admin_local.Login') }} /
                                    {{ __('admin_local.Register') }}<i class="fal fa-arrow-right"></i></a>
                            @else
                                <div class="dropdown">
                                    <button class="btn btn-theme dropdown-toggle" type="button" id="userDropdown"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ Auth::user()->name ?? 'User' }}
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ route('user.userProfile') }}">{{ __('admin_local.Profile') }}</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('user.attemptLogout') }}">
                                                {{ __('admin_local.Logout') }}
                                            </a>

                                            <form id="logout-form" action="" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-md-6">
                        &nbsp;
                    </div>
                    <div class="col-xl-3 col-lg-5 col-md-6">
                        <div class="ns-footer-widget mb-40 text-center">
                            <p class="ns-footer-widget-text">{{ __('admin_local.CONNECT') }}</p>
                            <div class="ns-footer-social">
                                @if ($contact && $contact->facebook)
                                    <a target="__blank" href="{{ $contact->facebook }}"><i
                                            class="fab fa-facebook-f"></i></a>
                                @endif
                                @if ($contact && $contact->twitter)
                                    <a target="__blank" href="{{ $contact->twitter }}"><i
                                            class="fab fa-twitter"></i></a>
                                @endif
                                @if ($contact && $contact->linkedin)
                                    <a target="__blank" href="{{ $contact->linkedin }}"><i
                                            class="fab fa-linkedin-in"></i></a>
                                @endif
                                @if ($contact && $contact->youtube)
                                    <a target="__blank" href="{{ $contact->youtube }}"><i
                                            class="fab fa-youtube"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="ns-footer-copyright">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 text-center">
                        <div class="ns-footer-copyright-text">
                            <p>Copyright
                                &copy;<span>{{ $aboutus ? $aboutus->company_name : env('APP_FRONTEND_NAME') }}</span>
                                all
                                rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <button id="backToTop" title="Go to top">
        <i class="fas fa-chevron-up"></i>
    </button>
    <!-- footer area end -->

    <!-- JS here -->
    <script src="{{ asset('public/frontend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/swipper-bundle.min.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/jquery.meanmenu.min.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/odometer.min.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/appear.min.js') }}"></script>
    <script src="{{ asset('public/frontend/assets/js/main.js?v=').time() }}"></script>
    <script>
        window.addEventListener("load", function() {
            const preloader = document.getElementById("preloader");
            preloader.classList.add("fade-out");
            setTimeout(() => preloader.style.display = "none", 500); // Wait for fade-out
        });
    </script>
    <script>
        window.addEventListener("scroll", function() {
            const header = document.querySelector("header");
            const banner = document.querySelector(".ns-banner-area");

            if (!header || !banner) return;

            // Height of banner section
            const bannerHeight = banner.offsetHeight;

            // Add scrolled class if page scroll is past banner
            if (window.scrollY > bannerHeight) {
                header.classList.add("scrolled");
            } else {
                header.classList.remove("scrolled");
            }
        });
    </script>
    <script>
        //Get the button
        const backToTopBtn = document.getElementById("backToTop");

        // Show button after scrolling 300px
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
                backToTopBtn.style.display = "block";
            } else {
                backToTopBtn.style.display = "none";
            }
        }

        // Smooth scroll to top on click
        backToTopBtn.addEventListener("click", function() {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });
    </script>



    @stack('js')
</body>

</html>
