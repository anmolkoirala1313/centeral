@extends('frontend.layouts.master')
@section('title') Career @endsection
@section('css')
    <style>
        ul.job-list {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        ul.job-list > li.job-preview {
            background: #fff;
            border: 1px solid #d7e2e9;
            -webkit-border-radius: 0.4rem;
            -moz-border-radius: 0.4rem;
            border-radius: 0.4rem;
            padding: 1.5rem 2rem;
            margin-bottom: 1rem;
            float: left;
            width: 100%;
            -webkit-transition: all 0.3s ease 0s;
            -moz-transition: all 0.3s ease 0s;
            transition: all 0.3s ease 0s;
        }

        ul.job-list > li.job-preview:hover {
            cursor: pointer;
            -webkit-box-shadow: 0 3px 8px rgba(0,0,0,0.05);
            -moz-box-shadow: 0 3px 8px rgba(0,0,0,0.05);
            box-shadow: 0 3px 8px rgba(0,0,0,0.05);
        }

        .job-title {
            margin-top: 0.6rem;
        }

        .company {
            color: #96a4b1;
        }

        .job-preview .btn {
            margin-top: 1.1rem;
        }

        .btn-apply {
            text-transform: uppercase;
            font-size: 0.875rem;
            font-weight: 800;
            letter-spacing: 1px;
            background-color: transparent;
            color:  #0d59db;
            border: 2px solid #0d59db;
            padding: 0.6rem 2rem;
            -webkit-border-radius: 2rem;
            -moz-border-radius: 2rem;
            border-radius: 2rem;
        }

        .btn-apply:hover {
            background-color: #0d59db;
            color:  #fff;
            border: 2px solid #0d59db;
        }
    </style>
@endsection

@section('content')

    <section class="page-title-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <div class="page-title-content">
                        <h3 class="title text-white">Career</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Career</li>
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
                    <div class="col-md-10 offset-md-1">
                        <ul class="job-list">
                            @if(count($careers) > 0)
                                @foreach($careers as $index=>$career)
                                    <li class="job-preview">
                                        <div class="content float-left">
                                            <h4 class="job-title">
                                                Senior Web Designer
                                            </h4>
                                            <p class="company">
                                                <i class="fa fa-clock"></i>
                                                @if(@$career->type=="part_time")
                                                    Part Time
                                                @else
                                                    Full Time
                                                @endif

                                                @if(@$career->end_date)
                                                    <i class="fa fa-calendar-alt ml-2"></i>
                                                    Apply until: {{date('M j, Y',strtotime(@$career->end_date))}}
                                                @else
                                                    <i class="fa fa-calendar-alt ml-2"></i>
                                                    Apply until: {{date('M j, Y', strtotime('+3 days', strtotime(date("Y-m-d"))))}}
                                                @endif

                                                @if(@$career->salary)
                                                    <i class="fa fa-cash-register ml-2"></i>
                                                    Salary: {{$career->salary}}
                                                @endif
                                                </p>
                                        </div>
                                        @if($career->from_link)
                                            <a href="{{$career->from_link}}" class="btn btn-apply float-sm-right float-xs-left">
                                                Apply
                                            </a>
                                        @else
                                            <a href="{{ route('contact') }}" class="btn btn-apply float-sm-right float-xs-left">
                                                Apply
                                            </a>
                                        @endif

                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <nav class="pagination-nav pdt-30 text-center">
                            {{ $careers->links('vendor.pagination.default') }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
