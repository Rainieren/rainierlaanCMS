$(document).ready(function(){
    let items = ['content', 'system', 'account', 'packages', 'settings', 'other'];

    $('.fadeInUp').addClass('animated fadeInUp delay-05s show');
    $('.fadeInRight').addClass('animated fadeInRight delay-05s show');

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

    $('.block-order-list').sortable({
        animation: 150,
        handle: '.handle',
        store: {
            set: function (sortable) {
                let page_url = $('#page-url').val();
                let order = {};
                $('.list-group-item').each(function() {
                    order[$(this).data('id')] = $(this).index();
                });
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/dashboard/pages/order/' + page_url,
                    type: 'POST',
                    data: {order: order},
                    success: function(data){
                        $('.saved-message').fadeIn();
                        setTimeout(function() {
                            $('.saved-message').fadeOut();
                        }, 1000);
                    }
                })
            }
        }
    });

    $('#v-pills-home-tab').on('click', function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/dashboard/notifications/read',
            type: 'POST',
            data: [],
            success: function(data){

            }
        })
    });

    $('#language').change(function() {
        let user_id = $('#user_id').val();
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: '/dashboard/user/' + user_id + '/language',
            type: 'PATCH',
            data: {"language": $(this).children("option:selected").val()},
            success: function(data) {

                $('.saved-message').fadeIn();
                setTimeout(function() {
                    $('.saved-message').fadeOut();
                    location.reload();
                }, 1000);

            }
        })
    });
});




