@extends('layouts.layouts.backend')

@section('content')
    <div class="container-fluid pt-5 ">
        <div class="row">
            <div class="col-md-6">
                <h3>{{ __('Users') }}</h3>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('create_user') }}" class="btn btn-primary">{{ __('Create user') }}</a>
            </div>
        </div>
        @if(count($users) == 0)
            <div class="row my-5">
                <div class="col-md-12 text-center">
                    <p>You don't have any Users yet. Create a user using the button in the top right corner.</p>
                </div>
            </div>
        @else
            <div class="row my-5">
                <div class="col-md-12">
                    <table class="table table-striped table-sm table-hover">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">{{ __('Firstname') }}</th>
                            <th scope="col">{{ __('Lastname') }}</th>
                            <th scope="col">{{ __('Role') }}</th>
                            <th scope="col">{{ __('Is request') }}</th>
                            <th scope="col">{{ __('Created at') }}</th>
                            <th scope="col">{{ __('Updated at') }}</th>
                            <th scope="col">{{ __('Action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td><a href="{{ route('profile', ['token' => $user->token]) }}">{{ $user->firstname }}</a></td>
                                <td>{{ $user->lastname }}</td>
                                <td>{{ $user->role->name }}</td>
                                <td>{{ $user->is_request }}</td>
                                <td>{{ $user->created_at->toFormattedDateString() }}</td>
                                <td>{{ $user->updated_at->toFormattedDateString() }}</td>
                                <td>
                                    <div class="dropdown show">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{ __('Select') }}
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href=""><i class="fal fa-edit"></i> {{ __('Edit') }}</a>
                                            <h6 class="dropdown-header">{{ __('Danger zone') }}</h6>
                                            <a class="dropdown-item text-danger" href="{{ route('delete_user', ['token' => $user->token]) }}"
                                               onclick="event.preventDefault(); document.getElementById('delete-form{{$user->token}}').submit();">
                                                <i class="fal fa-trash-alt"></i> {{ __('Delete') }}
                                                <form id="delete-form{{$user->token}}" action="{{ route('delete_user', ['token' => $user->token]) }}"
                                                      method="POST"
                                                      class="d-none">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                </form>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>

            </div>
        @endif
    </div>
@endsection
