@extends('formbuilder::front_layout')
@section('title') {{ ucfirst($pageTitle) }} @endsection
@section('css')

    <style>
        /* .footable .btn .caret {
            margin-left: 0;
            display: none;
        } */

        .rendered-form h1{
            font-family: 'Kumbh Sans', sans-serif;
            margin-bottom: 25px;
            font-weight: 700;
            color: #293043;
            line-height: 1.22;
            font-size: 35px;
        }
        .card-title{
            color: #27aae1;
            text-decoration: none;
            font-size: 18px;
            font-weight: 500;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            display: -ms-inline-flexbox;
            display: inline-flex;
        }

        .card-title::before{
            content: url(/assets/frontend/images/shapes/section-subtitle-line.png);
            margin: -15px 15px 0 -25px;
            float: left;
            line-height: 0;
            font-size: 40px;
            font-weight: 300;
            font-family: 'Font Awesome 5 Pro';
        }
        .rendered-form .form-control {
            padding: 17px 17px 17px 17px!important;
            color: #000000!important;
            border-style: solid!important;
            border-width: 1px 1px 1px 1px!important;
            border-color: #EBEBEB!important;
            background-color: #F1F1F1!important;
            width: 100%;
            max-width: 100%;
            opacity: 1;
        }
        .rendered-form p{
            margin: 0px 0 10px!important;
        }

        .rendered-form label{
            font-size: 15px!important;
            color: #454545!important;
            font-family: 'Poppins', sans-serif!important;
        }

        input.parsley-success,
        select.parsley-success,
        textarea.parsley-success {
            color: #468847;
            background-color: #DFF0D8;
            border: 1px solid #D6E9C6;
        }

        input.parsley-error,
        select.parsley-error,
        textarea.parsley-error {
            color: #B94A48;
            background-color: #F2DEDE;
            border: 1px solid #EED3D7;
        }

        .parsley-errors-list {
            margin: 2px 0 3px;
            padding: 0;
            list-style-type: none;
            font-size: 0.9em;
            line-height: 0.9em;
            opacity: 0;
            color: #B94A48;

            transition: all .3s ease-in;
            -o-transition: all .3s ease-in;
            -moz-transition: all .3s ease-in;
            -webkit-transition: all .3s ease-in;
        }

        .topbar-items .social-icons li a i {
            line-height: 50px;
        }
        .parsley-errors-list.filled {
            opacity: 1;
        }

        .rendered-form .fb-radio-group .radio label {
            display: inline;
        }

        .rendered-form .fb-radio-group .radio-inline label {
            display: inline ;
            margin-bottom: 0;
        }

        input[type=checkbox], input[type=radio] {
            box-sizing: border-box;
            padding: 0;
        }

        .rendered-form .fb-radio-group .radio input{
            position: absolute !important;
            margin-top: 0.3rem !important;
            margin-left: -1.25rem !important;
        }
        .rendered-form .fb-radio-group .radio-inline input {
            position: static !important;
            margin-top: 0 !important;
            margin-right: 0.3125rem !important;
            margin-left: 0 !important;
        }

        .rendered-form .fb-radio-group .radio {
            position: relative;
            display: block;
            padding-left: 1.25rem !important;
        }

        .rendered-form .fb-radio-group .radio-inline {
            display: -ms-inline-flexbox;
            display: inline-flex;
            -ms-flex-align: center;
            align-items: center;
            padding-left: 0;
            margin-right: 0.75rem;
            position: relative;
        }

        .rendered-form .fb-checkbox-group .checkbox {
            position: relative;
            display: block;
            padding-left: 1.25rem !important;
        }

        .rendered-form .fb-checkbox-group .checkbox input {
            position: absolute !important;
            margin-top: 0.3rem !important;
            margin-left: -1.25rem !important;
        }

        .rendered-form .fb-checkbox-group .checkbox label {
            display: inline-block;
            margin-bottom: 0;
        }

        .rendered-form .fb-file input {
            padding: 10px 0px 40px 25px!important;
        }

        .rendered-form .fb-checkbox-group .checkbox-inline {
            display: -ms-inline-flexbox;
            display: inline-flex;
            -ms-flex-align: center;
            align-items: center;
            padding-left: 0;
            margin-right: 0.75rem;
            position: relative;
        }

        .rendered-form .fb-checkbox-group .checkbox-inline input {
            position: static !important;
            margin-top: 0 !important;
            margin-right: 0.3125rem !important;
            margin-left: 0 !important;
        }

        .rendered-form .fb-checkbox-group .checkbox-inline label {
            display: inline-block;
            margin-bottom: 0;
        }

        .card {
            position: relative !important;
            display: -webkit-box !important;
            display: -ms-flexbox !important;
            display: flex !important;
            -webkit-box-orient: vertical !important;
            -webkit-box-direction: normal !important;
            -ms-flex-direction: column !important;
            flex-direction: column !important;
            min-width: 0 !important;
            word-wrap: break-word !important;
            background-color: var(--vz-card-bg) !important;
            background-clip: border-box !important;
            border: 0 solid rgba(0,0,0,.125) !important;
            border-radius: 0.25rem !important;
        }
        .card-header:first-child {
            border-radius: 0.25rem 0.25rem 0 0 !important;
        }

        .card-header {
            padding: 1rem 1rem !important;
            margin-bottom: 0 !important;
            background-color: var(--vz-card-cap-bg) !important;
            border-bottom: 0 solid rgba(0,0,0,.125) !important;
        }

        .card-footer:last-child {
            border-radius: 0 0 0.25rem 0.25rem !important;
        }

        .card-footer {
            padding: 1rem 1rem !important;
            background-color: var(--vz-card-cap-bg) !important;
            border-top: 0 solid rgba(0,0,0,.125) !important;
        }

        .btn-primary {
            color: #fff !important;
            background-color: #405189 !important;
            border-color: #405189 !important;
        }

        .btn {
            color: #fff;
            font-size: 17px;
            line-height: 26px;
            font-weight: 600;
            text-transform: capitalize;
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: all 0.4s;
            z-index: 1;
            background-color: transparent;
        }
    </style>
@endsection
@section('content')

    <section class="page-title-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <div class="page-title-content">
                        <h3 class="title text-white">{{ $form->name }}</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Apply</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-section pdt-110 pdb-95 pdb-lg-90" data-background="images/bg/abs-bg1.png">
        <div class="container">
            <div class="row mrb-40">
                <div class="col-lg-6 col-xl-4">
                    <div class="contact-block d-flex mrb-30">
                        <div class="contact-icon">
                            <i class="webex-icon-map1"></i>
                        </div>
                        <div class="contact-details mrl-30">
                            <h5 class="icon-box-title mrb-10">Our Address</h5>
                            <p class="mrb-0">{{@$setting_data->address}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="contact-block d-flex mrb-30">
                        <div class="contact-icon">
                            <i class="webex-icon-Phone2"></i>
                        </div>
                        <div class="contact-details mrl-30">
                            <h5 class="icon-box-title mrb-10">Phone Number</h5>
                            <p class="mrb-0">
                                <a href="tel:{{@$setting_data->phone}}">{{@$setting_data->phone}}</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="contact-block d-flex mrb-30">
                        <div class="contact-icon">
                            <i class="webex-icon-envelope"></i>
                        </div>
                        <div class="contact-details mrl-30">
                            <h5 class="icon-box-title mrb-10">Email Us</h5>
                            <p class="mrb-0"><a href="mailto:{{@$setting_data->email}}">{{@$setting_data->email}}</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 col-xl-5">
                    <h5 class="sub-title-side-line text-primary-color mrt-0 mrb-15">Get In Touch</h5>
                    <h2 class="faq-title mrb-30">Fill out the forms</h2>
                    <p class="mrb-40">You can fill out the details in the forms to apply or reach out.</p>
                    <ul class="social-list list-lg list-primary-color list-flat mrb-md-60 clearfix">
                        @if(@$setting_data->facebook)
                            <li><a href="{{@$setting_data->facebook}}"><span class="fa-brands fa-facebook"></span></a></li>
                        @endif
                        @if(@$setting_data->youtube)
                            <li><a href="{{@$setting_data->youtube}}"><span class="fa-brands fa-youtube"></span></a></li>

                        @endif
                        @if(@$setting_data->instagram)
                            <li><a href="{{@$setting_data->instagram}}"><span class="fa-brands fa-instagram"></span></a></li>

                        @endif
                        @if(@$setting_data->linkedin)
                            <li><a href="{{@$setting_data->linkedin}}"><span class="fa-brands fa-linkedin"></span></a></li>
                        @endif
                        @if(!empty(@$setting_data->ticktock))
                            <li><a href="{{@$setting_data->ticktock}}"><span class="fa-brands fa-tiktok"></span></a></li>
                        @endif
                    </ul>
                </div>
                <div class="col-lg-7 col-xl-7">
                    <div class="contact-form">
                        <form action="{{ route('formbuilder::form.submit', $form->identifier) }}" method="POST" id="submitForm" enctype="multipart/form-data">
                            @csrf
                            <div id="fb-render"></div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <button type="submit" name="submit" class="cs-btn-one btn-md btn-round btn-primary-color element-shadow">Submit Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if(@$setting_data->google_map)
        <div class="contact-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 p-0">
                        <!-- Google Map Start -->
                        <div class="mapouter fixed-height">
                            <div class="gmap_canvas">
                                <iframe class="contact-map" src="{{@$setting_data->google_map}}"
                                        style="border:0;" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                <a href="/"></a>
                            </div>
                        </div>
                        <!-- Google Map End -->
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection

@push(config('formbuilder.layout_js_stack', 'scripts'))
    <script type="text/javascript">
        window._form_builder_content = {!! json_encode($form->form_builder_json) !!}
    </script>
    @include('frontend.partials.toast_alert')

    <script src="{{ asset('vendor/formbuilder/js/render-form.js') }}{{ jazmy\FormBuilder\Helper::bustCache() }}" defer></script>
@endpush
