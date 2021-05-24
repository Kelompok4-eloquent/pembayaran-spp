@extends('pages.partials.main.master')
@section('title')
Dashboard
@endsection
@section('meta_token')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')

<div class="section-header">
    <h1>Data Siswa</h1>
</div>
<div class="row">
    <div class="col-12 col-md-5 col-lg-5 col-xl-5"><a href="{{ url('pages/data_siswa/tambah_siswa') }}"
            class="btn btn-success mb-4">[+] Tambah Data Siswa</a></div>
    <div class="col-12 col-md-7 col-lg-7 col-xl-7">
        <form action="/pages/data_siswa" method="get">
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
    <div class="col-12 col-md-12 col-lg-12 col-xl-12">
        @if (session()->has('success'))
        <div class="alert alert-success">
            @if(is_array(session('success')))
                <ul>
                    @foreach (session('success') as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @else
                {{ session('success') }}
            @endif
        </div>
        @endif
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
                                <th>Foto</th>
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
                                @if ($siswa->id_kelas==NULL)
                                    <td>Tak Di definisikan</td>
                                    <td>Tak Di definisikan</td>
                                    
                                @else
                                    <td>{{ $siswa->kelas->nama_kelas }}</td>
                                    <td>{{ $siswa->kelas->kompetensi_keahlian }}</td>
                                @endif
                                <td>{{ $siswa->alamat }}</td>
                                <td><img src="{{ asset('user_picture/'.$siswa->foto) }}" width="200px"></td>
                                <td>{{ $siswa->no_telp }}</td>
                                @if ($siswa->id_spp==NULL)
                                <td>Tak Di definisikan</td>
                                @else
                                <td>{{ $siswa->spp_tahun->tahun }}</td>
                                @endif
                                <td><a href="/pages/data_siswa/edit/{{ $siswa->nisn }}" class="m-2 btn btn-warning">Edit</a><a href=" " class="m-2 btn btn-danger button"
                                    data-id="{{$siswa->nisn}}">Delete</a></td>
                            </tr>@endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@push('custom-script')
<script>
    $(document).on('click', '.button', function (e) {
        e.preventDefault();
        var nisn = $(this).data('id');
        var token = $("meta[name='csrf-token']").attr("content");
        swal({
                title: "Are you sure! To Delete?",
                type: "warning",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
            },
            function () {
                
                $.ajax({
                    url: "/pages/data_siswa/hapus/"+nisn,
                    type: "GET",
                    data: {
                        "nisn": nisn,
                        "_token": token,
                    },

                    success: function (data) {
                        swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",
                        });
                        location.reload(); }
                    
                });
                location.reload();
            });
            
    });

</script>
@endpush
@endsection
