var csrf = $('meta[name="csrf-token"]').attr('content');
var formData = new FormData();

function likeBlog(id) {
    // Send Ajax
    var likey = $('#likey' + id);
    var route = location.origin + "/admin/likeblog";
    formData.append("id", id);
    setHeaders();
    jQuery.ajax({
        url: route,
        method: 'post',
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        dataType: 'JSON',

        success: function (result) {
            if (result.message == "success") {

                likey.text(result.data);

            } else {
                console.log('Something went wrong!');
            }
        }

    });
}

function likeCss5(id) {
    // Send Ajax
    var likey = $('#likey' + id);
    var route = location.origin + "/admin/likecss5";
    formData.append("id", id);
    setHeaders();
    jQuery.ajax({
        url: route,
        method: 'post',
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        dataType: 'JSON',

        success: function (result) {
            if (result.message == "success") {

                likey.text(result.data);

            } else {
                console.log('Something went wrong!');
            }
        }

    });
}


function socialShare(action, event, title, id) {
    // Run Ajax and get link
    var route = location.origin + "/sharelink";
    formData.append("id", id);
    formData.append("event", event);
    formData.append("title", title);
    setHeaders();
    jQuery.ajax({
        url: route,
        method: 'post',
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        dataType: 'JSON',
        success: function (result) {
            if (result.message == "success") {
                $('#' + action).click();
                $('#facebook').html('<a title="Facebook" href="' + result.res.facebook + '" class="social-button " id=""><span class="fa fa-facebook-official"></span></a>');
                $('#linkedin').html('<a title="LinkedIn" href="' + result.res.linkedin + '" class="social-button " id=""><span class="fa fa-linkedin"></span></a>');
                $('#twitter').html('<a title="Twitter" href="' + result.res.twitter + '" class="social-button " id=""><span class="fa fa-twitter"></span></a>');
                $('#telegram').html('<a title="Telegram" href="' + result.res.telegram + '" class="social-button " id=""><span class="fa fa-telegram"></span></a>');

            }
        }

    });
}



function setHeaders() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrf
        }
    });
}




