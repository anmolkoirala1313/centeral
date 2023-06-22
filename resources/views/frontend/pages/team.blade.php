@extends('frontend.layouts.master')
@section('title') Team @endsection
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
                        <h3 class="title text-white">Our Team</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Our Team</li>
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
                    @foreach($teams as $team)
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="team-block mrb-30">
                                <div class="team-upper-part">
                                    <img class="img-full lazy" data-src="{{ ($team->image!==null) ? asset('/images/teams/'.$team->image ):''}}" alt="">
                                </div>
                                <div class="team-bottom-part">
                                    <h4 class="team-title mrb-5"><a>{{ucfirst(@$team->name)}}</a></h4>
                                    <h6 class="designation">{{ucfirst(@$team->post)}}</h6>
                                    @if(!empty(@$team->fb) || !empty(@$team->twitter) || !empty(@$team->linkedin) || !empty(@$team->insta))
                                        <ul class="social-list vertical-style list-sm">
                                            @if(!empty(@$team->fb))
                                                <li><a href="{{@$team->fb}}"><i class="fa-brands fa-facebook"></i></a></li>
                                            @endif
                                            @if(!empty(@$team->twitter))
                                                <li><a href="{{$team->twitter}}"><i class="fa-brands fa-twitter"></i></a></li>
                                            @endif
                                            @if(!empty(@$team->linkedin))
                                                <li><a href="{{$team->linkedin}}"><i class="fa-brands fa-linkedin"></i></a></li>
                                            @endif
                                            @if(!empty(@$team->insta))
                                                <li><a href="{{ $team->insta }}"><i class="fa-brands fa-instagram"></i></a></li>
                                            @endif
                                        </ul>
                                    @endif
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
