@extends('frontend.layouts.master')
@section('title') Clients @endsection
@section('css')
    <style>

        .wrapper{
            margin: 100px auto;
            max-width: 1100px;
        }
        .wrapper nav{
            display: flex;
            justify-content: center;
        }
        .wrapper .items{
            display: flex;
            max-width: 720px;
            width: 100%;
            justify-content: space-between;
        }
        .items span{
            padding: 7px 25px;
            font-size: 18px;
            font-weight: 500;
            cursor: pointer;
            color: #007bff;
            border-radius: 50px;
            border: 2px solid #007bff;
            transition: all 0.3s ease;
        }
        .items span.active,
        .items span:hover{
            color: #fff;
            background: #007bff;
        }

        .gallery{
            display: flex;
            flex-wrap: wrap;
            margin-top: 30px;
        }
        .gallery .image{
            width: calc(100% / 4);
            padding: 7px;
        }
        .gallery .image span{
            display: flex;
            width: 100%;
            overflow: hidden;
        }
        .gallery .image img{
            width: 100%;
            vertical-align: middle;
            transition: all 0.3s ease;
        }
        .gallery .image:hover img{
            transform: scale(1.1);
        }
        .gallery .image.hide{
            display: none;
        }
        .gallery .image.show{
            animation: animate 0.4s ease;
        }
        @keyframes animate {
            0%{
                transform: scale(0.5);
            }
            100%{
                transform: scale(1);
            }
        }

        .preview-box{
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0.9);
            background: #fff;
            max-width: 700px;
            width: 100%;
            z-index: 5;
            opacity: 0;
            pointer-events: none;
            border-radius: 3px;
            padding: 0 5px 5px 5px;
            box-shadow: 0px 0px 15px rgba(0,0,0,0.2);
        }
        .preview-box.show{
            opacity: 1;
            pointer-events: auto;
            transform: translate(-50%, -50%) scale(1);
            transition: all 0.3s ease;
        }
        .preview-box .details{
            padding: 13px 15px 13px 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .details .title{
            display: flex;
            font-size: 18px;
            font-weight: 400;
        }
        .details .title p{
            font-weight: 500;
            margin-left: 5px;
        }
        .details .icon{
            color: #007bff;
            font-style: 22px;
            cursor: pointer;
        }
        .preview-box .image-box{
            width: 100%;
            display: flex;
        }
        .image-box img{
            width: 100%;
            border-radius: 0 0 3px 3px;
        }
        .shadow{
            position: fixed;
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            z-index: 2;
            display: none;
            background: rgba(0,0,0,0.4);
        }
        .shadow.show{
            display: block;
        }

        @media (max-width: 1000px) {
            .gallery .image{
                width: calc(100% / 3);
            }
        }
        @media (max-width: 800px) {
            .gallery .image{
                width: calc(100% / 2);
            }
        }
        @media (max-width: 700px) {
            .wrapper nav .items{
                max-width: 600px;
            }
            nav .items span{
                padding: 7px 15px;
            }
        }
        @media (max-width: 600px) {
            .wrapper{
                margin: 30px auto;
            }
            .wrapper nav .items{
                flex-wrap: wrap;
                justify-content: center;
            }
            nav .items span{
                margin: 5px;
            }
            .gallery .image{
                width: 100%;
            }
        }
       </style>
@endsection
@section('content')


    <section class="page-title-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <div class="page-title-content">
                        <h3 class="title text-white">Our Clients</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Our Clients</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="wrapper">
        <!-- filter Items -->
        <nav>
            <div class="items">
                <span class="item active" data-name="all">All</span>

            @foreach($country as $index=>$cn)
                    <span class="item" data-name="{{$index}}">{{ ucfirst($cn) }}</span>
                @endforeach
            </div>
        </nav>
        <!-- filter Images -->
        <div class="gallery">
            @foreach($clients as $client)
                <div class="image" data-name="{{$client->country}}">
                    <a href="{{ $client->link ?? '#' }}" target="{{ ($client->link !== null) ? '_blank':'' }}">
                        <img src="{{asset('/images/clients/'.@$client->image)}}" alt="">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('assets/common/filter.js') }}"></script>

@endsection
