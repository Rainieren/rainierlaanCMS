@extends('layouts.layouts.backend')

@section('content')
    <div class="container-fluid pt-5 ">
        <div class="row">
            <div class="col-md-6">
                <h3>{{ __('Register requests') }}</h3>
            </div>
        </div>
        @if(count($users) == 0)
            <div class="row my-5">
                <div class="col-md-12 text-center">
                    <p>{{ __('There are no register request at this time. Please come back later.') }}</p>
                </div>
            </div>
        @else
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
                                    <a href="{{ route('accept_request', ['id' => $user->id]) }}" class="btn btn-success btn-sm"
                                        onclick="event.preventDefault(); document.getElementById('patch-form{{$user->id}}').submit();">
                                        {{ __('Accept') }}
                                        <form id="patch-form{{$user->id}}" action="{{ route('accept_request', ['id' => $user->id]) }}"
                                              method="POST"
                                              class="d-none">
                                            {{ csrf_field() }}
                                            {{ method_field('PATCH') }}
                                        </form>
                                    </a>
                                    <a href="{{ route('decline_request', ['id' => $user->id]) }}" class="btn btn-danger btn-sm"
                                       onclick="event.preventDefault(); document.getElementById('delete-form{{$user->id}}').submit();">
                                        {{ __('Decline') }}
                                        <form id="delete-form{{$user->id}}" action="{{ route('decline_request', ['id' => $user->id]) }}"
                                              method="POST"
                                              class="d-none">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection
