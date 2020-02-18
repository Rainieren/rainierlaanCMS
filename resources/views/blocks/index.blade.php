@extends('layouts.layouts.backend')

@section('content')
    <div class="container-fluid pt-5 ">
        <div class="row">
            <div class="col-md-6">
                <h3>{{ __('Blocks') }}</h3>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('create_block') }}" class="btn btn-primary">{{ __('Create block') }}</a>
            </div>
        </div>
        @if(count($blocks) == 0)
            <div class="row my-5">
                <div class="col-md-12 text-center">
                    <p>{{ __('You dont have any blocks yet. Create a block using the button in the top right corner.') }}</p>
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
                        <th scope="col">{{__('Identifier')}}</th>
                        <th scope="col">{{ __('Page') }}</th>
                        <th scope="col">Status</th>
                        <th scope="col">{{__('Created at')}}</th>
                        <th scope="col">{{__('Updated at')}}</th>
                        <th scope="col">{{__('Action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($blocks as $block)
                        <tr>
                            <td>{{ $block->id }}</td>
                            <td>{{ $block->name }}</td>
                            <td>{{ $block->identifier }}</td>
                            <td><a href="{{ route('pages') }}">{{ $block->page->name }}</a></td>
                            <td>
                                @if($block->status == 0)
                                    {{ __('Disabled') }}
                                @else
                                    {{ __('Enabled') }}
                                @endif
                            </td>
                            <td>{{ $block->created_at->toFormattedDateString() }}</td>
                            <td>{{ $block->updated_at->diffForHumans() }}</td>
                            <td>
                                <div class="dropdown show">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ __('Select') }}
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="{{ route('edit_block', ['identifier' => $block->identifier]) }}"><i class="fal fa-edit"></i> {{ __('Edit') }}</a>
                                        <h6 class="dropdown-header">{{ __('Danger zone') }}</h6>
                                        <a class="dropdown-item text-danger" href="{{ route('delete_block', ['identifier' => $block->identifier]) }}"
                                           onclick="event.preventDefault(); document.getElementById('delete-form{{$block->identifier}}').submit();">
                                            <i class="fal fa-trash-alt"></i> {{ __('Delete') }}
                                            <form id="delete-form{{$block->identifier}}" action="{{ route('delete_block', ['identifier' => $block->identifier]) }}"
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
                {{ $blocks->links() }}
            </div>

        </div>
        @endif
    </div>
@endsection
