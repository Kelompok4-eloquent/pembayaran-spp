@extends('pages.partials.main.master')
@section('title')
Entry Pembayaran
@endsection
@section('content')
<div class="section-header">
    <h1>Entry Pembayaran</h1>
</div>
<div class="breadcrumb bg-transparent">
    <div class="breadcrumb-item active"><a href="{{ url('/pages/entry_pembayaran') }}">Entry_pembayaran</a></div>
    <div class="breadcrumb-item">{{$siswa->nama}}</div>
</div>
<div class="row">
    <div class="col-12 col-md-12 col-lg-12 col-xl-12 card p-2">
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
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-5 col-lg-5 col-xl-5">
                    <p class="h5">NISN : {{$siswa->nisn}}</p>
                    <p class="h5">NIS : {{$siswa->nis}}</p>
                    <p class="h5">Nama Lengkap : {{$siswa->nama}}</p>
                    <p class="h5">Kelas : {{($siswa->kelas==NULL)?"Tak Di definisikan":$siswa->kelas->nama_kelas}}</p>
                    <p class="h5">Kompetensi keahlian :
                        {{($siswa->kelas==NULL)?"Tak Di definisikan":$siswa->kelas->kompetensi_keahlian}}</p>
                    <p class="h5">No Telp : {{$siswa->no_telp}}</p>
                    <p class="h5">Alamat : {{$siswa->alamat}}</p>
                    <p class="h5">Tahun Masuk : {{$siswa->spp_tahun->tahun}}</p>
                </div>
                <div class="col-12 col-md-7 col-lg-7 col-xl-7">
                    <div class="ml-5"><img src="{{asset('user_picture/'.$siswa->foto)}}" class="img-thumbnail ml-5"
                            width="300px" alt="Cinque Terre"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12 col-lg-12 col-xl-12 card p-2">
        <form action="/transaksi_store" method="POST">
            @csrf
            {{ csrf_field() }}
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                        <h1>Entry Pembayaran</h1>
                        <hr>
                        <p class="h5">Nominal Yang Harus Di Bayar</p>
                        <p class="text-dark h6"><b>{{ $siswa->spp_tahun->nominal }}</b></p>
                        <input type="hidden" name="nisn" value="{{ $siswa->nisn }}">
                        <input type="hidden" name="jumlah_bayar" value="{{ $siswa->spp_tahun->nominal }}">
                        <input type="hidden" name="id_petugas" value="{{ auth()->user()->id_petugas }}">
                    </div>
                    <br>
                    <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label>Nominal Yang Di Bayar : </label>
                            <input type="text" class="form-control" name="jumlah_dibayar"
                                value="{{old('jumlah_dibayar','')}}">
                            @error('jumlah_dibayar')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label>Bulan Bayar : </label>
                            <select name="bulan_dibayar" class="form-control" id="">
                                <option value="" selected disabled>== Pilih Bulan ==</option>
                                <option value="Januari">Januari</option>
                                <option value="Februari">Februari</option>
                                <option value="Maret">Maret</option>
                                <option value="April">April</option>
                                <option value="Mei">Mei</option>
                                <option value="Juni">Juni</option>
                                <option value="Juli">Juli</option>
                                <option value="Agustus">Agustus</option>
                                <option value="September">September</option>
                                <option value="Oktober">Oktober</option>
                                <option value="November">November</option>
                                <option value="Desember">Desember</option>
                            </select>
                            @error('bulan_dibayar')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label>Tahun Bayar : </label>
                            <input type="text" class="form-control" name="tahun_dibayar"
                                value="{{old('tahun_dibayar','')}}">
                            @error('tahun_dibayar')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">
                                <h3>Bayar</h3>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-12 col-md-12 col-lg-12 col-xl-12 card p-2">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-5 col-lg-5 col-xl-5"></div>
                <div class="col-12 col-md-7 col-lg-7 col-xl-7">
                    <form action="/pages/transaksi_detail/{{ $siswa->nisn }}" method="get">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="{{ old('tahun_dibayar') }}" name="tahun_dibayar" placeholder="Search berdasarkan Tahun">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="submit" id="button-addon2"><i
                                        class="fa fa-search"></i></button>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <tbody>
                                <tr>
                                    <th>No</th>
                                    <th>Bulan</th>
                                    <th>Tahun</th>
                                    <th>Tanggal_bayar</th>
                                    <th>Jumlah Bayar</th>
                                    <th>Nominal Bayar</th>
                                    <th>Kembalian</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($pembayaran_lunass as $nomor=>$pembayaran_user)
                                <tr>
                                    <td>{{ $nomor+1 }}</td>
                                    <td>{{ $pembayaran_user->bulan_dibayar }}</td>
                                    <td>{{ $pembayaran_user->tahun_dibayar }}</td>
                                    <td>{{ $pembayaran_user->tanggal_bayar }}</td>
                                    <td>{{ $pembayaran_user->jumlah_bayar }}</td>
                                    <td>{{ $pembayaran_user->jumlah_dibayar }}</td>
                                    <td>{{ $pembayaran_user->jumlah_dibayar - $pembayaran_user->jumlah_bayar }}</td>
                                    @if ($pembayaran_user->jumlah_dibayar - $pembayaran_user->jumlah_bayar < 0)
                                    <td> <a href="" class="btn btn-danger"><s>Print Struk</s></a> <a href="" class="btn btn-dark ml-3">Delete</a></td>
                                    @else
                                        <td><a href="/cetak_struk/{{ $pembayaran_user->id_pembayaran }}" class="btn btn-success">Print Struk</a> <a href="" class="btn btn-dark ml-3">Delete</a></td>
                                    @endif
                                    
                                </tr>
@endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
