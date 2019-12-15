@extends('layouts.app')
@section('content')
    <div class="section-header">
        <h1>Penjadwalan Ekspatriat</h1>
        <div class="section-header-breadcrumb">
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tabel Matrix Adjacency (Matriks Ketetanggaan)</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                            <tr>
                                <th></th>
                                <th>D01</th>
                                <th>D02</th>
                                <th>D03</th>
                                <th>D04</th>
                                <th>D05</th>
                                <th>D06</th>
                                <th>D07</th>
                            </tr>
                            @for ($i = 0; $i < count($data); $i++)
                                <tr>
                                    <td>D0{{ ($i + 1) }}</td>
                                    @for ($j = 0; $j < count($data); $j++)
                                        <td>{{ $data[$i][$j] }}</td>
                                    @endfor
                                </tr>
                            @endfor
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
