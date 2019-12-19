@extends('layouts.app')
@section('content')
    <div class="section-header">
        <h1>Tambah Tempat</h1>
        <div class="section-header-breadcrumb">
            {{--            <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>--}}
            {{--            <div class="breadcrumb-item active"><a href="/">Plant</a></div>--}}
            {{--            <div class="breadcrumb-item">Create</div>--}}
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form>
                        <div class="card-body">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Tempat</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="name" id="name">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary"
                                            data-confirm="Simpan?|Apakah data akan disimpan?"
                                            data-confirm-yes="simpan()">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function simpan() {
            var name = $('#name').val();
            $.ajax({
                type: 'POST',
                url: '{{ route('place.store')}}',
                data: {
                    'name': name,
                    '_token': '{{ csrf_token() }}',
                },
                success: function () {
                    window.location.href = '{{ route('place') }}';
                    return false;
                }
            })
        }
    </script>
@endsection
