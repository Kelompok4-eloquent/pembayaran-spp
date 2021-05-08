@extends('admin.partials.main.master')
@section('title')
Dashboard
@endsection
@section('content')

<div class="section-header">
    <h1>Data Siswa</h1>
</div>
<div class="row">
    <div class="col-12 col-md-5 col-lg-5 col-xl-5"><a href="{{ url('admin/data_siswa/tambah_siswa') }}"
            class="btn btn-success mb-4">[+] Tambah Data Siswa</a></div>
    <div class="col-12 col-md-7 col-lg-7 col-xl-7">
        <form action="/admin/data_siswa" method="get">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="nisn" placeholder="Search berdasarkan NISN">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="submit" id="button-addon2"><i
                            class="fa fa-search"></i></button>
                </div>
            </div>

        </form>
    </div>

</div>
<div class="row">
    <div class="col-12 col-md-6 col-lg-12 col-xl-12">
        <div class="card">
            <div class="card-header">
                <h2>Data Siswa</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                        <tbody>
                            <tr>
                                <th>No</th>
                                <th>NISN</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>Alamat</th>
                                <th>No Telp</th>
                                <th>Tahun Masuk</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($siswas as $nomor=>$siswa)


                            <tr>
                                <td>{{ $nomor+1 }}</td>
                                <td>{{ $siswa->nisn }}</td>
                                <td>{{ $siswa->nis }}</td>
                                <td>{{ $siswa->nama }}</td>
                                <td>{{ $siswa->kelas->nama_kelas }}</td>
                                <td>{{ $siswa->kelas->kompetensi_keahlian }}</td>
                                <td>{{ $siswa->alamat }}</td>
                                <td>{{ $siswa->no_telp }}</td>
                                <td>{{ $siswa->spp_tahun->tahun }}</td>
                                <td><a href="" class="m-2 btn btn-warning">Edit</a><a href=""
                                        class="btn btn-danger m-2">Delete</a></td>
                            </tr>@endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
