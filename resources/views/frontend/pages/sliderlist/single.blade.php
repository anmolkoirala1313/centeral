@extends('frontend.layouts.master')
@section('title')  {{ucwords(@$singleSlider->list_header)}} @endsection
@section('css')
@endsection
@section('content')

    <section class="page-title-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <div class="page-title-content">
                        <h3 class="title text-white">{{ucwords(@$singleSlider->list_header)}}</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item">
                                    <a href="{{route('page',$singleSlider->section->page->slug)}}">
                                        {{ucwords(@$singleSlider->section->page->name)}}
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Slider list details</li>
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
                            <img class="img-full lazy" data-src="{{ asset('/images/section_elements/list_1/'.$singleSlider->list_image) }}" alt=""></a>
                        </div>
                        <div class="single-news-content">
                            <div class="news-bottom-meta mrt-20 mrb-10">
                                <span class="entry-date"><i class="far fa-calendar-alt mrr-10 text-primary-color"></i>
                                    {{date('j M, Y',strtotime(@$singleService->created_at))}}
                                </span>
                            </div>
                            <h3 class="entry-title text-capitalize mrb-20"><a>{{ ucwords(@$singleSlider->list_header ) }}</a></h3>
                            <div class="entry-content custom-description">
                                {!! @$singleSlider->list_description !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 sidebar-right">
                    @include('frontend.pages.sliderlist.sidebar')
                </div>
            </div>
        </div>
    </section>
@endsection
