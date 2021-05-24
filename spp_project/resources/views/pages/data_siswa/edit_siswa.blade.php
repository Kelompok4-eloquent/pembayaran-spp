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
    <div class="breadcrumb-item active"><a href="{{ url('/pages/data_siswa') }}">Data Siswa</a></div>
    <div class="breadcrumb-item">Edit Data Siswa</div>
</div>

<div class="row">
    <form action="/siswa/edit/{{ $siswa->nisn }}" method="POST" enctype="multipart/form-data">
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
                    <h3>Ubah Data Siswa</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                            {{-- input type text (typenya aja di pilih) --}}
                            <div class="form-group">
                                <label>NISN : </label>
                                <input type="text" class="form-control" name="nisn" value="{{$siswa->nisn}}">
                            </div>
                        </div>
                        <br>
                        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label>NIS : </label>
                                <input type="text" class="form-control" name="nis" value="{{$siswa->nis}}">
                            </div>
                        </div>
                        <br>
                        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label>Upload foto : </label>
                                <br>
                                <input type="file" class="form-control choose" id="customFile" name="foto">
                            </div>
                        </div>

                        <br>
                        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label>Nama Lengkap : </label>
                                <input type="text" class="form-control" name="nama" value="{{$siswa->nama}}">
                            </div>
                        </div>
                        <br>
                        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                            {{-- input type number (typenya aja di pilih) --}}
                            <div class="form-group">

                                <label>No Telp : </label>
                                <input type="number" class="form-control" name="no_telp" value="{{$siswa->no_telp}}">
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                            {{-- textarea --}}
                            <div class="form-group">
                                <label>Alamat : </label>
                                <textarea class="form-control" cols="30" rows="50" name="alamat">{{$siswa->alamat}}</textarea>
                            </div>
                        </div>
                        <br>
                        <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label>Kelas : </label>
                                <select class="form-control" name="id_kelas">
                                    <option disabled selected>== Pilih Kelas ==</option>
                                    @foreach ($kelasan as $kelass)
                                    <option value="{{ $kelass->id_kelas }}" {{ ($kelass->id_kelas==$siswa->id_kelas)?'selected':'' }}>{{ $kelass->nama_kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                            {{-- Select Option --}}
                            <div class="form-group">
                                <label>Tahun Masuk : </label>
                                <select class="form-control" name="id_spp">
                                    <option disabled selected>== Pilih Tahun Masuk ==</option>
                                    @foreach ($espepe as $tahun_masuk)
                                    <option value="{{ $tahun_masuk->id_spp }}"  {{ ($tahun_masuk->id_spp==$siswa->id_spp)?'selected':'' }} >
                                        {{ $tahun_masuk->tahun. " | " . number_format($tahun_masuk->nominal) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block m-3">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
@endsection
