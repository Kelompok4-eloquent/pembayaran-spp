@extends('pages.partials.main.master')
@section('title')
Dashboard
@endsection
@section('content')
@push('custom-style')
<style>
    textarea {
        resize: vertical;
    }
    .choose::-webkit-file-upload-button {
  color: white;
  display: inline-block;
  background: #ff58c4;
  border: none;
  padding: 10px;
  
  font-weight: 700;
  border-radius: 3px;
  white-space: nowrap;
  cursor: pointer;
  font-size: 10pt;
}
</style>
@endpush
<div class="section-header">
    <h1>Tambah Siswa</h1>
</div>

<div class="breadcrumb bg-transparent">
    <div class="breadcrumb-item active"><a href="{{ url('pages/data_siswa') }}">Data Siswa</a></div>
    <div class="breadcrumb-item">Tambah Data Siswa</div>
</div>

<div class="row">
    <div class="col-12 col-md-6 col-lg-12 col-xl-12">
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
                    <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label>Upload foto : </label>
                            <br>
                            <input type="file" class="form-control choose" id="customFile">
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
                                @foreach ($kelasan as $kelass)


                                <option value="{{ $kelass->id_kelas }}">{{ $kelass->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        {{-- Select Option --}}
                        <div class="form-group">
                            <label>Tahun Masuk : </label>
                            <select class="form-control">
                                <option disabled selected>== Pilih Tahun Masuk ==</option>
                                @foreach ($espepe as $tahun_masuk)


                                <option value="{{ $tahun_masuk->id_spp }}">
                                    {{ $tahun_masuk->tahun. " | " . number_format($tahun_masuk->nominal) }}</option>
                                @endforeach
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
