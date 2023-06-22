@extends('frontend.layouts.master')
@section('title') Search | Jobs @endsection
@section('css')
@endsection
@section('content')

    <section class="page-title-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <div class="page-title-content">
                        <h3 class="title text-white">{{$title}}</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('job.list') }}">Jobs</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
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

                <div class="col-xl-8 col-lg-7">
                    <div class="row">
                        @foreach($alljobs as $job)
                            <div class="col-lg-12 col-xl-6">
                                <div class="feature-box mrb-lg-60">
                                    <div class="feature-thumb">
                                        <img class="img-full lazy" data-src="{{ ($job->image !== null) ? asset('/images/job/thumb/thumb_'.@$job->image): asset('assets/frontend/images/central.png')}}" alt="">
                                    </div>
                                    <div class="feature-content" style="background: #F7F8FC;">
                                        <div class="title">
                                            <h4>
                                                <a href="{{route('job.single',@$job->slug)}}">{{ucfirst($job->name)}}</a>
                                            </h4>
                                        </div>
                                        <div class="link">
                                            <a href="{{route('job.single',@$job->slug)}}">
                                                @if(@$job->end_date >= $today)
                                                    {{date('M j, Y',strtotime(@$job->start_date))}} - {{date('M j, Y',strtotime(@$job->end_date))}}
                                                @else
                                                    Expired
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <nav class="pagination-nav pdt-30 text-center">
                                {{ $alljobs->links('vendor.pagination.default') }}
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 sidebar-left">
                    @include('frontend.pages.jobs.sidebar')
                </div>
            </div>
        </div>
    </div>
@endsection
