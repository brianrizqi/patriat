@extends('layouts.app')
@section('content')
    <div class="section-header">
        <h1>Edit Ekspatriat</h1>
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
                    <form method="POST" action="{{route('expatriate.update',['id'=>$expatriate->id])}}">
                        <div class="card-body">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="name" value="{{ $expatriate->name }}">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="address"
                                           value="{{ $expatriate->address }}">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="email" class="form-control" name="email"
                                           value="{{ $expatriate->email }}">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No Telepon</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="number" class="form-control" name="phone"
                                           value="{{ $expatriate->phone }}">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis
                                    Kelamin</label>
                                <div class="col-sm-12 col-md-7">
                                    <select name="gender" class="form-control">
                                        @if($expatriate->gender == "Laki-laki")
                                            <option value="Laki-laki" selected>Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        @else
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan" selected>Perempuan</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                </div>
                            </div>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
