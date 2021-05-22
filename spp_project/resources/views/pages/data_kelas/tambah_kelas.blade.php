@extends('pages.partials.main.master')
@section('title')
Dashboard
@endsection
@section('content')
<div class="section-header">
    <h1>Tambah Kelas</h1>
</div>

<div class="breadcrumb bg-transparent">
    <div class="breadcrumb-item active"><a href="{{ url('pages/data_kelas') }}">Data Kelas</a></div>
    <div class="breadcrumb-item">Tambah Data Kelas</div>
</div>

<div class="row">
    <form action="/kelas_store" class="col-12" method="POST">
        @csrf
        {{ csrf_field() }}
    <div class="col-12 col-md-12 col-lg-12 col-xl-12">
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
                <h3>Tambah Data Kelas</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label>Tingkat Kelas : </label>
                            <select class="form-control" name="tingkat_kelas">
                                <option disabled selected value="">== Pilih Tingkat ==</option>
                                <option value="X">X</option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>
                                <option value="XIII">XIII</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label>Nama Kelas : </label>
                            <input type="text" class="form-control" name="nama_kelas" placeholder="contoh:11 Rpl 2">
                        </div>
                    </div>
                   
                    <br>
                    <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label>Kompetensi Keahlian : </label>
                            <input type="text" class="form-control" name="kompetensi_keahlian" placeholder="Misal : Multimedia">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block m-3">Simpan</button>
                </div>
            </div>
        </div>
    </div>

</div>
</form>
@endsection
