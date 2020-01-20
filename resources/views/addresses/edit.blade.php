@extends('layouts.layouts.backend')

@section('content')
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-md-6">
                <h3>{{ __('Update address') }}</h3>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-md-6">
                <form method="POST" action="{{ route('update_address', ['token' => $address->token]) }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="form-group row">
                        <div class="col-8">
                            <label for="street">Streetname</label>
                            <input type="text" name="street" class="form-control" value="{{ $address->street_name }}">
                        </div>
                        <div class="col-4">
                            <label for="number">Number</label>
                            <input type="text" name="number" class="form-control" value="{{ $address->house_number }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" name="city" value="{{ $address->city }}">
                    </div>
                    <div class="form-group row">
                        <div class="col-8">
                            <label for="state">State/Province</label>
                            <input type="text" class="form-control" name="state" value="{{ $address->state }}">
                        </div>
                        <div class="col-4">
                            <label for="postal_code">Postalcode</label>
                            <input type="text" class="form-control" name="postal_code" value="{{ $address->postal_code }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="country">{{ __('Country') }}</label>
                        <select name="country" id="country" class="form-control">
                            @foreach($countries as $country)
                                <option value="{{ $country->id}}"  {{ ( $address->country->id == $country->id) ? 'selected' : '' }}>{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phonenumber</label>
                        <input type="text" class="form-control" name="phone"  value="{{ $address->phone }}">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_billing" id="defaultCheck1" {{ ( $address->is_billing == 1) ? 'checked' : '' }}>
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
