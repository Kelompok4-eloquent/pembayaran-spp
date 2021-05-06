@extends('admin.partials.main.master')
@section('title')
Dashboard
@endsection
@section('content')
<div class="section-header">
    <h1>Data Siswa</h1>
</div>
<a href="{{ url('admin/data_siswa/tambah_siswa') }}" class="btn btn-success mb-4">[+] Tambah Data Siswa</a>
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
                                <th>Alamat</th>
                                <th>No Telp</th>
                                <th>Tahun Masuk</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>012345</td>
                                <td>0123455566</td>
                                <td>Abdul</td>
                                <td>XI RPL 2</td>
                                <td>Jalan Abc</td>
                                <td>08123456789</td>
                                <td>2020</td>
                                <td><a href="" class="m-2 btn btn-warning">Edit</a><a href=""
                                        class="btn btn-danger m-2">Delete</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
