@extends('layouts.layouts.backend')

@section('content')
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-md-6">
               <h3>{{ __('Pages') }}</h3>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('create_page') }}" class="btn btn-primary">{{ __('Create page') }}</a>
            </div>
        </div>
        @if(count($pages) == 0)
            <div class="row my-5">
                <div class="col-md-12 text-center">
                    <p>{{ __('You dont have any pages yet. Create a page using the button in the top right corner.') }}</p>
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
                        <th scope="col">{{ __('Identifier') }}</th>
                        <th scope="col">URL</th>
                        <th scope="col">{{ __('Parent page') }}</th>
                        <th scope="col">{{ __('Layout') }}</th>
                        <th scope="col">Status</th>
                        <th scope="col">{{ __('Created at') }}</th>
                        <th scope="col">{{ __('Updated at') }}</th>
                        <th scope="col">{{ __('Action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pages as $page)
                        <tr>
                            <th scope="row">{{ $page->id }}</th>
                            <td>{{ $page->name }}</td>
                            <td>{{ $page->identifier }}</td>
                            <td>{{ $page->url }}</td>
                            <td>
                                @if($page->parent == null)
                                    <i>Null</i>
                                @else
                                    {{ $page->parent->name }}
                                @endif
                            </td>
                            <td>{{ $page->layout->name }}</td>
                            <td>
                                @if($page->status == 0)
                                    {{ __('Disabled') }}
                                @else
                                    {{ __('Enabled') }}
                                @endif
                            </td>
                            <td>{{ $page->created_at->toFormattedDateString() }}</td>
                            <td>{{ $page->updated_at->toFormattedDateString() }}</td>
                            <td>
                                <div class="dropdown show">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ __('Select') }}
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="{{ route('edit_page', ['url' => $page->url]) }}"><i class="fal fa-edit"></i> {{ __('Edit') }}</a>
                                        <a class="dropdown-item" href="{{ route('show_page', ['url' => $page->url]) }}"><i class="fal fa-arrow-circle-right"></i> {{ __('Go to') }}</a>
                                        <h6 class="dropdown-header">{{ __('Danger zone') }}</h6>
                                        <a class="dropdown-item text-danger" href="{{ route('delete_page', ['url' => $page->url]) }}"
                                        onclick="event.preventDefault(); document.getElementById('delete-form{{$page->url}}').submit();">
                                            <i class="fal fa-trash-alt"></i> {{ __('Delete') }}
                                            <form id="delete-form{{$page->url}}" action="{{ route('delete_page', ['url' => $page->url]) }}"
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
