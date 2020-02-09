@extends('layouts.app')
@section('content')
    <div class="section-header">
        <h1>Dashboard</h1>
        <div class="section-header-breadcrumb">
            {{--            <div class="breadcrumb-item active"><a href="{{ route('division.create') }}">Tambah Divisi</a></div>--}}
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="{{ route('expatriate') }}">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-child"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Ekspatriat</h4>
                        </div>
                        <div class="card-body">
                            {{ \App\Expatriate::all()->count() }}
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="{{ route('expatriate-details') }}">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-child"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Penugasan Ekspatriat</h4>
                        </div>
                        <div class="card-body">
                            {{ \App\ExpatriateDetail::all()->count() }}
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="{{ route('division') }}">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-dice-d6"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Divisi</h4>
                        </div>
                        <div class="card-body">
                            {{ \App\Division::all()->count() }}
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="{{ route('place') }}">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Tempat</h4>
                        </div>
                        <div class="card-body">
                            {{ \App\Place::all()->count() }}
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    {{--    <div class="row">--}}
    {{--        <div class="col-12 col-md-12 col-lg-12">--}}
    {{--            <div class="card">--}}
    {{--                <div class="card-header">--}}
    {{--                    <h4>Dashboard</h4>--}}
    {{--                </div>--}}
    {{--                <div class="card-body p-0">--}}

    {{--                </div>--}}
    {{--                <div class="card-footer text-right">--}}
    {{--                    <nav class="d-inline-block">--}}
    {{--                    </nav>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
@endsection
