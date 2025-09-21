<!Doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shared on THEMELOCK.COM - Nosei - It Solution And Business HTML5 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
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
  position: relative;   /* or absolute if you want bottom aligned */
  z-index: 10;          /* make sure it's above the slides */
  margin-top: 15px;     /* avoid negative margin */
  text-align: center;
}
.swiper-pagination-bullet {
  width: 14px;              /* dot width */
  height: 14px;             /* dot height */
  background: #ccc;         /* inactive dot color */
  opacity: 1;               /* make sure it’s visible */
  margin: 0 6px !important; /* spacing between dots */
  transition: background 0.3s;
  border-radius: 50%;       /* keep them round */
}

/* Active dot */
.swiper-pagination-bullet-active {
  background: #fda610;      /* your custom color */
  transform: scale(1.2);    /* optional: make active dot bigger */
}
    </style>
</head>

<body>
    <!-- sidebar-information-area-start -->
    <div class="sidebar-info side-info">
        <div class="sidebar-logo-wrapper">
            <div class="row align-items-center">
                <div class="col-xl-6 col-8">
                    <div class="sidebar-logo">
                        <a href="index.html"><img src="{{ asset('public/frontend/assets/img/logo/logo.png') }}"
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
                <a href="contact.html" class="ns-header-btn ns-theme-btn">Login / Register<i
                        class="fal fa-arrow-right"></i></a>
            </div>
        </div>

        <div class="sidebar-contact-wrapper mt-40">
            <div class="sidebar-contact mb-40">
                <h4 class="sidebar-contact-title">Contact Info</h4>
                <span class="sidebar-address"><i class="fal fa-map-marker-alt"></i><span> 27 Division St, Berakuti, NY
                        121102, USA</span> </span>
                <a href="tel:+1(251)410-1010"><i class="fal fa-phone"></i><span>+1 (251) 410-1010</span></a>
                <a href="mailto:example@gmail.com" class="theme-3"><i
                        class="fal fa-envelope"></i><span><span>example@gmail.com</span></span></a>
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
                    <img src="{{ asset('public/frontend/assets/img/logo/logo-bg.png') }}" alt="Not Found">
                    <div class="ns-header-logo-img">
                        <a href="index.html"><img src="{{ asset('public/frontend/assets/img/logo/logo.png') }}"
                                alt="Not Found"></a>
                    </div>
                </div>
                <div class="ns-header-right">
                    <div class="ns-header-topbar d-none d-md-block">
                        <div class="ns-header-topbar-wrap">
                            <div class="ns-header-topbar-left">
                                <span>Visit our social pages:</span>
                                <div class="ns-header-topbar-social">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#"><i class="fab fa-behance"></i></a>
                                </div>
                            </div>
                            <div class="ns-header-topbar-right">
                                <div class="ns-header-topbar-lan-img">
                                    {{-- <img src="{{ asset('public/frontend/assets/img/bg/flag.png')}}" alt="Not Found"> --}}
                                    Language :
                                </div>
                                <div class="ns-header-topbar-lan ns-topbar-lan-1">
                                    <select name="Language" class="has-nice-select">
                                        <option value="1">Arabic</option>
                                        <option value="2">Bangla</option>
                                        <option value="3">Turkish</option>
                                        <option value="4">English</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ns-header-navbar">
                        <div class="ns-header-menu">
                            <nav class="ns-header-main-menu mobile-menu-2  d-none d-xl-block" id="mobile-menu-2">
                                <ul>
                                    <li><a href="index.html">Home</a></li>

                                    <li><a href="about.html">About</a></li>
                                    <li><a href="about.html">Services</a></li>
                                    <li><a href="about.html">Projects</a></li>
                                    <li class="menu-has-child">
                                        <a href="#">Others</a>
                                        <ul class="submenu">
                                            <li><a href="service.html">Service</a></li>
                                            <li><a href="project.html">Project</a></li>
                                            <li><a href="project-details.html">Project Details</a></li>
                                            <li><a href="team.html">Team</a></li>
                                            <li><a href="team-details.html">Team Details</a></li>
                                            <li><a href="error.html">404</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="about.html">Contact Us</a></li>
                                </ul>
                            </nav>
                            <div class="ns-header-menu-right p-xl-0">
                                {{-- <div class="ns-header-menu-action">
                                        <a href="#" class="ns-header-action-search"><i class="fal fa-search"></i></a>
                                    </div> --}}
                                <div class="ns-header-menu-btn d-none d-md-block">
                                    <a href="contact.html" class="ns-header-btn ns-theme-btn">Login / Register<i
                                            class="fal fa-arrow-right"></i></a>
                                </div>
                                <div class="menu-bar d-xl-none ml-25">
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
        <!-- banner area start -->
        <section class="ns-banner-area">
            <div class="swiper-container slider-active">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="ns-banner-single bg-default"
                            data-background="{{ asset('public/frontend/assets/img/banner/banner-1.jpg') }}">
                            <img class="ns-banner-shape-1 ns-shape-img d-none d-md-block"
                                src="{{ asset('public/frontend/assets/img/banner/shape-1.png') }}" alt="Not Found">
                            <img class="ns-banner-shape-2 ns-shape-img d-none d-xxl-block"
                                src="{{ asset('public/frontend/assets/img/banner/shape-2.png') }}" alt="Not Found">
                            <img class="ns-banner-shape-3 ns-shape-img"
                                src="{{ asset('public/frontend/assets/img/banner/shape-3.png') }}" alt="Not Found">
                            <img class="ns-banner-shape-4 ns-shape-img d-none d-md-block"
                                src="{{ asset('public/frontend/assets/img/banner/shape-4.png') }}" alt="Not Found">
                            <img class="ns-banner-shape-5 ns-shape-img"
                                src="{{ asset('public/frontend/assets/img/banner/shape-5.png') }}" alt="Not Found">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-7">
                                        <div class="ns-banner-content">
                                            <span class="ns-banner-content-subtitle">Welcome To Nosei</span>
                                            <h2 class="ns-banner-content-title">
                                                Best IT-Solution And Business
                                            </h2>
                                            <p>Nullam eu nibh vitae est tempor molestie id sed exthe. Quisque <br>
                                                dignissim maximus ipsum metus ipsum.</p>
                                            <div class="ns-banner-action-btn">
                                                <a href="contact.html" class="ns-header-btn ns-theme-btn">Contact Us
                                                    <i class="fal fa-arrow-right"></i></a>
                                                <a href="https://www.youtube.com/watch?v=SopsEuNKyPo"
                                                    class="ns-play-btn popup-video"><i class="fas fa-play"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ns-banner-single bg-default"
                            data-background="{{ asset('public/frontend/assets/img/banner/banner-1.jpg') }}">
                            <img class="ns-banner-shape-1 ns-shape-img d-none d-md-block"
                                src="{{ asset('public/frontend/assets/img/banner/shape-1.png') }}" alt="Not Found">
                            <img class="ns-banner-shape-2 ns-shape-img d-none d-xxl-block"
                                src="{{ asset('public/frontend/assets/img/banner/shape-2.png') }}" alt="Not Found">
                            <img class="ns-banner-shape-3 ns-shape-img"
                                src="{{ asset('public/frontend/assets/img/banner/shape-3.png') }}" alt="Not Found">
                            <img class="ns-banner-shape-4 ns-shape-img d-none d-md-block"
                                src="{{ asset('public/frontend/assets/img/banner/shape-4.png') }}" alt="Not Found">
                            <img class="ns-banner-shape-5 ns-shape-img"
                                src="{{ asset('public/frontend/assets/img/banner/shape-5.png') }}" alt="Not Found">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-7">
                                        <div class="ns-banner-content">
                                            <span class="ns-banner-content-subtitle">Welcome To Sumit</span>
                                            <h2 class="ns-banner-content-title">
                                                Best IT-Solution And Business
                                            </h2>
                                            <p>Nullam eu nibh vitae est tempor molestie id sed exthe. Quisque <br>
                                                dignissim maximus ipsum metus ipsum.</p>
                                            <div class="ns-banner-action-btn">
                                                <a href="contact.html" class="ns-header-btn ns-theme-btn">Contact Us
                                                    <i class="fal fa-arrow-right"></i></a>
                                                <a href="https://www.youtube.com/watch?v=SopsEuNKyPo"
                                                    class="ns-play-btn popup-video"><i class="fas fa-play"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="ns-banner-single bg-default"
                            data-background="{{ asset('public/frontend/assets/img/banner/banner-1.jpg') }}">
                            <img class="ns-banner-shape-1 ns-shape-img d-none d-md-block"
                                src="{{ asset('public/frontend/assets/img/banner/shape-1.png') }}" alt="Not Found">
                            <img class="ns-banner-shape-2 ns-shape-img d-none d-xxl-block"
                                src="{{ asset('public/frontend/assets/img/banner/shape-2.png') }}" alt="Not Found">
                            <img class="ns-banner-shape-3 ns-shape-img"
                                src="{{ asset('public/frontend/assets/img/banner/shape-3.png') }}" alt="Not Found">
                            <img class="ns-banner-shape-4 ns-shape-img d-none d-md-block"
                                src="{{ asset('public/frontend/assets/img/banner/shape-4.png') }}" alt="Not Found">
                            <img class="ns-banner-shape-5 ns-shape-img"
                                src="{{ asset('public/frontend/assets/img/banner/shape-5.png') }}" alt="Not Found">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-7">
                                        <div class="ns-banner-content">
                                            <span class="ns-banner-content-subtitle">Welcome To Sumit</span>
                                            <h2 class="ns-banner-content-title">
                                                Best IT-Solution And Business
                                            </h2>
                                            <p>Nullam eu nibh vitae est tempor molestie id sed exthe. Quisque <br>
                                                dignissim maximus ipsum metus ipsum.</p>
                                            <div class="ns-banner-action-btn">
                                                <a href="contact.html" class="ns-header-btn ns-theme-btn">Contact Us
                                                    <i class="fal fa-arrow-right"></i></a>
                                                <a href="https://www.youtube.com/watch?v=SopsEuNKyPo"
                                                    class="ns-play-btn popup-video"><i class="fas fa-play"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination ns-slide-pagination" style="margin-top: -20px;"></div>
            </div>
        </section>
        <!-- banner area end -->

        <!-- feature area start -->
        <section class="ns-feature-area">
            <div class="ns-feature-single pt-95 pb-150 bg-default"
                data-background="assets/img/feature/feature-map.png">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="ns-section text-center">
                                <span class="ns-section-subtitle">Best features</span>
                                <h2 class="ns-section-title ns-section-title-white mb-0">We Are Business Features</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ns-feature-wrap pb-40">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <div class="ns-feature-item mb-70">
                                <img class="ns-feature-item-img" src="assets/img/feature/feature-bg-1.jpg"
                                    alt="Not Found">
                                <h4 class="ns-feature-item-title">Business Network</h4>
                                <p>Nullam vitae tempor molestie exthe.</p>
                                <div class="ns-feature-item-icon"><i class="icofont-network"></i></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <div class="ns-feature-item mb-70">
                                <img class="ns-feature-item-img" src="assets/img/feature/feature-bg-2.jpg"
                                    alt="Not Found">
                                <h4 class="ns-feature-item-title">60 For Mobiles</h4>
                                <p>Nullam vitae tempor molestie exthe.</p>
                                <div class="ns-feature-item-icon"><i class="icofont-contrast"></i></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <div class="ns-feature-item mb-70">
                                <img class="ns-feature-item-img" src="assets/img/feature/feature-bg-3.jpg"
                                    alt="Not Found">
                                <h4 class="ns-feature-item-title">Line Streaming</h4>
                                <p>Nullam vitae tempor molestie exthe.</p>
                                <div class="ns-feature-item-icon"><i class="icofont-signal"></i></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <div class="ns-feature-item mb-70">
                                <img class="ns-feature-item-img" src="assets/img/feature/feature-bg-4.jpg"
                                    alt="Not Found">
                                <h4 class="ns-feature-item-title">Fiber Broads</h4>
                                <p>Nullam vitae tempor molestie exthe.</p>
                                <div class="ns-feature-item-icon"><i class="icofont-network-tower"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- feature area end -->

        <!-- about area start -->
        <section class="ns-about-area pt-35 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="ns-about-left bg-default mb-40" data-background="assets/img/about/shape-2.png">
                            <div class="ns-about-img-1 mb-10">
                                <div class="ns-about-img-inner">
                                    <img class="inner-img-1" src="assets/img/about/about-1.jpg" alt="Not Found">
                                    <a class="ns-about-play-btn popup-video"
                                        href="https://www.youtube.com/watch?v=SopsEuNKyPo"><img
                                            src="assets/img/about/play-btn.png" alt="Not Found"></a>
                                </div>
                                <div class="ns-about-img-content">
                                    <h4 class="ns-about-inner-title">Experince</h4>
                                    <h5 class="ns-about-count">
                                        <span class="odometer about_count" data-count="26">00</span><span
                                            class="ns-about-plus">+</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="ns-about-img-wrap-2">
                                <div class="ns-about-img-inner-2">
                                    <img class="inner-img-2" src="assets/img/about/about-2.jpg" alt="Not Found">
                                    <img class="ns-about-shape" src="assets/img/about/shape-1.png" alt="Not Found">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="ns-about-wrap mb-40">
                            <div class="ns-section mb-25">
                                <span class="ns-section-subtitle">About Our Company</span>
                                <h2 class="ns-section-title mb-15">About 26+ Experince Hands
                                    Such As Front Admin </h2>
                                <p class="ns-section-text mb-0">In job gives you handcrafted options such as front adm
                                    in reviews or email notifications. It also gives employer management fo apps ial
                                    media in area.</p>
                            </div>
                            <div class="ns-about-content">
                                <div class="row row-20">
                                    <div class="col-xl-8 col-lg-8 col-md-7 col-sm-8">
                                        <div class="ns-about-content-info mb-55">
                                            <div class="ns-about-content-tab">
                                                <h5 class="ns-about-content-tab-title"><a href="#">Our
                                                        Mission</a></h5>
                                                <div>
                                                    <a class="ns-about-content-tab-icon" href="#"><i
                                                            class="icofont-life-ring"></i></a>
                                                </div>
                                            </div>
                                            <div class="ns-about-content-tab">
                                                <h5 class="ns-about-content-tab-title"><a href="#">Team
                                                        Support</a></h5>
                                                <div>
                                                    <a class="ns-about-content-tab-icon" href="#"><i
                                                            class="icofont-live-support"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ns-about-content-list">
                                            <ul>
                                                <li><i class="icofont-tick-boxed"></i>Business ndisse suscipit sagittis
                                                    leo.</li>
                                                <li><i class="icofont-tick-boxed"></i>We gives employer management</li>
                                                <li><i class="icofont-tick-boxed"></i>Media in this area of the
                                                    solution.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-5 col-sm-4">
                                        <div class="ns-about-content-info-right mb-50">
                                            <h5 class="inner-title">Project Job</h5>
                                            <div class="ns-about-info-inner">
                                                <p><span></span> In handcraft job gives you
                                                    as
                                                    front adm in
                                                    reviews.
                                                </p>
                                                <a class="ns-about-info-inner-btn" href="project-details.html"><i
                                                        class="fas fa-chevron-circle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ns-about-content-bottom">
                                    <div class="ns-about-content-admin">
                                        <div class="ns-about-content-admin-img">
                                            <img src="assets/img/about/about-admin.png" alt="Not Found">
                                        </div>
                                        <div class="ns-about-content-admin-info">
                                            <h4 class="ns-about-admin-title"><a href="about.html">Rubel Islam</a></h4>
                                            <span>Co- Founder</span>
                                        </div>
                                    </div>
                                    <div class="ns-about-content-admin-signature">
                                        <img src="assets/img/about/signature.png" alt="Not Found">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about area end -->

        <!-- service area start -->
        <section class="ns-service-area pt-110 pb-110">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="ns-section mb-50 text-center">
                            <span class="ns-section-subtitle">What We Do</span>
                            <h2 class="ns-section-title mb-0">We High Service That Stand</h2>
                        </div>
                    </div>
                </div>
                <div class="ns-service-wrap">
                    <div class="swiper-container service-active">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="ns-service-item">
                                    <div class="ns-service-img w_img">
                                        <a href="project-details.html"><img src="assets/img/service/service-1.jpg"
                                                alt="Not Found"></a>
                                    </div>
                                    <div class="ns-service-content">
                                        <h4 class="ns-service-content-title"><a href="project-details.html">Product To
                                                Satelite</a></h4>
                                        <p>We job gives you handcrafted options
                                            such as front admin reviews or It
                                            also gives It business
                                        </p>
                                        <a href="project-details.html" class="ns-service-btn">Read More<i
                                                class="icofont-plus"></i></a>
                                        <div class="ns-service-content-icon">
                                            <i class="icofont-mega-phone"></i>
                                        </div>
                                        <span class="ns-service-shape-1"></span>
                                        <span class="ns-service-shape-2"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="ns-service-item">
                                    <div class="ns-service-img w_img">
                                        <a href="project-details.html"><img src="assets/img/service/service-2.jpg"
                                                alt="Not Found"></a>
                                    </div>
                                    <div class="ns-service-content">
                                        <h4 class="ns-service-content-title"><a href="project-details.html">Business
                                                For Network</a></h4>
                                        <p>We job gives you handcrafted options
                                            such as front admin reviews or It
                                            also gives It business
                                        </p>
                                        <a href="project-details.html" class="ns-service-btn">Read More<i
                                                class="icofont-plus"></i></a>
                                        <div class="ns-service-content-icon">
                                            <i class="icofont-bars"></i>
                                        </div>
                                        <span class="ns-service-shape-1"></span>
                                        <span class="ns-service-shape-2"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="ns-service-item">
                                    <div class="ns-service-img w_img">
                                        <a href="project-details.html"><img src="assets/img/service/service-3.jpg"
                                                alt="Not Found"></a>
                                    </div>
                                    <div class="ns-service-content">
                                        <h4 class="ns-service-content-title"><a href="project-details.html">Computer
                                                Of Solution</a></h4>
                                        <p>We job gives you handcrafted options
                                            such as front admin reviews or It
                                            also gives It business
                                        </p>
                                        <a href="project-details.html" class="ns-service-btn">Read More<i
                                                class="icofont-plus"></i></a>
                                        <div class="ns-service-content-icon">
                                            <i class="icofont-contrast"></i>
                                        </div>
                                        <span class="ns-service-shape-1"></span>
                                        <span class="ns-service-shape-2"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ns-service-bottom mt-50">
                        <div class="ns-service-tagline">
                            <p><span>Service:</span>We best service it-solution for business.</p>
                        </div>
                        <div class="ns-service-pagination"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- service area end -->

        <!-- choose area start -->
        <section class="ns-choose-area">
            <img src="assets/img/choose/shape-1.png" alt="Not Found"
                class="ns-choose-shape choose-shape-1 d-none d-lg-block">
            <img src="assets/img/choose/shape-2.png" alt="Not Found"
                class="ns-choose-shape choose-shape-2 d-none d-md-block">
            <img src="assets/img/choose/shape-3.png" alt="Not Found"
                class="ns-choose-shape choose-shape-3 d-none d-md-block">
            <div class="ns-choose-bg d-none d-md-block">
                <img src="assets/img/choose/choose-bg.png" alt="Not Found">
            </div>
            <div class="ns-choose-wrap pt-110 pb-115">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-6 order-2 order-lg-1">
                            <div class="ns-section mb-25">
                                <span class="ns-section-subtitle">Why Choose Us?</span>
                                <h2 class="ns-section-title mb-15">About Gives You Hand Best Such As Front Admin</h2>
                                <p class="ns-section-text mb-0 mr-70">In job gives you handcrafted options such as
                                    front adm in reviews or email notifications. It also gives employer management fo
                                    apps ial media in area.</p>
                            </div>
                            <div class="ns-choose-contain mr-70">
                                <blockquote class="ns-choose-contain-qoute">
                                    <span><i class="icofont-quote-left"></i></span>
                                    <p>There are many variations of passages of Fasts by injected humour, or randomised
                                        ere we must-have solution to satisfy most.</p>
                                </blockquote>
                                <div class="ns-choose-contain-list">
                                    <ul>
                                        <li><i class="icofont-tick-boxed"></i>Business ndisse suscipit sagittis leo.
                                        </li>
                                        <li><i class="icofont-tick-boxed"></i>We gives employer management</li>
                                        <li><i class="icofont-tick-boxed"></i>Media in this area of the solution.</li>
                                    </ul>
                                </div>
                                <div class="ns-choose-btn">
                                    <a href="about.html" class="ns-theme-btn">Read More<i
                                            class="fal fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 order-1 order-lg-2">
                            <div class="ns-choose-img bg-default" data-background="assets/img/choose/choose-1.jpg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- choose area end -->

        <!-- project area start -->
        <section class="ns-project-area pt-110 pb-115">
            <img class="ns-project-bg" src="assets/img/project/bg-project.jpg" alt="Not Found">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="ns-section mb-50 text-center">
                            <span class="ns-section-subtitle">Our Project</span>
                            <h2 class="ns-section-title mb-0">We Case Studies Best Work</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" container-custom-1 container">
                <div class="ns-project-wrap">
                    <div class="project-active swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="ns-project-item">
                                    <div class="ns-project-img w_img">
                                        <img src="assets/img/project/project-1.jpg" alt="Not Found">
                                    </div>
                                    <div class="ns-project-content">
                                        <div class="ns-project-content-info">
                                            <h4 class="ns-project-content-title"><a
                                                    href="project-details.html">Business Network</a></h4>
                                            <span>Design / Business</span>
                                        </div>
                                        <div class="ns-project-content-btn">
                                            <a href="project-details.html"><i
                                                    class="fas fa-chevron-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <span class="ns-project-shape-1 ns-project-shape"></span>
                                    <span class="ns-project-shape-2 ns-project-shape"></span>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="ns-project-item">
                                    <div class="ns-project-img w_img">
                                        <img src="assets/img/project/project-2.jpg" alt="Not Found">
                                    </div>
                                    <div class="ns-project-content">
                                        <div class="ns-project-content-info">
                                            <h4 class="ns-project-content-title"><a
                                                    href="project-details.html">Business Network</a></h4>
                                            <span>Design / Business</span>
                                        </div>
                                        <div class="ns-project-content-btn">
                                            <a href="project-details.html"><i
                                                    class="fas fa-chevron-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <span class="ns-project-shape-1 ns-project-shape"></span>
                                    <span class="ns-project-shape-2 ns-project-shape"></span>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="ns-project-item">
                                    <div class="ns-project-img w_img">
                                        <img src="assets/img/project/project-3.jpg" alt="Not Found">
                                    </div>
                                    <div class="ns-project-content">
                                        <div class="ns-project-content-info">
                                            <h4 class="ns-project-content-title"><a
                                                    href="project-details.html">Business Network</a></h4>
                                            <span>Design / Business</span>
                                        </div>
                                        <div class="ns-project-content-btn">
                                            <a href="project-details.html"><i
                                                    class="fas fa-chevron-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <span class="ns-project-shape-1 ns-project-shape"></span>
                                    <span class="ns-project-shape-2 ns-project-shape"></span>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="ns-project-item">
                                    <div class="ns-project-img w_img">
                                        <img src="assets/img/project/project-4.jpg" alt="Not Found">
                                    </div>
                                    <div class="ns-project-content">
                                        <div class="ns-project-content-info">
                                            <h4 class="ns-project-content-title"><a
                                                    href="project-details.html">Business Network</a></h4>
                                            <span>Design / Business</span>
                                        </div>
                                        <div class="ns-project-content-btn">
                                            <a href="project-details.html"><i
                                                    class="fas fa-chevron-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <span class="ns-project-shape-1 ns-project-shape"></span>
                                    <span class="ns-project-shape-2 ns-project-shape"></span>
                                </div>
                            </div>
                        </div>
                        <div class="ns-project-pagination mt-50"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- project area end -->

        <!-- cta area start -->
        <div class="ns-cta-area bg-default pt-275 pb-115" data-background="assets/img/cta/cta-bg.jpg">
            <span class="ns-cta-shape-1 d-none d-md-block"></span>
            <span class="ns-cta-shape-2 d-none d-md-block"><img src="assets/img/cta/shape-2.png"
                    alt="Not Found"></span>
            <div class="ns-cta-play-btn">
                <a href="https://www.youtube.com/watch?v=SopsEuNKyPo" class="popup-video">
                    <img class="ns-cta-play-bg" src="assets/img/cta/cta-play-bg.png" alt="Not Found">
                    <img class="ns-btn-img" src="assets/img/cta/play-btn.png" alt="Not Found">
                </a>
            </div>
            <img class="ns-cta-map" src="assets/img/cta/cta-map.png" alt="Not Found">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8">
                        <div class="ns-cta-content">
                            <span class="ns-cta-content-subtitle">Call To Action</span>
                            <h2 class="ns-cta-content-title">Contact Some Easy To Steps</h2>
                            <span class="ns-cta-contact">Get Your Quote or Call: <a
                                    href="tel:+895400555">(+89)5400555</a></span>
                            <a href="contact.html" class="ns-theme-btn">Read More<i
                                    class="fal fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cta area end -->

        <!-- brand area start -->
        <div class="ns-brand-area pt-80 pb-80">
            <div class="container">
                <div class="brand-active swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="ns-brand-item">
                                <img class="ns-brand-item-img" src="assets/img/brand/brand.png" alt="Not Found">
                                <img class="ns-brand-item-img-hover" src="assets/img/brand/brand-hover.png"
                                    alt="Not Found">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="ns-brand-item">
                                <img class="ns-brand-item-img" src="assets/img/brand/brand.png" alt="Not Found">
                                <img class="ns-brand-item-img-hover" src="assets/img/brand/brand-hover.png"
                                    alt="Not Found">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="ns-brand-item">
                                <img class="ns-brand-item-img" src="assets/img/brand/brand.png" alt="Not Found">
                                <img class="ns-brand-item-img-hover" src="assets/img/brand/brand-hover.png"
                                    alt="Not Found">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="ns-brand-item">
                                <img class="ns-brand-item-img" src="assets/img/brand/brand.png" alt="Not Found">
                                <img class="ns-brand-item-img-hover" src="assets/img/brand/brand-hover.png"
                                    alt="Not Found">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="ns-brand-item">
                                <img class="ns-brand-item-img" src="assets/img/brand/brand.png" alt="Not Found">
                                <img class="ns-brand-item-img-hover" src="assets/img/brand/brand-hover.png"
                                    alt="Not Found">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- brand area end -->

        <!-- counter area start -->
        <div class="ns-counter-area pt-110 pb-85">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="ns-section mb-50 text-center">
                            <span class="ns-section-subtitle">What we do?</span>
                            <h2 class="ns-section-title mb-0">We High Service That Stand </h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="ns-counter-item mb-65">
                            <div class="ns-counter-item-img w_img">
                                <img src="assets/img/counter/counter-1.jpg" alt="Not Found">
                            </div>
                            <div class="ns-counter-item-content">
                                <h2 class="ns-counter-title"><span class="odometer counter_count"
                                        data-count="26">00</span><span class="ns-counter-plus">+</span></h2>
                                <span class="ns-counter-subtitle">Planing Solution</span>
                                <div class="ns-counter-icon">
                                    <i class="icofont-life-ring"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="ns-counter-item mb-65">
                            <div class="ns-counter-item-img w_img">
                                <img src="assets/img/counter/counter-1.jpg" alt="Not Found">
                            </div>
                            <div class="ns-counter-item-content">
                                <h2 class="ns-counter-title"><span class="odometer counter_count"
                                        data-count="35">00</span><span class="ns-counter-plus">k</span></h2>
                                <span class="ns-counter-subtitle">Projects Analizs</span>
                                <div class="ns-counter-icon">
                                    <i class="icofont-site-map"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="ns-counter-item mb-65">
                            <div class="ns-counter-item-img w_img">
                                <img src="assets/img/counter/counter-1.jpg" alt="Not Found">
                            </div>
                            <div class="ns-counter-item-content">
                                <h2 class="ns-counter-title"><span class="odometer counter_count"
                                        data-count="96">00</span><span class="ns-counter-plus">k</span></h2>
                                <span class="ns-counter-subtitle">Growing Business</span>
                                <div class="ns-counter-icon">
                                    <i class="icofont-institution"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="ns-counter-item mb-65">
                            <div class="ns-counter-item-img w_img">
                                <img src="assets/img/counter/counter-1.jpg" alt="Not Found">
                            </div>
                            <div class="ns-counter-item-content">
                                <h2 class="ns-counter-title"><span class="odometer counter_count"
                                        data-count="55">00</span><span class="ns-counter-plus">+</span></h2>
                                <span class="ns-counter-subtitle">Team Support</span>
                                <div class="ns-counter-icon">
                                    <i class="icofont-live-support"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- counter area end -->

        <!-- testimonial area start -->
        <div class="ns-testimonial-area">
            <img class="ns-testimonial-bg d-none d-xl-block" src="assets/img/testimonial/testimonial-shape.png"
                alt="Not Found">
            <div class="ns-testimonial-container container">
                <div class="ns-inner-wrap">
                    <div class="ns-testimonial-space">
                        <div class="ns-has-space">
                            <div class="ns-testimonial-thumb">
                                <div class="swiper-container testimonial-thumb">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="ns-testimonial-img w_img">
                                                <img src="assets/img/testimonial/testimonial-1.png" alt="Not Found">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="ns-testimonial-img w_img">
                                                <img src="assets/img/testimonial/testimonial-2.png" alt="Not Found">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="ns-testimonial-img w_img">
                                                <img src="assets/img/testimonial/testimonial-3.png" alt="Not Found">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ns-testimonial-single">
                                <div class="ns-testimonial-wrap">
                                    <div class="swiper-container testimonial-active">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="ns-testimonial-content">
                                                    <img src="assets/img/testimonial/qoute.png" alt="Not Found">
                                                    <p>We understand the important of to approaching <br> work
                                                        integrallysand believe in the power simple <br> and we easy
                                                        cation growth always act like <br> adipisicing elit, sed do
                                                        eiusmod.</p>
                                                    <div class="ns-testimonial-admin">
                                                        <h4 class="ns-testimonial-admin-title">
                                                            Romes Barson
                                                        </h4>
                                                        <span>Manager</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="ns-testimonial-content">
                                                    <img src="assets/img/testimonial/qoute.png" alt="Not Found">
                                                    <p>We understand the important of to approaching work integrallysand
                                                        believe in the power simple and we easy cation growth always act
                                                        like adipisicing elit, sed do eiusmod.</p>
                                                    <div class="ns-testimonial-admin">
                                                        <h4 class="ns-testimonial-admin-title">
                                                            Sergio Ramos
                                                        </h4>
                                                        <span>Director</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="ns-testimonial-content">
                                                    <img src="assets/img/testimonial/qoute.png" alt="Not Found">
                                                    <p>We understand the important of to approaching work integrallysand
                                                        believe in the power simple and we easy cation growth always act
                                                        like adipisicing elit, sed do eiusmod.</p>
                                                    <div class="ns-testimonial-admin">
                                                        <h4 class="ns-testimonial-admin-title">
                                                            Robert Clive
                                                        </h4>
                                                        <span>CEO</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ns-testimonial-pagination mt-30"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- testimonial area end -->

        <!-- contact area start -->
        <section class="pt-110 pb-115">
            <div class="ns-contact-container container">
                <div class="ns-inner-wrap">
                    <div class="ns-contact-space">
                        <div class="ns-contact-wrap">
                            <div class="ns-contact-left">
                                <div class="ns-section mb-35">
                                    <span class="ns-section-subtitle">Contact Now</span>
                                    <h2 class="ns-section-title mb-15">Live Sports This Contacts Us</h2>
                                    <p class="ns-section-text mb-0">Promote your blog posts, case udie, and product
                                        ouncems <br> with the the branded videoscustomers coming back for <br> services
                                        Makes best effort.</p>
                                </div>
                                <div class="ns-contact-form">
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <input type="text" placeholder="Your Name">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="email" placeholder="Your Email">
                                            </div>
                                            <div class="col-12">
                                                <textarea name="message" cols="30" rows="10" placeholder="Message"></textarea>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="ns-theme-btn ns-contact-btn">Send
                                                    Request</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="ns-contact-right">
                                <div class="ns-contact-info">
                                    <span class="ns-contact-circle-1"></span>
                                    <span class="ns-contact-circle-2"></span>
                                    <img src="assets/img/contact/contact.jpg" alt="Not Found"
                                        class="ns-contact-bg-img">
                                    <img class="ns-contact-shape ns-contact-shape-1"
                                        src="assets/img/contact/contact-map.png" alt="Not Found">
                                    <img class="ns-contact-shape ns-contact-shape-2"
                                        src="assets/img/contact/contact-map.png" alt="Not Found">
                                    <img class="ns-contact-shape ns-contact-shape-3"
                                        src="assets/img/contact/contact-map.png" alt="Not Found">
                                    <div class="ns-contact-item ns-phone">
                                        <div class="ns-contact-item-icon">
                                            <i class="icofont-ui-call"></i>
                                        </div>
                                        <div class="ns-contact-item-details">
                                            <span>Call Me</span>
                                            <div>
                                                <a href="tel:+880254615566">+880254615566</a>
                                                <a href="tel:+826542556455">+826542556455</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ns-contact-item ns-mail">
                                        <div class="ns-contact-item-icon">
                                            <i class="icofont-envelope"></i>
                                        </div>
                                        <div class="ns-contact-item-details">
                                            <span>Mail Us</span>
                                            <div>
                                                <a
                                                    href="mailto:rubel@eobi.com
                                                    ">rubel@eobi.com
                                                </a>
                                                <a
                                                    href="mailto:moraty@bara.com
                                                    ">moraty@bara.com
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ns-contact-item ns-address">
                                        <div class="ns-contact-item-icon">
                                            <i class="icofont-location-pin"></i>
                                        </div>
                                        <div class="ns-contact-item-details">
                                            <span>Address</span>
                                            <p>20, 25 Dhaka,0123 <br>
                                                Ratrba baraj,20</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="ns-contact-map">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d12677670.27170986!2d26.611266975183028!3d49.282320776259766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1646059574165!5m2!1sen!2sbd"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- contact area end -->

        <!-- blog area start -->
        <section class="ns-blog-area pt-110 pb-115">
            <img src="assets/img/blog/blog-shape-1.png" alt="Not Found" class="ns-blog-bg-shape-1 ns-blog-shape-bg">
            <img src="assets/img/blog/blog-shape-2.png" alt="Not Found" class="ns-blog-bg-shape-2 ns-blog-shape-bg">
            <img src="assets/img/blog/blog-shape-3.png" alt="Not Found" class="ns-blog-bg-shape-3 ns-blog-shape-bg">
            <img src="assets/img/blog/blog-shape-4.png" alt="Not Found" class="ns-blog-bg-shape-4 ns-blog-shape-bg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="ns-section mb-50 text-center">
                            <span class="ns-section-subtitle">Largest Blog</span>
                            <h2 class="ns-section-title mb-0">Our largest News Blog</h2>
                        </div>
                    </div>
                </div>
                <div class="swiper-container blog-active">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="ns-blog-item">
                                <div class="ns-blog-img w_img">
                                    <a href="blog-details.html"><img src="assets/img/blog/blog-1.jpg"
                                            alt="Not Found"></a>
                                    <span class="ns-blog-tag">Business</span>
                                    <span class="ns-blog-img-shape-1"></span>
                                    <span class="ns-blog-img-shape-2"></span>
                                </div>
                                <div class="ns-blog-content">
                                    <div class="ns-blog-content-meta"><span class="ns-blog-admin">By: <a
                                                href="#">Admin</a></span><span class="ns-blog-date">January 6,
                                            2022</span></div>
                                    <h3 class="ns-blog-content-title"><a href="blog-details.html">We are best It
                                            solution company</a></h3>
                                    <p>World’s best organizations, for 19+
                                        years and runninh...</p>
                                    <a href="blog-details.html" class="ns-blog-btn">Read More<i
                                            class="icofont-plus"></i></a>
                                    <span class="ns-blog-shape-1"></span>
                                    <span class="ns-blog-shape-2"></span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="ns-blog-item">
                                <div class="ns-blog-img w_img">
                                    <a href="blog-details.html"><img src="assets/img/blog/blog-2.jpg"
                                            alt="Not Found"></a>
                                    <span class="ns-blog-tag">Business</span>
                                    <span class="ns-blog-img-shape-1"></span>
                                    <span class="ns-blog-img-shape-2"></span>
                                </div>
                                <div class="ns-blog-content">
                                    <div class="ns-blog-content-meta"><span class="ns-blog-admin">By: <a
                                                href="#">Admin</a></span><span class="ns-blog-date">January 6,
                                            2022</span></div>
                                    <h3 class="ns-blog-content-title"><a href="blog-details.html">5 Ways Technology
                                            Has Improved Today</a></h3>
                                    <p>World’s best organizations, for 19+
                                        years and runninh...</p>
                                    <a href="blog-details.html" class="ns-blog-btn">Read More<i
                                            class="icofont-plus"></i></a>
                                    <span class="ns-blog-shape-1"></span>
                                    <span class="ns-blog-shape-2"></span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="ns-blog-item">
                                <div class="ns-blog-img w_img">
                                    <a href="blog-details.html"><img src="assets/img/blog/blog-3.jpg"
                                            alt="Not Found"></a>
                                    <span class="ns-blog-tag">Business</span>
                                    <span class="ns-blog-img-shape-1"></span>
                                    <span class="ns-blog-img-shape-2"></span>
                                </div>
                                <div class="ns-blog-content">
                                    <div class="ns-blog-content-meta"><span class="ns-blog-admin">By: <a
                                                href="#">Admin</a></span><span class="ns-blog-date">January 6,
                                            2022</span></div>
                                    <h3 class="ns-blog-content-title"><a href="blog-details.html">Wireless Technology
                                            is Change Business</a></h3>
                                    <p>World’s best organizations, for 19+
                                        years and runninh...</p>
                                    <a href="blog-details.html" class="ns-blog-btn">Read More<i
                                            class="icofont-plus"></i></a>
                                    <span class="ns-blog-shape-1"></span>
                                    <span class="ns-blog-shape-2"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ns-blog-pagination mt-50"></div>
                </div>
            </div>
        </section>
        <!-- blog area end -->

        <!-- newsletter area start -->
        <div class="ns-newsletter-area pt-155 pb-115">
            <div class="container">
                <div class="ns-newsletter-wrap">
                    <div class="ns-newsletter-icon">
                        <img src="assets/img/newsletter/newsletter-icon.png" alt="Not Found">
                    </div>
                    <div class="ns-newsletter-inner">
                        <img src="assets/img/newsletter/map.png" alt="Not Found" class="ns-newsletter-shape-3">
                        <img src="assets/img/newsletter/shape-1.png" alt="Not Found" class="ns-newsletter-shape-1">
                        <img src="assets/img/newsletter/shape-2.png" alt="Not Found" class="ns-newsletter-shape-2">
                        <div class="row align-items-center">
                            <div class="col-xl-6 col-lg-6">
                                <div class="ns-newsletter-content mb-30">
                                    <h3 class="ns-newsletter-title">
                                        News Latter to connect our services in your area
                                    </h3>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="ns-newsletter-input mb-30">
                                    <input type="email" placeholder="Your Email">
                                    <button class="ns-newsletter-btn" type="submit">Subscribe</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- newsletter area end -->
    </main>
    <!-- footer area start -->
    <footer class="ns-footer-area bg-default" data-background="assets/img/footer/footer-bg.png">
        <img src="assets/img/footer/footer-shape-1.png" alt="Not Found" class="ns-footer-shape-1 ns-footer-shape">
        <img src="assets/img/footer/footer-map.png" alt="Not Found" class="ns-footer-shape-2 ns-footer-shape">
        <div class="ns-footer-top pt-95 pb-55">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-3 col-lg-5 col-md-6">
                        <div class="ns-footer-widget mb-40">
                            <div class="ns-footer-logo">
                                <a href="index.html"><img src="assets/img/logo/logo.png" alt="Not Found"></a>
                            </div>
                            <p class="ns-footer-widget-text">Nemo enim ipsam voluptate quia
                                voluptas sit aspernatur aut odit
                                aut fugit, sed quia magni this
                                dolores eos qui ratione .</p>
                            <div class="ns-footer-social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-behance"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-5 col-md-5">
                        <div class="ns-footer-widget mb-40">
                            <h3 class="ns-footer-widget-title">Quick Links</h3>
                            <div class="ns-footer-widget-list">
                                <ul>
                                    <li><a href="#">Best Services</a></li>
                                    <li><a href="#">Department</a></li>
                                    <li><a href="#">About Our Company</a></li>
                                    <li><a href="#">Business Contact</a></li>
                                    <li><a href="#">Make An Appointment</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-5 col-md-6">
                        <div class="ns-footer-widget mb-40">
                            <h3 class="ns-footer-widget-title">Our Contacts</h3>
                            <div class="ns-footer-widget-contact">
                                <p>Adress: 27 Division St, Berakuti, <br>
                                    NY 121102, USA</p>
                                <div class="ns-footer-widget-contact-info mb-15">
                                    <span>Phone:<a href="tel:+81440456782">+8 1440 456 782</a></span>
                                    <span>Fax:<a href="tel:+8846512456788">+8 846512 456 788</a></span>
                                </div>
                                <div class="ns-footer-widget-contact-info">
                                    <span>Email:<a href="mailto:example@mail.com">Email: example@mail.com</a></span>
                                    <span>Website:<a href="#">yourwebsite.com</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-5 col-md-5">
                        <div class="ns-footer-widget mb-40">
                            <h3 class="ns-footer-widget-title">Recent Post</h3>
                            <div class="ns-footer-widget-post mb-20">
                                <div class="ns-footer-widget-post-img w_img">
                                    <a href="blog-details.html"><img src="assets/img/footer/post-1.png"
                                            alt="Not Found"></a>
                                </div>
                                <div class="ns-footer-widget-post-content">
                                    <span>23 jun 2023</span>
                                    <h5 class="ns-footer-widget-post-title"><a href="blog-details.html">Get around
                                            easily
                                            york service</a></h5>
                                </div>
                            </div>
                            <div class="ns-footer-widget-post">
                                <div class="ns-footer-widget-post-img w_img">
                                    <a href="blog-details.html"><img src="assets/img/footer/post-2.png"
                                            alt="Not Found"></a>
                                </div>
                                <div class="ns-footer-widget-post-content">
                                    <span>23 jun 2023</span>
                                    <h5 class="ns-footer-widget-post-title"><a href="blog-details.html">Get around
                                            easily
                                            york service</a></h5>
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
                            <p>Copyright &copy;<span>Nosei</span> all rights reserved.</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-sm-5">
                        <div class="ns-footer-copyright-menu text-end">
                            <ul>
                                <li><a href="about.html">Privacy</a></li>
                                <li><a href="about.html">Policy</a></li>
                                <li><a href="about.html">About</a></li>
                            </ul>
                        </div>
                    </div>
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
</body>

</html>
