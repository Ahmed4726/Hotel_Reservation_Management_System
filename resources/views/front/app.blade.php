<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <title>Hotel Website</title>

    <link rel="icon" type="image/png" href="{{ asset('uploads/favicon.png') }}">

    @include('front.style')

    @include('front.js')




    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@400;500&display=swap" rel="stylesheet">

    <!-- Google Analytics -->
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-84213520-6"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', 'UA-84213520-6');
        </script> -->

</head>

<body>

    <div class="top">
        <div class="container">
            <div class="row">
                <div class="col-md-6 left-side">
                    <ul>
                        <li class="phone-text">(12) 345 67890</li>
                        <li class="email-text">larva103@gmail.com</li>
                    </ul>
                </div>
                <div class="col-md-6 right-side">
                    <ul class="right">

                        @if ($global_page_data->cart_status == 1)
                            <li class="menu"><a href="{{ route('cart') }}"><i class="fa-solid fa-cart-shopping"></i>
                                    {{ $global_page_data->cart_heading }}</a>
                            </li>
                        @endif

                        @if ($global_page_data->checkout_status == 1)
                            <li class="menu"><a href="{{ route('checkout') }}"><i
                                        class="fa-solid fa-bag-shopping"></i>
                                    {{ $global_page_data->checkout_heading }}</a></li>
                        @endif

                        @if (!Auth::guard('customer')->check())

                            @if ($global_page_data->signup_status == 1)
                                <li class="menu"><a href="{{ route('customer_signup') }}"><i
                                            class="fa-solid fa-user-plus"></i>
                                        {{ $global_page_data->signup_heading }}</a>
                                </li>
                            @endif

                            @if ($global_page_data->signin_status == 1)
                                <li class="menu"><a href="{{ route('customer_login') }}"><i
                                            class="fa-solid fa-right-to-bracket"></i>
                                        {{ $global_page_data->signin_heading }}</a>
                                </li>
                            @endif
                        @else
                            <li class="menu"><a href="{{ route('customer_dash') }}">Dashboard</a></li>


                        @endif



                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="navbar-area" id="stickymenu">

        <!-- Menu For Mobile Device -->
        {{-- <div class="mobile-nav">
            <a href="index.html" class="logo">
                <img src="{{ asset('uploads/default.png') }}" alt="">
            </a>
        </div> --}}


        {{-- Menu For Mobile Custom  --}}
        <header class="header-mobile">
            <a class="logo-header" href="{{ route('dash') }}">
                <img src="{{ asset('uploads/logo.png') }}" alt="">
            </a>
            <div class="menu-mobile">

                <div class="menu-hamburger">
                    <span></span>
                </div>

                <!-- End -->

                <!-- Navigationbar -->

                <nav class="navbar-menu">
                    <a class="logo-header" href="{{ route('dash') }}">
                        <img src="{{ asset('uploads/logo.png') }}" alt="">
                    </a>
                    <ul class="menu-mobile-top">
                        @if ($global_page_data->cart_status == 1)
                            <li class="menu"><a href="{{ route('cart') }}"><i class="fa-solid fa-cart-shopping"></i>
                                    {{ $global_page_data->cart_heading }}</a>
                            </li>
                        @endif
                        @if ($global_page_data->checkout_status == 1)
                            <li class="menu"><a href="{{ route('checkout') }}"><i
                                        class="fa-solid fa-bag-shopping"></i>
                                    {{ $global_page_data->checkout_heading }}</a></li>
                        @endif





                    </ul>

                    <ul class="menu-listing">
                        <li class="nav-item">
                            <a href="{{ route('dash') }}" class="nav-link">Home</a>
                        </li>

                        @if ($global_page_data->about_status == 1)
                            <li class="nav-item">
                                <a href="{{ route('about') }}"
                                    class="nav-link">{{ $global_page_data->about_heading }}</a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-trigger" data-toggle="dropdown">Rooms <i
                                    class="fa-solid fa-chevron-down"></i></a>
                            <ul class="dropdown-menu" style="position: relative">
                                @foreach ($global_room_data as $item)
                                    <li class="nav-item">
                                        <a href="{{ route('room_detail', $item->id) }}"
                                            class="nav-link">{{ $item->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void;" class="nav-link dropdown-trigger" data-toggle="dropdown">Gallery
                                <i class="fa-solid fa-chevron-down"></i></a>
                            <ul class="dropdown-menu" style="position: relative">
                                <li class="nav-item">
                                    <a href="{{ route('photo_gallery') }}" class="nav-link">Photo Gallery</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('video_gallery') }}" class="nav-link">Video Gallery</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('blog') }}" class="nav-link">Blog</a>
                        </li>

                        @if ($global_page_data->contact_status == 1)
                            <li class="nav-item">
                                <a href="{{ route('contact') }}"
                                    class="nav-link">{{ $global_page_data->contact_heading }}</a>
                            </li>
                        @endif
                    </ul>

                    <ul class="menu-mobile-bottom">
                        @if (!Auth::guard('customer')->check())

                            @if ($global_page_data->signup_status == 1)
                                <li class="menu"><a href="{{ route('customer_signup') }}"><i
                                            class="fa-solid fa-user-plus"></i>
                                        {{ $global_page_data->signup_heading }}</a>
                                </li>
                            @endif

                            @if ($global_page_data->signin_status == 1)
                                <li class="menu"><a href="{{ route('customer_login') }}"><i
                                            class="fa-solid fa-right-to-bracket"></i>
                                        {{ $global_page_data->signin_heading }}</a>
                                </li>
                            @endif
                        @else
                            <li class="menu dashboard-mobile"><a href="{{ route('customer_dash') }}"><i
                                        class="fa-solid fa-gauge"></i> Dashboard</a></li>
                        @endif
                    </ul>

                    <ul class="info-bottom">
                        <li class="phone-text"><i class="fa-solid fa-phone-volume"></i> (12) 345 67890</li>
                        <li class="email-text"><i class="fa-solid fa-envelope"></i> larva103@gmail.com</li>
                    </ul>
                </nav>
            </div>
        </header>

        <!-- Menu For Desktop Device -->
        <div class="main-nav">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="{{ route('dash') }}">
                        <img src="{{ asset('uploads/logo.png') }}" alt="">
                    </a>
                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a href="{{ route('dash') }}" class="nav-link">Home</a>
                            </li>

                            @if ($global_page_data->about_status == 1)
                                <li class="nav-item">
                                    <a href="{{ route('about') }}"
                                        class="nav-link">{{ $global_page_data->about_heading }}</a>
                                </li>
                            @endif

                            <li class="nav-item">
                                <a href="javascript:void;" class="nav-link dropdown-toggle">Rooms</a>
                                <ul class="dropdown-menu">

                                    @foreach ($global_room_data as $item)
                                        <li class="nav-item">
                                            <a href="{{ route('room_detail', $item->id) }}"
                                                class="nav-link">{{ $item->name }}</a>
                                        </li>
                                    @endforeach


                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void;" class="nav-link dropdown-toggle">Gallery</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="{{ route('photo_gallery') }}" class="nav-link">Photo Gallery</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('video_gallery') }}" class="nav-link">Video Gallery</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('blog') }}" class="nav-link">Blog</a>
                            </li>

                            @if ($global_page_data->contact_status == 1)
                                <li class="nav-item">
                                    <a href="{{ route('contact') }}"
                                        class="nav-link">{{ $global_page_data->contact_heading }}</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>





    @yield('main_content')


    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="item">
                        {{-- <h2 class="heading">Site Links</h2> --}}
                        <a class="logo-footer" href="{{ route('dash') }}">
                            <img src="{{ asset('uploads/logo.png') }}" alt="">
                        </a>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aut doloribus dolorum illum placeat
                            deleniti perferendis.</p>

                        <ul class="social">
                            <li><a href=""><i class="fab fa-facebook-f"></i></i></a></li>
                            <li><a href=""><i class="fab fa-twitter"></i></i></a></li>
                            <li><a href=""><i class="fab fa-pinterest"></i></i></a></li>
                            <li><a href=""><i class="fab fa-linkedin-in"></i></i></a></li>
                            <li><a href=""><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                {{-- <div class="col-md-4">
                    <div class="item">
                        <h2 class="heading">Useful Links</h2>
                        <ul class="useful-links">
                            <li><a href="{{ route('dash') }}">Home</a></li>

                            @if ($global_page_data->terms_status == 1)
                                <li><a href="{{ route('terms') }}">{{ $global_page_data->terms_heading }}</a></li>
                            @endif

                            @if ($global_page_data->privacy_status == 1)
                                <li><a href="{{ route('privacy') }}">{{ $global_page_data->privacy_heading }}</a>
                                </li>
                            @endif



                            <li><a href="{{ route('faq') }}">FAQ</a></li>
                        </ul>
                    </div>
                </div> --}}


                <div class="col-md-3">
                    <div class="item">
                        <h2 class="heading">Contact</h2>
                        <div class="list-item">
                            <div class="left">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div class="right">
                                Malaysia<br>

                            </div>
                        </div>
                        <div class="list-item">
                            <div class="left">
                                <i class="fa-solid fa-phone-volume"></i>
                            </div>
                            <div class="right">
                                (12) 345 67890
                            </div>
                        </div>
                        <div class="list-item">
                            <div class="left">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="right">
                                larva103@gmail.com
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="item">
                        <h2 class="heading">Newsletter</h2>
                        <p>
                            In order to get the latest news and other great items, please subscribe us here:
                        </p>
                        <form action="{{ route('subcriber_send_email') }}" method="post"
                            class="form_subcribe_ajax">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="email" class="form-control">
                                <span class="text-danger error-text email_error"></span>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Subscribe Now">
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="copyright-links">
                    <ul class="useful-links">

                        <li><a href="{{ route('photo_gallery') }}">Photo Gallery</a></li>
                        <li><a href="{{ route('video_gallery') }}">Video Gallery</a></li>
                        <li><a href="{{ route('blog') }}">Blog</a></li>
                        @if ($global_page_data->contact_status == 1)
                            <li><a href="{{ route('contact') }}">{{ $global_page_data->contact_heading }}</a>
                            </li>
                        @endif

                    </ul>
                    <span class="copyright-text">
                        Copyright ©2023 All rights reserved
                    </span>
                </div>


            </div>
        </div>
    </div>

    <div class="scroll-top">
        <i class="fa fa-angle-up"></i>
    </div>

    @include('front.scriptFooter')

    <script>
        function closeMenu() {
            $(".menu-hamburger").removeClass("active");
            $(".navbar-menu").removeClass("active");
            $(".overlay").fadeOut();
        }

        $(document).on("click", function(event) {
            if (!$(event.target).closest(".menu-hamburger").length && !$(event.target).closest(".navbar-menu")
                .length) {
                closeMenu();
            }
        });
        $(".menu-hamburger").click(function() {
            $(".menu-hamburger").toggleClass("active");
            $(".navbar-menu").toggleClass("active");
            $(".overlay").fadeToggle();
        });

        $(".menu-hamburger, .navbar-menu, .overlay").click(function(event) {
            event.stopPropagation();
        });

        $("body").append('<div class="overlay"></div>');

        $(document).ready(function() {
            $('.dropdown-trigger').on('click', function() {
                $(this).next('.dropdown-menu').slideToggle();
            });
        });
    </script>



    @if (session()->get('error'))
        <script>
            iziToast.error({

                title: '',
                position: 'topRight',
                message: '{{ session()->get('error') }}',
            });
        </script>
    @endif

    @if (session()->get('success'))
        <script>
            iziToast.success({

                title: '',
                position: 'topRight',
                message: '{{ session()->get('success') }}',
            });
        </script>
    @endif

    <script>
        (function($) {
            $(".form_subcribe_ajax").on('submit', function(e) {
                e.preventDefault();
                $('#loader').show();
                var form = this;
                $.ajax({
                    url: $(form).attr('action'),
                    method: $(form).attr('method'),
                    data: new FormData(form),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {
                        $(form).find('span.error-text').text('');
                    },
                    success: function(data) {
                        $('#loader').hide();
                        if (data.code == 0) {
                            $.each(data.error_message, function(prefix, val) {
                                $(form).find('span.' + prefix + '_error').text(val[0]);
                            });
                        } else if (data.code == 1) {
                            $(form)[0].reset();
                            iziToast.success({
                                title: '',
                                position: 'topRight',
                                message: data.success_message,
                            });
                        }

                    }
                });
            });
        })(jQuery);
    </script>
    <div id="loader"></div>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true
        });
    </script>
</body>

</html>
