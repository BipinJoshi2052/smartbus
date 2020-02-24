$(document).ready(function ($) {
    "use strict";
    $('body').on('click', '.select-seat', function () {

        var button = $(this);

        var searchlist = $(this).parents('li');
        var listDetails = searchlist.find('.list-item');
        var listOptions = searchlist.find('.list-options');
        if (listOptions.hasClass('display-none')) {
            listOptions.removeClass('display-none');
            button.html('Hide Seats');
        } else {
            listOptions.addClass('display-none');
            button.html('Select Seats');
        }
    });
});