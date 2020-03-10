@extends('layouts.layouts.backend')

@section('content')
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-md-6">
                <h3>{{ __('Visitors') }}</h3>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-md-7">
                <div class="card card-grey fadeInUp h-100">
                    <div class="card-body">
                        <h5>{{ __('Visitors and Signups chart') }}</h5>
                        <canvas id="visitorsSignupsChart" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="card card-purple fadeInUp h-100">
                            <div class="card-body">
                                <h5 class="text-white">{{ __('Total visitors') }}</h5>
                                <h2 class="text-white">632 294</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="card card-purple fadeInUp h-100">
                            <div class="card-body">
                                <h5 class="text-white">{{ __('Visitors this month') }}</h5>
                                <h2 class="text-white">235 843 <i class="far fa-arrow-alt-up"></i></h2>
                            </div>
                            <div class="card-footer">
                                <p class="m-0 text-white">Last month 222 000 <i class="far fa-arrow-alt-up"></i></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="card card-purple fadeInUp h-100">
                            <div class="card-body">
                                <h5 class="text-white">{{ __('Total Signups') }}</h5>
                                <h2 class="text-white">174 324</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="card card-purple fadeInUp h-100">
                            <div class="card-body">
                                <h5>{{ __('Signups this month') }}</h5>
                                <h2>23 284 <i class="far fa-arrow-alt-up"></i></h2>
                            </div>
                            <div class="card-footer">
                                <p class="m-0 text-white">Last month 14 021 <i class="far fa-arrow-alt-up"></i></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-md-7">
                <div class="card card-grey fadeInUp">
                    <div class="card-body">
                        <h5>{{ __('History') }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
