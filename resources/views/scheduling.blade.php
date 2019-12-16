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
                    <h4>Tabel Divisi Ekspatriat</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                            <tr>
                                <th></th>
                                <th>E01</th>
                                <th>E02</th>
                                <th>E03</th>
                                <th>E04</th>
                                <th>E05</th>
                                <th>E06</th>
                                <th>E07</th>
                                <th>E08</th>
                                <th>E09</th>
                                <th>E10</th>
                                <th>E11</th>
                                <th>E12</th>
                                <th>E13</th>
                                <th>E14</th>
                                <th>E15</th>
                                <th>E16</th>
                                <th>E17</th>
                                <th>E18</th>
                            </tr>
                            @for ($i = 0; $i < count($detail); $i++)
                                <tr>
                                    <th>D0{{ ($i + 1) }}</th>
                                    @for ($j = 0; $j < count($detail[$i]); $j++)
                                        <td>{{ $detail[$i][$j] }}</td>
                                    @endfor
                                </tr>
                            @endfor
                        </table>
                    </div>
                </div>
            </div>
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
                            @for ($i = 0; $i < count($matrix); $i++)
                                <tr>
                                    <th>D0{{ ($i + 1) }}</th>
                                    @for ($j = 0; $j < count($matrix); $j++)
                                        <td>{{ $matrix[$i][$j] }}</td>
                                    @endfor
                                </tr>
                            @endfor
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4 col-md-4 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4>Tabel Matrix Derajat</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                            <tr>
                                <th>Divisi</th>
                                <th>Jumlah</th>
                            </tr>
                            @for ($i = 0; $i < count($matrix); $i++)
                                @php $jumlah = 0; @endphp
                                <tr>
                                    @for ($j = 0; $j < count($matrix); $j++)
                                        @php $jumlah += $matrix[$i][$j]; @endphp
                                    @endfor
                                    <td>{{ \App\Division::find($i+1)['name'] }}</td>
                                    <td>{{ $jumlah }}</td>
                                </tr>
                            @endfor
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-4 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4>Tabel Urut Matrix Derajat</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                            <tr>
                                <th>ID</th>
                            </tr>
                            @php
                                $filter = array();
                            @endphp
                            @for ($i = 0; $i < count($matrix); $i++)
                                @php
                                    $jumlah = 0;
                                @endphp
                                @for ($j = 0; $j < count($matrix); $j++)
                                    @php
                                        $jumlah += $matrix[$i][$j];
                                    @endphp
                                @endfor
                                @php
                                    $filter[$i] = $jumlah;
                                @endphp
                            @endfor
                            @php
                                rsort($filter);
                            @endphp
                            @for ($i = 0; $i < count($matrix); $i++)
                                <tr>
                                    <th>{{ $filter[$i] }}</th>
                                </tr>
                            @endfor
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 col-md-4 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4>Tabel Index</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                            <tr>
                                <th>ID</th>
                            </tr>
                            @for ($i = 0; $i < count($matrix); $i++)
                                <tr>
                                    <th>{{ $i + 1 }}</th>
                                </tr>
                            @endfor
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
