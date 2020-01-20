$(document).ready(function(){

    let items = ['content', 'system', 'account', 'packages','other'];

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

    let $url = $('#url');
    let $name = $('#name');

    $("#name").keyup(function() {
        $name.val().replace(/[^a-z]/g,'');
        $url.val(this.value.toLowerCase().replace(/\s+/g, "-"));

    });



    function checkIfOthersActive(item, list, type)
    {
        if(type === "slide")
        {
            for (i = 0; i < list.length; i++) {
                if($(item + list[i]).hasClass('slideout-active')) {
                    $(item + list[i]).hide("slide", { direction: "left"}, 250);
                    $(item + list[i]).removeClass('slideout-active');
                }
            }
        } else {
            for (i = 0; i < list.length; i++) {
                if($(item + list[i]).hasClass('slideout-active')) {
                    $(item + list[i]).hide("slide", { direction: "left"}, 250);
                    $(item + list[i]).removeClass('slideout-active');
                    $('.slide-out-overlay').fadeOut();
                }
            }
        }
    }

    $('.slide-out').on('click', function() {
        let data = 'slideout-item';
        if($(this).data(data)) {
            let item = $('.slide-out-' + $(this).data(data));

            if(item.hasClass('slideout-active')) {
                item.hide("slide", { direction: "left" }, 250);
                item.removeClass('slideout-active');
                $('.slide-out-overlay').fadeOut().removeClass('overlay-active');
                return
            }
            checkIfOthersActive(".slide-out-", items, "slide");

            if(!item.hasClass('slideout-active')) {
                item.show("slide", { direction: "left" }, 250);
                item.addClass('slideout-active');
                $('.slide-out-overlay').fadeIn().addClass('overlay-active')

            }

        }
    });

    $('.slide-out-overlay').on('click', function () {
        let item = '.slide-out-';
        checkIfOthersActive(item, items, "overlay");

    });
});


