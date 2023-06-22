@extends('frontend.layouts.master')
@section('title') {{ucwords(@$singleAlbum->name)}} | Album @endsection
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


    <section class="page-title-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <div class="page-title-content">
                        <h3 class="title text-white">{{ucwords(@$singleAlbum->name)}} </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{route('album')}}">Albums</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Gallery Images</li>
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
                    @if(count(@$singleAlbum->gallery) > 0)
                        <div id="gallery" style="padding: 0px 30px 0 30px;">
                            <div id="image-gallery">
                                <div class="row">
                                    @foreach($singleAlbum->gallery as $gallery)
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
                                            <div class="img-wrapper">
                                                <a href="{{asset('/images/albums/gallery/'.@$gallery->filename)}}">
                                                    <img data-src="{{asset('/images/albums/gallery/'.@$gallery->filename)}}" class="img-responsive lazy"></a>
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
@endsection
@section('js')
    <script src="{{asset('assets/common/lightbox.min.js')}}"></script>
@endsection
