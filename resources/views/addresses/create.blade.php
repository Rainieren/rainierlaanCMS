@extends('layouts.layouts.backend')

@section('content')
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-md-6">
                <h3>{{ __('Add a new address') }}</h3>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-md-6">
                <form method="POST" action="{{ route('store_address') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-8">
                            <label for="street">Streetname</label>
                            <input type="text" name="street" class="form-control">
                        </div>
                        <div class="col-4">
                            <label for="number">Number</label>
                            <input type="text" name="number" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" name="city">
                    </div>
                    <div class="form-group row">
                        <div class="col-8">
                            <label for="state">State/Province</label>
                            <input type="text" class="form-control" name="state">
                        </div>
                        <div class="col-4">
                            <label for="postal_code">Postalcode</label>
                            <input type="text" class="form-control" name="postal_code">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="country">{{ __('Country') }}</label>
                        <select name="country" id="country" class="form-control">
                            @foreach($countries as $country)
                                <option value="{{ $country->id}}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phonenumber</label>
                        <input type="text" class="form-control" name="phone">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
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
