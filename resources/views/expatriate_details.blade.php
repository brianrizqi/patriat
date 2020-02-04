@extends('layouts.app')
@section('content')
    <div class="section-header">
        <h1>Penugasan Ekspatriat</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('expatriate-details.create') }}"
                                                   class="btn btn-primary">Tambah Penugasan
                    Ekspatriat</a></div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header" style="display: inline">
                    <h4 style="display: inline">Tabel Penugasan Ekspatriat</h4>
                    <select name="periode" id="select-periode" class="form-control"
                            style="width: 200px; float: right; display: inline-block">
                        <option disabled selected>Periode</option>
                        @foreach($periodes as $item)
                            <option {{ request()->get('periode') == $item->id ? "selected" : "" }}
                                    value="{{ $item->id }}">{{ $item->month . ' ' . $item->year }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                            <tr>
                                <th>ID Ekspatriat</th>
                                <th>Nama</th>
                                <th>Divisi</th>
                                <th>Periode</th>
                                <th>Action</th>
                            </tr>
                            @foreach($details as $detail)
                                <tr>
                                    <td>E{{$detail->expatriate_id}}</td>
                                    <td>{{$detail->expatriate->name}}</td>
                                    <td>{{$detail->division->name}}</td>
                                    <td>{{$detail->periode->month . ' ' . $detail->periode->year}}</td>
                                    <td>
                                        <a href="{{ route('expatriate-details.edit',['id'=>$detail->id]) }}"
                                           class="btn btn-primary">
                                            <span>
                                                <i class="fa fa-edit"></i>
                                            </span>
                                        </a>
                                        <a href="#">
                                            <button class="btn btn-danger" style="display: inline"
                                                    data-confirm="Hapus?|Apakah data akan dihapus?"
                                                    data-confirm-yes="remove({{ $detail->id }})">
                                                <span>
                                                    <i class="fa fa-trash"></i>
                                                </span>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <nav class="d-inline-block">
                        {{ $details->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function remove(id) {
            $.ajax({
                type: 'POST',
                url: '{{ route('expatriate-details.destroy')}}',
                data: {
                    'id': id,
                    '_token': '{{ csrf_token() }}',
                },
                success: function () {
                    window.location.href = '{{ route('expatriate-details') }}';
                    return false;
                }
            })
        }
    </script>
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
