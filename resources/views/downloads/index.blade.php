@extends('layouts.layouts.backend')

@section('content')
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-md-6">
                <h3>{{ __('My downloads') }}</h3>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-md-6">
                @foreach($downloads as $download)
                    <div class="card shadow-sm mb-3">
                        <div class="card-body row">
                            <div class="col-2 d-flex justify-content-center align-items-center">
                                <i class="far fa-file-alt fa-2x"></i>
                            </div>
                            <div class="col-8">
                                <h5 class="m-0">{{ $download->filename }}</h5>
                                <p class="sub-text">Mappen ofzo</p>
                            </div>
                            <div class="col-2 text-right">
                                <a href="" class=""><i class="far fa-times fa-lg text-danger"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
