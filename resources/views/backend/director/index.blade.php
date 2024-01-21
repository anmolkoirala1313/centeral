@extends('backend.layouts.master')
@section('title') Managing Director @endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/backend/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/custom_css/datatable_style.css')}}">
    <link href="{{asset('assets/backend/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')


    <div class="page-content">
        <div class="container-fluid" style="position:relative;">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"> Managing Director</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Managing Director</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            {!! Form::open(['route' => 'managing-director.store','method'=>'post','class'=>'needs-validation','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
            <div class="row">
                <div class="col-md-7">
                    <div class="card ctm-border-radius shadow-sm grow flex-fill">
                        <div class="card-header">
                            <h4 class="card-title mb-0">
                                Managing Director details
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label>Heading <span class="text-muted text-danger">*</span></label>
                                <input type="text" class="form-control" name="heading" required>
                                <div class="invalid-feedback">
                                    Please enter the heading.
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Designation <span class="text-muted text-danger">*</span></label>
                                <input type="text" class="form-control" name="designation" required>
                                <div class="invalid-feedback">
                                    Please enter the designation.
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>Summary </label>
                                <textarea class="form-control" rows="4" maxlength="200" name="summary" ></textarea>
                                <div class="invalid-feedback">
                                    Please write the summary
                                </div>
                            </div>

                            <div class="form-group mb-3 director-message d-none">
                                <label>Description </label>
                                <textarea class="form-control" rows="16" maxlength="1150" name="description" id="ckeditor-classic-director-one"></textarea>
                                <span class="ctm-text-sm">*Director message when used for homepage</span>

                                <div class="invalid-feedback">
                                    Please write the description
                                </div>
                            </div>
                            <div class="text-center mb-3">
                                <button type="submit" class="btn btn-success w-sm mt-4">Add details</button>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-md-5 ">
                    <div class="card ctm-border-radius shadow-sm grow flex-fill sticky-side-div">
                        <div class="card-header">
                            <h4 class="card-title mb-0">
                                Director Image Details <span class="text-muted text-danger">*</span>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div style="margin: auto;width: 60%;">
                                <img  id="current-img"  src="{{asset('images/default-image.jpg')}}" class="position-relative img-fluid img-thumbnail blog-feature-image" >
                                <input  type="file" accept="image/png, image/jpeg" hidden
                                        id="profile-foreground-img-file-input" onchange="loadbasicFile('profile-foreground-img-file-input','current-img',event)" name="image" required
                                        class="profile-foreground-img-file-input" >

                                <div class="invalid-feedback" >
                                    Please select a image.
                                </div>
                                <span class="ctm-text-sm">*use image minimum of 550 x 550px for director. Let the image be PNG</span>

                                <label for="profile-foreground-img-file-input" class="profile-photo-edit btn btn-light feature-image-button">
                                    <i class="ri-image-edit-line align-bottom me-1"></i> Add Image
                                </label>
                            </div>
                            <div class="col-lg-6 mt-2">
                                {!! Form::label('homepage_display', 'Display Director in Homepage', ['class' => 'form-label']) !!}
                                <div class="mb-3 mt-2">
                                    <div class="form-check form-check-inline form-radio-success">
                                        {!! Form::radio('homepage_display', 1, false,['class'=>'form-check-input homepage_display','id'=>'status1']) !!}
                                        {!! Form::label('status1', 'Yes', ['class' => 'form-check-label']) !!}
                                    </div>
                                    <div class="form-check form-check-inline form-radio-danger">
                                        {!! Form::radio('homepage_display', 0, true,['class'=>'form-check-input homepage_display','id'=>'status2']) !!}
                                        {!! Form::label('status2', 'No', ['class' => 'form-check-label']) !!}
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            {!! Form::close() !!}
            <div class="row">
                <div class="col-md-12">
                    <div class="company-doc">
                        <div class="card ctm-border-radius shadow-sm grow">
                            <div class="card-header">
                                <h4 class="card-title d-inline-block mb-0">
                                    Managing Director List
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive  mt-3 mb-1">
                                    <table id="client-index" class="table align-middle table-nowrap table-striped">
                                        <thead class="table-light">
                                        <tr>
                                            <th width="30px">#</th>
                                            <th>Image</th>
                                            <th>Heading</th>
                                            <th>Designation</th>
                                            <th>Description</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="tablecontents">

                                        @if(@$director)
                                            @foreach($director as  $managing)
                                                <tr class="row1" data-id="{{ $managing->id }}">
                                                    <td class="pl-3"><i class=" ri-drag-move-2-fill"></i></td>
                                                    <td class="align-middle pt-6 pb-4 px-6">
                                                        <img src="{{asset('/images/director/'.@$managing->image)}}" alt="{{@$managing->designation}}" class="figure-img rounded avatar-lg">

                                                    </td>
                                                    <td>{{$managing->heading}}</td>
                                                    <td>{{$managing->designation}}</td>
                                                    <td>{{ substr_replace($managing->description, "...", 20)}}</td>
                                                    <td>
                                                        <div class="row">

                                                            <div class="col text-center dropdown">
                                                                <a href="javascript:void(0);" id="dropdownMenuLink2" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ri-more-fill fs-17"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink2">
                                                                    <li><a class="dropdown-item action-edit" href="#" hrm-update-action="{{route('managing-director.update',$managing->id)}}" hrm-edit-action="{{route('managing-director.edit',$managing->id)}}"><i class="ri-pencil-fill me-2 align-middle"></i>Edit</a></li>
                                                                    <li><a class="dropdown-item action-delete" cs-delete-route="{{route('managing-director.destroy',$managing->id)}}"><i class="ri-delete-bin-6-line me-2 align-middle"></i>Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="editdirector" tabindex="-1" aria-hidden="true">
        <form action="#" method="post" id="deleted-form" >
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
        </form>
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0">
                <div class="modal-header p-3 ps-4 bg-soft-success">
                    <h5 class="modal-title" id="myModalLabel">Edit Director</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-content">
                    {!! Form::open(['method'=>'PUT','class'=>'needs-validation updateclient','novalidate'=>'','enctype'=>'multipart/form-data']) !!}

                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-7">
                                <div class="card ctm-border-radius shadow-sm flex-fill">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0">
                                            Managing Director Details
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group mb-3">
                                            <label>Heading <span class="text-muted text-danger">*</span></label>
                                            <input type="text" class="form-control" name="heading" id="heading" required>
                                            <div class="invalid-feedback">
                                                Please enter the heading.
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Designation <span class="text-muted text-danger">*</span></label>
                                            <input type="text" class="form-control" name="designation" id="designation" required>
                                            <div class="invalid-feedback">
                                                Please enter the designation.
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Summary </label>
                                            <textarea class="form-control" rows="4" maxlength="200" name="summary" ></textarea>
                                            <div class="invalid-feedback">
                                                Please write the summary
                                            </div>
                                        </div>


                                        <div class="form-group mb-3 director-message2">
                                            <label>Description <span class="text-muted text-danger">*</span></label>
                                            <textarea class="form-control" rows="16" maxlength="1150" name="description" id="ckeditor-classic-director" required></textarea>
                                            <div class="invalid-feedback">
                                                Please write the short description
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="card ctm-border-radius shadow-sm flex-fill">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0">
                                            Director Image Details <span class="text-muted text-danger">*</span>
                                        </h4>
                                    </div>
                                    <div class="card-body">

                                        <div style="margin: auto;width: 60%;">
                                            <img id="current-edit-img"  src="{{asset('images/default-image.jpg')}}" class="position-relative img-fluid img-thumbnail blog-feature-image" >
                                            <input  type="file" accept="image/png, image/jpeg" hidden
                                                    id="image-edit" onchange="loadbasicFile('image-edit','current-edit-img',event)" name="image"
                                                    class="profile-foreground-img-file-input" >
                                            <div class="invalid-feedback" >
                                                Please select a image.
                                            </div>
                                            <label for="image-edit" class="profile-photo-edit btn btn-light feature-image-button">
                                                <i class="ri-image-edit-line align-bottom me-1"></i> Update Image
                                            </label>
                                        </div>

                                        <div class="col-lg-6 mt-2">
                                            {!! Form::label('homepage_display', 'Display Director in Homepage', ['class' => 'form-label']) !!}
                                            <div class="mb-3 mt-2">
                                                <div class="form-check form-check-inline form-radio-success">
                                                    {!! Form::radio('homepage_display', 1, false,['class'=>'form-check-input homepage_display2','id'=>'status3']) !!}
                                                    {!! Form::label('status3', 'Yes', ['class' => 'form-check-label']) !!}
                                                </div>
                                                <div class="form-check form-check-inline form-radio-danger">
                                                    {!! Form::radio('homepage_display', 0, true,['class'=>'form-check-input homepage_display2','id'=>'status4']) !!}
                                                    {!! Form::label('status4', 'No', ['class' => 'form-check-label']) !!}
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mb-3">
                            <button type="submit" class="btn btn-success w-sm mt-4">Update</button>
                        </div>
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{asset('assets/backend/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/backend/js/pages/form-validation.init.js')}}"></script>
    <!-- Sweet Alerts js -->
    <script src="{{asset('assets/backend/libs/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/backend/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/backend/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js')}}"></script>

    @include('backend.director.partials.script')

@endsection



