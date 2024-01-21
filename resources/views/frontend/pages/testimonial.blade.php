@extends('frontend.layouts.master')
@section('title')  Testimonials @endsection
@section('css')
@endsection
@section('content')
    <section class="page-title-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <div class="page-title-content">
                        <h3 class="title text-white">Testimonials</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Testimonials</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="request-a-call-back pdt-110 pdt-sm-50 pdb-110 pdb-lg-70" data-background="images/bg/abs-bg7.png">
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
                    @foreach($testimonials as $testimonial)
                        <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-stretch">
                            <div class="testimonial-item" style="    width: 100%;">
                                <span class="quote-icon fas fa-quote-right"></span>
                                <div class="testimonial-thumb">
                                    <img class="lazy" data-src="{{asset('/images/testimonial/'.@$testimonial->image)}}" alt="">
                                </div>
                                <h4 class="client-name">{{ucfirst($testimonial->name)}}</h4>
                                <h6 class="client-designation">{{ucfirst($testimonial->position)}}</h6>
                                <div class="testimonial-content">
                                    <p class="comments text-align-justify">
                                        {{ucfirst($testimonial->description)}}
                                    </p>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection
@section('js')
@endsection
