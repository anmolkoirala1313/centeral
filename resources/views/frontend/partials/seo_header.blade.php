<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    {{--    <link rel="canonical" href="https://careerlinkrecruitment.com" />--}}
    @yield('seo')


    <link rel="shortcut icon" type="image/x-icon" href="{{ (@$setting_data->favicon) ? asset('/images/settings/'.@$setting_data->favicon):asset('assets/backend/images/canosoft-favicon.png') }}">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('asset/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/frontend/css/responsive.css') }}">


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{@$setting_data->google_analytics}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '{{@$setting_data->google_analytics}}');
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @yield('css')
    @stack('styles')
</head>

<body>
<!-- Preloader Start -->
<div class="preloader"></div>
<!-- Preloader End -->
<!-- header Start -->
<header class="header-style-two">
    <div class="header-wrapper">
        <div class="header-top-area bg-gradient-color d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 header-top-left-part">
                        <a href="tel:{{@$setting_data->phone ?? $setting_data->mobile ?? ''}}" class="address"><i class="webexflaticon flaticon-phone"></i>
                            {{@$setting_data->phone ?? $setting_data->mobile  ?? ''}}
                        </a>
                        <a href="mailto:{{@$setting_data->email ?? ''}}" class="phone"><i class="webexflaticon flaticon-send"></i>
                            {{@$setting_data->email ?? ''}}
                        </a>
                    </div>
                    <div class="col-lg-6 header-top-right-part text-right">
                        <ul class="social-links">
                            @if(@$setting_data->facebook)
                                <li>
                                    <a href="{{@$setting_data->facebook}}">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </a>
                                </li>
                            @endif
                            @if(@$setting_data->youtube)
                                <li>
                                    <a href="{{@$setting_data->youtube}}">
                                        <i class="fa-brands fa-youtube"></i>
                                    </a>
                                </li>
                            @endif
                            @if(@$setting_data->instagram)
                                <li><a href="{{@$setting_data->instagram}}">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a></li>
                            @endif
                            @if(@$setting_data->linkedin)
                                <li><a href="{{@$setting_data->linkedin}}">
                                        <i class="fa-brands fa-linkedin"></i>
                                    </a>
                                </li>
                            @endif
                            @if(!empty(@$setting_data->ticktock))
                                <li>
                                    <a href="{{@$setting_data->ticktock}}">
                                        <i class="fa-brands fa-tiktok"></i>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-navigation-area two-layers-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <a class="navbar-brand logo f-left mrt-10 mrt-md-0" href="index.html">
                            <img id="logo-image" class="img-center lazy" data-src="{{$setting_data->logo ? asset('/images/settings/'.@$setting_data->logo):''}}" alt="">
                        </a>
                        <div class="mobile-menu-right"></div>
                        <div class="header-searchbox-style-two d-none d-xl-block">
                            <div class="side-panel side-panel-trigger text-right d-none d-lg-block">
                                <span class="bar1"></span>
                                <span class="bar2"></span>
                                <span class="bar3"></span>
                            </div>
                            <div class="show-searchbox">
                                <a href="#"><i class="webex-icon-Search"></i></a>
                            </div>
                            <div class="toggle-searchbox">
                                <form action="{{route('searchJob')}}" id="searchform-all" method="get">
                                    <div>
                                        <input type="text" id="s" name="s" class="form-control" placeholder="Search jobs...">
                                        <div class="input-box">
                                            <input type="submit" value="" id="searchsubmit"><i class="fas fa-search"></i>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="side-panel-content">
                            <div class="close-icon">
                                <button><i class="webex-icon-cross"></i></button>
                            </div>
                            <div class="side-panel-logo mrb-30">
                                <a href="/">
                                    <img src="{{$setting_data->logo_white ? asset('/images/settings/'.@$setting_data->logo_white) : asset('/images/settings/'.@$setting_data->logo)}}" alt="" />
                                </a>
                            </div>
                            <div class="side-info mrb-30">
                                <div class="side-panel-element mrb-25">
                                    <h4 class="mrb-10">Office Address</h4>
                                    <ul class="list-items">
                                        <li><span class="fa fa-map-marker-alt mrr-10 text-primary-color"></span>{{@$setting_data->address ?? ''}}</li>
                                        <li><span class="fas fa-envelope mrr-10 text-primary-color"></span>{{@$setting_data->email ?? ''}}</li>
                                        <li><span class="fas fa-phone-alt mrr-10 text-primary-color"></span>{{@$setting_data->phone ?? $setting_data->mobile  ?? ''}}</li>
                                    </ul>
                                </div>
                            </div>
                            <h4 class="mrb-15">Social List</h4>
                            <ul class="social-list">
                                @if(@$setting_data->facebook)
                                    <li>
                                        <a href="{{@$setting_data->facebook}}">
                                            <i class="fa-brands fa-facebook-f"></i>
                                        </a>
                                    </li>
                                @endif
                                @if(@$setting_data->youtube)
                                    <li>
                                        <a href="{{@$setting_data->youtube}}">
                                            <i class="fa-brands fa-youtube"></i>
                                        </a>
                                    </li>
                                @endif
                                @if(@$setting_data->instagram)
                                    <li><a href="{{@$setting_data->instagram}}">
                                            <i class="fa-brands fa-instagram"></i>
                                        </a></li>
                                @endif
                                @if(@$setting_data->linkedin)
                                    <li><a href="{{@$setting_data->linkedin}}">
                                            <i class="fa-brands fa-linkedin"></i>
                                        </a>
                                    </li>
                                @endif
                                @if(!empty(@$setting_data->ticktock))
                                    <li>
                                        <a href="{{@$setting_data->ticktock}}">
                                            <i class="fa-brands fa-tiktok"></i>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <div class="main-menu f-right">
                            <nav id="mobile-menu-right">
                                <ul>
                                    <li>
                                        <a href="/">Home</a>
                                    </li>
                                    @if(!empty($top_nav_data))
                                        @foreach($top_nav_data as $nav)
                                            @if(!empty($nav->children[0]))
                                                <li class="has-sub">
                                                    <a href="#">{{ @$nav->name ?? @$nav->title }}</a>
                                                    <ul class="sub-menu">
                                                        @foreach($nav->children[0] as $childNav)
                                                            <li class="{{!empty($childNav->children[0]) ? 'has-sub-child':''}}">
                                                                <a href="{{get_menu_url($childNav->type, $childNav)}}">{{ @$childNav->name ?? @$childNav->title ??''}}</a>
                                                                @if(!empty($childNav->children[0]))
                                                                    <ul class="sub-menu right-view">
                                                                        @foreach($childNav->children[0] as $key => $lastchild)
                                                                            <li>
                                                                                <a href="{{get_menu_url($lastchild->type, $lastchild)}}" target="{{@$lastchild->target ? '_blank':''}}">
                                                                                    {{ @$lastchild->name ?? @$lastchild->title ?? ''}}
                                                                                </a>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @else
                                                <li>
                                                    <a href="{{get_menu_url(@$nav->type, @$nav)}}" target="{{@$nav->target ? '_blank':''}}">
                                                        {{ @$nav->name ?? @$nav->title ??''}}
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header End -->
