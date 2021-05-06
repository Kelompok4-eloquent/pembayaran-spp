@extends('admin.partials.main.master')
@section('title')
Dashboard
@endsection
@section('content')
<div class="section-header">
    <h1>Data Kelas</h1>
</div>
<a href="{{ url('admin/data_kelas/tambah_kelas') }}" class="btn btn-success mb-4">[+] Tambah Data Kelas</a>
<div class="row">
    <div class="col-12 col-md-6 col-lg-12 col-xl-12">
        <div class="card">
            <div class="card-header">
                <h2>Data Kelas</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                        <tbody>
                            <tr>
                                <th>No</th>
                                <th>Tingkat Kelas</th>
                                <th>Nama Kelas</th>
                                <th>Kompetensi Keahlian</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>XI</td>
                                <td>RPL 2</td>
                                <td>Rekayasa Perangkat Lunak</td>
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
