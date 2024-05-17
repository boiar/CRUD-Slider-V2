<!DOCTYPE html>
<html lang="{{app()->getLocale()}}"> {{--dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}"--}}
<head>



    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-Y91QHP0C5S"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-Y91QHP0C5S');
    </script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    @php

        $lang = app()->getLocale();

        if (!isset($seo_desc)) {
            $seo_desc = \App\Helpers\SeoKeyWords::getMetaKeywordsByLang($lang)['meta_desc'];
        }

        if (!isset($seo_keywords)) {
            $seo_keywords = \App\Helpers\SeoKeyWords::getMetaKeywordsByLang($lang)['meta_keywords'];
        }

        if (!isset($seo_keywords)) {
            $seo_title = \App\Helpers\SeoKeyWords::getMetaKeywordsByLang($lang)['meta_title'];
        }

        if (!isset($page_title)){
            $page_title = strtoupper(str_replace('_', ' ', env('APP_NAME')));
        }

    @endphp





    <title>{{ $page_title }}</title>
    <meta  name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:url" content="{{ url()->current() . '/trips'}}">






    {{-- meta --}}
    <meta name="description" lang="{{ $lang }}" content="{{ $seo_desc }}">
    <meta name="keywords" lang="{{ $lang }}" content="{{ $seo_keywords }}">
    <meta property="og:title" content="{{ $seo_title }}">
    <meta property="og:description" content="{{ $seo_desc }}">




    <link rel="alternate" hreflang="{{ $lang }}" href="{{ url()->current() }}" />
    <link rel="alternate" hreflang="x-default" href="{{ url()->current() }}" />


    {{-- TODO Fav icon--}}
    <!-- Favicon -->

{{--
    <link href="{{ asset('user_dashboard_files/img/favicon.ico') }}" rel="icon">
--}}
    <link href="{{ asset('user_dashboard_files/img/favicon-16x16.png') }}" rel="icon" sizes="16*16">
    <link href="{{ asset('user_dashboard_files/img/favicon-32x32.png') }}" rel="icon" sizes="32*32">


    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500" rel="stylesheet" />

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">



    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('user_dashboard_files/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user_dashboard_files/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user_dashboard_files/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />


    <!-- Template Stylesheet -->
    <link href="{{ asset('user_dashboard_files/css/style.css') }}" rel="stylesheet">

    {{--<!-- Bootstrap 3.3.7 -->--}}
    <link rel="stylesheet" href="{{ asset('user_dashboard_files/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user_dashboard_files/css/ionicons.min.css') }}">

    {{-- Flags Icons --}}

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css" rel="stylesheet">



</head>

<body>


<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->


<!-- Topbar Start -->
<div class="container-fluid bg-dark d-none d-lg-block p-3">
    <div class="row gx-0">

        <div class="col-lg-12 text-center text-lg-end">
            <div class="d-inline-flex align-items-center">
                <?php
                    $social_media = request()->get('social_media');
                ?>
                @if(!empty($social_media))
                    @foreach($social_media as $item)
                        <a target="_blank" class="btn align-items-center btn-outline-light rounded-circle me-3" href="{{$item['link']}}" title="{{ $item['name'] }}">
                            <i class="{{$item['class']}}"></i>
                        </a>
                    @endforeach

                @endif
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar & Hero Start -->
<div class="user-container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <a href="" class="navbar-brand p-0">
            <h1 class="text-primary m-0">
             <img src="{{ asset('user_dashboard_files/img/logo.png') }}" alt="Logo">
                </i>{{ str_replace('_', ' ', strtoupper(env('APP_NAME')))  }}
            </h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0" style="color:  #FF8C00; ; font-weight: bold">
                <a href="{{ route('homepage') }}" class="nav-item nav-link" style="font-size: 20px !important;">@lang('user_homepage.home')</a>
                <a href="{{ route('about.index') }}" class="nav-item nav-link" style="font-size: 20px !important;">@lang('user_homepage.about_us')</a>
                <a href="{{ route('trips.index') }}" class="nav-item nav-link" style="font-size: 20px !important;">@lang('user_homepage.trips')</a>
                <a href="{{ route('comments.index') }}" class="nav-item nav-link" style="font-size: 20px !important;">@lang('user_homepage.comments')</a>
                <div class="nav-item nav-link" style="font-size: 20px !important;">
                    <form class="form-group " action="{{ route('lang_switch.lang_switcher') }}" method="POST" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        <select  style="border:none; background: none; color: orange" name="current_lang" class="selectpicker" onchange="form.submit()">

                            <?php
                                $langs_flags = [
									'en' => '🇺🇸',
                                    'it' => '🇮🇹',
                                    'ru' => '🇷🇺',
                                ]

                            ?>

                            @foreach(\Illuminate\Support\Facades\Session::get('langs') as $lang)


                                <option value="{{ $lang['lang_symbol']}}" {{ app()->getLocale() ==  $lang['lang_symbol'] ? 'selected = "selected"': ''}}>
                                    {{ $langs_flags[$lang['lang_symbol']] }}  {{ strtoupper($lang['lang_symbol']) }}
                                </option>

                            @endforeach

                        </select>


                    </form>
                </div>
            </div>
        </div>
    </nav>



    @yield('content')
    @include('partials._session')




<!-- Footer Start -->
<div class="user-container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-6 col-md-6">
                <h4 class=" text-primary mb-3">
                    <i class="me-1 text-primary">
                        <img src="{{ asset('user_dashboard_files/img/logo.png') }}" alt="Logo" style="max-height: 45px; max-width: 45px">
                    </i>

                    {{ str_replace('_', ' ', strtoupper(env('APP_NAME')))  }}
                </h4>
                @foreach(\Illuminate\Support\Facades\Session::get('destinations') as $destination)
                    <a class="btn btn-link" href="{{ route('trips.index', ['destination_id' =>$destination['location_id']])}}">
                        @lang('user_homepage.excursions') {{$destination['main_location']}}
                    </a>
                @endforeach
            </div>

            <div class="col-lg-6 col-md-6">
                <h4 class="text-white mb-3">@lang('user_homepage.contact')</h4>

                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>{{ request()->get('app_phone_number') }}</p>

                <div class="d-flex pt-2">


                    @if(!empty($social_media))
                        @foreach($social_media as $item)
                            <a target="_blank" class="btn align-items-center btn-outline-light rounded-circle me-3" href="{{$item['link']}}" title="{{ $item['name'] }}">
                                <i class="{{$item['class']}}"></i>
                            </a>
                        @endforeach

                    @endif
                </div>
            </div>


        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#" style="text-decoration: none"> {{ str_replace('_', '-', strtolower(env('APP_NAME'))) }}.com 2023</a>,
                    @lang('user_homepage.right_reserved')
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->


    <div class="social_fixed">
        <div class="tel_mes">
            @if(!empty($social_media))
                <?php
                    $fixed_social_media = [
                        'whatsapp' ,
                        'viber' ,
                        'telegram',
                    ];
                ?>

                @foreach($social_media as $item)
                    @if(in_array(strtolower($item['name']), $fixed_social_media))
                        <a target="_blank" class="align-items-center rounded-circle me-2 {{ strtolower($item['name']) }}" href="{{$item['link']}}" >
                            <i class="{{ $item['class'] }} "></i>
                        </a>
                        <br>
                    @endif
                @endforeach
            @endif

        </div>

    </div>






{{--<!-- jQuery 3 -->--}}
<script src="{{ asset('user_dashboard_files/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('user_dashboard_files/js/my_js_file.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src=" {{ asset('user_dashboard_files/lib/wow/wow.min.js') }} "></script>
<script src=" {{ asset('user_dashboard_files/lib/easing/easing.min.js') }} "></script>
<script src=" {{ asset('user_dashboard_files/lib/waypoints/waypoints.min.js') }} "></script>
<script src=" {{ asset('user_dashboard_files/lib/owlcarousel/owl.carousel.min.js') }} "></script>
<script src=" {{ asset('user_dashboard_files/lib/tempusdominus/js/moment.min.js') }} "></script>
<script src=" {{ asset('user_dashboard_files/lib/tempusdominus/js/moment-timezone.min.js') }} "></script>
<script src=" {{ asset('user_dashboard_files/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }} "></script>

<!-- Template Javascript -->
<script src="{{ asset('user_dashboard_files/js/main.js') }}"></script>



</body>

</html>
