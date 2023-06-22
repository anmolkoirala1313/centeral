@extends('frontend.layouts.master')
@section('title') {{ucwords(@$page_detail->name)}} @endsection
@section('css')
    <style>

        .img-wrapper {
            height: 270px;
            object-fit: cover;
        }
        #gallery img.img-responsive {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
    <link rel="stylesheet" href="{{asset('assets/common/lightbox.css')}}">

@endsection
@section('content')

    <section class="page-title-section"
             style="background:linear-gradient(rgb(246 184 51 / 29%), rgb(10 10 10 / 66%)), url( {{ $page_detail->image ? asset('images/page/'.$page_detail->image) : asset('assets/frontend/images/bg/page-title-bg.jpg') }} ); margin-bottom:30px;">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <div class="page-title-content">
                        <h3 class="title text-white"> {{ucwords(@$page_detail->name)}} </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active"><a href="/">Home</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @foreach($sections as $key=>$value)

        @if($value == "basic_section")
            <section class="pdt-0 pdb-110 pdb-md-110 bg-pos-center-bottom" data-background="{{asset('assets/frontend/images/bg/abs-bg1.png')}}"
                     style="background-image: url({{asset('assets/frontend/images/bg/abs-bg1.png')}});">
                <div class="section-content">
                    <div class="container">
                        <div class="row align-items-center pdt-80">
                            <div class="col-md-12 col-xl-6">
                                <h5 class="mrb-15 text-primary-color sub-title-side-line">{{@$basic_elements->subheading ?? ''}}</h5>
                                <h2 class="mrb-30">{{@$basic_elements->heading ?? ''}}</h2>
                                <div class="mrb-30 text-justify">
                                    {!! @$basic_elements->description !!}
                                </div>
                                @if(@$basic_elements->button_link)
                                    <a href="{{@$basic_elements->button_link}}" class="cs-btn-one btn-gradient-color btn-lg">
                                        {{ucwords(@$basic_elements->button ?? 'Discover More')}}
                                    </a>
                                @endif
                            </div>
                            <div class="col-md-12 col-xl-6">
                                <div class="about-image-block">
                                    <img class="img-full lazy" data-src="{{asset('/images/section_elements/basic_section/'.@$basic_elements->image) }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        @if($value == "call_to_action_1")
            <section class="pdt-90 pdb-20 section-white-typo" data-background="{{asset('assets/frontend/images/bg/11.jpg')}}" data-overlay-dark="8"
                     style="background-image: url({{asset('assets/frontend/images/bg/11.jpg')}});">
                <div class="section-title text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col"></div>
                            <div class="col-lg-9 col-xl-12">
                                <div class="section-title-block">
                                    <h2>{{@$call1_elements->heading ?? ''}}</h2>
                                </div>
                                <a href="{{@$call1_elements->button_link ?? '/contact-us'}}" class="cs-btn-one btn-gradient-color btn-md has-icon mrt-20">
                                    {{ucwords(@$call1_elements->button ?? 'Reach Out')}}</a>
                            </div>
                            <div class="col"></div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        @if($value == "background_image_section")
            <section class="pdt-110 pdb-60" data-background="{{asset('assets/frontend/images/bg/4.jpg')}}" data-overlay-dark="8"
                     style="background-image: url({{asset('assets/frontend/images/bg/4.jpg')}});">
                <div class="section-content">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-12 col-xl-6">
                                <h5 class="mrb-15 text-white sub-title-side-line">{{@$bgimage_elements->subheading ?? ''}}</h5>
                                <h2 class="text-white mrb-30"> {{@$bgimage_elements->heading ?? ''}}</h2>
                                <div class="text-white text-justify mrb-60">
                                    {{ @$bgimage_elements->description }}
                                </div>
                            </div>
                            <div class="col-md-12 col-xl-6">
                                <div class="about-image-block-3">
                                    <img class="img-full lazy" data-src="{{asset('/images/section_elements/bgimage_section/'.@$bgimage_elements->image)}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        @if($value == "flash_cards")
            <div class="rs-services style1 modify shape-bg pt-128 md-pt-70 pb-80 md-pb-80">
                <div class="container">
                    <div class="sec-title4 text-center mb-60">
                        <div class="sub-title mb-2">{{$flash_elements[0]->subheading ?? ''}}</div>
                        <h2 class="title primary-color">{{@$flash_elements[0]->heading ?? ''}}</h2>
                    </div>
                    <div class="row service-wrap mr-0 ml-0">
                        @foreach(@$flash_elements as $index=>$flash_element)
                            <div class="col-lg-4 padding-0 {{ $loop->first ? 'pr-1':'' }}">
                                <div class="service-grid">
                                    <div class="service-icon mb-23">
                                        <img src="{{ asset('assets/frontend/images/services/'.get_icons($index)) }}" alt="">
                                    </div>
                                    <h4 class="title mb-18">
                                        <a>
                                            {{ucwords(@$flash_element->list_header)}}
                                        </a>
                                    </h4>
                                    <div class="desc mb-12">
                                        {{ucfirst(@$flash_element->list_description) }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        @if($value == "simple_header_and_description")
            <div class="rts-service-details-area rts-section-gap" style="padding: 0px!important;">
               <div class="container">
                   @if(@$header_descp_elements->heading!==null)
                       <div class="sec-title2 text-center md-left mb-20">
                           <div class="sub-text">
                               {{@$header_descp_elements->subheading ?? ''}}
                           </div>
                           <h2 class="title mb-0 md-pb-20">
                               <?php
                               $split = explode(" ", @$header_descp_elements->heading);?> {{preg_replace('/\W\w+\s*(\W*)$/', '$1', @$header_descp_elements->heading)."\n"}}
                               <span class="new-next"> {{$split[count($split)-1]}} </span>
                           </h2>
                       </div>
                   @endif
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <!-- service details left area start -->
                            <div class="service-detials-step-1">
                                <div class="disc custom-description text-justify">
                                    {!! @$header_descp_elements->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if($value == "map_and_description")
            <section class="contact-section pdt-110 pdb-95 pdb-lg-90" data-background="{{asset('assets/frontend/images/bg/abs-bg1.png')}}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-xl-6">
                            <h5 class="sub-title-side-line text-primary-color mrt-0 mrb-15">{{@$map_descp->subheading ?? ''}}</h5>
                            <h3 class="faq-title mrb-30">{{@$map_descp->heading ?? ''}}</h3>
                            <div class="mrb-40 text-justify">
                                {!! @$map_descp->description !!}
                            </div>
                            @if(@$map_descp->button_link)
                                <a href="{{@$map_descp->button_link}}" class="cs-btn-one btn-gradient-color btn-lg">
                                    {{ucwords(@$map_descp->button ?? 'Contact us')}}</a>
                            @endif
                        </div>
                        <div class="col-lg-6 col-xl-6">
                            <iframe src="{{@$setting_data->google_map ?? ''}}"
                                    width="600" height="400" style="border:0;"
                                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        @if($value == "small_box_description")
            @if(count($process_elements)>0)
            <div id="rs-services" class="rs-services style6 bg14" style="margin-top: 0px;padding-top: 100px;padding-bottom: 100px;">
                <div class="container">
                    <div class="sec-title text-center mb-50">
                        <span class="sub-text small"> {{ ucfirst($process_elements[0]->subheading ?? '') }}</span>
                        <h2 class="title title3">
                            {{@$process_elements[0]->heading}}
                        </h2>
                    </div>
                    <div class="services-box-area bg20">
                        <div class="row margin-0">
                            @for ($i = 1; $i <=@$process_num; $i++)
                                <div class="col-lg-4 col-md-6 col-sm-6 padding-0">
                                    <div class="services-item">
                                        <div class="services-content">
                                            <h3 class="title"><a> {{ucwords(@$process_elements[$i-1]->list_header ??'')}}</a></h3>
                                            <p class="margin-0 text-justify">
                                                {{ucfirst(@$process_elements[$i-1]->list_description)}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
            @endif
        @endif

        @if($value == "gallery_section")
            <section class="bg-silver-light pdt-105 pdb-80" data-background="{{asset('assets/frontend/images/bg/abs-bg4.png')}}" style="background-image: url({{asset('assets/frontend/images/bg/abs-bg4.png')}});">
                @if(@$heading!==null)
                    <div class="section-title text-center wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="container">
                            <div class="row">
                                <div class="col"></div>
                                <div class="col-lg-8">
                                    <div class="title-box-center">
                                        <h5 class="sub-title-center text-primary-color line-top-center mrb-30">{{@$subheading ?? ''}}</h5>
                                        <h2 class="title">   {{@$heading}}</h2>
                                    </div>
                                </div>
                                <div class="col"></div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="section-content">
                    <div class="container">
                        <div class="row">
                            @if(count(@$gallery_elements) > 0)
                                <div id="gallery" style="padding: 0px 30px 0 30px;">
                                    <div id="image-gallery">
                                        <div class="row">
                                            @foreach($gallery_elements as $gallery)
                                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
                                                    <div class="{{  $page_detail->slug =='legal-document' || $page_detail->slug =='legal-documents' ? "":"img-wrapper"   }}">
                                                        <a href="{{asset('/images/section_elements/gallery/'.@$gallery->filename)}}">
                                                            <img data-src="{{asset('/images/section_elements/gallery/'.@$gallery->filename)}}" class="img-responsive lazy"></a>
                                                        <div class="img-overlay">
                                                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div><!-- End row -->
                                    </div><!-- End image gallery -->
                                </div><!-- End container -->
                            @endif
                        </div>
                    </div>
                </div>
            </section>
        @endif

        @if($value == "slider_list")
            @if(count($slider_list_elements)>0))

            <div id="rs-services" class="rs-services style2 gray-bg pt-100 pb-100 md-pt-70 md-pb-70">
                <div class="container">
                    <div class="sec-title2 d-flex align-items-center mb-60 md-mb-40">
                        <div class="first-half">
                            <div class="sub-text">{{ucwords(@$slider_list_elements[0]->description)}}</div>
                            <h2 class="title mb-0 md-pb-20">
                                <?php
                                $split = explode(" ", @$slider_list_elements[0]->heading);?> {{preg_replace('/\W\w+\s*(\W*)$/', '$1', @$slider_list_elements[0]->heading)."\n"}}
                                <span> {{$split[count($split)-1]}} </span>
                            </h2>
                        </div>
                    </div>
                    <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30"
                         data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800"
                         data-dots="true" data-nav="false" data-nav-speed="false" data-md-device="3"
                         data-md-device-nav="false" data-md-device-dots="true" data-center-mode="false" data-ipad-device2="2"
                         data-ipad-device-nav2="false" data-ipad-device-dots2="true" data-ipad-device="2"
                         data-ipad-device-nav="false" data-ipad-device-dots="true" data-mobile-device="1"
                         data-mobile-device-nav="false" data-mobile-device-dots="true">
                        @for ($i = 1; $i <=@$list_3; $i++)
                            <div class="service-wrap">
                                <div class="image-part">
                                    <img class="lazy" data-src="{{ asset('/images/section_elements/list_1/thumb/thumb_'.$slider_list_elements[$i-1]->list_image) }}" alt="">
                                </div>
                                <div class="content-part">
                                    <h3 class="title" style="font-size: 18px;line-height: 26px;font-weight: 600;">
                                        <a href="{{route('slider.single',@$slider_list_elements[$i-1]->subheading)}}">
                                            {{ucwords(@$slider_list_elements[$i-1]->list_header)}}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
            @endif
        @endif

    @endforeach


@endsection
@section('js')
    <script src="{{asset('assets/common/lightbox.min.js')}}"></script>
  <script>
      $( document ).ready(function() {
          let selector = $('.custom-description').find('table').length;
          if(selector>0){
              $('.custom-description').find('table').addClass('table table-bordered');
          }
      });
  </script>
@endsection
