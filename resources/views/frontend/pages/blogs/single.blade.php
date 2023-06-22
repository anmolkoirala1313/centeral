@extends('frontend.layouts.seo_master')
@section('seo')
    <title>{{ucfirst(@$singleBlog->title)}} |  {{ucwords(@$setting_data->website_name ?? 'Careerlink')}}</title>
    <meta name='description' itemprop='description'  content='{{ucfirst(@$singleBlog->meta_description)}}' />
    <meta name='keywords' content='{{ucfirst(@$singleBlog->meta_tags)}}' />
    <meta property='article:published_time' content='{{ @$singleBlog->updated_at ?? $singleBlog->created_at}}' />
    <meta property='article:section' content='article' />
    <meta property="og:description" content="{{ucfirst(@$singleBlog->meta_description)}}" />
    <meta property="og:title" content="{{ucfirst(@$singleBlog->meta_title)}}" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:type" content="Coperation" />
    <meta property="og:locale" content="en-us" />
    <meta property="og:locale:alternate"  content="en-us" />
    <meta property="og:site_name" content="{{ucwords(@$setting_data->website_name ?? 'Careerlink')}}" />
    <meta property="og:image" content="{{asset('/images/blog/'.@$singleBlog->image)}}" />
    <meta property="og:image:url" content="{{asset('/images/blog/'.@$singleBlog->image)}}" />
    <meta property="og:image:size" content="300" />
@endsection
@section('content')

    <section class="page-title-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <div class="page-title-content">
                        <h3 class="title text-white">{{ @$singleBlog->title }}</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('blog.frontend') }}">Blog</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Blog details</li>
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
                            <img class="img-full lazy" data-src="{{ asset('/images/blog/'.@$singleBlog->image)}}" alt=""></a>
                        </div>
                        <div class="single-news-content">
                            <div class="news-bottom-meta mrt-20 mrb-10">
                                <span class="entry-date"><i class="far fa-calendar-alt mrr-10 text-primary-color"></i>
                                    {{date('j M, Y',strtotime(@$singleBlog->created_at))}}
                                </span>
                            </div>
                            <h3 class="entry-title text-capitalize mrb-20"><a>{{ ucwords(@$singleBlog->title) }}</a></h3>
                            <div class="entry-content custom-description">
                                {!! $singleBlog->description !!}
                            </div>
                            <div class="single-news-tag-social-area clearfix">
                                <div class="single-news-tags f-left f-left-none mrb-lg-30">
                                    <h5 class="mrb-15">Category:</h5>
                                    <ul class="list">
                                        <li><a href="{{route('blog.category',$singleBlog->category->slug)}}">{{@$singleBlog->category->name }}</a></li>
                                    </ul>
                                </div>
                                <div class="single-news-share text-left text-xl-right">
                                    <h5 class="mrb-15">Social Share:</h5>
                                    <ul class="social-icons">
                                        <li>
                                            <a href="#"><i class="fab fa-facebook" onclick='fbShare("{{route('blog.single',$singleBlog->slug)}}")'></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-twitter"  onclick='twitShare("{{route('blog.single',$singleBlog->slug)}}","{{ $singleBlog->title }}")'></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fab fa-whatsapp" onclick='whatsappShare("{{route('blog.single',$singleBlog->slug)}}","{{ $singleBlog->title }}")'></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 sidebar-right">
                    @include('frontend.pages.blogs.sidebar')
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
                $('.custom-description').find('table').addClass('table table-bordered table-responsive');
            }
        });
</script>
@endsection
