@extends('layouts.layouts.backend')

@section('content')
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-md-6">
                <h3>{{ __('Preferences') }}</h3>
                <hr>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-6">
                <form action="" class="form-row my-3">
                    <div class="form-group col-9">
                        <h4 class="mb-0">{{ __('Theme') }}</h4>
                        <p class="m-0 sub-text">{{ __('Change look of the dashboard') }}</p>
                    </div>
                    <div class="form-group col-3 d-flex justify-content-end align-items-center">
                        <select name="theme" id="theme" class="form-control">
                            <option value="0">{{ __('Light Theme') }}</option>
                            <option value="1">{{ __('Dark Theme') }}</option>
                        </select>
                    </div>
                </form>
                <form method="POST" action="{{ route('change_language',['id' => Auth::user()->id]) }}" class="form-row my-3">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="form-group col-9">
                        <h4 class="mb-0">{{ __('Language') }}</h4>
                        <p class="m-0 sub-text">{{ __('Change the language of the dashboard') }}</p>
                    </div>
                    <div class="form-group col-3 d-flex justify-content-end align-items-center">
                        <select name="language" id="language" class="form-control">
                            <option value="nl" {{ ( Auth::user()->language == 'nl') ? 'selected' : '' }}>
                                {{ __('Dutch') }}
                            </option>
                            <option value="en" {{ ( Auth::user()->language == 'en') ? 'selected' : '' }}>
                                {{ __('English') }}
                            </option>
                            <option value="de" {{ ( Auth::user()->language == 'de') ? 'selected' : '' }}>
                                {{ __('Deutch') }}
                            </option>
                        </select>

                    </div>
                    <div class="col-md-12 text-right">
                        <p class="text-success saved-message" style="display: none">{{ __('The language has changed!') }}</p>
                    </div>
                </form>


            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h3>{{ __('Exports') }}</h3>
                <hr>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-6">
                <form method="POST" action="" class="form-row my-3">
                    <div class="form-group col-8">
                        <h4 class="mb-0">{{ __('Export Users') }}</h4>
                        <p class="m-0 sub-text">{{ __('Receive a list of all users in the system as PDF or CSV') }}</p>
                    </div>
                    <div class="form-group col-4 text-right">
                        <a href="{{ route('user_to_pdf') }}" class="btn btn-primary">{{ __('Export to PDF') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $('#language').change(function() {
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: '{{ route('change_language', ['id' => Auth::user()->id]) }}',
                type: 'PATCH',
                data: {"language": $(this).children("option:selected").val()},
                success: function(data) {

                    $('.saved-message').fadeIn();
                    setTimeout(function() {
                        $('.saved-message').fadeOut();
                        location.reload();
                    }, 1000);

                }
            })
        });
    </script>
@endsection
