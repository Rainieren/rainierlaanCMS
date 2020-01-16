@extends('layouts.layouts.backend')

@section('content')
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-md-6">
                <h3>{{ __('Create new address') }}</h3>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-md-6">
                <form method="POST" action="{{ route('store_address') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-8">
                            <label for="street">{{ __('Streetname') }}</label>
                            <input type="text" name="street" class="form-control  @error('street') is-invalid @enderror">
                            @error('street')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="number">{{ __('Number') }}</label>
                            <input type="text" name="number" class="form-control @error('number') is-invalid @enderror">
                            @error('number')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="city">{{ __('City') }}</label>
                        <input type="text" class="form-control @error('city') is-invalid @enderror" name="city">
                        @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <div class="col-8">
                            <label for="state">{{ __('State/Province') }}</label>
                            <input type="text" class="form-control @error('state') is-invalid @enderror" name="state">
                            @error('state')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="postal_code">{{ __('Postalcode') }}</label>
                            <input type="text" class="form-control @error('postal_code') is-invalid @enderror" name="postal_code">
                            @error('postal_code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="country">{{ __('Country') }}</label>
                        <select name="country" id="country" class="form-control @error('country') is-invalid @enderror">
                            <option value="">{{ __('Choose a country...') }}</option>
                            @foreach($countries as $country)
                                <option value="{{ $country->id}}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                        @error('country')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">{{ __('Phonenumber') }}</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_billing" id="defaultCheck1" >
                            <label class="form-check-label" for="defaultCheck1">
                               {{ __('Use as my default billing address') }}
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">{{ __('Save address') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
