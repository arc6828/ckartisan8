<!DOCTYPE html>
<!-- colorlib - magdesign -->
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="preconnect" href="https://fonts.gstatic.com/"> --}}
    <link href="{{ url('/magdesign/css2.css') }}" rel="stylesheet">
    <link href="{{ url('/magdesign/all.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet">
    <link href="img/css.png" rel="icon">
    <title>CKARTISAN - Build anything</title>
    {{-- <script defer="" src="url('/magdesign/s.js')"></script> --}}

    <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
    <style>
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        nav,
        .nav,
        .menu,
        button,
        .button,
        .btn,
        .price,
        ._heading,
        .wp-block-pullquote blockquote,
        blockquote,
        label,
        legend,
        .card-header,
        th,
        li, a:not(.logo){
            font-family: "Prompt", "Open Sans script=all rev=1" !important;
            font-weight: 500 !important;
        }
    </style>

</head>

<body data-aos-easing="slide" data-aos-duration="800" data-aos-delay="0" class="">
    {{-- NAV --}}
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>
    <nav class="site-nav">
        <div class="container">
            <div class="site-navigation">
                <div class="row">
                    <div class="col-md-6 text-center order-1 order-md-2 mb-3 mb-md-0">
                        <a href="{{ url('/') }}" class="logo m-0 text-uppercase">ckartisan</a>
                    </div>
                    <div class="col-md-3 order-3 order-md-1">
                        <form action="#" class="search-form">
                            <span class="fa fa-search "
                                style=" position: absolute;
                            top: 10px;
                            left: 15px;
                            color: #ccc;
                            font-size: 16px;"></span>
                            <input type="search" class="form-control" placeholder="Search...">
                        </form>
                    </div>
                    <div class="col-md-3 text-end order-2 order-md-3 mb-3 mb-md-0">
                        <div class="d-flex">
                            <ul class="list-unstyled social me-auto">
                                {{-- <li><a href="#"><i class="fa fa-home"></i></a></li> --}}

                                <li><a href="#"><span class="icon-twitter"></span></a></li>
                                <li><a href="#"><span class="icon-facebook"></span></a></li>
                                <li><a href="#"><span class="icon-instagram"></span></a></li>
                            </ul>
                            <a href="#"
                                class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block"
                                data-toggle="collapse" data-target="#main-navbar">
                                <span></span>
                            </a>

                        </div>
                    </div>
                </div>
                <ul class="js-clone-nav d-none d-lg-inline-none text-start site-menu float-end">
                    <li class="active"><a href="{{ url('/') }}">Home</a></li>
                    {{-- <li class="has-children">
                        <a href="categories.html">Categories</a>
                        <ul class="dropdown">
                            <li><a href="#">Travel</a></li>
                            <li><a href="#">Food</a></li>
                            <li><a href="#">Technology</a></li>
                            <li><a href="#">Business</a></li>
                            <li class="has-children">
                                <a href="#">Dropdown</a>
                                <ul class="dropdown">
                                    <li><a href="#">Sub Menu One</a></li>
                                    <li><a href="#">Sub Menu Two</a></li>
                                    <li><a href="#">Sub Menu Three</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li> --}}
                    <li><a href="{{ url('/timeline') }}">Timeline</a></li>
                    <li><a href="{{ url('/about') }}">About me</a></li>
                </ul>
            </div>
        </div>
    </nav>

    {{ isset($slot) ? $slot : '' }}

    {{-- subscript --}}
    <div class="py-5 bg-light mx-md-3 sec-subscribe">
        <div class="container">
            <div class="row">
                <div class="col-lg-8  text-start">
                    <h2 class="h2 fw-bold">ติดตามบทความใหม่ๆ ได้ที่นี่</h2>
                </div>
                <div class="col-lg-4 text-end">
                    <a class="btn btn-primary" style="font-size: 20px" href="https://medium.com/ckartisan">ดูบทความ</a>
                </div>
            </div>
            {{-- <form action="" class="row">
                <div class="col-md-8">
                    <div class="mb-3 mb-md-0">
                        <input type="email" class="form-control" placeholder="Enter your email">
                    </div>
                </div>
                <div class="col-md-4 d-grid">
                    <input type="submit" class="btn btn-primary" value="Subscribe">
                </div> --}}
            </form>
        </div>
    </div>
    {{-- footer --}}
    <div class="site-footer">
        <div class="container">
            <div class="row justify-content-center copyright">
                <div class="col-lg-7 text-center">
                    <div class="widget">
                        <ul class="social list-unstyled">
                            {{-- <li><a href="#"><span class="fa fa-home"></span></a></li>
                            <li><a href="#"><span class="icon-facebook"></span></a></li>
                            <li><a href="#"><span class="icon-twitter"></span></a></li>
                            <li><a href="#"><span class="icon-linkedin"></span></a></li>
                            <li><a href="#"><span class="icon-youtube-play"></span></a></li> --}}
                        </ul>
                    </div>
                    <div class="widget">
                        <p>Copyright ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved
                        </p>
                        <div class="d-block">
                            <a href="#" class="m-2">Terms & Conditions</a>/
                            <a href="{{ url('/cookies-policy') }}" class="m-2">Cookies Policy</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="overlayer" style="opacity: -0.1; display: none;"></div>
        <div class="loader" style="opacity: -0.1; display: none;">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <!-- Cookie Consent by https://www.cookiewow.com -->
    <script type="text/javascript" src="https://cookiecdn.com/cwc.js"></script>
    <script id="cookieWow" type="text/javascript" src="https://cookiecdn.com/configs/RR7vKahqPayAT4PfkSquBZmv"
        data-cwcid="RR7vKahqPayAT4PfkSquBZmv"></script>

    {{-- theme script --}}
    <script src="{{ url('/magdesign/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('/magdesign/tiny-slider.js') }}"></script>
    <script src="{{ url('/magdesign/all.js') }}"></script>
    <script async="" src="{{ url('/magdesign/js.js') }}"></script>

    <script>
        eval(mod_pagespeed_KpCH1a$C_m);
    </script>
    <script>
        eval(mod_pagespeed_Ej3jj9tqUo);
    </script>
    <script>
        eval(mod_pagespeed_Pkx$Oz4Gi9);
    </script>
    <script>
        eval(mod_pagespeed_9lpIcAXJZV);
    </script>
    <script>
        eval(mod_pagespeed_GIrE68D1a2);
    </script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-H2J4X8W9KR"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-H2J4X8W9KR');
    </script>

</body>

</html>
