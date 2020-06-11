@extends('layouts.layouts.backend')

@section('content')
    <div class="container-fluid pt-5">
        <div class="row mb-5">
            <div class="col-md-6">
                <h3>{{ __('Edit') }} {{ $layout->name }} {{ __('layout') }}</h3>
            </div>
            <div class="col-md-6 text-right">
                <button type="submit" class="btn btn-primary" id="editLayout" name="edit" value="edit">{{ __('Edit layout') }}</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="accordion" id="accordionExample">
                    <form method="POST" id="editLayoutForm" action="{{ route('update_layout', ['id' => $layout->id]) }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
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
                                        <div class="form-group">
                                            <label for="name">{{ __('Name') }}</label>
                                            <input type="text" class="form-control" name="name" value="{{ $layout->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="content" class="content">{{ __('Content') }}</label>
                                            <textarea name="content" id="" class="form-control" cols="50" rows="20">{{ $layout->content }}</textarea>
                                        </div>
                                        <div class="form-group">
{{--                                            <button type="submit" class="btn btn-primary" name="edit" value="edit">{{ __('Edit layout') }}</button>--}}
                                            <button type="button" onclick="history.back();" class="btn btn-light">{{ __('Cancel') }}</button>
{{--                                            <button type="submit" class="btn btn-link" name="edit" value="continue">Save and continue editing</button>--}}
                                        </div>
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
                                    <form method="POST" action="" class="my-4 ">
    {{--                                    <div class="row">--}}
    {{--                                        <div class="col-9">--}}
    {{--                                            <h5 class="mb-0">Logo</h5>--}}
    {{--                                            <p class="m-0 sub-text">Add new db table called headers with layout_id and a field called logo</p>--}}
    {{--                                        </div>--}}
    {{--                                        <div class="col-3">--}}
    {{--                                            <input type="image" id="navbar_logo" class="form-control">--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
                                        <div class="row my-4">
                                            <div class="col-9">
                                                <h5 class="mb-0">Navbar color</h5>
                                                <p class="m-0 sub-text">Add new db field called color in the table headers</p>
                                            </div>
                                            <div class="col-3">
                                                <input type="color" id="navbar_color" name="color" class="form-control" value="{{ $layout->layoutHeader->color }}">
                                            </div>
                                        </div>
                                        <div class="row my-4">
                                            <div class="col-9">
                                                <h5 class="mb-0">Navbar placement</h5>
                                                <p class="m-0 sub-text">Add new db field called placement in the table headers</p>
                                            </div>
                                            <div class="col-3">
                                                <select id="placement" name="placement" class="form-control">
                                                    <option {{ $layout->layoutHeader->placement == "fixed-top" ? "selected" : "" }} value="fixed-top">Fixed to top</option>
                                                    <option {{ $layout->layoutHeader->placement == "sticky-top" ? "selected" : "" }}value="sticky-top">Sticky</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row my-4">
                                            <div class="col-9">
                                                <h5 class="mb-0">Navbar shadow</h5>
                                                <p class="m-0 sub-text">Add new db field called shadow in the table headers</p>
                                            </div>
                                            <div class="col-3">
                                                <select id="shodow" name="shadow" class="form-control">
                                                    <option {{ $layout->layoutHeader->shadow == "shadow-sm" ? "selected" : "" }} value="shadow-sm">Small shadow</option>
                                                    <option {{ $layout->layoutHeader->shadow == "shadow" ? "selected" : "" }} value="shadow">Regular shadow</option>
                                                    <option {{ $layout->layoutHeader->shadow == "shadow-lg" ? "selected" : "" }} value="shadow-lg">Larger shadow</option>
                                                    <option {{ $layout->layoutHeader->shadow == null ? "selected" : "" }} value="">None</option>
                                                </select>
                                            </div>
                                        </div>
    {{--                                    <div class="navbar_links my-4">--}}
    {{--                                        <h4 class="mb-3">Navbar links</h4>--}}
    {{--                                        <div class="row">--}}
    {{--                                            <div class="col">--}}
    {{--                                                <label for="link_label">Label name</label>--}}
    {{--                                                <input type="text" class="form-control" id="link_label" placeholder="e.g. home">--}}
    {{--                                            </div>--}}
    {{--                                            <div class="col">--}}
    {{--                                                <label for="links">Links to page</label>--}}
    {{--                                                <select id="links" class="form-control">--}}
    {{--                                                    <option selected>Choose...</option>--}}
    {{--                                                    <option>Contact</option>--}}
    {{--                                                    <option>Customerservice</option>--}}
    {{--                                                </select>--}}
    {{--                                            </div>--}}
    {{--                                            <div class="col justify-content-end align-items-end">--}}
    {{--                                                <a href=""><i class="far fa-trash-alt text-danger"></i></a>--}}
    {{--                                            </div>--}}
    {{--                                        </div>--}}
    {{--                                        <div class="row">--}}
    {{--                                            <div class="col-12 my-4">--}}
    {{--                                                <a href="" class="link"><i class="far fa-plus"></i> Add new link</a>--}}
    {{--                                            </div>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
                                    </form>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
