
@extends('frontend.layouts.master')
@section('title') Contact Us @endsection
@section('css')
@endsection
@section('content')

    <section class="page-title-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <div class="page-title-content">
                        <h3 class="title text-white">Contact us</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact us</li>
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
                    <h2 class="faq-title mrb-30">Have Any Questions?</h2>
                    <p class="mrb-40">Feel free to reach out and send any queries or questions. We are ready to help you.</p>
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
                        <form id="contact-form" name="contact" class="" action="{{route('contact.store')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mrb-25">
                                        <input type="text" name="name" placeholder="Name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mrb-25">
                                        <input type="text" name="phone" placeholder="Phone" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mrb-25">
                                        <input type="email" name="email" placeholder="Email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mrb-25">
                                        <input type="text" name="subject" placeholder="Subject" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group mrb-25">
                                        <textarea rows="4" name="message" placeholder="Messages" class="form-control" required></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <button type="submit" name="submit" class="cs-btn-one btn-md btn-round btn-primary-color element-shadow">Submit Now</button>
                                    </div>
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
@section('js')
    <!-- For Contact Form -->
    <script src="{{asset('assets/frontend/js/contact.form.js')}}"></script>

    @include('frontend.partials.toast_alert')

@endsection
