@extends('frontend.layouts.master')
@section('title') Video Gallery @endsection
@section('styles')
@endsection
@section('content')

    <section class="page-title-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <div class="page-title-content">
                        <h3 class="title text-white">Our Video Gallery</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Our Video Gallery</li>
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
                <div class="row">
                    @foreach($videoGalleries as $video)
                        <div class="col-md-6 col-lg-6 col-xl-4">
                            <div class="case-study-item mrb-30">
                                <div class="popup-video-block video-popup">
                                    <img class="img-full" src="{{ getYoutubeThumbnail(@$video->url) }}" alt="">
                                    <a href="{{@$video->url}}" class="popup-video popup-youtube">
                                        <i class="webexflaticon flaticon-play-button" aria-hidden="true"></i>
                                        <span class="pulse-animation"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <nav class="pagination-nav pdt-30 text-center">
                            {{ $videoGalleries->links('vendor.pagination.default') }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


