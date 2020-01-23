@extends('layouts.app')
@section('content')
    <div class="section-header">
        <h1>Penjadwalan Ekspatriat</h1>
        @if($errors->any())
            <div style="margin-top: 15px; margin-left: 10px">
                <h5 style="color: red">{{$errors->first()}}</h5>
            </div>
        @endif
        <div class="section-header-breadcrumb">
            <form action="/admin/scheduling" method="POST">
                <div class="input-group">
                    <select name="periode" id="select-periode" class="form-control float-right"
                            style="margin-right: 10px">
                        <option disabled selected>Periode</option>
                        @foreach($periodes as $item)
                            <option {{ request()->get('periode') == $item->id ? "selected" : "" }}
                                    value="{{ $item->id }}">{{ $item->month . ' ' . $item->year }}</option>
                        @endforeach
                    </select>
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-primary">Jadwalkan</button>
                    </div>
                </div>
                @csrf
            </form>
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
        <div class="col-3 col-md-3 col-lg-3">
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
        <div class="col-3 col-md-3 col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h4>Tabel Urut Matrix</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                            <tr>
                                <th>Divisi</th>
                                <th>Jumlah</th>
                            </tr>
                            @foreach ($filter as $item)
                                <tr>
                                    <td>{{ $item['divisi'] }}</td>
                                    <td>{{ $item['jumlah'] }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 col-md-3 col-lg-3">
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
                            @foreach ($filter as $i => $item)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $item['divisi'] }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 col-md-3 col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h4>Tabel Pewarnaan</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                            <tr>
                                <th>Divisi</th>
                                <th>Warna</th>
                            </tr>
                            @foreach ($temp as $i => $item)
                                <tr>
                                    <td>{{ $item['divisi'] }}</td>
                                    <td>{{ $item['color'] }}</td>
                                </tr>
                            @endforeach
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
