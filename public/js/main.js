$(document).ready(function(){
    $('.showpassword').on('click', function() {
        if($('#password').attr('type') === "password") {
            $('#password').attr('type', 'text');
            $('.showpassword').text('Hide');
        } else {
            $('#password').attr('type', 'password');
            $('.showpassword').text('Show');
        }
    });

    $('#customControlAutosizing').change(function(){
        $('#sub-page-select').toggle();
    });

    var $url = $('#url');
    var $name = $('#name');

    $("#name").keyup(function() {
        $name.val().replace(/[^a-z]/g,'');
        $url.val(this.value.toLowerCase().replace(/\s+/g, "-"));

    });



});


