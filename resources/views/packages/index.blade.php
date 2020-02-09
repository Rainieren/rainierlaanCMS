@extends('layouts.layouts.backend')

@section('content')
    <div class="container-fluid pt-5 ">
        <div class="row">
            <div class="col-md-6">
                <h3>{{ __('Packages') }}</h3>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-md-4">
                <div id="package-loading" class="text-center">
                    <i class="fas fa-spinner fa-spin fa-2x"></i>
                </div>
                <p id="package-error" class="text-danger" style="display: none"></p>
                <div id="packages-wrapper"></div>
            </div>
        </div>
    </div>
    <div class="popup-list">

    </div>




    <script>
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 'X-Requested-With': 'XMLHttpRequest'},
            url: 'https://www.rainierlaansite.test/api/packages/get',
            type: 'GET',
            data: {},
            success: function(data) {
                $('#package-loading').fadeOut();
                let wrapper = $("#packages-wrapper");
                let popup_list = $('.popup-list');
                let popup = 'popup-id';

                $.each(data, function(index, value) {
                    let el = data[index];
                    wrapper.append(
                        '<div class="row my-4" data-id='+ el.id +'>' +
                            '<div class="col-2"> icon </div>' +
                            '<div class="col-6">' +
                                '<a href="#" class="popup" data-popup-id="'+ el.id +'"><h6 class="m-0">'+ el.name +'</h6></a>' +
                                '<p class="m-0 sub-text">'+ el.description +'</p>' +
                            '</div>' +
                            '<div class="col-4 d-flex justify-content-end align-items-center">' +
                                '<a href="#" id="download_package" class="badge badge-pill badge-light popup" style="font-size: 14px;" data-popup-id="'+ el.id +'">$'+ el.price +'</a>' +
                            '</div>' +
                        '</div>' + '<hr>'
                    );
                    popup_list.append(
                        '<div class="package-popup shadow popup-'+ el.id +'">' +
                            '<div class="row">' +
                                '<div class="col-2">' +
                                    '<div class="row">' +
                                        '<div class="col-12">' +
                                            'logo-icon' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                                '<div class="col-8">' +
                                    '<div class="row">' +
                                        '<div class="col-12">' +
                                            '<h4 class="m-0">' + el.name + '</h4>' +
                                            '<p class="sub-text">' + el.creator + '</p>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                                '<div class="col-2 text-center">' +
                                    '<h4><a href="#" id="download_package" class="badge badge-pill badge-light">$ ' + el.price + '</a></h4>' +
                                '</div>' +
                                '<div class="offset-2 col-8">\n' +
                                    '<div class="rating">\n' +
                                        '<span><i class="fas fa-star yellow"></i></span>' +
                                        '<span><i class="fas fa-star yellow"></i></span>' +
                                        '<span><i class="fas fa-star yellow"></i></span>' +
                                        '<span><i class="fas fa-star yellow"></i></span>' +
                                        '<span><i class="fas fa-star grey"></i></span>' +
                                        '<small><a href="">· Uit 300 beoordelingen</a></small>' +
                                    '</div>' +
                                    '<small>Nog geen beoordelingen</small>' +
                                '</div>' +
                                '<div class="col-2 text-center">'+
                                    '<i class="far fa-download"></i> ' + el.downloads +
                                '</div>' +
                            '</div>' +
                            '<div class="row my-5">' +
                                '<div class="col-12">' +
                                    '<nav>' +
                                        '<div class="nav nav-tabs" id="nav-tab" role="tablist">' +
                                            '<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Details</a>' +
                                            '<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Reviews</a>' +
                                            '<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Version history</a>' +
                                        '</div>' +
                                    '</nav>' +
                                    '<div class="tab-content" id="nav-tabContent">' +
                                        '<div class="tab-pane fade show active py-4" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">' +
                                            '<p>' + el.description + '</p>' +
                                        '</div>' +
                                        '<div class="tab-pane fade py-4" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">' +
                                            'Dit is twee tekst' +
                                        '</div>' +
                                        '<div class="tab-pane fade py-4" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">' +
                                            'Dit is tekst 3' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +
                        '</div>'
                    );
                });

                $('.popup').on('click', function () {
                    let overlay = $('.slide-out-overlay');
                    if($(this).data(popup)) {
                        let item = $('.popup-' + $(this).data(popup));
                        item.addClass('animated fadeInUp faster').css('display', 'block');
                        overlay.fadeIn().addClass('overlay-active').css('z-index', 3);
                        $('.popup-list').css('visibility', 'initial');
                        overlay.on('click', function(){
                            if($(this).hasClass('overlay-active')) {
                                alert('Heeft klasse active')
                            }
                        });
                    }
                });
            },
            error: function(e) {
                $('#package-error').fadeIn().text("Unfortunately there was an error retrieving the packages");
            }
        });
    </script>
@endsection
