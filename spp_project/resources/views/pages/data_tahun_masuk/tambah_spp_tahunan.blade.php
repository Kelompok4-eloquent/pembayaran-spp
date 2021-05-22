@extends('pages.partials.main.master')
@section('title')
Dashboard
@endsection
@section('content')
<div class="section-header">
    <h1>Tambah Petugas</h1>
</div>

<div class="breadcrumb bg-transparent">
    <div class="breadcrumb-item active"><a href="{{ url('/pages/spp_tahunan') }}">Data SPP</a></div>
    <div class="breadcrumb-item">Tambah Data Spp Tahunan</div>
</div>

<div class="row">
    <div class="ol-12 col-md-6 col-lg-12 col-xl-12">
        <div class="card">
            <div class="card-header">
                <h3>Tambah Data Spp Tahunan</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                         {{-- input type text (typenya aja di pilih) --}}
                        <div class="form-group">
                            <label>Tahun : </label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label>Nominal : </label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-primary btn-block m-3">Simpan</button>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
