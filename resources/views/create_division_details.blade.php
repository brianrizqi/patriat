@extends('layouts.app')
@section('content')
    <div class="section-header">
        <h1>Tambah Relasi Divisi</h1>
        <div class="section-header-breadcrumb">
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form>
                        <div class="card-body">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Divisi</label>
                                <div class="col-sm-12 col-md-7">
                                    <select name="division_a" class="form-control" id="division_a">
                                        @foreach($divisions as $division)
                                            <option value="{{ $division->id }}">{{ $division->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Divisi</label>
                                <div class="col-sm-12 col-md-7">
                                    <select name="division_b" class="form-control" id="division_b">
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
            var division_a = $('#division_a').find(':selected').val();
            var division_b = $('#division_b').find(':selected').val();
            $.ajax({
                type: 'POST',
                url: '{{ route('division-details.store')}}',
                data: {
                    'division_a': division_a,
                    'division_b': division_b,
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
