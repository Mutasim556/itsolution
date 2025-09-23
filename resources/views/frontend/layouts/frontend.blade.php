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
        @yield('content')
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
