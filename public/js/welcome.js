$(document).ready( function() {

    $('#welcome #create-posts .toggle-side-widget').click(function() {

        $(this).next().toggle();
        var span = $(this).find('span');

        if ($(this).hasClass('open')) {
            $(this).parent().stop().animate({ right: '-330px' }, 800);
            $(this).removeClass('open');
            span.removeClass('glyphicon-indent-left');
            span.addClass('glyphicon-indent-right');
        } else {
            $(this).parent().stop().animate({ right: '0px' }, 300);
            $(this).addClass('open');
            span.removeClass('glyphicon-indent-right');
            span.addClass('glyphicon-indent-left');
        }

    });
});