@extends('layouts.app')
@section('content')
    <div class="section-header">
        <h1>Detail Divisi</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('division-details.create') }}"
                                                   class="btn btn-primary">Tambah Detail Divisi</a></div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tabel Divisi</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                            <tr>
                                <th>ID</th>
                                <th>Divisi</th>
                                <th>ID</th>
                                <th>Divisi</th>
                                <th>Action</th>
                            </tr>
                            @foreach($details as $division)
                                <tr>
                                    <td>D0{{$division->division_a}}</td>
                                    <td>{{$division->divisionDetails_a->name}}</td>
                                    <td>D0{{$division->division_b}}</td>
                                    <td>{{$division->divisionDetails_b->name}}</td>
                                    <td>
                                        <a href="{{ route('division.edit',['id'=>$division->id]) }}"
                                           class="btn btn-primary">
                                            <span>
                                                <i class="fa fa-edit"></i>
                                            </span>
                                        </a>
                                        <a href="#">
                                            <button class="btn btn-danger" style="display: inline"
                                                    data-confirm="Hapus?|Apakah {{ $division->name }} akan dihapus?"
                                                    data-confirm-yes="remove({{ $division->id }})">
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
                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                {{ $details->links() }}
                            </nav>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function remove(id) {
            $.ajax({
                type: 'POST',
                url: '{{ route('division-details.destroy')}}',
                data: {
                    'id': id,
                    '_token': '{{ csrf_token() }}',
                },
                success: function () {
                    window.location.href = '{{ route('division-details') }}';
                    return false;
                }
            })
        }
    </script>
@endsection
