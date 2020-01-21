@extends('layouts.app')
@section('content')
    <div class="section-header">
        <h1>Penjadwalan Ekspatriat</h1>
        <div class="section-header-breadcrumb">
            <select id="select-periode" class="form-control float-right">
                <option disabled selected>Periode</option>
                @foreach($periodes as $item)
                    <option {{ request()->get('periode') == $item->id ? "selected" : "" }}
                            value="{{ $item->id }}">{{ $item->month . ' ' . $item->year }}</option>
                @endforeach
            </select>
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
                                <th>Divisi</th>
                                <th>Jumlah</th>
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
                                    $filter[$i]['divisi'] = \App\Division::find($i+1)->name;
                                    $filter[$i]['jumlah'] = $jumlah;
                                @endphp
                            @endfor
                            @php
                                usort($filter, function ($a, $b) {
            if ($a['jumlah'] == $b['jumlah']) return 0;
            return $a['jumlah'] < $b['jumlah'] ? 1 : -1;
        });
                            @endphp
                            @for ($i = 0; $i < count($matrix); $i++)
                                <tr>
                                    <td>{{ $filter[$i]['divisi'] }}</td>
                                    <td>{{ $filter[$i]['jumlah'] }}</td>
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
                                <th>Index</th>
                                <th>Divisi</th>
                            </tr>
                            @for ($i = 0; $i < count($matrix); $i++)
                                <tr>
                                    <th>{{ $i + 1 }}</th>
                                    <td>{{ $filter[$i]['divisi'] }}</td>
                                </tr>
                            @endfor
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#select-periode').on('change', function () {
            var sort = $(this).val();
            var url = window.location.href.split('?')[0];
            document.location = url + "?periode=" + sort;
        })
    });
</script>
