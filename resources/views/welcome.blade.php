@extends('frontend.layouts.master')
@section('title') Home @endsection
@section('css')

@endsection
@section('content')
<!-- Home Slider Start -->
<section class="banner-section">
    <div class="home-carousel owl-theme owl-carousel">
        @foreach(@$sliders as $index=>$slider)
            <div class="slide-item">
                <div class="image-layer" data-background="{{ asset('/images/sliders/'.$slider->image) }}"></div>
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-xl-8 col-lg-12 col-md-12 content-column">
                            <div class="content-box">
                                <h1>{{@$slider->heading ?? ''}}</h1>
                                <p>{{@$slider->subheading ?? ''}}</p>
                                @if(@$slider->link)
                                    <div class="btn-box">
                                        <a href="{{@$slider->link ?? ''}}"
                                           class="cs-btn-one btn-gradient-color">
                                            {{@$slider->button ?? 'Contact us'}}
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

@if($homepage_info->mission)
    <!-- Features Section Start -->
    <section class="serivce-section pdt-0 pdb-40 z-index-1 position-relative">
    <div class="section-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xl-4">
                    <div class="service-box border-radius-default">
                        <div class="service-icon">
                            <span class="webexflaticon flaticon-target-1"></span>
                        </div>
                        <div class="service-content">
                            <div class="title">
                                <a><h3>Our Mission</h3></a>
                            </div>
                            <div class="para">
                                <p>{{ ucfirst(@$homepage_info->mission) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="service-box border-radius-default">
                        <div class="service-icon">
                            <span class="webexflaticon flaticon-analytics"></span>
                        </div>
                        <div class="service-content">
                            <div class="title">
                                <a><h3>Our Vision</h3></a>
                            </div>
                            <div class="para">
                                <p>{{ ucfirst(@$homepage_info->vision) }}.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="service-box border-radius-default">
                        <div class="service-icon">
                            <span class="webexflaticon flaticon-trophy"></span>
                        </div>
                        <div class="service-content">
                            <div class="title">
                                <a><h3>Our Value</h3></a>
                            </div>
                            <div class="para">
                                <p>{{ ucfirst(@$homepage_info->value) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@if(!empty($homepage_info->welcome_description))
    <section class="about-section anim-object pdb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 col-xl-6">
                    <div class="about-image-block-2 mrb-lg-60">
                        <img class="img-full lazy" data-src="{{ @$homepage_info->welcome_image ? asset('/images/home/welcome/'.@$homepage_info->welcome_image):''}}" alt="">
                        @if(@$homepage_info->welcome_video_link)
                            <div class="call-us-now">
                                <div class="video-popup-left mrb-lg-60">
                                    <a class="popup-youtube-left" href="{{ @$homepage_info->welcome_video_link }}"><i class="fas fa-play"></i></a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-12 col-xl-6">
                    <h2 class="title-under-line mrb-60">
                        {{$homepage_info->welcome_heading ?? ''}}
                    </h2>
                    <div class="mrb-20 text-justify">
                        {{ ucfirst(@$homepage_info->welcome_description) }}
                    </div>
                    @if(@$homepage_info->welcome_link)
                        <a href="{{@$homepage_info->welcome_link}}" class="cs-btn-one btn-gradient-color btn-lg">
                            {{ @$homepage_info->welcome_button ?? 'Read more'}}
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endif


@if(count($latestServices) > 0)
    <section class="bg-silver-light pdt-105 pdb-80" data-background="images/bg/abs-bg4.png">
    <div class="section-title mrb-30 mrb-md-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xl-6">
                    <h5 class="mrb-15 text-primary-color sub-title-side-line">What We Offer</h5>
                    <h2 class="mrb-30">Our services for your business</h2>
                </div>
                <div class="col-lg-4 col-xl-6 align-self-center text-left text-lg-right">
                    <a href="{{ route('service.frontend') }}" class="cs-btn-one btn-gradient-color btn-md">All Services</a>
                </div>
            </div>
        </div>
    </div>
    <div class="section-content">
        <div class="container">
            <div class="row">
                @foreach(@$latestServices as $index=>$service)
                    <div class="col-md-6 col-lg-6 col-xl-4">
                        <div class="case-study-item mrb-30">
                            <div class="case-study-thumb">
                                <img class="img-full lazy" data-src="{{asset('/images/service/thumb/thumb_'.@$service->banner_image)}}" alt="">
                                <div class="case-study-link-icon">
                                    <a href="{{route('service.single',$service->slug)}}"><i class="webex-icon-attachment1"></i></a>
                                </div>
                                <div class="case-study-details p-4">
                                    <h4 class="case-study-title side-line mb-3"> {{ucwords(@$service->title)}}</h4>
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

@if(!empty($homepage_info->action_heading))
    <section class="pdt-90 pdb-20 section-white-typo" data-background="{{asset('assets/frontend/images/bg/5.jpg')}}" data-overlay-dark="8"
             style="background-image: url({{asset('assets/frontend/images/bg/5.jpg')}});">
        <div class="section-title text-center">
            <div class="container">
                <div class="row">
                    <div class="col"></div>
                    <div class="col-lg-9 col-xl-12">
                        <div class="section-title-block">
                            <h2>{{@$homepage_info->action_heading}}</h2>
                        </div>
                        <a href="{{@$homepage_info->action_link2}}" class="cs-btn-one btn-gradient-color btn-md has-icon mrt-20">{{@$homepage_info->action_link ??  'Learn more'}}</a>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
        </div>
    </section>
@endif

@if(!empty($homepage_info->core_main_heading))
    <section class="serivce-section bg-silver-light pdt-105 pdb-80" data-background="{{asset('assets/frontend/images/bg/abs-bg7.png')}}"
         style="background-image: url({{asset('assets/frontend/images/bg/abs-bg7.png')}});">
        <div class="section-title">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="section-title-left-part mrb-sm-30">
                            <div class="section-left-sub-title mb-20">
                                <h5 class="sub-title text-primary-color">{{ucfirst(@$homepage_info->core_main_description)}}</h5>
                            </div>
                            <h2 class="title"> {{ucfirst(@$homepage_info->core_main_heading)}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-xl-4">
                        <div class="service-box h-90">
                            <div class="service-icon">
                                <span class="webexflaticon flaticon-handshake"></span>
                            </div>
                            <div class="service-content">
                                <div class="title">
                                    <a><h3>{{ucwords(@$homepage_info->core_heading1 ?? '')}}</h3></a>
                                </div>
                                <div class="para">
                                    <p>{{ucfirst(@$homepage_info->core_description1 ?? '')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="service-box h-90">
                            <div class="service-icon">
                                <span class="webexflaticon flaticon-auction"></span>
                            </div>
                            <div class="service-content">
                                <div class="title">
                                    <a><h3>{{ucwords(@$homepage_info->core_heading2)}}</h3></a>
                                </div>
                                <div class="para">
                                    <p>  {{ucfirst(@$homepage_info->core_description2)}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="service-box h-90">
                            <div class="service-icon">
                                <span class="webexflaticon flaticon-search-1"></span>
                            </div>
                            <div class="service-content">
                                <div class="title">
                                    <a href="#"><h3>{{ucwords(@$homepage_info->core_heading3)}}</h3></a>
                                </div>
                                <div class="para">
                                    <p> {{ucfirst(@$homepage_info->core_description3)}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="service-box h-90">
                            <div class="service-icon">
                                <span class="webexflaticon flaticon-benchmark"></span>
                            </div>
                            <div class="service-content">
                                <div class="title">
                                    <a href="#"><h3>{{ucwords(@$homepage_info->core_heading4)}}</h3></a>
                                </div>
                                <div class="para">
                                    <p>{{ucfirst(@$homepage_info->core_description4)}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="service-box h-90">
                            <div class="service-icon">
                                <span class="webexflaticon flaticon-search"></span>
                            </div>
                            <div class="service-content">
                                <div class="title">
                                    <a href="#"><h3>{{ucwords(@$homepage_info->core_heading5)}}</h3></a>
                                </div>
                                <div class="para">
                                    <p> {{ucfirst(@$homepage_info->core_description5)}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="service-box h-90">
                            <div class="service-icon">
                                <span class="webexflaticon flaticon-meeting"></span>
                            </div>
                            <div class="service-content">
                                <div class="title">
                                    <a href="#"><h3>{{ucwords(@$homepage_info->core_heading6)}}</h3></a>
                                </div>
                                <div class="para">
                                    <p>   {{ucfirst(@$homepage_info->core_description6)}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endif

@if(@$recruitments[0]->heading)
    <section class="feature-section pdt-50 pdb-130 bg-silver-light bg-no-repeat" style="background: #fff">
    <div class="container">

        <div class="row">
            <div class="col"></div>
            <div class="col-lg-8">
                <div class="title-box-center text-center">
                    <h5 class="sub-title-center text-primary-color line-top-center mrb-30">Working Process</h5>
                    <h2 class="title">How we work for our valued customers</h2>
                </div>
            </div>
            <div class="col"></div>
        </div>

        <div class="row">
            @foreach(@$recruitments as $index=>$recruitment)
                <div class="col-md-4 col-xl-3 mt-4">
                    <div class="feature-box mrb-lg-60">

                        <div class="feature-content" style="background: #F7F8FC;">
                            <div class="title">
                                <h4>{{@$recruitment->title}}</h4>
                            </div>
                            <div class="para">
                                <p> {{ $recruitment->icon_description ?? '' }}</p>
                            </div>
                            <div class="link">
                                <a> {{ $index+1 }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<section class="pdt-110 pdb-60" data-background="images/bg/3.jpg" data-overlay-dark="8">
    <div class="section-content">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 col-xl-6">
                    <div class="about-image-block-3 mrr-30 mrb-lg-60">
                        <img class="img-full" src="images/about/ab4.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-12 col-xl-6">
                    <h5 class="mrb-15 text-white sub-title-side-line">Why Choose Us?</h5>
                    <h2 class="text-white mrb-30">We Help You to Grow <br><span class="f-weight-400">Your Business</span> Quickly</h2>
                    <p class="text-white mrb-60">Distinctively exploit optimal alignments for intuitive. Quickly coordinate business applications through revolutionary cataly technologies rather than development optimal alignments for intuitive.</p>
                    <div class="video-popup-left mrb-lg-60">
                        <a class="popup-youtube-left" href="https://www.youtube.com/watch?v=Fvae8nxzVz4"><i class="fas fa-play"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Divider Section End -->
<!-- About Section Start -->
<section class="about-section pdt-165 pdt-lg-100 pdb-100 pdb-sm-50">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12 col-xl-6">
                <h5 class="mrb-15 text-primary-color sub-title-side-line">Professional Skills</h5>
                <h2 class="mrb-30">We Help You to Grow <br><span class="f-weight-400">Your Business</span> Quickly</h2>
                <p class="mrb-30">Distinctively exploit optimal alignments for intuitive. Quickly coordinate business applications through revolutionary cataly technologies rather than development optimal alignments for intuitive.</p>
                <div class="skills mrb-lg-60">
                    <div class="skill-item">
                        <div class="skill-header">
                            <h6 class="skill-title">Business Consulting</h6>
                            <div class="skill-percentage">
                                <div class="count-box"><span class="count-text" data-speed="2100" data-stop="85">0</span>%</div>
                            </div>
                        </div>
                        <div class="skill-bar">
                            <div class="bar-inner">
                                <div class="bar progress-line" data-width="85"></div>
                            </div>
                        </div>
                    </div>
                    <div class="skill-item">
                        <div class="skill-header">
                            <h6 class="skill-title">Market Analysis</h6>
                            <div class="skill-percentage">
                                <div class="count-box"><span class="count-text" data-speed="2000" data-stop="96">0</span>%</div>
                            </div>
                        </div>
                        <div class="skill-bar">
                            <div class="bar-inner">
                                <div class="bar progress-line" data-width="96"></div>
                            </div>
                        </div>
                    </div>
                    <div class="skill-item">
                        <div class="skill-header">
                            <h6 class="skill-title">Money Management</h6>
                            <div class="skill-percentage">
                                <div class="count-box"><span class="count-text" data-speed="1900" data-stop="90">0</span>%</div>
                            </div>
                        </div>
                        <div class="skill-bar">
                            <div class="bar-inner">
                                <div class="bar progress-line" data-width="90"></div>
                            </div>
                        </div>
                    </div>
                    <div class="skill-item">
                        <div class="skill-header">
                            <h6 class="skill-title">Business Growth</h6>
                            <div class="skill-percentage">
                                <div class="count-box"><span class="count-text" data-speed="1800" data-stop="88">0</span>%</div>
                            </div>
                        </div>
                        <div class="skill-bar">
                            <div class="bar-inner">
                                <div class="bar progress-line" data-width="88"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xl-6 wow fadeInLeft mrb-lg-40" data-wow-delay="0ms" data-wow-duration="1000ms">
                <h5 class="mrb-15 text-primary-color sub-title-side-line">Some Important FAQ's</h5>
                <h2 class="mrb-20">Common Frequently Asked Questions</h2>
                <div class="faq-block">
                    <div class="accordion">
                        <div class="accordion-item">
                            <div class="accordion-header active">
                                <h5 class="title">Q: What happens during Freshers' Week?</h5>
                                <span class="fas fa-arrow-right"></span>
                            </div>
                            <div class="accordion-body">
                                <p>A: Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.</p>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header">
                                <h5 class="title">Q: What is the transfer application process?</h5>
                                <span class="fas fa-arrow-right"></span>
                            </div>
                            <div class="accordion-body">
                                <p>A: Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.</p>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header">
                                <h5 class="title">Q: Why should I attend community college?</h5>
                                <span class="fas fa-arrow-right"></span>
                            </div>
                            <div class="accordion-body">
                                <p>A: Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Section End -->
<!-- News Section Start -->
<section class="bg-silver-light pdt-105 pdb-80" data-background="images/bg/abs-bg4.png">
    <div class="section-title mrb-30 mrb-md-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xl-6">
                    <h5 class="mrb-15 text-primary-color sub-title-side-line">News And Updates</h5>
                    <h2 class="mrb-30">Let's Checkout our All Latest News</h2>
                </div>
                <div class="col-lg-4 col-xl-6 align-self-center text-left text-lg-right">
                    <a href="#" class="cs-btn-one btn-gradient-color btn-md">All News</a>
                </div>
            </div>
        </div>
    </div>
    <div class="section-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="news-wrapper mrb-30 mrb-sm-40">
                        <div class="news-thumb">
                            <img class="img-full" src="images/news/01.jpg" alt="">
                            <div class="news-top-meta">
                                <span class="entry-category">Business</span>
                            </div>
                        </div>
                        <div class="news-details">
                            <div class="news-description mb-20">
                                <h4 class="the-title mrb-30"><a href="#">Tech Entrepreneur Credits Paper For Success</a></h4>
                                <div class="news-bottom-meta">
                                    <span class="entry-date mrr-20"><i class="far fa-calendar-alt mrr-10 text-primary-color"></i>01 Jan, 2020</span>
                                    <span class="entry-author"><i class="far fa-user mrr-10 text-primary-color"></i>Admin</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="news-wrapper mrb-30 mrb-sm-40">
                        <div class="news-thumb">
                            <img class="img-full" src="images/news/02.jpg" alt="">
                            <div class="news-top-meta">
                                <span class="entry-category">Business</span>
                            </div>
                        </div>
                        <div class="news-details">
                            <div class="news-description mb-20">
                                <h4 class="the-title mrb-30"><a href="#">Tech Entrepreneur Credits Paper For Success</a></h4>
                                <div class="news-bottom-meta">
                                    <span class="entry-date mrr-20"><i class="far fa-calendar-alt mrr-10 text-primary-color"></i>01 Jan, 2020</span>
                                    <span class="entry-author"><i class="far fa-user mrr-10 text-primary-color"></i>Admin</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4">
                    <div class="news-wrapper mrb-30 mrb-sm-40">
                        <div class="news-thumb">
                            <img class="img-full" src="images/news/03.jpg" alt="">
                            <div class="news-top-meta">
                                <span class="entry-category">Business</span>
                            </div>
                        </div>
                        <div class="news-details">
                            <div class="news-description mb-20">
                                <h4 class="the-title mrb-30"><a href="#">Tech Entrepreneur Credits Paper For Success</a></h4>
                                <div class="news-bottom-meta">
                                    <span class="entry-date mrr-20"><i class="far fa-calendar-alt mrr-10 text-primary-color"></i>01 Jan, 2020</span>
                                    <span class="entry-author"><i class="far fa-user mrr-10 text-primary-color"></i>Admin</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- News Section End -->
<!-- Testimonials Section Start -->
<section class="request-a-call-back pdt-100 pdt-sm-50 pdb-110 pdb-lg-70" data-background="images/bg/abs-bg7.png">
    <div class="section-title text-center wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
        <div class="container">
            <div class="row">
                <div class="col"></div>
                <div class="col-lg-8">
                    <div class="title-box-center">
                        <h5 class="shadow-text">Reviews</h5>
                        <h5 class="sub-title-center text-primary-color line-top-center mrb-30">Testimonials</h5>
                        <h2 class="title">Customers Reviews</h2>
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
                    <div class="testimonial-item">
                        <span class="quote-icon fas fa-quote-right"></span>
                        <div class="testimonial-thumb">
                            <img src="images/testimonials/testimonial-img1.jpg" alt="">
                        </div>
                        <h4 class="client-name">Aurther Maxwell</h4>
                        <h6 class="client-designation">CEO, Apple Inc.</h6>
                        <div class="testimonial-content">
                            <p class="comments">Lorem ipsum dolor sit amet, consectetur adipisicing elit oluptatibus blanditiis amet optio fugiat nisi est repellendus iusto quis harum laboriosam nostrum unde distinctio</p>
                            <ul class="star-rating">
                                <li><i class="webex-icon-star-full text-primary-color"></i></li>
                                <li><i class="webex-icon-star-full text-primary-color"></i></li>
                                <li><i class="webex-icon-star-full text-primary-color"></i></li>
                                <li><i class="webex-icon-star-half text-primary-color"></i></li>
                                <li><i class="webex-icon-star-empty text-primary-color"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <span class="quote-icon fas fa-quote-right"></span>
                        <div class="testimonial-thumb">
                            <img src="images/testimonials/testimonial-img2.jpg" alt="">
                        </div>
                        <h4 class="client-name">Aurther Maxwell</h4>
                        <h6 class="client-designation">CEO, Apple Inc.</h6>
                        <div class="testimonial-content">
                            <p class="comments">Lorem ipsum dolor sit amet, consectetur adipisicing elit oluptatibus blanditiis amet optio fugiat nisi est repellendus iusto quis harum laboriosam nostrum unde distinctio</p>
                            <ul class="star-rating">
                                <li><i class="webex-icon-star-full text-primary-color"></i></li>
                                <li><i class="webex-icon-star-full text-primary-color"></i></li>
                                <li><i class="webex-icon-star-full text-primary-color"></i></li>
                                <li><i class="webex-icon-star-half text-primary-color"></i></li>
                                <li><i class="webex-icon-star-empty text-primary-color"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <span class="quote-icon fas fa-quote-right"></span>
                        <div class="testimonial-thumb">
                            <img src="images/testimonials/testimonial-img3.jpg" alt="">
                        </div>
                        <h4 class="client-name">Aurther Maxwell</h4>
                        <h6 class="client-designation">CEO, Apple Inc.</h6>
                        <div class="testimonial-content">
                            <p class="comments">Lorem ipsum dolor sit amet, consectetur adipisicing elit oluptatibus blanditiis amet optio fugiat nisi est repellendus iusto quis harum laboriosam nostrum unde distinctio</p>
                            <ul class="star-rating">
                                <li><i class="webex-icon-star-full text-primary-color"></i></li>
                                <li><i class="webex-icon-star-full text-primary-color"></i></li>
                                <li><i class="webex-icon-star-full text-primary-color"></i></li>
                                <li><i class="webex-icon-star-half text-primary-color"></i></li>
                                <li><i class="webex-icon-star-empty text-primary-color"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonials Section End -->
<!-- Clients Section Start -->
<section class="bg-silver-light pdt-60 pdb-60">
    <div class="section-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-carousel client-items">
                        <div class="client-item">
                            <img src="images/clients/client1.png" alt="">
                        </div>
                        <div class="client-item">
                            <img src="images/clients/client2.png" alt="">
                        </div>
                        <div class="client-item">
                            <img src="images/clients/client4.png" alt="">
                        </div>
                        <div class="client-item">
                            <img src="images/clients/client5.png" alt="">
                        </div>
                        <div class="client-item">
                            <img src="images/clients/client1.png" alt="">
                        </div>
                        <div class="client-item">
                            <img src="images/clients/client6.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Clients Section End -->
@endsection
@section('js')
    <script src="{{asset('assets/frontend/js/lightbox.min.js')}}"></script>
@endsection
