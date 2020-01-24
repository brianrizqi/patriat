@extends('layouts.app')
@section('content')
    <div class="section-header">
        <h1>Divisi {{ $detail->first()->division->name }}</h1>
    </div>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tabel Ekspatriat</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                            </tr>
                            @foreach($detail as $item)
                                <tr>
                                    <td>{{ $item->expatriate->name }}</td>
                                    <td>{{ $item->expatriate->email }}</td>
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
