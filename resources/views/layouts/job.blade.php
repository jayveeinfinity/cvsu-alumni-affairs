
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="description" content="Your Ultimate Job HTML Template">
        <meta name="keywords" content="Job, Resume, Employer, Agency">
        <link rel="canonical" href="https://html.themewant.com/jobpath">
        <meta name="robots" content="index, follow"> -->
        <!-- for open graph social media -->
        <!-- <meta property="og:title" content="Your Ultimate Job HTML Template">
        <meta property="og:description" content="Your Ultimate Job HTML Template">
        <meta property="og:image" content="https://www.example.com/image.jpg">
        <meta property="og:url" content="https://html.themewant.com/jobpath/"> -->
        <!-- for twitter sharing -->
        <!-- <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Your Ultimate Job HTML Template">
        <meta name="twitter:description" content="Your Ultimate Job HTML Template"> -->
        <!-- fabicon -->
        <link rel="x icon" type="img/png" href="/images/CvSU-logo-16x16.webp">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200..800&display=swap" rel="stylesheet">
        <title>
            @yield('title') {{ config('app.name') }}
        </title>
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
        <!-- all plugin css -->
        <link rel="stylesheet" href="/css/plugins.min.css">
        <link rel="stylesheet" href="/css/job-style.css">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            .modal-header {
                display: -ms-flexbox;
                display: flex;
                -ms-flex-align: start;
                align-items: flex-start;
                -ms-flex-pack: justify;
                justify-content: space-between;
                padding: 1rem;
                border-bottom: 1px solid #e9ecef;
                border-top-left-radius: calc(.3rem - 1px);
                border-top-right-radius: calc(.3rem - 1px);
            }
            .modal-title {
                margin-bottom: 0;
                line-height: 1.5;
                font-weight: 500;
                font-size: 20px !important;
            }
            .close {
                float: right;
                font-size: 1.5rem;
                font-weight: 700;
                line-height: 1;
                color: #000;
                text-shadow: 0 1px 0 #fff;
                opacity: .5;
            }
        </style>
    </head>
    <body>
    @include('partials.header')
    @yield('main-content')
    @include('partials.footer')
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
        <div class="offcanvas-header p-0 mb-5 mt-4">
            <a href="index.html" class="offcanvas-title" id="offcanvasLabel">
                <img src="/storage/images/logo-alt.png" alt="logo">
            </a> 
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <!-- login offcanvas -->
        <div class="mb-4 d-block d-sm-none">
            <div class="header__right__btn d-flex justify-content-center gap-3">
                <a href="#" class="small__btn no__fill__btn border-6 font-xs" aria-label="Login Button" data-bs-toggle="modal" data-bs-target="#loginModal"> <i class="rt-login"></i>Sign In</a>
                <a href="#" class="small__btn d-xl-flex fill__btn border-6 font-xs" aria-label="Job Posting Button">Add Job</a>
            </div>
        </div>
        <div class="offcanvas-body p-0">
            <div class="rts__offcanvas__menu overflow-hidden">
                <div class="offcanvas__menu"></div>
            </div>
            <p class="max-auto font-20 fw-medium text-center text-decoration-underline mt-4">Our Social Links</p>
            <div class="rts__social d-flex justify-content-center gap-3 mt-3">
                <a target="_blank" href="https://facebook.com"  aria-label="facebook">
                    <i class="fa-brands fa-facebook"></i>
                </a>
                <a target="_blank" href="https://instagram.com"  aria-label="instagram">
                    <i class="fa-brands fa-instagram"></i>
                </a>
                <a target="_blank" href="https://linkedin.com"  aria-label="linkedin">
                    <i class="fa-brands fa-linkedin"></i>
                </a>
                <a target="_blank" href="https://pinterest.com"  aria-label="pinterest">
                    <i class="fa-brands fa-pinterest"></i>
                </a>
                <a target="_blank" href="https://youtube.com"  aria-label="youtube">
                    <i class="fa-brands fa-youtube"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- THEME PRELOADER START -->
    <!-- <div class="loader-wrapper">
        <div class="loader">
        </div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div> -->
    <!-- THEME PRELOADER END -->
    <button type="button" class="rts__back__top" id="rts-back-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>
    <!-- all plugin js -->
    <script src="/js/plugins.min.js"></script>
    <script src="/js/main.js"></script>
    </body>
    @yield('script')
</html>