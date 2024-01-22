@extends('backend.layouts.master')
@section('title') Page Heading @endsection
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
                        <h4 class="mb-sm-0">Page Heading</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Page Heading</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            {!! Form::open(['route' => 'page_heading.store','method'=>'post','class'=>'needs-validation','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
            <div class="row">
                <div class="col-md-12">
                    <div class="card ctm-border-radius shadow-sm grow flex-fill">
                        <div class="card-header">
                            <h4 class="card-title mb-0">
                                Page Heading details
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        {!! Form::label('type', 'Page Type', ['class' => 'form-label required']) !!}
                                        {!! Form::select('type', $type, null,['class'=>'form-select mb-3 select2','placeholder'=>'Select Page Type','required']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        {!! Form::label('title', 'Title', ['class' => 'form-label required']) !!}
                                        {!! Form::text('title', null,['class'=>'form-control','id'=>'name','placeholder'=>'Enter title','required']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        {!! Form::label('subtitle', 'Subtitle', ['class' => 'form-label']) !!}
                                        {!! Form::text('subtitle', null,['class'=>'form-control','id'=>'subname','placeholder'=>'Enter subtitle']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3 editor">
                                        {!! Form::label('description', 'Description', ['class' => 'form-label']) !!}
                                        {!! Form::textarea('description', null,['class'=>'form-control ck-editor','id'=>'descp','placeholder'=>'Enter description']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-12 border-top mt-3">
                                    <div class="hstack gap-2">
                                        {!! Form::submit('Save',['class'=>'btn btn-success mt-3','id'=>'user-add-button']) !!}
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
                                    Page Heading List
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive  mt-3 mb-1">
                                    <table id="client-index" class="table align-middle table-nowrap table-striped">
                                        <thead class="table-light">
                                        <tr>
                                            <th>S.N</th>
                                            <th>Type</th>
                                            <th>Title</th>
                                            <th>Subtitle</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="blog-list">
                                        @if(@$headings)
                                            @foreach($headings as $row)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ ucfirst($row->type) }}</td>
                                                    <td>{{ $row->title }}</td>
                                                    <td>{{ $row->subtitle ?? '' }}</td>
                                                    <td>
                                                        <div class="row">

                                                            <div class="col text-center dropdown">
                                                                <a href="javascript:void(0);" id="dropdownMenuLink2" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ri-more-fill fs-17"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink2">
                                                                    <li><a class="dropdown-item action-edit" href="#" hrm-update-action="{{route('page_heading.update',$row->id)}}" hrm-edit-action="{{route('page_heading.edit',$row->id)}}"><i class="ri-pencil-fill me-2 align-middle"></i>Edit</a></li>
                                                                    <li><a class="dropdown-item action-delete" cs-delete-route="{{route('page_heading.destroy',$row->id)}}"><i class="ri-delete-bin-6-line me-2 align-middle"></i>Delete</a></li>
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


    <div class="modal fade" id="editClient" tabindex="-1" aria-hidden="true">
        <form action="#" method="post" id="deleted-form" >
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
        </form>
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0">
                <div class="modal-header p-3 ps-4 bg-soft-success">
                    <h5 class="modal-title" id="myModalLabel">Edit Page Heading</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-content">
                    {!! Form::open(['method'=>'PUT','class'=>'needs-validation updateclient','novalidate'=>'','enctype'=>'multipart/form-data']) !!}

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    {!! Form::label('type', 'Page Type', ['class' => 'form-label required']) !!}
                                    {!! Form::select('type', $type, null,['class'=>'form-select mb-3 select2','id'=>'type','placeholder'=>'Select Page Type','required']) !!}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    {!! Form::label('title', 'Title', ['class' => 'form-label required']) !!}
                                    {!! Form::text('title', null,['class'=>'form-control','id'=>'title','placeholder'=>'Enter title','required']) !!}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    {!! Form::label('subtitle', 'Subtitle', ['class' => 'form-label']) !!}
                                    {!! Form::text('subtitle', null,['class'=>'form-control','id'=>'subtitle','placeholder'=>'Enter subtitle']) !!}
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3 editor">
                                    {!! Form::label('description', 'Description', ['class' => 'form-label']) !!}
                                    {!! Form::textarea('description', null,['class'=>'form-control ck-editor','id'=>'description','placeholder'=>'Enter description']) !!}
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
    <script src="{{asset('assets/backend/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js')}}"></script>

    <script type="text/javascript">

        var loadbasicFile = function(id1,id2,event) {
            var image       = document.getElementById(id1);
            var replacement = document.getElementById(id2);
            replacement.src = URL.createObjectURL(event.target.files[0]);
        };


        $(document).ready(function () {
            $('#client-index').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            });
            // createEditor('description');
            // createEditor('descp');


            $(document).on('click', '.action-edit', function (e) {
                e.preventDefault();
                var url = $(this).attr('hrm-edit-action');
                // console.log(action)
                var id = $(this).attr('id');
                var action = $(this).attr('hrm-update-action');

                $.ajax({
                    url: $(this).attr('hrm-edit-action'),
                    type: "GET",
                    cache: false,
                    dataType: 'json',
                    success: function (dataResult) {
                        // $('#id').val(data.id);
                        $("#editClient").modal("toggle");
                        $('#title').attr('value', dataResult.edit.title);
                        $('#subtitle').attr('value', dataResult.edit.subtitle);
                        $('#description').text(dataResult.edit.description);
                        $('#type option[value="'+dataResult.edit.type+'"]').prop('selected', true);

                        $('.updateclient').attr('action', action);

                    },
                    error: function (error) {
                        console.log(error)
                    }
                });
            });


            $(document).on('click','.action-delete', function (e) {
                e.preventDefault();
                var form = $('#deleted-form');
                var action = $(this).attr('cs-delete-route');
                form.attr('action',action);
                var url = form.attr('action');
                var form_data = form.serialize();
                Swal.fire({
                    html: '<div class="mt-2">' +
                        '<lord-icon src="https://cdn.lordicon.com/tdrtiskw.json"' +
                        ' trigger="loop" colors="primary:#f06548,secondary:#f7b84b" ' +
                        'style="width:120px;height:120px"></lord-icon>' +
                        '<div class="mt-4 pt-2 fs-15">' +
                        '<h4>Are your sure? </h4>' +
                        '<p class="text-muted mx-4 mb-0">' +
                        'You want to Remove this Record ?</p>' +
                        '</div>' +
                        '</div>',
                    showCancelButton: !0,
                    confirmButtonClass: "btn btn-primary w-xs me-2 mt-2",
                    cancelButtonClass: "btn btn-danger w-xs mt-2",
                    confirmButtonText: "Yes!",
                    buttonsStyling: !1,
                    showCloseButton: !0
                }).then(function(t)
                {
                    t.value
                        ?
                        $.post( url, form_data)
                            .done(function(response) {
                                if(response.status == "success") {
                                    Swal.fire({
                                        html: '<div class="mt-2">' +
                                            '<lord-icon src="https://cdn.lordicon.com/lupuorrc.json"' +
                                            'trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px">' +
                                            '</lord-icon>' +
                                            '<div class="mt-4 pt-2 fs-15">' +
                                            '<h4>Success !</h4>' +
                                            '<p class="text-muted mx-4 mb-0">' + response.message +'</p>' +
                                            '</div>' +
                                            '</div>',
                                        timerProgressBar: !0,
                                        timer: 2e3,
                                        showConfirmButton: !1
                                    });
                                    setTimeout(function () {
                                        window.location.reload();
                                    }, 2500);
                                }else{
                                    Swal.fire({
                                        html: '<div class="mt-2">' +
                                            '<lord-icon src="https://cdn.lordicon.com/tdrtiskw.json"' +
                                            ' trigger="loop" colors="primary:#f06548,secondary:#f7b84b" ' +
                                            'style="width:120px;height:120px"></lord-icon>' +
                                            '<div class="mt-4 pt-2 fs-15">' +
                                            '<h4>Oops...! </h4>' +
                                            '<p class="text-muted mx-4 mb-0">' + response.message +'</p>' +
                                            '</div>' +
                                            '</div>',
                                        timerProgressBar: !0,
                                        timer: 3000,
                                        showConfirmButton: !1
                                    });
                                }
                            })
                            .fail(function(response){
                                console.log(response)
                            })

                        :
                        t.dismiss === Swal.DismissReason.cancel &&
                        Swal.fire({
                            title: "Cancelled",
                            text: "Page Heading was not removed.",
                            icon: "error",
                            confirmButtonClass: "btn btn-primary mt-2",
                            buttonsStyling: !1
                        });
                });



            });

        });

        function createEditor(id){
            ClassicEditor.create(document.querySelector("#"+id))
                .then( editor => {
                    window.editor = editor;
                    editor.ui.view.editable.element.style.height="200px";
                    editor.model.document.on( 'change:data', () => {
                        $( '#' + id).text(editor.getData());
                    } );
                } )
                .catch(function(e){console.error(e)});
        }


    </script>
@endsection



