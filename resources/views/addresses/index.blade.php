@extends('layouts.layouts.backend')

@section('content')
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-md-6">
                <h3>{{ __('Address book') }}</h3>
            </div>
        </div>
        <div class="row my-5">
            @foreach($addresses as $address)
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body row">
                            <div class="col-md-8">
                                <h4>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h4>
                                <p class="m-0">{{ $address->street_name }} {{ $address->house_number }}</p>
                                <p class="m-0">{{ $address->postal_code }} {{ $address->city }}, {{ $address->state }}</p>
                                <p class="m-0">{{ $address->country->name }}</p>
                            </div>
                            <div class="col-md-4">
                                <a href=""><i class="far fa-paint-brush fa-lg"></i></a>
                                <a href=""><i class="far text-danger fa-trash-alt fa-lg"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
