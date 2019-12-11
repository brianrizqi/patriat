@extends('layouts.app')
@section('content')
    <div class="section-header">
        <h1>Detail Ekspatriat</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('expatriate-details.create') }}">Tambah Detail
                    Ekspatriat</a></div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tabel Detail Ekspatriat</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Divisi</th>
                                <th>Action</th>
                            </tr>
                            @foreach($details as $detail)
                                <tr>
                                    <td>{{$detail->id}}</td>
                                    <td>{{$detail->expatriate->name}}</td>
                                    <td>{{$detail->division->name}}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <nav class="d-inline-block">
                        <ul class="pagination mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1 <span
                                        class="sr-only">(current)</span></a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
