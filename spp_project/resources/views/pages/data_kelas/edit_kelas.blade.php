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
    <div class="breadcrumb-item">Edit Data Kelas</div>
</div>

<div class="row">
    <form action="/kelas/update/{{$kelas->id_kelas}}" class="col-12" method="POST">
        @csrf
       {{ csrf_field() }}
       {{ method_field('PUT') }}
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
                                <option value="X" {{ $kelas->tingkat_kelas == 'X' ? 'selected' : '' }}>X</option>
                                <option value="XI" {{ $kelas->tingkat_kelas == 'XI' ? 'selected' : '' }}>XI</option>
                                <option value="XII" {{ $kelas->tingkat_kelas == 'XII' ? 'selected' : '' }}>XII</option>
                                <option value="XIII" {{ $kelas->tingkat_kelas == 'XII' ? 'selected' : '' }}>XIII</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label>Nama Kelas : </label>
                            <input type="text" class="form-control" value="{{$kelas->nama_kelas}}" name="nama_kelas" placeholder="contoh:11 Rpl 2">
                        </div>
                    </div>
                   
                    <br>
                    <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label>Kompetensi Keahlian : </label>
                            <input type="text" class="form-control" value="{{$kelas->kompetensi_keahlian}}" name="kompetensi_keahlian" placeholder="Misal : Multimedia">
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
