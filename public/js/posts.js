//use grunt for minification, concat, build
//use coffee?
//decouple lib in objects and behaviour

$(document).ready( function() {

    $('.datepicker').datepicker({ dateFormat: 'yy-mm-dd' });

    var postsForm = $('.form-create-posts');

    postsForm.submit(function(event) {
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: "/posts",
            data: $(this).serialize(),
            success: function(data) {
                console.info(data);
                if (data.response) {
                    location.reload();
                }
            },
            error: function(xhr, reason, status) {
                console.info(xhr);
                // loginForm.siblings('.response').html(status);
            }
        });
    });

    function readImage(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview_post_image').show().find('img').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);

            $.ajax({
                type: 'POST',
                url: "/files",
                contentType: false,
                cache: false,
                processData:false,
                data: new FormData(postsForm[0]),
                success: function(data) {
                    $('#post_image_preview').remove();
                    postsForm.append('<input type="hidden" id="post_image_preview" name="post_image_preview" value="'+data+'">');

                    if($("#welcome").length != 0) {
                        $('#post_image').css({ display: 'none' });
                    }
                },
                error: function(xhr, reason, status) {
                    console.info(xhr);
                }
            });
        }
    }

    $("#post_image").change(function(){
        readImage(this);
    });
});