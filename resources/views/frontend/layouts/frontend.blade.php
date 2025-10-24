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
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/main.css') }}">

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
            background: #fda610;
            /* your custom color */
            transform: scale(1.2);
            /* optional: make active dot bigger */
        }

        .btn-theme {
            background-color: #ffab17;
            color: white;
            font-weight: 600;
            border-radius: 8px;
        }

        .btn-theme:hover {
            background-color: #e79a13;
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
        }

        /* @media(max-width:601px){
           
        } */
    </style>
    @stack('css')
</head>

<body>
    <!-- sidebar-information-area-start -->
    <div class="sidebar-info side-info">
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
                                <a class="dropdown-item" href="{{ route('user.attemptLogout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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

        <div class="sidebar-contact-wrapper mt-40">
            @php
                $contact = \App\Models\Admin\Contact::first();
            @endphp
            <div class="sidebar-contact mb-40">
                <h4 class="sidebar-contact-title">{{ __('admin_local.Contact Info') }}</h4>
                @if ($contact && $contact->address)
                    <span class="sidebar-address"><i class="fal fa-map-marker-alt"></i><span>
                            {{ $contact->address }}
                        </span> </span>
                @endif
                @if ($contact && $contact->phone)
                    <a href="tel:{{ $contact->phone }}"><i
                            class="fal fa-phone"></i><span>{{ $contact->phone }}</span></a>
                @endif
                @if ($contact && $contact->email)
                    <a href="mailto:{{ $contact->email }}" class="theme-3"><i
                            class="fal fa-envelope"></i><span><span>{{ $contact->email }}</span></span></a>
                @endif
            </div>
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
                    <!--<div class="ns-header-topbar d-none d-md-block">
                        <div class="ns-header-topbar-wrap">
                            <div class="ns-header-topbar-left">
                                <span>{{ __('admin_local.Visit our social pages') }}:</span>
                                <div class="ns-header-topbar-social">
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
                            <div class="ns-header-topbar-right">
                                <div class="ns-header-topbar-lan-img">
                                    {{-- <img src="{{ asset('public/frontend/assets/img/bg/flag.png')}}" alt="Not Found"> --}}
                                    {{ __('admin_local.Language') }} :
                                </div>
                                <div class="ns-header-topbar-lan ns-topbar-lan-1">
                                    <select name="Language" class="has-nice-select"
                                        onchange="window.location.href='{{ route('changeFrontLang', '') }}/' + this.value">
                                        @php
                                            $languages = \App\Models\Admin\Language::where([
                                                ['status', 1],
                                                ['delete', 0],
                                            ])->get();
                                        @endphp
                                        @foreach ($languages as $language)
<option value="{{ $language->lang }}"
                                                {{ app()->getLocale() == $language->lang ? 'selected' : '' }}>
                                                {{ $language->name }}
                                            </option>
@endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>-->
                    <div class="ns-header-navbar">
                        <div class="ns-header-menu">
                            <nav class="ns-header-main-menu mobile-menu-2" id="mobile-menu-2">
                                <ul>
                                    <li><a href="{{ url('/') }}">{{ __('admin_local.Home') }}</a></li>

                                    <li><a href="{{ route('frontEnd.aboutUs') }}">{{ __('admin_local.About') }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('frontEnd.services') }}">{{ __('admin_local.Services') }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('frontEnd.projects') }}">{{ __('admin_local.Projects') }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('frontEnd.teamMembers') }}">{{ __('admin_local.Team') }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('frontEnd.contactUs') }}">{{ __('admin_local.Contact Us') }}</a>
                                    </li>
                                </ul>
                            </nav>
                            <div class="ns-header-menu-right p-xl-0">
                                {{-- <div class="ns-header-menu-action">
                                        <a href="#" class="ns-header-action-search"><i class="fal fa-search"></i></a>
                                    </div> --}}
                                {{-- <div class="ns-header-menu-btn d-none d-md-block">
                                    @if (!Auth::check())
                                        <a href="{{ route('user.loginIndex') }}"
                                            class="ns-header-btn ns-theme-btn">{{ __('admin_local.Login') }} /
                                            {{ __('admin_local.Register') }}<i class="fal fa-arrow-right"></i></a>
                                    @else
                                        <div class="dropdown">
                                            <button class="btn btn-theme dropdown-toggle" type="button"
                                                id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
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
                                                    <a class="dropdown-item" href="{{ route('user.attemptLogout') }}" >
                                                        {{ __('admin_local.Logout') }}
                                                    </a>

                                                    <form id="logout-form" action="" method="POST"
                                                        class="d-none">
                                                        @csrf
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    @endif
                                </div> --}}
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

    <main>
        @yield('content')
    </main>
    <!-- footer area start -->
    <footer class="ns-footer-area bg-default" data-background="">
        <img src="{{ asset('public/frontend/assets/img/footer/footer-shape-1.png') }}" alt="Not Found"
            class="ns-footer-shape-1 ns-footer-shape">
        <img src="{{ asset('public/frontend/assets/img/footer/footer-map.png') }}" alt="Not Found"
            class="ns-footer-shape-2 ns-footer-shape">
        <div class="ns-footer-top pt-95 pb-55">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-4 col-lg-5 col-md-6">
                        <div class="ns-footer-widget mb-40">
                            <div class="ns-footer-logo">
                                <a href="{{ url('/') }}"><img
                                        src="{{ asset($logo ? $logo->main_site_header_logo : 'public/frontend/assets/img/logo/logo.png') }}"
                                        alt="Not Found"></a>
                            </div>
                            <p class="ns-footer-widget-text">{{ __('admin_local.Find us on') }}</p>
                            <div class="ns-footer-social">
                                {{-- <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-behance"></i></a> --}}

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
                    <div class="col-xl-4 col-lg-5 col-md-5">
                        <div class="ns-footer-widget mb-40">
                            <h3 class="ns-footer-widget-title">{{ __('admin_local.Quick Links') }}</h3>
                            <div class="ns-footer-widget-list">
                                <ul>
                                    <li><a
                                            href="{{ route('frontEnd.aboutUs') }}">{{ __('admin_local.About Us') }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('frontEnd.services') }}">{{ __('admin_local.Services') }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('frontEnd.projects') }}">{{ __('admin_local.Projects') }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('frontEnd.teamMembers') }}">{{ __('admin_local.Team') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-6">
                        <div class="ns-footer-widget mb-40">
                            <h3 class="ns-footer-widget-title">{{ __('admin_local.Our Contacts') }}</h3>
                            <div class="ns-footer-widget-contact">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="ns-footer-copyright">
                <div class="row">
                    <div class="col-xl-6 col-md-6 col-sm-7">
                        <div class="ns-footer-copyright-text">
                            <p>Copyright
                                &copy;<span>{{ $aboutus ? $aboutus->company_name : env('APP_FRONTEND_NAME') }}</span>
                                all
                                rights reserved.</p>
                        </div>
                    </div>
                    {{-- <div class="col-xl-6 col-md-6 col-sm-5">
                        <div class="ns-footer-copyright-menu text-end">
                            <ul>
                                <li><a href="about.html">Privacy</a></li>
                                <li><a href="about.html">Policy</a></li>
                                <li><a href="about.html">About</a></li>
                            </ul>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </footer>
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
    <script src="{{ asset('public/frontend/assets/js/main.js') }}"></script>
    @stack('js')
</body>

</html>
