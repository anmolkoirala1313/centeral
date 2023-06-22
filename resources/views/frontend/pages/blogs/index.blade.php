@extends('frontend.layouts.master')
@section('title') Blog @endsection

@section('content')

    <section class="page-title-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <div class="page-title-content">
                        <h3 class="title text-white">Our Blog</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Our Blog</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="service-details-page pdt-110 pdb-90">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5 sidebar-right">
                    @include('frontend.pages.blogs.sidebar')
                </div>
                <div class="col-xl-8 col-lg-7">
                    <div class="row">
                        @foreach($allPosts as $post)
                            <div class="col-lg-12 col-xl-6">
                                <div class="news-wrapper mrb-30 mrb-sm-40">
                                    <div class="news-thumb">
                                        <img class="img-full lazy" data-src="{{asset('/images/blog/'.@$post->image) }}" alt="">
                                        <div class="news-top-meta">
                                            <span class="entry-category">{{ucfirst(@$post->category->name)}}</span>
                                        </div>
                                    </div>
                                    <div class="news-details">
                                        <div class="news-description mb-20">
                                            <h4 class="the-title mrb-30">
                                                <a href="{{route('blog.single',$post->slug)}}">
                                                    {{@$post->title}}
                                                </a>
                                            </h4>
                                            <div class="news-bottom-meta">
                                                <span class="entry-date mrr-20">
                                                    <i class="far fa-calendar-alt mrr-10 text-primary-color"></i>
                                                    {{date('d M Y', strtotime($post->created_at))}}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <nav class="pagination-nav pdt-30 text-center">
                                {{ $allPosts->links('vendor.pagination.default') }}

                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
