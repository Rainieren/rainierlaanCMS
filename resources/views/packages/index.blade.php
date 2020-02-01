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
                <div id="packages-wrapper">

                </div>
            </div>
        </div>
    </div>
    <div id="popup-wrapper">

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
                let popup_wrapper = $('#popup-wrapper');

                $.each(data, function(index, value) {
                    let el = data[index];
                    wrapper.append(
                        '<div class="row my-4" data-id='+ el.id +'>' +
                            '<div class="col-2"> icon </div>' +
                            '<div class="col-6">' +
                                '<a href="#" class="popup" data-popup-id="'+ el.id+'"><h6 class="m-0">'+ el.name +'</h6></a>' +
                                '<p class="m-0 sub-text">'+ el.description +'</p>' +
                            '</div>' +
                            '<div class="col-4 d-flex justify-content-end align-items-center">' +
                                '<a href="" id="download_package" class="badge badge-pill badge-light" style="font-size: 14px;">$'+ el.price +'</a>' +
                            '</div>' +
                        '</div>' + '<hr>'
                    );
                    popup_wrapper.append(
                        '<div class="package-popup shadow popup-'+ el.id+'">' +
                            '<p>' + el.name + '</p>' +
                        '</div>'
                    );
                });
            },
            error: function(e) {
                $('#package-error').fadeIn().text("Unfortunately there was an error retrieving the packages");
            }
        });
    </script>
@endsection
