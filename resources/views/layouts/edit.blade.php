@extends('layouts.layouts.backend')

@section('content')
    <div class="container-fluid pt-5">
        <div class="row mb-5">
            <div class="col-md-12">
                <h3>{{ __('Edit') }} {{ $layout->name }}</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="accordion" id="accordionExample">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-12">
                                    <h3 class="mb-0">
                                        <a href="#" class="d-flex justify-content-between align-items-center main-link" data-toggle="collapse" data-target="#mainConfig" aria-expanded="true" aria-controls="mainConfig">
                                            {{ __('Main configuration') }} <i class="far fa-angle-right"></i>
                                        </a>
                                    </h3>
                                </div>
                            </div>
                            <hr>
                            <div id="mainConfig" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <form method="POST" action="{{ route('update_layout', ['id' => $layout->id]) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH') }}
                                    <div class="form-group">
                                        <label for="name">{{ __('Name') }}</label>
                                        <input type="text" class="form-control" name="name" value="{{ $layout->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="content" class="content">{{ __('Content') }}</label>
                                        <textarea name="content" id="" class="form-control" cols="50" rows="20">{{ $layout->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" name="edit" value="edit">{{ __('Edit layout') }}</button>
                                        <button type="button" onclick="history.back();" class="btn btn-light">{{ __('Cancel') }}</button>
                                        <button type="submit" class="btn btn-link" name="edit" value="continue">Save and continue editing</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3  class="mb-0">
                                <a href="#" class="d-flex justify-content-between align-items-center main-link" data-toggle="collapse" data-target="#headerConfig" aria-expanded="true" aria-controls="headerConfig">
                                    {{ __('Header') }} <i class="far fa-angle-right collapse-angle"></i>
                                </a>
                            </h3>
                            <hr>
                            <div id="headerConfig" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium adipisci aliquam, corporis dolore eius eum, exercitationem fuga hic, incidunt odit omnis placeat reiciendis repudiandae sint ullam unde ut. Adipisci, vero!</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3>
                                <a href="#" class="d-flex justify-content-between align-items-center main-link" data-toggle="collapse" data-target="#footerConfig" aria-expanded="true" aria-controls="footerConfig">
                                    {{ __('Footer') }} <i class="far fa-angle-right"></i>
                                </a>
                            </h3>
                            <hr>
                            <div id="footerConfig" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium adipisci aliquam, corporis dolore eius eum, exercitationem fuga hic, incidunt odit omnis placeat reiciendis repudiandae sint ullam unde ut. Adipisci, vero!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
