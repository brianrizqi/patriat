@extends('layouts.app')
@section('content')
    <style>
        .dot {
            height: 20px;
            width: 20px;
            border-radius: 50%;
            display: inline-block;
        }
    </style>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            {{$errors->first()}}
        </div>
    @endif
    <div class="section-header">
        <h1>Penjadwalan Ekspatriat</h1>
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
                                @for ($i = 0; $i < count($detail[0]); $i++)
                                    <th>E{{ $i + 1 }}</th>
                                @endfor
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
    {{--    <div class="row">--}}
    {{--        <div class="col-12 col-md-12 col-lg-12">--}}
    {{--            <div class="card">--}}
    {{--                <div class="card-header">--}}
    {{--                    <h4>Tabel Matrix Adjacency (Matriks Ketetanggaan)</h4>--}}
    {{--                </div>--}}
    {{--                <div class="card-body p-0">--}}
    {{--                    <div class="table-responsive">--}}
    {{--                        <table class="table table-striped table-md">--}}
    {{--                            <tr>--}}
    {{--                                <th></th>--}}
    {{--                                <th>D01</th>--}}
    {{--                                <th>D02</th>--}}
    {{--                                <th>D03</th>--}}
    {{--                                <th>D04</th>--}}
    {{--                                <th>D05</th>--}}
    {{--                                <th>D06</th>--}}
    {{--                                <th>D07</th>--}}
    {{--                            </tr>--}}
    {{--                            @for ($i = 0; $i < count($matrix); $i++)--}}
    {{--                                <tr>--}}
    {{--                                    <th>D0{{ ($i + 1) }}</th>--}}
    {{--                                    @for ($j = 0; $j < count($matrix); $j++)--}}
    {{--                                        <td>{{ $matrix[$i][$j] }}</td>--}}
    {{--                                    @endfor--}}
    {{--                                </tr>--}}
    {{--                            @endfor--}}
    {{--                        </table>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tabel Matrix Adjacency (Matriks Ketetanggaan)</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                            <thead>
                            <tr>
                                <th></th>
                                @foreach($relations as $divisi)
                                    <th>D-{{$divisi->id}}</th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($relations as $keyDivisi => $divisi)
                                <tr>
                                    <td>D-{{$divisi->id}}</td>
                                    @foreach($relations as $keyDivisi => $divisicount)
                                        <?php $countdivisi = \App\ExpatriateDetail::join('divisions as d', 'expatriate_details.division_id', '=', 'd.id')->where('periode_id', '=', $periode)->whereIn('division_id', array($divisi->id, $divisicount->id))->groupBy('expatriate_id')->havingRaw('COUNT(*) > 1')->count() ?>
                                        <td>{{$countdivisi > 0 ? 1 : 0}}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                            </tbody>

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
                            @foreach($count as $item)
                                <tr>
                                    <td>[</td>
                                    <td>{{ $item['jumlah'] }}</td>
                                    <td>]</td>
                                </tr>
                            @endforeach
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
                            @php
                                usort($count, function ($a, $b) {
                                if ($a['jumlah'] == $b['jumlah']) return 0;
                                return $a['jumlah'] < $b['jumlah'] ? 1 : -1;
                                });
                            @endphp
                            @foreach ($count as $item)
                                <tr>
                                    <td>[</td>
                                    <td>{{ $item['jumlah'] }}</td>
                                    <td>]</td>
                                </tr>
                            @endforeach
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
                            @foreach ($count as $i => $item)
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
    </div>
    <div class="row">
        <div class="col-6 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Tabel Pewarnaan</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                            @php
                                foreach ($count as $i => $item) {
                                $count[$i]['color'] = $colors[$i];
                            }
                            @endphp
                            <tr>
                                <th>Divisi</th>
                                <th>Warna</th>
                            </tr>
                            @foreach($count as $item)
                                <tr>
                                    <td>{{ $item['divisi'] }}</td>
                                    <td>
                                        @if($item['color']== 1)
                                            Merah <span class="dot btn-danger"></span>
                                        @elseif($item['color']== 2)
                                            Kuning <span class="dot btn-warning"></span>
                                        @elseif($item['color']== 3)
                                            Hijau <span class="dot btn-success"></span>
                                        @else
                                            Biru <span class="dot btn-primary"></span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Matriks Pewarnaan</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                            @foreach ($count as $item)
                                <tr>
                                    <td>[</td>
                                    <td>{{ $item['color'] }}</td>
                                    <td>
                                        ]
                                    </td>
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
