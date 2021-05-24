@extends('pages.partials.main.master')
@section('title')
Entry Pembayaran
@endsection
@section('content')
<div class="section-header">
    <h1>Entry Pembayaran</h1>
</div>
<div class="breadcrumb bg-transparent">
    <div class="breadcrumb-item active"><a href="{{ url('/pages/transaksi_detail/'.$transaksi->nisn) }}">Detail pembayaran</a></div>
    <div class="breadcrumb-item">{{ md5($transaksi->id_pembayaran)}}</div>
</div>
<div class="row">
    <div class="col-12 col-md-12 col-lg-12 col-xl-12 card p-2">
        <form action="/transaksi/edit/{{ $transaksi->id_pembayaran }}" method="POST">
            @csrf
        {{ csrf_field() }}
        {{ method_field('PUT') }}
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                        <h1>Edit Detail Transaksi</h1>
                        <hr>
                    </div>
                    <input type="hidden" class="form-control" name="nisn"
                                value="{{old('nisn',$transaksi->nisn)}}">
                    <br>
                    <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label>Nominal Yang Di Bayar : </label>
                            <input type="text" class="form-control" name="jumlah_dibayar"
                                value="{{old('jumlah_dibayar',$transaksi->jumlah_dibayar)}}">
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
                                <option value="Januari" {{ ($transaksi->bulan_dibayar=="Januari")?'selected':'' }}>Januari</option>
                                <option value="Februari" {{ ($transaksi->bulan_dibayar=="Februari")?'selected':'' }}>Februari</option>
                                <option value="Maret" {{ ($transaksi->bulan_dibayar=="Maret")?'selected':'' }}>Maret</option>
                                <option value="April" {{ ($transaksi->bulan_dibayar=="April")?'selected':'' }}>April</option>
                                <option value="Mei" {{ ($transaksi->bulan_dibayar=="Mei")?'selected':'' }}>Mei</option>
                                <option value="Juni" {{ ($transaksi->bulan_dibayar=="Juni")?'selected':'' }}>Juni</option>
                                <option value="Juli" {{ ($transaksi->bulan_dibayar=="Juli")?'selected':'' }}>Juli</option>
                                <option value="Agustus" {{ ($transaksi->bulan_dibayar=="Agustus")?'selected':'' }}>Agustus</option>
                                <option value="September" {{ ($transaksi->bulan_dibayar=="September")?'selected':'' }}>September</option>
                                <option value="Oktober" {{ ($transaksi->bulan_dibayar=="Oktober")?'selected':'' }}>Oktober</option>
                                <option value="November" {{ ($transaksi->bulan_dibayar=="November")?'selected':'' }}>November</option>
                                <option value="Desember" {{ ($transaksi->bulan_dibayar=="Desember")?'selected':'' }}>Desember</option>
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
                                value="{{old('tahun_dibayar',$transaksi->tahun_dibayar)}}">
                            @error('tahun_dibayar')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block">
                                Simpan Edit Transaksi 
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
