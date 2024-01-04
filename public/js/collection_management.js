var getUrl = window.location;
var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
$('.has').click(function () {
    //Add to collection
    if ($(this).prop('checked')) {
        $.ajax({
            type: "POST",
            url: baseUrl + "/add",
            data: "li=" + $(this).val()
        });
    } else {
        $.ajax({
            type: "POST",
            url: baseUrl + "/remove",
            data: "li=" + $(this).val()
        });
    }
});

$('.stat').change(function () {
    //Add to collection
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
        url: baseUrl + "/statchange",
        data: "field=" + $(this).attr('name') + "&status=" + status
    }).success(function (data) {
        $('.toast').addClass('alert-success');
        $('.toast').html('<i class="si si-check fa-2x"></i><br>Saved!');
        $('.toast').slideDown();
        setTimeout(function () {
            $('.toast').fadeOut('slow');
        }, 2000);
    });
});

