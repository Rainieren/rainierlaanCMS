@extends('layouts.layouts.backend')

@section('content')
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-md-6">
                <h3>{{ __('Layouts') }}</h3>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('create_layout') }}" class="btn btn-primary">{{ __('Create layout') }}</a>
            </div>
        </div>
        @if(count($layouts) == 0)
            <div class="row my-5">
                <div class="col-md-12 text-center">
                    <p>{{ __('You dont have any layouts yet. Create a layout using the button in the top right corner.') }}</p>
                </div>
            </div>
        @else
        <div class="row my-5">
            <div class="col-md-12">
                <table class="table table-striped table-sm table-hover">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">{{ __('Name') }}</th>
                        <th scope="col">{{ __('File name') }}</th>
                        <th scope="col">{{ __('Created at') }}</th>
                        <th scope="col">{{ __('Updated at') }}</th>
                        <th scope="col">{{ __('Action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($layouts as $layout)
                        <tr>
                            <td>{{ $layout->id }}</td>
                            <td>{{ $layout->name }}</td>
                            <td>{{ $layout->filename }}</td>
                            <td>{{ $layout->created_at->toFormattedDateString() }}</td>
                            <td>{{ $layout->updated_at->diffForHumans() }}</td>
                            <td>
                                <div class="dropdown show">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ __('Select') }}
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="{{ route('edit_layout', ['id' => $layout->id]) }}"><i class="fal fa-edit"></i> {{ __('Edit') }}</a>
                                        <h6 class="dropdown-header">{{ __('Danger zone') }}</h6>
                                        <a class="dropdown-item text-danger" href="{{ route('delete_layout', ['id' => $layout->id]) }}"
                                           onclick="event.preventDefault(); document.getElementById('delete-form{{$layout->id}}').submit();">
                                            <i class="fal fa-trash-alt"></i> {{__('Delete')}}
                                            <form id="delete-form{{$layout->id}}" action="{{ route('delete_layout', ['id' => $layout->id]) }}"
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
            </div>
        </div>
        @endif
    </div>
@endsection
