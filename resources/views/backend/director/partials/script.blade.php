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
                    $("#editdirector").modal("toggle");
                    $('#heading').attr('value',dataResult.heading);
                    $('#designation').attr('value',dataResult.designation);
                    $('#button').attr('value',dataResult.button);
                    $('#link').attr('value',dataResult.link);
                    $('#designation').attr('value',dataResult.designation);
                    $('#ckeditor-classic-director').text(dataResult.description);
                    if(dataResult.link !== null){
                        $('#link').attr('value',dataResult.link);
                    }

                    $('.homepage_display2[value=' + dataResult.homepage_display + ']').prop('checked', true);
                    $('.homepage_display2').trigger('change');

                    if(dataResult.button !== null){
                        $('#button').attr('value',dataResult.button);
                    }
                    $('#current-edit-img').attr("src", '/images/director/' + dataResult.image);
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
                        text: "Managing Director was not removed.",
                        icon: "error",
                        confirmButtonClass: "btn btn-primary mt-2",
                        buttonsStyling: !1
                    });
            });



        });

        $( "#tablecontents" ).sortable({
            items: "tr",
            cursor: 'move',
            opacity: 0.6,
            update: function() {
                sendOrderToServer();
            }
        });
    });



    function sendOrderToServer() {
        var order = [];
        var token = $('meta[name="csrf-token"]').attr('content');
        $('tr.row1').each(function(index,element) {
            order.push({
                id: $(this).attr('data-id'),
                position: index+1
            });
        });
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ route('director.order') }}",
            data: {
                order: order,
                _token: token
            },
            success: function(response) {
                if (response.status == "200") {
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
                } else {
                    Swal.fire({
                        html: '<div class="mt-2">' +
                            '<lord-icon src="https://cdn.lordicon.com/tdrtiskw.json"' +
                            ' trigger="loop" colors="primary:#f06548,secondary:#f7b84b" ' +
                            'style="width:120px;height:120px"></lord-icon>' +
                            '<div class="mt-4 pt-2 fs-15">' +
                            '<h4>Oops...! </h4>' +
                            '<p class="text-muted mx-4 mb-0">' + response +'</p>' +
                            '</div>' +
                            '</div>',
                        timerProgressBar: !0,
                        timer: 3000,
                        showConfirmButton: !1
                    });

                }
            }
        });
    }

    $(document).on('change','.homepage_display', function (e){
        e.preventDefault();
        var selectedValue = $('input[name=homepage_display].homepage_display:checked').val();

        if (selectedValue == 1){
            $('.director-message').removeClass('d-none');
        }else{
            $('.director-message').addClass('d-none');
        }
    });

     $(document).on('change','.homepage_display2', function (e){
        e.preventDefault();
        var selectedValue = $('input[name=homepage_display].homepage_display2:checked').val();

        if (selectedValue == 1){
            $('.director-message2').removeClass('d-none');
        }else{
            $('.director-message2').addClass('d-none');
        }
    });



</script>
