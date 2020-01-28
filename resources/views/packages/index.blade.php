@extends('layouts.layouts.backend')

@section('content')
    <div class="container-fluid pt-5 ">
        <div class="row">
            <div class="col-md-6">
                <h3>{{ __('Packages') }}</h3>
                {{ print_r($packages) }}
            </div>
        </div>
        <div class="row my-5">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-2">
                        foto
                    </div>
                    <div class="col-6">
                        <a href=""><h6 class="m-0">Titel van package</h6></a>
                        <p class="m-0 sub-text">Omschrijving</p>
                    </div>
                    <div class="col-4 d-flex justify-content-end align-items-center">
                        <a href="" class="badge badge-pill badge-light" style="font-size: 14px;">$0.99</a>
                    </div>
                </div>
                <hr>
            </div>
        </div>


    </div>
    <div class="package-popup">

    </div>
@endsection
