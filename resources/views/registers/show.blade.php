@extends('layouts.layouts.backend')

@section('content')
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-md-6">
                <h3>{{ __('Register requests') }}</h3>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-md-12">
                <div class="request">
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th scope="col">{{ _('ID') }}</th>
                            <th scope="col">{{ __('Firstname') }}</th>
                            <th scope="col">{{ __('Lastname') }}</th>
                            <th scope="col">{{ __('Email') }}</th>
                            <th scope="col">{{ __('Requested on') }}</th>
                            <th scope="col">{{ __('Action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->firstname }}</td>
                                <td>{{ $user->lastname }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->toDayDateTimeString() }}</td>
                                <td>
                                    <a href="" class="btn btn-success btn-sm">{{ __('Accept') }}</a>
                                    <a href="" class="btn btn-danger btn-sm">{{ __('Decline') }}</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
