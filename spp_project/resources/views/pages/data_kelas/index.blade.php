@extends('pages.partials.main.master')
@section('title')
Dashboard
@endsection
@section('content')
<div class="section-header">
    <h1>Data Kelas</h1>
</div>
<div class="row">
    <div class="col-12 col-md-5 col-lg-5 col-xl-5"><a href="{{ url('pages/data_kelas/tambah_kelas') }}"
            class="btn btn-success mb-4">[+] Tambah Data Kelas</a></div>
    <div class="col-12 col-md-7 col-lg-7 col-xl-7">
        <form action="/admin/data_kelas" method="get">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="kompetensi_keahlian" placeholder="Search berdasarkan jurusan">
                <div class="input-group-append">
                  <button class="btn btn-outline-primary" type="submit" id="button-addon2"><i class="fa fa-search"></i></button>
                </div>
              </div>
              
        </form>
    </div>

</div>

<div class="row">
    <div class="col-12 col-md-6 col-lg-12 col-xl-12">
        <div class="card">
            <div class="card-header">
                <h2 class="m-2">Data Kelas</h2>
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
                            @if (count($kelasan)<1) <tr>
                                <td colspan="5">
                                    <h2 class="text-center m-2">Tidak ada data di temukan </h2>
                                </td>
                                </tr>
                                @else


                                @foreach ($kelasan as $nomor=>$kelas)
                                <tr>
                                    <td>{{ $nomor+1 }}</td>
                                    <td>{{ $kelas->tingkat_kelas }}</td>
                                    <td>{{ $kelas->nama_kelas }}</td>
                                    <td>{{ $kelas->kompetensi_keahlian }}</td>
                                    <td><a href="" class="m-2 btn btn-warning">Edit</a><a href=""
                                            class="btn btn-danger m-2">Delete</a></td>
                                </tr>
                                @endforeach
                                @endif
                        </tbody>
                    </table>
                </div>
                {{ $kelasan->links() }}
            </div>
            
        </div>
    </div>
</div>
@endsection
