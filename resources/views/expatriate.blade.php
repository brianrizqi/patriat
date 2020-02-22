@extends('layouts.app')
@section('content')
    <div class="section-header">
        <h1>Ekspatriat</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('expatriate.create') }}" class="btn btn-primary">Tambah Ekspatriat</a></div>
        </div>
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
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Email</th>
                                <th>No Telepon</th>
                                <th>Jenis Kelamin</th>
                                <th>Action</th>
                            </tr>
                            @foreach($expatriates as $i => $expatriate)
                                <tr>
                                    <td>{{ ($i + 1) }}</td>
                                    <td>{{$expatriate->name}}</td>
                                    <td>{{$expatriate->address}}</td>
                                    <td>{{$expatriate->email}}</td>
                                    <td>{{$expatriate->phone}}</td>
                                    <td>{{$expatriate->gender}}</td>
                                    <td>
                                        <a href="{{ route('expatriate.edit',['id'=>$expatriate->id]) }}"
                                           class="btn btn-primary">
                                            <span>
                                                <i class="fa fa-edit"></i>
                                            </span>
                                        </a>
                                        <a href="#">
                                            <button class="btn btn-danger" style="display: inline"
                                                    data-confirm="Hapus?|Apakah {{ $expatriate->name }} akan dihapus?"
                                                    data-confirm-yes="remove({{ $expatriate->id }})">
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
                        {{ $expatriates->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function remove(id) {
            $.ajax({
                type: 'POST',
                url: '{{ route('expatriate.destroy')}}',
                data: {
                    'id': id,
                    '_token': '{{ csrf_token() }}',
                },
                success: function () {
                    window.location.href = '{{ route('expatriate') }}';
                    return false;
                }
            })
        }
    </script>
@endsection
