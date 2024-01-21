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
            <section class="serivce-section pdt-40 pdb-40 z-index-1 position-relative">
                <div class="section-content">
                    <div class="container">
                        <div class="row pdb-40">
                            <div class="col"></div>
                            <div class="col-lg-8 col-xl-6">
                                <div class="section-title-block text-center">
                                    <h5 class="text-primary-color anim-box-objects text-underline mrb-15">{{$flash_elements[0]->subheading ?? ''}}</h5>
                                    <h2>{{@$flash_elements[0]->heading ?? ''}}</h2>
                                </div>
                            </div>
                            <div class="col"></div>
                        </div>
                        <div class="row">
                            @foreach(@$flash_elements as $index=>$flash_element)
                                <div class="col-md-6 col-xl-4 d-flex align-items-stretch">
                                    <div class="service-box border-radius-default">
                                        <div class="service-icon">
                                            <span class="webexflaticon {{ get_icons($index) }}"></span>
                                        </div>
                                        <div class="service-content">
                                            <div class="title">
                                                <a><h3> {{ucwords(@$flash_element->list_header)}}</h3></a>
                                            </div>
                                            <div class="para">
                                                <p>{{ucfirst(@$flash_element->list_description) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        @endif

        @if($value == "simple_header_and_description")
            <section class="serivce-section pdt-40 pdb-40 z-index-1 position-relative">
                <div class="section-content">
                    <div class="container">
                        @if(@$header_descp_elements->heading!==null)
                            <div class="row pdb-40">
                                <div class="col"></div>
                                <div class="col-lg-8 col-xl-6">
                                    <div class="section-title-block text-center">
                                        <h5 class="text-primary-color anim-box-objects text-underline mrb-15">
                                            {{@$header_descp_elements->subheading ?? ''}}</h5>
                                        <h2>  {{@$header_descp_elements->heading ?? ''}}</h2>
                                    </div>
                                </div>
                                <div class="col"></div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12 mdt-20">
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
            </section>
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
                                <a href="{{@$map_descp->button_link}}" class="cs-btn-one btn-gradient-color btn-lg"> {{ucwords(@$map_descp->button ?? 'Contact us')}} </a>
                            @endif
                        </div>
                        <div class="col-lg-6 col-xl-6">
                            <iframe src="{{@$setting_data->google_map ?? ''}}"
                                    width="600" height="850" style="border:0;"
                                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        @if($value == "small_box_description")
            @if(count($process_elements)>0)
                <section class="feature-section pdt-50 pdb-130 bg-silver-light bg-no-repeat" style="background: #fff">
                    <div class="container">

                        <div class="row">
                            <div class="col"></div>
                            <div class="col-lg-8">
                                <div class="title-box-center text-center">
                                    <h5 class="sub-title-center text-primary-color line-top-center mrb-30"> {{ ucfirst($process_elements[0]->subheading ?? '') }}</h5>
                                    <h2 class="title">  {{@$process_elements[0]->heading}}</h2>
                                </div>
                            </div>
                            <div class="col"></div>
                        </div>

                        <div class="row">
                            @for ($i = 1; $i <=@$process_num; $i++)
                                <div class="col-md-4 col-xl-4 mt-4 d-flex align-items-stretch">
                                    <div class="feature-box mrb-lg-60">

                                        <div class="feature-content" style="background: #F7F8FC;">
                                            <div class="title">
                                                <h4>{{ucwords(@$process_elements[$i-1]->list_header ??'')}}</h4>
                                            </div>
                                            <div class="para">
                                                <p style="    text-align: justify;">   {{ucfirst(@$process_elements[$i-1]->list_description)}}</p>
                                            </div>
                                            <div class="link">
{{--                                                <a></a>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </section>
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
                <section class="request-a-call-back pdt-80 pdb-110 pdb-lg-70" data-background="images/bg/abs-bg7.png">
                <div class="section-title text-center wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="container">
                        <div class="row">
                            <div class="col"></div>
                            <div class="col-lg-8">
                                <div class="title-box-center">
                                    <h5 class="sub-title-center text-primary-color line-top-center mrb-30">{{ucwords(@$slider_list_elements[0]->description)}}</h5>
                                    <h2 class="title">{{ucwords(@$slider_list_elements[0]->heading)}}</h2>
                                </div>
                            </div>
                            <div class="col"></div>
                        </div>
                    </div>
                </div>
                <div class="section-content">
                    <div class="container">
                        <div class="row">
                            <div class="owl-carousel testimonial-items-3col mrb-lg-40">
                                @for ($i = 1; $i <=@$list_3; $i++)
                                    <div class="testimonial-item d-flex align-items-stretch" style="padding:0px; padding-bottom: 30px; background-color: #fff">
                                        <div class="feature-box mrb-lg-60">
                                            <div class="feature-thumb">
                                                <img class="img-full" src="{{ asset('/images/section_elements/list_1/thumb/thumb_'.$slider_list_elements[$i-1]->list_image) }}" alt="">
                                            </div>
                                            <div class="feature-content align-items-stretch" style="background: #F7F8FC">
                                                <div class="title">
                                                    <h3 style="  font-size: 22px;"> {{ucwords(@$slider_list_elements[$i-1]->list_header)}}</h3>
                                                </div>
                                                <div class="para">
                                                    <p> {{ elipsis(@$slider_list_elements[$i-1]->list_description)}} </p>
                                                </div>
                                                <div class="link">
                                                    <a href="{{route('slider.single',@$slider_list_elements[$i-1]->subheading)}}"><i class="fas fa-long-arrow-alt-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endfor

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endif
        @endif

        @if($value == "card_image")
            <section class="contact-section pdt-10 pdb-95 pdb-lg-90" data-background="{{asset('assets/frontend/images/bg/abs-bg1.png')}}">
                <div class="container">
                    @if($card_image->first()->heading)
                        <div class="col-md-12 col-xl-12 text-center">
                            <h5 class="mrb-15 text-primary-color sub-title-side-line">{{ $card_image->first()->subheading ?? '' }}</h5>
                            <h2 class="mrb-30" style="width: 60%;margin: auto">{{ $card_image->first()->heading ?? '' }}</h2>
                        </div>
                        <p class="mrb-30 mt-3 text-center">
                            {{ $card_image->first()->description ?? '' }}
                        </p>
                    @endif

                    @foreach($card_image as $row)
                        <div class="card custom-card mt-5">
                            <div class="row no-gutters">
                                <div class="col-md-{{ $row->image == 'left' ? '5':'7' }}">
                                    @if($row->image == 'left')
                                        @include('frontend.pages.partials.card_image')
                                    @else
                                        @include('frontend.pages.partials.card_text')
                                    @endif
                                </div>
                                <div class="col-md-{{ $row->image == 'left' ? '7':'5' }}">
                                    @if($row->image == 'right')
                                        @include('frontend.pages.partials.card_image')
                                    @else
                                        @include('frontend.pages.partials.card_text')
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
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
