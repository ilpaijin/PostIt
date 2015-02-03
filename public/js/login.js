$(document).ready( function() {

    var loginForm = $('.form-signin');

    $('.toggle-form').click(function() {
        $(this).toggle();
        $('.toggle-form').not(this).show();
        loginForm.parents('#login-form').toggle();
    });

    loginForm.submit(function(event) {
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: "/login",
            data: loginForm.serialize(),
            success: function(data) {
                loginForm.parents('#login-form').hide();
                $('#login-account').append(data.username).fadeIn();

                location.reload();
            },
            error: function(xhr, reason, status) {
                loginForm.siblings('.response').html(status);
            }
        });
    });

});