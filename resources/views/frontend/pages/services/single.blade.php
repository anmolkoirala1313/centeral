@extends('frontend.layouts.seo_master')
@section('css')
    <style>

    .custom-editor .media{
        display: block;
    }

    .custom-editor{
        font-size: 1.1875rem;
    }
    .canosoft-listing ul,.canosoft-listing ol {
        padding: 0;
        margin-left: 15px;
    }
		.home-one a.active {
		color: #fc653c !important;
	}

    </style>
@endsection
@section('seo')
    <title>{{ucfirst(@$singleService->title)}} | {{ucwords(@$setting_data->website_name ?? 'Careerlink')}}   </title>
    <meta name='description' itemprop='description'  content='{{ucfirst(@$singleService->meta_description)}}' />
    <meta name='keywords' content='{{ucfirst(@$singleService->meta_tags)}}' />
    <meta property='article:published_time' content='{{@$singleService->updated_at ?? @$singleService->created_at}}' />
    <meta property='article:section' content='article' />
    <meta property="og:description" content="{{ucfirst(@$singleService->meta_description)}}" />
    <meta property="og:title" content="{{ucfirst(@$singleService->meta_title)}}" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:type" content="Coperation" />
    <meta property="og:locale" content="en-us" />
    <meta property="og:locale:alternate"  content="en-us" />
    <meta property="og:site_name" content="{{ucwords(@$setting_data->website_name ?? 'Careerlink')}} " />
    <meta property="og:image" content="{{asset('/images/service/'.@$singleService->banner_image)}}" />
    <meta property="og:image:url" content="{{asset('/images/service/'.@$singleService->banner_image)}}" />
    <meta property="og:image:size" content="300" />
@endsection

@section('content')

    <section class="page-title-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <div class="page-title-content">
                        <h3 class="title text-white">{{@$singleService->title}}</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('service.frontend') }}">Service</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Our Services</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-single-news pdt-110 pdb-90">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="single-news-details news-wrapper mrb-30">
                        <div class="news-thumb">
                            <img class="img-full lazy" data-src="{{asset('/images/service/'.@$singleService->banner_image)}}" alt=""></a>
                        </div>
                        <div class="single-news-content">
                            <div class="news-bottom-meta mrt-20 mrb-10">
                                <span class="entry-date"><i class="far fa-calendar-alt mrr-10 text-primary-color"></i>
                                    {{date('j M, Y',strtotime(@$singleService->created_at))}}
                                </span>
                            </div>
                            <h3 class="entry-title text-capitalize mrb-20"><a>{{ ucwords(@$singleService->title) }}</a></h3>
                            <div class="entry-content custom-description">
                                {!! @$singleService->description ?? ''!!}
                            </div>
                            <div class="single-news-tag-social-area clearfix">
                                <div class="single-news-share text-left text-xl-right">
                                    <h5 class="mrb-15">Social Share:</h5>
                                    <ul class="social-icons">
                                        <li>
                                            <a href="#"><i class="fab fa-facebook" onclick='fbShare("{{route('service.single',$singleService->slug)}}")'></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-twitter"  onclick='twitShare("{{route('service.single',$singleService->slug)}}","{{ $singleService->title }}")'></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-whatsapp" onclick='whatsappShare("{{route('service.single',$singleService->slug)}}","{{ $singleService->title }}")'></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 sidebar-right">
                    @include('frontend.pages.services.sidebar')
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
<script>
    function fbShare(url) {
      window.open("https://www.facebook.com/sharer/sharer.php?u=" + url, "_blank", "toolbar=no, scrollbars=yes, resizable=yes, top=200, left=500, width=600, height=400");
    }
    function twitShare(url, title) {
        window.open("https://twitter.com/intent/tweet?text=" + encodeURIComponent(title) + "+" + url + "", "_blank", "toolbar=no, scrollbars=yes, resizable=yes, top=200, left=500, width=600, height=400");
    }
    function whatsappShare(url, title) {
        message = title + " " + url;
        window.open("https://api.whatsapp.com/send?text=" + message);
    }
    $( document ).ready(function() {
        let selector = $('.custom-description').find('table').length;
        if(selector>0){
            $('.custom-description').find('table').addClass('table table-bordered');
        }
    });
</script>
@endsection
