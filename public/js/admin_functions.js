


$('textarea[name=game_box_text]').on('blur', function () {

    $.ajax({
        type: "POST",
        url: $("input[name=adminAction]").val(),
        data: "boxtext=" + $(this).val() + '&' + 'game_uuid=' + $('input[name=game_uuid]').val()
    }).success(function (data) {
        $('.toast').addClass('alert-success');
        $('.toast').html('<i class="si si-check fa-2x"></i><br>' + data);
        $('.toast').slideDown();
        setTimeout(function () {
            $('.toast').fadeOut('slow');
        }, 3000);
    });

});