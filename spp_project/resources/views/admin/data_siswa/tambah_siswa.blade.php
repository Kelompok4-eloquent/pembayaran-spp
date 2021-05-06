@extends('admin.partials.main.master')
@section('title')
Dashboard
@endsection
@section('content')
<div class="section-header">
    <h1>Tambah Siswa</h1>
</div>

<div class="breadcrumb bg-transparent">
    <div class="breadcrumb-item active"><a href="{{ url('admin/data_siswa') }}">Data Siswa</a></div>
    <div class="breadcrumb-item">Tambah Data Siswa</div>
</div>

<div class="row">
    <div class="ol-12 col-md-6 col-lg-12 col-xl-12">
        <div class="card">
            <div class="card-header">
                <h3>Tambah Data Siswa</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                         {{-- input type text (typenya aja di pilih) --}}
                        <div class="form-group">
                            <label>NISN : </label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label>NIS : </label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                   
                    <br>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label>Nama Depan : </label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label>Nama Belakang : </label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                        {{-- input type number (typenya aja di pilih) --}}
                        <div class="form-group">
                            
                            <label>No Telp : </label>
                            <input type="number" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                        {{-- textarea --}}
                        <div class="form-group">
                            <label>Alamat : </label>
                            <textarea class="form-control" cols="30" rows="50"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                            <label>Kelas : </label>
                            <select class="form-control">
                                <option disabled selected>== Pilih Kelas ==</option>
                                <option>Option 1</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                       {{-- Select Option --}}
                        <div class="form-group">
                            <label>Tahun Masuk : </label>
                            <select class="form-control">
                                <option disabled selected>== Pilih Tahun Masuk ==</option>
                                <option>Option 1</option>
                            </select>
                        </div>
                    </div>

                    <button class="btn btn-primary btn-block m-3">Simpan</button>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
