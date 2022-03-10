$(document).ready(function () {

    $('#example1').DataTable()

    CKEDITOR.replace('editor1')

    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()

    //Initialize Select2 Elements
    $('.select2').select2()



        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {
            'placeholder': 'mm/dd/yyyy'
        })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker({
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function (start, end) {
                $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )

        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        })

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        })
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        })
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        })

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        //Timepicker
        $('.timepicker').timepicker({
            showInputs: false
        })

});
var csrf = $('meta[name="csrf-token"]').attr('content');
var formData = new FormData();

function likeBlog(id){
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


function deletePost(id, val){
    swal({
            title: "Are you sure you want to delete this post?",
            text: "If yes, you will not be able to retrieve this information",
            icon: "warning",
            buttons: ["Not yet", "Yes please"],
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {

                var route = location.origin + "/admin/deleteposts";
                formData.append("id", id);
                formData.append("val", val);
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

                                swal(result.title, result.res, result.message);

                                setTimeout(() => {
                                    location.reload();
                                }, 1000);

                            } else {
                                swal(result.title, result.res, result.message);
                            }
                        }

                    });

            } else {
                console.log('file safe!');
            }
        });
}


function eventPublish(){
    swal({
            title: "Do you want to publish event?",
            text: "Make decision on post..",
            icon: "warning",
            buttons: ["Not yet", "Yes please"],
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $('#status').val('1');
                $('#publish_event').submit();
            } else {
                $('#status').val('0');
                $('#publish_event').submit();
            }
        });
}


function deleteTeam() {
    swal({
            title: "Are you sure?",
            text: "Make a decision...",
            icon: "warning",
            buttons: ["Oh no!", "Yes please"],
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $('#form_delete').submit();
            } else {
                console.log('Not deleted');
            }
        });
}


function socialShare(action, event, title, id){
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
                $('#'+action).click();
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
