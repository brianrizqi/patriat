@extends('layouts.app')
@section('content')
    <div class="section-header">
        <h1>Tambah Detail Ekspatriat</h1>
        <div class="section-header-breadcrumb">
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form method="POST" action="{{route('expatriate-details.store')}}">
                        <div class="card-body">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                                <div class="col-sm-12 col-md-7">
                                    <select name="expatriate" class="form-control" id="expatriate">
                                        @foreach($expatriates as $expatriate)
                                            <option value="{{ $expatriate->id }}">{{ $expatriate->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Divisi</label>
                                <div class="col-sm-12 col-md-7">
                                    <select name="division" class="form-control" id="division">
                                        @foreach($divisions as $division)
                                            <option value="{{ $division->id }}">{{ $division->name }}</option>
                                        @endforeach
                                    </select>
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
            var expatriate = $('#expatriate').find(':selected').val();
            var division = $('#division').find(':selected').val();
            $.ajax({
                type: 'POST',
                url: '{{ route('expatriate-details.store')}}',
                data: {
                    'expatriate': expatriate,
                    'division': division,
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
