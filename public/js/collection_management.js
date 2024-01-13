$('#manage-collections-dropdown').addClass('open');


$('.has').click(function () {
    //Add to collection
    if ($(this).prop('checked')) {
        $.ajax({
            type: "POST",
            url: $("input[name=addAction]").val(),
            data: "li=" + $(this).val()
        }).success(function (data) {
            $('.toast').addClass('alert-success');
            $('.toast').html('<i class="si si-check fa-2x"></i><br>' + data);
            $('.toast').slideDown();
            setTimeout(function () {
                $('.toast').fadeOut('slow');
            }, 3000);
        });
    } else {
        $.ajax({
            type: "POST",
            url: $("input[name=remAction]").val(),
            data: "li=" + $(this).val()
        });
    }
});

$('.stat').change(function () {
    status = '';
    if ($(this).prop('nodeName') === 'INPUT') {
        if ($(this).prop('checked')) {
            status = 1;
        }
    } else {
        status = $(this).val();
    }

    $.ajax({
        type: "POST",
        url: $("input[name=statAction]").val(),
        data: "field=" + $(this).attr('name') + "&status=" + status
    }).success(function (data) {
        $('.toast').addClass('alert-success');
        $('.toast').html('<i class="si si-check fa-2x"></i><br>' + data);
        $('.toast').slideDown();
        setTimeout(function () {
            $('.toast').fadeOut('slow');
        }, 3000);
    });
});

