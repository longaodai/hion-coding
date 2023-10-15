$(document).ready(function () {
    $('#myForm').submit(function () {
        $('#btn-submit').attr('disabled', true);
        $('#btn-submit').html('<i class="fa fa-spinner fa-spin"></i> Sending...');
    });
});
