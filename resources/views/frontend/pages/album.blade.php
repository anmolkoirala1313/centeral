@extends('frontend.layouts.master')
@section('title') Album @endsection
@section('css')
@endsection
@section('content')

    <section class="page-title-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <div class="page-title-content">
                        <h3 class="title text-white">Our Albums</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Our Albums</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-silver-light pdt-105 pdb-80" data-background="{{asset('assets/frontend/images/bg/abs-bg4.png')}}" style="background-image: url({{asset('assets/frontend/images/bg/abs-bg4.png')}});">
        <div class="section-content">
            <div class="container">
                @if($heading)
                    <div class="row">
                        <div class="col-md-12 col-xl-12 text-center">
                            @if($heading->subtitle)
                                <h5 class="mrb-15 text-primary-color sub-title-side-line">{{ $heading->subtitle ?? '' }}</h5>
                            @endif
                            <h2 class="mrb-30" style="width: 60%;margin: auto">{{ $heading->title ?? '' }}</h2>
                        </div>
                        <p class="mrb-30 mt-3 text-center">
                            {!! $heading->description ?? ''  !!}
                        </p>
                    </div>
                @endif
                <div class="row">
                    @foreach($albums as $album)
                        <div class="col-md-6 col-lg-6 col-xl-4">
                            <div class="case-study-item mrb-30">
                                <div class="case-study-thumb">
                                    <img class="img-full lazy" data-src="{{asset('/images/albums/'.@$album->cover_image)}}" alt="">
                                    <div class="case-study-details p-4">
                                        <a href="{{route('album.gallery',$album->slug)}}">
                                            <h6 class="case-study-category side-line mrb-5">Images: ({{count(@$album->gallery)}})</h6>
                                            <h4 class="case-study-title">{{ucwords(@$album->name)}}</h4>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection


