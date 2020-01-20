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
                <div class="col-md-6 my-3">
                    <div class="card shadow-sm {{ ($address->is_billing == 1) ? 'active-border' : '' }}" style="height: 100%">
                        <div class="card-body row">
                            <div class="col-md-8">
                                <h4>{{ $address->user->firstname }} {{ $address->user->lastname }}</h4>
                                <p class="m-0">{{ $address->street_name }} {{ $address->house_number }}</p>
                                <p class="m-0">{{ $address->postal_code }} {{ $address->city }}, {{ $address->state }}</p>
                                <p class="m-0">{{ $address->country->name }}</p>
                                <p class="m-0">{{ $address->phone }}</p>
                            </div>
                            <div class="col-md-4 text-right">
                                <a class="color-black mx-2" href="{{ route('edit_address', ['token' => $address->token]) }}"><i class="far fa-paint-brush fa-lg"></i></a>
                                <a class="text-danger" href="{{ route('delete_address', ['token' => $address->token]) }}"
                                   onclick="event.preventDefault(); document.getElementById('delete-form{{$address->token}}').submit();">
                                    <i class="fal fa-trash-alt fa-lg"></i>
                                    <form id="delete-form{{$address->token}}" action="{{ route('delete_address', ['token' => $address->token]) }}"
                                          method="POST"
                                          class="d-none">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                    </form>
                                </a>
                            </div>
                        </div>
                        @if($address->is_billing == 1)
                        <div class="card-footer bg-white">
                            <p class="m-0 color-primary"><i class="far fa-check-circle"></i> {{ __('Active billing address') }}</p>
                        </div>
                        @endif
                    </div>
                </div>
            @endforeach
            <div class="col-md-6 my-3">
                <a class="add_address" href="{{ route('create_address') }}">
                    <div class="card shadow-sm py-4">
                        <div class="card-body text-center color-black">
                            <i class="far fa-plus" style="font-size: 42px"></i>
                            <h3 class="my-3">{{ __('Add address') }}</h3>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
