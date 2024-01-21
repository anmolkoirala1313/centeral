@extends('frontend.layouts.master')
@section('title')  Page Not Found @endsection
@section('content')


    <section class="page-title-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <div class="page-title-content">
                        <h3 class="title text-white">404</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">404 Error</li>
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
                    <h2 class="faq-title mrb-20">  Oops! Nothing Was Found</h2>
                    <p class="mrb-20">Sorry, we could not find the page you where looking for. We suggest <br> that you
                        return to homepage.</p>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <a href="/" class="cs-btn-one btn-md btn-round btn-primary-color element-shadow">HomePage</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
