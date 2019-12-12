@extends('layouts.app')
@section('content')
    <div class="section-header">
        <h1>Penjadwalan Ekspatriat</h1>
        <div class="section-header-breadcrumb">
{{--            <div class="breadcrumb-item active"><a href="{{ route('expatriate.create') }}">Tambah Ekspatriat</a></div>--}}
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tabel Penjadwalan</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                            <tr>
                                <th>ID</th>
                                <th>Bulan</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
