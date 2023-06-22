@extends('frontend.layouts.seo_master')
@section('title') Job Detail @endsection
@section('css')
@endsection
@section('seo')
    <title>{{ucfirst(@$singleJob->name)}} | {{ucwords(@$setting_data->website_name ?? 'Careerlink')}}</title>
    <meta name='description' itemprop='description'  content='{{ucfirst(@$singleJob->meta_description)}}' />
    <meta name='keywords' content='{{ucfirst(@$singleJob->meta_tags)}}' />
    <meta property='article:published_time' content='{{@$singleJob->updated_at ?? @$singleJob->created_at}}' />
    <meta property='article:section' content='article' />
    <meta property="og:description" content="{{ucfirst(@$singleJob->meta_description)}}" />
    <meta property="og:title" content="{{ucfirst(@$singleJob->meta_title)}}" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:type" content="Coperation" />
    <meta property="og:locale" content="en-us" />
    <meta property="og:locale:alternate"  content="en-us" />
    <meta property="og:site_name" content="{{ucwords(@$setting_data->website_name ?? 'Careerlink')}}" />
    <meta property="og:image" content="{{asset('/images/job/'.@$singleJob->image)}}" />
    <meta property="og:image:url" content="{{asset('/images/job/'.@$singleJob->image)}}" />
    <meta property="og:image:size" content="300" />
@endsection
@section('content')

    <section class="page-title-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <div class="page-title-content">
                        <h3 class="title text-white">  {{ ucwords(@$singleJob->name) }}</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('job.list') }}">Jobs</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Job Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="project-details-page pdt-110 pdb-110">
        <div class="container">
            <div class="row mrb-60">
                <div class="col-xl-12">
                    <div class="blog-standared-img slider-blog">
                        <img class="img-full lazy" data-src="{{ ($singleJob->image !== null) ? asset('/images/job/'.@$singleJob->image): asset('assets/frontend/images/career.png')}}" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7 col-xl-8">
                    <div class="project-detail-text">
                        <h3 class="project-details-title mrt-0 mrb-15">
                            {{ ucwords(@$singleJob->name) }}
                        </h3>
                        <div class="project-details-content">
                            <div class="row mrb-10">
                                <div class="col-lg-12 custom-description">
                                    {!! $singleJob->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-news-tag-social-area job-social-area clearfix">
                        <div class="single-news-share text-left text-xl-right">
                            <h5 class="mrb-15">Social Share:</h5>
                            <ul class="social-icons">
                                <li>
                                    <a href="#"><i class="fab fa-facebook" onclick='fbShare("{{route('job.single',$singleJob->slug)}}")'></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-twitter" onclick='twitShare("{{route('job.single',$singleJob->slug)}}","{{ $singleJob->title }}")'></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fab fa-whatsapp" onclick='whatsappShare("{{route('job.single',$singleJob->slug)}}","{{ $singleJob->title }}")'></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="col-lg-5 col-xl-4 first-priority">
                    <div class="sidebar-widget">
                        <div class="project-sidebar">
                            <h4 class="mrb-40 widget-title">
                                {{ ucfirst(@$singleJob->title ?? 'General Details')}}
                            </h4>
                            <ul class="list project-info-list">
                                <li><span><i class="far fa-clock"></i> Date:</span> {{date('M j, Y',strtotime(@$singleJob->end_date))}}</li>
                                @if(@$singleJob->getJobCategories(@$singleJob->category_ids) !== 'N/A')
                                    <li><span><i class="far fa-hdd"></i> Categories:</span>
                                        <a>
                                            {{ucwords(@$singleJob->getJobCategories($singleJob->category_ids))}}
                                        </a>
                                    </li>
                                @endif
                                @if($singleJob->extra_company)
                                    <li><span><i class="far fa-building"></i> Company:</span> <a>
                                            {{ $singleJob->extra_company ?? '' }}
                                        </a>
                                    </li>
                                @endif
                                @if($singleJob->min_qualification)
                                    <li><span><i class="fa fa-graduation-cap"></i> Skills:</span>
                                        <a>
                                            {{ucwords(@$singleJob->min_qualification)}}
                                        </a>
                                    </li>
                                @endif
                                @if($singleJob->salary)
                                    <li><span><i class="fa fa-cash-register"></i> Salary:</span>
                                        <a>{{ucwords(@$singleJob->salary)}}</a>
                                    </li>
                                @endif
                                @if($singleJob->required_number)
                                    <li><span><i class="fa fa-sort-numeric-down-alt"></i> Required number:</span>
                                        <a>{{ucwords(@$singleJob->required_number)}}</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
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
