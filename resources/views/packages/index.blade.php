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
                    <i class="fas fa-spinner fa-pulse fa-2x color-primary"></i>
                </div>
                <p id="package-error" class="text-danger" style="display: none"></p>
                <div id="packages-wrapper"></div>
            </div>
        </div>
    </div>
    <p>Tussen notitie: Het is handig om de gebruiker na het drukken op de betalen knop, te redirecten naar rainierlaansite en daar de aankoop te doen
    Zo hoeft de cms zelf geen betalingsysteem te hebben en is dit veiliger. Er kan dan bijvoorbeeld een bepaalde waarde meegegeven worden die bepaald
    Of de gebruiker een package vanaf de CMS koopt of vanaf rainierlaansite.</p>
    <p>Om dan te bepalen of een gebruiker ook de package heeft gekocht moeten eigenlijk na aankoop van een package een waarde naar rainierlaansite gestuurd worden
    zoal naar de CMS. Dus stel ik koop een package dan gaat komt er op rainierlaansite dus (user: 1, package: 2) maar ook een post request naar de CMS</p>
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

                if(data == null) {
                    console.log('lol')
                }
                $.each(data[0], function(index, value) {
                    let el = data[0][index];
                    wrapper.append(
                        '<div class="row my-4" data-id='+ el.id +'>' +
                            '<div class="col-2 d-flex justify-content-center"><i class="fad fa-archive fa-2x"></i></div>' +
                            '<div class="col-6">' +
                                '<a href="#" class="popup" data-popup-id="'+ el.id +'"><h6 class="m-0">'+ el.name +'</h6></a>' +
                                '<p class="m-0 sub-text">'+ el.description +'</p>' +
                            '</div>' +
                            '<div class="col-4 d-flex justify-content-end align-items-center">' +
                                '<a href="#" id="download_package" class="badge badge-pill badge-light popup '+ (el.price == 0 ? 'badge-primary': 'badge-light') +'" style="font-size: 14px;" data-popup-id="'+ el.id +'">' + (el.price == 0 ? 'Download': '$ ' + el.price) +'</a>' +
                            '</div>' +
                        '</div>' + '<hr>'
                    );
                    popup_list.append(
                        '<div class="package-popup shadow popup-'+ el.id +'">' +
                            '<div class="package-popup-dialog animated zoomIn show faster">' +
                                '<div class="package-popup-content">' +
                                    '<div class="row">' +
                                        '<div class="col-2">' +
                                            '<div class="row">' +
                                                '<div class="col-12 d-flex justify-content-center">' +
                                                    '<i class="fad fa-archive fa-3x"></i>' +
                                                '</div>' +
                                            '</div>' +
                                        '</div>' +
                                        '<div class="col-7">' +
                                            '<div class="row">' +
                                                '<div class="col-12">' +
                                                    '<h4 class="m-0">' + el.name + '</h4>' +
                                                    '<p class="sub-text">' + el.creator + '</p>' +
                                                '</div>' +
                                            '</div>' +
                                        '</div>' +
                                        '<div class="col-3 text-center">' +

                                                '<h4>' +
                                                    '<a href="https://www.rainierlaansite.test/marketplace" id="download_package" class="badge badge-pill '+ (el.price == 0 ? 'badge-primary': 'badge-light') +'" onclick="document.getElementById(\'purchase-form\').submit();">' +
                                                    (el.price == 0 ? 'Download': '$ ' + el.price) +
                                                    '</a>' +
                                                '</h4>' +

                                        '</div>' +
                                        '<div class="offset-2 col-7">' +
                                            '<div class="rating">' +
                                                '<span><i class="fas fa-star yellow"></i></span>' +
                                                '<span><i class="fas fa-star yellow"></i></span>' +
                                                '<span><i class="fas fa-star yellow"></i></span>' +
                                                '<span><i class="fas fa-star yellow"></i></span>' +
                                                '<span><i class="fas fa-star grey"></i></span>' +
                                                '<small><a href="">· Uit 300 beoordelingen</a></small>' +
                                            '</div>' +
                                            '<small>Nog geen beoordelingen</small>' +
                                        '</div>' +
                                        '<div class="col-3 text-center">'+
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
                                '</div>' +
                            '</div>' +
                        '</div>'
                    );
                });

                $('.popup').on('click', function () {
                    if($(this).data(popup)) {
                        let item = $('.popup-' + $(this).data(popup));
                        item.addClass('show');
                        $(item).on('click', function(event) {
                            if (event.target.classList.contains("shadow")) {
                                item.removeClass('show');
                            }
                        })
                    }
                });
            },
            error: function(e) {
                $('#package-loading').fadeOut();
                $('#package-error').fadeIn().text("Unfortunately there was an error retrieving the packages");
            }
        });
    </script>
@endsection
