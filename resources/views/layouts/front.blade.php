<!DOCTYPE html>
<html class="load-full-screen" lang="{{ app()->getLocale() }}">
<?php
    $contentModel = new App\Content();
    $params[] = [
        "field" => "content_id",
        "operation" => "=",
        "value" => "0",
    ];
    $params[] = [
        "field" => "lang",
        "operation" => "=",
        "value" => App::getLocale(),
    ];
    $params[] = [
        "field" => "main",
        "operation" => "!=",
        "value" => "1",
    ];

$topContents = $contentModel->getAll($params);

$locationTypeModel = new \App\LocationType();
$locationTypes = $locationTypeModel->getAll();
?>
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#f9676b">
    <!-- Favicon -->
    <link type="image/x-icon" rel="shortcut icon" href="favicon.png" />

    <!-- Meta Description  -->
    <meta name="description" content="Varollar Tourism & Travel Company All Rights Reserved.">
    <meta name="author" content="Varollar Tourism & Travel Company All Rights Reserved.">

    <!-- Google Font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <!-- Font Awesome -->
    <link href="{{ asset('front-assets/libs/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Animate css -->
    <link href="{{ asset('front-assets/libs/animate/animate.min.css') }}" rel="stylesheet">
    <!-- Crousel css -->
    <link href="{{ asset('front-assets/libs/owl.carousel/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front-assets/libs/owl.carousel/owl-carousel-theme.min.css') }}" rel="stylesheet">
    <!-- Bootstrap css -->
    <link href="{{ asset('front-assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Theme css -->
    <link href="{{ asset('front-assets/css/style.css?v=1545520291') }}" rel="stylesheet" type="text/css"/>

    <!-- Switch Color Style css -->
    <link href="{{ asset('front-assets/css/color/skin-default.css') }}" data-style="styles" rel="stylesheet">

    <!-- CSS file -->
    <link rel="stylesheet" href="{{ asset('front-assets/libs/easyautocomplate/easy-autocomplete.min.css') }}">


</head>
<body class="load-full-screen">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Start Loader -->
<div class="section-loader">
    <div class="loader">
        <div></div>
        <div></div>
    </div>
</div>
<!-- End Loader -->

<!-- Start Site Wrapper -->
<div class="site-wrapper">
    <!-- Start Navbar Section -->
    <header>
        <!-- Start Top Menu -->
        <div class="transparent-menu-top">
            <div class="container">
                <div class="navbar-contact">
                    <div class="row">
                        <div class="col-md-7 col-sm-7">
                            <a href="#" class="transition-effect"><i class="fa fa-phone"></i>+90 542 557 76 76</a>
                            <a href="#" class="transition-effect"><i class="fa fa-envelope-o"></i> info@dalamanairport.com</a>
                        </div>
                        <div class="col-md-5 col-sm-5 search-box">
                            <div class="language-select d-inline-block float-right">
                                <a href="/lang/en"><img src="/front-assets/images/lang/gb.png">English</a>
                                <a href="/lang/tr"><img src="/front-assets/images/lang/tr.png">Türkçe</a>
                            </div>

                            <div class="d-inline-block float-right" style="margin-right: 20px;">
                                <a href="{{ route("home.booking-query") }}"><STRONG><i class="fa fa-search"></i> {{ __("BOOKING QUERY") }}</STRONG></a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Top Menu -->
        <!-- Start Menu container -->
        <div class="transparent-menu">
            <div class="container nav-container">
                <!-- Start Header -->
                <div class="navbar-wrapper">
                    <div class="navbar navbar-default navbar-expand-lg navbar-light" role="navigation">
                        <a class="navbar-brand logo" href="/"><img src="/front-assets/images/logo.png" alt="Shree" /></a>
                        <!-- Start Responsive Menu Button -->
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                            <i class="fa fa-navicon"></i>
                        </button>
                        <!-- End Responsive Menu Button -->
                        <!-- Start Menu -->
                        <div class="navbar-collapse collapse">
                            <ul class="navbar-nav navbar-right ml-auto">
                                <li class=" nav-item">
                                    <a class="nav-link" href="/">{{ __('HOME PAGE') }}</a>
                                </li>
                                <?php
                                    foreach ($topContents as $topContent){
                                        $params2[] = [
                                            "field" => "content_id",
                                            "operation" => "=",
                                            "value" => $topContent->id,
                                        ];
                                        $contents = $contentModel->getAll($params2);

                                        if(count($contents)==0){
                                ?>
                                <li class="nav-item"><a class="nav-link" href="{{ route("home.content",['slug'=>$topContent->seo]) }}">{{ $topContent->name }}</a></li>
                                <?php }else{ ?>
                                <li class="dropdown nav-item">
                                    <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">{{ $topContent->name }} </a>
                                    <ul class="dropdown-menu">
                                        <?php foreach ($contents as $content){ ?>
                                        <li class="nav-item"><a class="nav-link" href="{{ route("home.content",['slug'=>$content->seo]) }}">{{ $content->name }}</a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <?php }} ?>

                                <li class="dropdown mega nav-item">
                                    <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">{{ __('DESTINATION') }}</a>
                                    <div class="dropdown-menu mega-menu">
                                        <ul class="row">
                                            @foreach($locationTypes as $locationType)
                                                <?php
                                                    $locationsModel = new \App\Location();
                                                    $locationsx = $locationsModel->where("location_type_id", "=", $locationType->id)->get();
                                                ?>
                                                @if(count($locationsx->toArray())>0)
                                                <li class="col-lg-3 col-md-4 col-sm-4 links">
                                                    <h5>{{ $locationType->name }}</h5>
                                                    <ul>
                                                        <?php foreach ($locationsx as $locationitem) { ?>
                                                        @if(app()->getLocale()=="tr")
                                                        <li><a href="{{ route("home.destination",['slug'=>$locationitem->seo]) }}">{{$locationitem->name}}</a></li>
                                                        @else
                                                        <li><a href="{{ route("home.destination",['slug'=>$locationitem->seo_eng]) }}">{{$locationitem->name_eng}}</a></li>
                                                        @endif
                                                        <?php } ?>
                                                    </ul>
                                                </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="{{ route("contactUs") }}">{{ __('CONTACT US') }}</a></li>
                            </ul>
                        </div>
                        <!-- End Menu -->
                    </div>
                </div>
                <!-- End Header -->
            </div>
        </div>
        <!-- End Menu container -->
    </header>
    <!-- End Navbar Section -->


    @yield('content')


    <!-- Start Footer Section -->
    <section class="section-wrapper pb-0" style="padding-top: 0px;">
        <footer class="main-footer">
            <!-- Start Footer Bottom -->
            <div class="main-footer-nav" style="margin-top: 0px">
                <div class="container">
                    <div class="row">
                        <!-- Start Footer Menu -->
                        <div class="col-md-12 col-lg-6 order-lg-2">
                            <ul>
                                <li><a href="/">{{ __('HOME PAGE') }}</a></li>

                                <li><a href="#">{{ __('F.A.Q') }}</a></li>
                                <li><a href="{{ route("contactUs") }}">{{ __('CONTACT US') }}</a></li>
                            </ul>
                        </div>
                        <!-- End Footer Menu -->
                        <!-- Start Footer Copyright -->
                        <div class="col-md-12 col-lg-6 order-lg-1">
                            <p style="font-size: 12px;">Copyright © 1998-2018 Varollar Tourism & Travel Company All Rights Reserved.</p>
                        </div>
                        <!-- End Footer Copyright -->
                    </div>
                </div>
            </div>
            <!-- End Footer Bottom -->
        </footer>
    </section>
    <!-- End Footer Section -->

</div>
<!-- End Site Wrapper -->


<!-- Load Scripts -->
<!-- jquery -->
<script src="{{ asset('front-assets/libs/jquery/jquery-2.2.4.min.js') }}"></script>
<!-- jquery UI -->
<script src="{{ asset('front-assets/libs/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Respond -->
<script src="{{ asset('front-assets/libs/respond/respond.min.js') }}"></script>
<!-- Bootstrap js -->
<script src="{{ asset('front-assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Bootstrap Timepicker js -->
<script src="{{ asset('front-assets/libs/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
<!-- jquery Nice Select js -->
<script src="{{ asset('front-assets/libs/jquery-nice-select/jquery.nice-select.min.js') }}"></script>
<!-- owlcarousel js -->
<script src="{{ asset('front-assets/libs/owl.carousel/owl.carousel.min.js') }}"></script>
<!-- wow js -->
<script src="{{ asset('front-assets/libs/wow/wow.min.js') }}"></script>
<!-- JS file -->
<script src="{{ asset('front-assets/libs/easyautocomplate/jquery.easy-autocomplete.min.js') }}"></script>
<!--internal js-->
<script src="{{ asset('front-assets/js/internal.js?v=1546389715') }}"></script>
<script src="{{ asset('front-assets/js/custom.js?v=1546389715') }}"></script>


<script>
    $(document).ready(function(){
        var car_1 = {
            url: function(phrase) {
                return "/car/getlocation";
            },

            getValue: function(element) {
                @if(app()->getLocale() == "tr")
                    return element.name;
                @else
                    return element.name_eng;
                @endif
            },

            ajaxSettings: {
                dataType: "json",
                method: "GET",
                data: {
                    dataType: "json"
                }
            },
        };

        var car_2 = {
            url: function(phrase) {
                return "/car/getlocation";
            },

            getValue: function(element) {
                @if(app()->getLocale() == "tr")
                return element.name;
                @else
                return element.name_eng;
                @endif
            },

            ajaxSettings: {
                dataType: "json",
                method: "GET",
                data: {
                    dataType: "json"
                }
            },
        };

        $("#car_1").easyAutocomplete(car_1);
        $("#car_2").easyAutocomplete(car_2);
    });


</script>


@if($_SERVER['SERVER_NAME']!="127.0.0.1"){
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5c1c30e182491369ba9effe5/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->
@endif
</body>
</html>