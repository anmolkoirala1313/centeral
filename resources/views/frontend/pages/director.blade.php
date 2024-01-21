@extends('frontend.layouts.master')
@section('title') Our Director @endsection
@section('css')
    <style>
        .team-member:after{
            height: 340px;
        }
    </style>
@endsection
@section('content')
    <section class="page-title-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <div class="page-title-content">
                        <h3 class="title text-white">Directors</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Our Directors</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="pdt-105 pdb-80 position-relative z-index-2" data-background="{{asset('assets/frontend/images/bg/abs-bg1.png')}}">
        <div class="section-content">
            <div class="container">
                <div class="row">
                    @foreach($directors as $row)
                        <div class="col-md-6 col-lg-6 col-xl-4">
                            <div class="team-block mrb-30">
                                <div class="team-upper-part">
                                    <img class="img-full lazy" data-src="{{ $row->image ? asset('/images/director/'.$row->image):'' }}" alt="">
                                </div>
                                <div class="team-bottom-part">
                                    <h4 class="team-title mrb-5"><a>{{ucfirst(@$row->heading ?? '')}}</a></h4>
                                    <h6 class="designation">{{ucfirst(@$row->designation ?? '')}}</h6>
                                    <p class="summary text-align-justify">{{@$row->summary ?? ''}}</p>
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
