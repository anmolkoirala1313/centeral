
<footer class="footer">
    <div class="footer-main-area" data-background="images/footer-bg.png">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="widget footer-widget">
                        <img data-src="{{ (@$setting_data->logo_white) ? asset('/images/settings/'.@$setting_data->logo_white): asset('/images/settings/'.@$setting_data->logo) }}"  alt="" class="mrb-20 lazy">
                        <div class="text-light-gray">
                            {!! ucfirst(@$setting_data->website_description ?? '') !!}
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    @if($footer_nav_data1!==null)
                        <div class="widget footer-widget">
                        <h5 class="widget-title text-white mrb-30">{{ $footer_nav_title1 ?? '' }}</h5>
                        <ul class="footer-widget-list">
                            @foreach(@$footer_nav_data1 as $nav)
                                @if(empty(@$nav->children[0]))
                                    <li>
                                        <a href="{{get_menu_url(@$nav->type, @$nav)}}" target="{{@$nav->target ? '_blank':''}}">
                                            {{ @$nav->name ?? @$nav->title ?? ''}}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="col-xl-2 col-lg-6 col-md-6">
                    @if($footer_nav_data2!==null)
                        <div class="widget footer-widget">
                        <h5 class="widget-title text-white mrb-30">{{ $footer_nav_title2 ?? '' }}</h5>
                        <ul class="footer-widget-list">
                            @foreach(@$footer_nav_data1 as $nav)
                                @if(empty(@$nav->children[0]))
                                    <li>
                                        <a href="{{get_menu_url(@$nav->type, @$nav)}}" target="{{@$nav->target ? '_blank':''}}">
                                            {{ @$nav->name ?? @$nav->title ?? ''}}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="widget footer-widget">
                        <h5 class="widget-title text-white mrb-30">Contact Information</h5>
                        <address class="mrb-25">
                            <p class="text-light-gray">{{@$setting_data->address ?? ''}}</p>
                            <div class="mrb-10">
                                <a href="tel:{{@$setting_data->phone ?? $setting_data->mobile ?? ''}}" class="text-light-gray">
                                    <i class="fas fa-phone-alt mrr-10"></i>
                                    {{@$setting_data->phone ?? $setting_data->mobile ?? ''}}
                                </a>
                            </div>
                            <div class="mrb-10">
                                <a href="mailto:{{@$setting_data->email ?? ''}}" class="text-light-gray">
                                    <i class="fas fa-envelope mrr-10"></i>
                                    {{@$setting_data->email ?? ''}}
                                </a>
                            </div>
                        </address>
                        <ul class="social-list">
                            @if(@$setting_data->facebook)
                                <li><a href="{{@$setting_data->facebook}}"><span class="fa-brands fa-facebook"></span></a></li>
                            @endif
                            @if(@$setting_data->youtube)
                                <li><a href="{{@$setting_data->youtube}}"><span class="fa-brands fa-youtube"></span></a></li>

                            @endif
                            @if(@$setting_data->instagram)
                                <li><a href="{{@$setting_data->instagram}}"><span class="fa-brands fa-instagram"></span></a></li>

                            @endif
                            @if(@$setting_data->linkedin)
                                <li><a href="{{@$setting_data->linkedin}}"><span class="fa-brands fa-linkedin"></span></a></li>
                            @endif
                            @if(!empty(@$setting_data->ticktock))
                                <li><a href="{{@$setting_data->ticktock}}"><span class="fa-brands fa-tiktok"></span></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="text-center">
                        <span class="text-light-gray">Copyright © 2023
                            <a class="text-primary-color" target="_blank" href="/"> {{$setting_data->website_name ?? 'Central'}}</a> | Developed by <a href="https://www.canosoft.com.np/" target="_blank">Canosoft Techonology</a> | All rights reserved </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- BACK TO TOP SECTION -->
<div class="back-to-top bg-gradient-color">
    <i class="fab fa-angle-up"></i>
</div>
<!-- Integrated important scripts here -->
<script src="{{ asset('assets/frontend/js/jquery.v1.12.4.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery-core-plugins.js') }}"></script>
<script src="{{ asset('assets/frontend/js/main.js') }}"></script>
<script src="{{ asset('assets/common/lazyload.js') }}"></script>
@yield('js')
@stack('scripts')
</body>
</html>
