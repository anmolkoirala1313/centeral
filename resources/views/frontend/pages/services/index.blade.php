@extends('frontend.layouts.master')
@section('title') Services @endsection
@section('css')
    <style>

    .corpkit-content > .corpkit-content-inner {
        padding-top: 0;
        padding-bottom: 0;
    }
</style>
@endsection
@section('content')

    <section class="page-title-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <div class="page-title-content">
                        <h3 class="title text-white">Our Services</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Our Services</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="service-details-page pdt-110 pdb-90">
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
                <div class="col-xl-4 col-lg-5 sidebar-right">
                    @include('frontend.pages.services.sidebar')
                </div>
                <div class="col-xl-8 col-lg-7">
                    <div class="row">
                        @foreach(@$allservices as $index=>$service)
                            <div class="col-md-6 col-lg-6 col-xl-6">
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
                    <div class="row">
                        <div class="col-xl-12">
                            <nav class="pagination-nav pdt-30 text-center">
                                {{ $allservices->links('vendor.pagination.default') }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
