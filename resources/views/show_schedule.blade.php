@extends('layouts.app')
@section('content')
    <div class="section-header">
        <h1>Penjadwalan Ekspatriat</h1>
        <div class="section-header-breadcrumb">
            <form method="POST" action="{{ route('scheduling.destroy') }}">
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
                        <button type="submit" class="btn btn-danger">Hapus</button>
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
                    <h4>Tabel Jadwal Ekspatriat</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                            <tr>
                                <th>Divisi</th>
                                <th>Gedung</th>
                                <th>Waktu</th>
                                <th>Periode</th>
                                <th>Action</th>
                            </tr>
                            @foreach($schedules as $schedule)
                                <tr>
                                    <td>{{ $schedule->division->name }}</td>
                                    <td>{{ $schedule->place->name }}</td>
                                    <td>{{ $schedule->day }}</td>
                                    <td>{{ $schedule->periode->month . ' ' . $schedule->periode->year }}</td>
                                    <td>
                                        <a href="{{ route('scheduling.show.expatriate',['id'=>$schedule->division_id]) }}">
                                            <span class="btn btn-primary"><i class="fa fa-eye"></i></span>
                                        </a>
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
