<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">

    <title>Bor Shop</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link href="{!!asset('Asset2/assets/img/favicon.png')!!}" rel="icon">
    <link href="{!!asset('Asset2/assets/img/apple-touch-icon.png')!!}" rel="apple-touch-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{!!asset('assetsslide/bootstrap.min.css')!!}">
    <!-- Vendor CSS Files -->
    <link href="{!!asset('Asset2/assets/vendor/bootstrap/css/bootstrap.min.css')!!}" rel="stylesheet">
    <link href="{!!asset('Asset2/assets/vendor/bootstrap-icons/bootstrap-icons.css')!!}" rel="stylesheet">
    <link href="{!!asset('Asset2/assets/vendor/aos/aos.css" rel="stylesheet')!!}">
    <link href="{!!asset('Asset2/assets/vendor/glightbox/css/glightbox.min.css')!!}" rel="stylesheet">
    <link href="{!!asset('Asset2/assets/vendor/swiper/swiper-bundle.min.css')!!}" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="{!!asset('assetsmaster/vendor/css/core.css')!!}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{!!asset('assetsMaster/vendor/css/theme-default.css')!!}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{!!asset('assetsMaster/css/demo.css')!!}"/>
    <link rel="stylesheet" href="{!!asset('assetsMaster/css/custom.css')!!}"/>
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{!!asset('assetsMaster/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')!!}"/>
    <link rel="stylesheet" href="{!!asset('assetsMaster/vendor/libs/apex-charts/apex-charts.css')!!}"/>
    <link href="{!!asset('Asset2/assets/css/main.css')!!}" rel="stylesheet">
    <link href="{!!asset('trap/owl.carousel.min.css')!!}" rel="stylesheet">
    <link href="{!!asset('trap/owl.theme.default.min.css')!!}" rel="stylesheet">
</head>
<body>
    <section id="topbar" class="topbar d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
          <div class="contact-info d-flex align-items-center">
            <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">Bor@example.com</a></i>
            <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
          </div>
          <div class="social-links d-none d-md-flex align-items-center">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
          </div>
        </div>
      </section><!-- End Top Bar -->

    <header id="header" class="header d-flex align-items-center">
        <div class="container-fluid container-xl d-flex align-items-center justify-content">
            <a href="/" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="{!!asset('Asset2/assets/img/logo.png')!!}" alt=""> -->
                <h1>BorShop<span>.</span></h1>
            </a>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="#produk">Product</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#team">Team</a></li>
                    <li><a href="/">Blog</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li>
                        <span class="badge badge-danger cart-count float-end">0</span>
                        <a href="/cart">
                        <span class="bi bi-cart"> Cart</span>
                        </a>
                    </li>
                    <li>
                        <span class="badge badge-warning wishlist-count float-end">0</span>
                        <a href="/wishlist">
                        <span class="bi bi-archive"> Wishlist</span></a>
                    </li>
                    @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-4 py-4 sm:block">
                    @auth
                    <li class="nav-item navbar-dropdown dropdown-user dropdown active flex-fill">
                        <a class="nav-link" href="javascript:void(0);" data-bs-toggle="dropdown">
                            <div>
                                <i class="bi bi-person-square profile"><br> Profile</i>
                            </div>
                        </a>
                        <ul class="dropdown-menu ">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                    </div>
                                    <div class="flex-grow-1">
                                        <span class="fw-semibold d-block"><strong>{{ Auth::User()->name}}</strong></span>
                                        <small
                                            class="text-muted"><strong>{{(Auth::User()->role_as ==1)? 'Admin' : 'User'}}</strong></small>
                                    </div>
                                </div>
                                <li>
                                    <a href="{{ url('/dashboard') }}"
                                    class="text-sm text-gray-700 underline">Dashboard</a></li>
                                <li>
                                <a class="text-sm text-gray-700 underline" href="{{url('my-order')}}">
                                    <span class="">My Orders</span>
                                </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="#">
                                        <span class="bi bi-calendar-date"> Billing</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                           document.getElementById('logout-form').submit();">
                                        <span class="bi bi-power"> Log Out</span>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </a>

                                        </li>
                                    </li>
                                </a>
                            </li>
                        @else
                        <li>
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline btn btn-block"><span class="">Login</span></a>
                        </li>
                        @if (Route::has('register'))
                    <li>
                        <a href="{{ route('register') }}" class="text-sm text-gray-700 underline btn btn-block text-center">Register</a>
                    </li>
                            @endif
                        @endif
                        </div>
                        @endif

                        <li>
                        @if(session()->get('success-user'))
                        <div class="alert alert-primary alert-dismissible float-end" role="alert" style="text-align: center;"
                            data-delay="20">
                            {{session()->get('success-user')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        @if(session()->get('status-slug'))
                        <div class="alert alert-primary alert-dismissible float-end" role="alert" style="text-align: center;"
                            data-delay="20">
                            {{session()->get('status-slug')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        @if(session()->get('status'))
                        <div class="alert alert-primary alert-dismissible float-end" role="alert" style="text-align: center;"
                            data-delay="20">
                            {{session()->get('status')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        </li>

             </ul>
        </nav>
        <!-- .navbar -->
        <i class="mobile-nav-toggle mobile-nav-show float-end bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        </div>
    </header>

    @yield('content')

    @include('layouts.script')

    </body>

</html>
