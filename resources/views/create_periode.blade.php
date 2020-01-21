@extends('layouts.app')
@section('content')
    <div class="section-header">
        <h1>Tambah Periode</h1>
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
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bulan</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control" name="month" id="month">
                                        <option>Januari - Juni</option>
                                        <option>Juli - Desember</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tahun</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control" name="year" id="year">
                                        <option>2019</option>
                                        <option>2020</option>
                                        <option>2021</option>
                                        <option>2022</option>
                                        <option>2023</option>
                                        <option>2024</option>
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
            var month = $('#month').val();
            var year = $('#year').val();
            $.ajax({
                type: 'POST',
                url: '{{ route('periode.store')}}',
                data: {
                    'month': month,
                    'year': year,
                    '_token': '{{ csrf_token() }}',
                },
                success: function () {
                    window.location.href = '{{ route('periode') }}';
                    return false;
                }
            })
        }
    </script>
@endsection
