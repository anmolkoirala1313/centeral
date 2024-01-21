<script type="text/javascript">
    var section_list = new Array();
    <?php foreach($sections as $key => $val){ ?>
    section_list.push('<?php echo $val; ?>');
    <?php } ?>


    var loadbasicFile = function(id1,id2,event) {
        var image       = document.getElementById(id1);
        var replacement = document.getElementById(id2);
        replacement.src = URL.createObjectURL(event.target.files[0]);
    };

    function reload(){
        location.reload();
    }

    function slugMaker(title, slug){
        $("#"+ title).keyup(function(){
            var Text = $(this).val();
            Text = Text.toLowerCase();
            var regExp = /\s+/g;
            Text = Text.replace(regExp,'-');
            $("#"+slug).val(Text);
        });
    }

    function ElementData(post_url,request_method,form_data,divID,buttonID){
        $.ajax({
            url : post_url,
            type: request_method,
            data : form_data,
            contentType: false,
            cache: false,
            processData:false
        }).done(function(response){
            if (response=="successfully created" || response=="successfully updated"){
                var replacement = '<div class="card">' +
                    '<div class="card-body p-0"> ' +
                    '<div class="alert alert-success border-0 rounded-0 m-0 d-flex align-items-center" role="alert"> ' +
                    '<i class="ri-user-smile-line me-3 align-middle fs-16"></i>'+
                    '<div class="flex-grow-1 text-truncate">Success !</div>' +
                    '<div class="flex-shrink-0"> ' +
                    '</div> ' +
                    '</div> ' +
                    '<div class="row align-items-end"> ' +
                    '<div class="col-sm-8"> ' +
                    '<div class="p-3"> ' +
                    '<p class="fs-16 lh-base">Section element has been <span class="fw-semibold">'+ response +' </span>, You can continue to add other elements or ‘Click below’ <i class="mdi mdi-arrow-right"></i></p> ' +
                    '<div class="mt-3"> ' +
                    '<a onclick="reload()" class="btn btn-success">Refresh Page!</a>' +
                    '</div> ' +
                    '</div> ' +
                    '</div> ' +
                    '</div> ' +
                    '</div> ' +
                    '</div>';
                $('#' + divID).html(replacement);
                $('#' + buttonID).html("");
            }
            else{
                var replacements = ' <div class="col-md-12"><div id="container"> ' +
                    '<div id="error-box"> ' +
                    '<div class="face2"> ' +
                    '<div class="eye"></div><div class="eye right"></div><div class="mouth sad"></div> ' +
                    '</div> ' +
                    '<div class="shadow scale"></div> ' +
                    '<div class="message2"><h1 class="alert">Error! Something went wrong.</h1><p class="alert-para">The section element could not be created or updated.</div> ' +
                    '<a onclick="reload()" class="button-box"><h1 class="red">try again</h1></a></div></div> ' +
                    '</div>';
                $('#' + divID).html(replacements);
                $('#' + buttonID).html("");
            }
        });
    }

    function createEditor ( elementId ) {
        return ClassicEditor
            .create( document.querySelector( '#' + elementId ), {
                toolbar : {
                    items: [
                        'heading', '|',
                        'bold', 'italic', 'link', '|',
                        'outdent', 'indent', '|',
                        'bulletedList', 'numberedList', '|',
                        'insertTable', 'blockQuote', '|',
                        'undo', 'redo'
                    ],
                },
                link: {
                    // Automatically add target="_blank" and rel="noopener noreferrer" to all external links.
                    addTargetToExternalLinks: true,

                    // Let the users control the "download" attribute of each link.
                    decorators: [
                        {
                            mode: 'manual',
                            label: 'Downloadable',
                            attributes: {
                                download: 'download'
                            }
                        }
                    ]
                },
            } )
            .then( editor => {
                window.editor = editor;
                editor.model.document.on( 'change:data', () => {
                    $( '#' + elementId).text(editor.getData());
                } );

            } )
            .catch( err => {
                console.error( err.stack );
            } );
    }


    //for attributes and values
    var counter = 0;
    $('#multi-field-wrapper').each(function() {
        var $wrapper = $('#multi-fields', this);

        //disable the delete button if the cloned div is just one
        clonecount = $('.multi-field').length;
        if(clonecount == 1){
            $('.remove-field').addClass('add-disabled');
        }

        $("#add-field", $(this)).click(function(e) {
            counter++;
            clonecount = clonecount + 1;
            //remove the disable option for button once the cloned div is more than 1
            if(clonecount > 1){
                $('.remove-field').removeClass('add-disabled');
            }
            //clone the element and add the id to div to make select field unique.
            var newElem = $('.multi-field:last-child', $wrapper).clone(true).appendTo($wrapper).attr('id', 'cloned-' + counter).find("input").val("");
            //remove the initial id from select and add new ID
            $('.multi-field').find('select').last().removeAttr('id').attr('id', 'header_' + counter).find('option').focus();
            $('.multi-field').find('select').last().val('');
        });

        $('.multi-field .remove-field', $wrapper).click(function() {
            clonecount = clonecount - 1;
            if(clonecount == 1){
                $('.remove-field').addClass('add-disabled');
            }else if (clonecount > 1){
                $('.remove-field').removeClass('add-disabled');
            }
            if ($('.multi-field', $wrapper).length > 1){
                var id = $(this).prev().find('option:selected').val();
                $(this).parent('.input-group').parent('.multi-field').remove();
            }
        });

    });

    $(document).ready(function () {

        if(section_list.includes("simple_header_and_description")){
            CKEDITOR.replace('task-textarea',{
                allowedContent: true
            });
        }
        // if(section_list.includes("map_and_description")){
        //     createEditor('mapeditor');
        // }

        {{--if(section_list.includes("accordion_section_2")){--}}
        {{--    var list2 = "{{$list_2}}";--}}
        {{--    for ($i = 1; $i <=list2; $i++){--}}
        {{--        createEditor('accordian_two_editor_'+$i);--}}
        {{--    }--}}
        {{--}--}}


    });

    if($.inArray("basic_section", section_list) !== -1) {

        $("#basic-form").submit(function(event){
            event.preventDefault(); //prevent default action
            if (!this.checkValidity()) { return false; }
            var post_url       = $(this).attr("action"); //get form action url
            var request_method = $(this).attr("method"); //get form GET/POST method
            var form_data      = new FormData(this); //Creates new FormData object
            var divID          = $(this).attr('id')+'-ajax';
            var buttonID       = $(this).attr('id')+'-button';
            ElementData(post_url,request_method,form_data,divID,buttonID);

        });

    }

    if($.inArray("map_and_description", section_list) !== -1) {

        $("#map-descrip-form").submit(function(event){
            event.preventDefault(); //prevent default action
            if (!this.checkValidity()) { return false; }
            var post_url       = $(this).attr("action"); //get form action url
            var request_method = $(this).attr("method"); //get form GET/POST method
            var form_data      = new FormData(this); //Creates new FormData object
            var divID          = $(this).attr('id')+'-ajax';
            var buttonID       = $(this).attr('id')+'-button';
            ElementData(post_url,request_method,form_data,divID,buttonID);

        });

    }

    if($.inArray("card_image", section_list) !== -1) {

        $("#card_image-form").submit(function(event){
            event.preventDefault(); //prevent default action
            if (!this.checkValidity()) { return false; }
            var post_url       = $(this).attr("action"); //get form action url
            var request_method = $(this).attr("method"); //get form GET/POST method
            var form_data      = new FormData(this); //Creates new FormData object
            var divID          = $(this).attr('id')+'-ajax';
            var buttonID       = $(this).attr('id')+'-button';
            ElementData(post_url,request_method,form_data,divID,buttonID);

        });

    }

    if($.inArray("call_to_action_1", section_list) !== -1) {
        $("#call-action1-form").submit(function(event){
            event.preventDefault(); //prevent default action
            if (!this.checkValidity()) { return false;}

            var post_url       = $(this).attr("action"); //get form action url
            var request_method = $(this).attr("method"); //get form GET/POST method
            var form_data      = new FormData(this); //Creates new FormData object
            var divID          = $(this).attr('id')+'-ajax';
            var buttonID       = $(this).attr('id')+'-button';
            ElementData(post_url,request_method,form_data,divID,buttonID);

        });
    }

    if($.inArray("background_image_section", section_list) !== -1) {
        $("#background-image-form").submit(function(event){
            event.preventDefault(); //prevent default action
            if (!this.checkValidity()) { return false;}

            var post_url       = $(this).attr("action"); //get form action url
            var request_method = $(this).attr("method"); //get form GET/POST method
            var form_data      = new FormData(this); //Creates new FormData object
            var divID          = $(this).attr('id')+'-ajax';
            var buttonID       = $(this).attr('id')+'-button';
            ElementData(post_url,request_method,form_data,divID,buttonID);

        });
    }

    if($.inArray("flash_cards", section_list) !== -1) {
        $("#flash-card-form").submit(function(event){
            if (!this.checkValidity()) { return false;}

            event.preventDefault(); //prevent default action
            var post_url       = $(this).attr("action"); //get form action url
            var request_method = $(this).attr("method"); //get form GET/POST method
            var form_data      = new FormData(this); //Creates new FormData object
            var divID          = $(this).attr('id')+'-ajax';
            var buttonID       = $(this).attr('id')+'-button';
            ElementData(post_url,request_method,form_data,divID,buttonID);
        });
    }

    if($.inArray("simple_header_and_description", section_list) !== -1) {
        $("#header-descp-form").submit(function(event){
            event.preventDefault(); //prevent default action
            if (!this.checkValidity()) { return false;}

            var editor_data = CKEDITOR.instances['task-textarea'].getData();
            $('#task-textarea').text(editor_data);

            var post_url       = $(this).attr("action"); //get form action url
            var request_method = $(this).attr("method"); //get form GET/POST method
            var form_data      = new FormData(this); //Creates new FormData object
            var divID          = $(this).attr('id')+'-ajax';
            var buttonID       = $(this).attr('id')+'-button';
            ElementData(post_url,request_method,form_data,divID,buttonID);
        });
    }

    if($.inArray("accordion_section_2", section_list) !== -1) {

        $("#accordion2-form").submit(function(event){
            event.preventDefault(); //prevent default action
            if (!this.checkValidity()) { return false;}
            var post_url       = $(this).attr("action"); //get form action url
            var request_method = $(this).attr("method"); //get form GET/POST method
            var form_data      = new FormData(this); //Creates new FormData object
            var divID          = $(this).attr('id')+'-ajax';
            var buttonID       = $(this).attr('id')+'-button';
            ElementData(post_url,request_method,form_data,divID,buttonID);

        });
    }

    if($.inArray("slider_list", section_list) !== -1) {

        $("#slider-list-form").submit(function(event){
            event.preventDefault(); //prevent default action
            if (!this.checkValidity()) { return false;}
            var post_url       = $(this).attr("action"); //get form action url
            var request_method = $(this).attr("method"); //get form GET/POST method
            var form_data      = new FormData(this); //Creates new FormData object
            var divID          = $(this).attr('id')+'-ajax';
            var buttonID       = $(this).attr('id')+'-button';
            ElementData(post_url,request_method,form_data,divID,buttonID);

        });
    }

    if($.inArray("small_box_description", section_list) !== -1) {

        $("#process-form").submit(function(event){
            event.preventDefault(); //prevent default action
            if (!this.checkValidity()) { return false;}
            var post_url       = $(this).attr("action"); //get form action url
            var request_method = $(this).attr("method"); //get form GET/POST method
            var form_data      = new FormData(this); //Creates new FormData object
            var divID          = $(this).attr('id')+'-ajax';
            var buttonID       = $(this).attr('id')+'-button';
            ElementData(post_url,request_method,form_data,divID,buttonID);

        });
    }


</script>
