@extends('backend.layouts.master')

@section('main')
    <div class="content-wrapper">
        <!-- Page Title Header Starts-->
        <div class="row page-title-header">
            <div class="col-12">
                <div class="row">
                    <div class="page-header">
                        <h4 class="page-title  col-md-8">Dashboard</h4>
                        <p>
                            <a href="{!! route('home') !!}" class="btn btn-primary" target="_blank">Visit Main Site</a>
                        </p>
                    </div>
                </div>
            </div>

        </div>
        <!-- Page Title Header Ends-->
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="d-flex">
                                    <div class="wrapper">
                                        <h3 class="mb-0 font-weight-semibold">32,451</h3>
                                        <h5 class="mb-0 font-weight-medium text-primary">Visits</h5>
                                        <p class="mb-0 text-muted">+14.00(+0.50%)</p>
                                    </div>
                                    <div class="wrapper my-auto ml-auto ml-lg-4">
                                        <canvas height="50" width="100" id="stats-line-graph-1"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                                <div class="d-flex">
                                    <div class="wrapper">
                                        <h3 class="mb-0 font-weight-semibold">15,236</h3>
                                        <h5 class="mb-0 font-weight-medium text-primary">Impressions</h5>
                                        <p class="mb-0 text-muted">+138.97(+0.54%)</p>
                                    </div>
                                    <div class="wrapper my-auto ml-auto ml-lg-4">
                                        <canvas height="50" width="100" id="stats-line-graph-2"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                                <div class="d-flex">
                                    <div class="wrapper">
                                        <h3 class="mb-0 font-weight-semibold">7,688</h3>
                                        <h5 class="mb-0 font-weight-medium text-primary">Conversation</h5>
                                        <p class="mb-0 text-muted">+57.62(+0.76%)</p>
                                    </div>
                                    <div class="wrapper my-auto ml-auto ml-lg-4">
                                        <canvas height="50" width="100" id="stats-line-graph-3"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                                <div class="d-flex">
                                    <div class="wrapper">
                                        <h3 class="mb-0 font-weight-semibold">1,553</h3>
                                        <h5 class="mb-0 font-weight-medium text-primary">Downloads</h5>
                                        <p class="mb-0 text-muted">+138.97(+0.54%)</p>
                                    </div>
                                    <div class="wrapper my-auto ml-auto ml-lg-4">
                                        <canvas height="50" width="100" id="stats-line-graph-4"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
