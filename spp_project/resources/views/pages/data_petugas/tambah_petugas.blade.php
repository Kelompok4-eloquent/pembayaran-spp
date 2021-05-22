@extends('pages.partials.main.master')
@section('title')
Dashboard
@endsection
@section('content')
<div class="section-header">
    <h1>Tambah Petugas</h1>
</div>

<div class="breadcrumb bg-transparent">
    <div class="breadcrumb-item active"><a href="{{ url('/pages/data_petugas') }}">Data Petugas</a></div>
    <div class="breadcrumb-item">Tambah Data Petugas</div>
</div>

<div class="row">
    
<form action="/petugas_store" class="col-12" method="POST">
    @csrf
    {{ csrf_field() }}
    <div class="col-12 col-md-6 col-lg-12 col-xl-12">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="card">
            <div class="card-header">
                <h3>Tambah Data Petugas</h3>
            </div>
            <div class="card-body">
                <div class="row">
                
                    <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                         {{-- input type text (typenya aja di pilih) --}}
                        <div class="form-group">
                            <label>Username : </label>
                            <input type="text" class="form-control" name="username" value="{{ old('username', '') }}">
                        </div>
                    </div>
                    <br>
                    <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label>Nama Petugas : </label>
                            <input type="text" class="form-control" name="nama_petugas" value="{{ old('nama_petugas', '') }}">
                        </div>
                    </div>
                   
                    <br>
                    <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label>Set Password : </label>
                            <input type="password" class="form-control" name="password" value="{{ old('password', '') }}">
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label>Level : </label>
                            <select class="form-control" name="level">
                                <option disabled selected value=" ">== Pilih Level ==</option>
                                <option value="admin">Admin</option>
                                <option value="petugas">Petugas</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary btn-block m-3">Simpan</button>
                </div>
           
            </div>
       
        </div>
    </div>

</div>
</form>
@endsection
