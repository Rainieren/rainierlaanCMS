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

    $('.slide-out').on('click', function() {
        let data = 'slideout-item';
        if($(this).data(data)) {
            let item = $('.slide-out-' + $(this).data(data));
            if(item.hasClass('slideout-active')) {
                item.hide("slide", { direction: "left" }, 250);
                item.removeClass('slideout-active');
                $('.slide-out-overlay').fadeOut()
            } else {
                item.show("slide", { direction: "left" }, 250);
                item.addClass('slideout-active');
                $('.slide-out-overlay').fadeIn()
            }
        }
    });

    $('.slide-out-overlay').on('click', function () {
        let items = ['content', 'system', 'account', 'other'];
        let item = '.slide-out-';
        for (i = 0; i < items.length; i++) {
            if($(item + items[i]).hasClass('slideout-active')) {
                $(item + items[i]).hide("slide", { direction: "left"}, 250);
                $(item + items[i]).removeClass('slideout-active');
                $('.slide-out-overlay').fadeOut();

            }
        }
    });
});


