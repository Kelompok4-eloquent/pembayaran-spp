@extends('admin.partials.main.master')
@section('title')
Dashboard
@endsection
@section('content')
<div class="row">
    <div class="col-12 col-lg-3 col-md-6 col-sm-12">
        <div class="card card-statistic-2">
            <div class="card-body pt-5 pb-5 pl-5">
                <h1 class="display-4">{{ count($murid_count) }}</h1>
                <a href="{{ url('/admin/data_siswa') }}" class="text-muted h5 pl-1">Data Siswa > </a>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-3 col-md-6 col-sm-12">
        <div class="card card-statistic-2">
            <div class="card-body pt-5 pb-5 pl-5">
                <h1 class="display-4">{{ count($petugas_count) }}</h1>
                <a href="{{ url('/admin/data_petugas') }}" class="text-muted h5 pl-1">Petugas > </a>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-3 col-md-6 col-sm-12">
        <div class="card card-statistic-2">
            <div class="card-body pt-5 pb-5 pl-5">
                <h1 class="display-4">{{ count($kelas_count) }}</h1>
                <a href="{{ url('/admin/data_kelas') }}" class="text-muted h5 pl-1">Kelas ></a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card card-statistic-2">
            <div class="card-body pt-5 pb-5 pl-5">
                <h1 class="display-4">{{  count($transaksi_lunas) }}</h1>
                <a href="{{ url('/admin/data_history_pembayaran') }}" class="text-muted h5 pl-1">Transaksi Lunas></a>
            </div>
        </div>
    </div>
</div>
@foreach ($pembayaran_history as $history)
    

<div class="card">
    <div class="card-body">
        <div class="row">

            <div class="col-6 col-md-2 col-lg-2 col-xl-2">
                <p> Status : </p>
                <p>Nama </p>
                <p>Nisn </p>
                <p>Nis </p>
                <p>Kelas </p>
                <p>Kompetensi Keahlian </p>
                <p>Spp Bulan</p>
                <hr>
                <p>Total Bayar</p>
                <p>Total Yang Di Bayar</p>
                <p>Kembalian</p>
                
                <p><sub>Tanggal :  <?php
                      date_default_timezone_set("Asia/Bangkok");
                      echo date("j F , Y - H : i",strtotime($history->tanggal_bayar));
                ?> </sub></p>
                <p class="text-white rounded-pill text-center {{ ($history->jumlah_dibayar==NULL)?"bg-danger":"bg-success" }}">{{ ($history->jumlah_dibayar==NULL)?"Belum Di bayar":"Sudah Di bayar" }}</p>
                
            </div>
            <div class="col-6 col-md-10 col-lg-10 col-xl-10 text-dark font-weight-bold">
                <p class="rounded-pill font-weight-bolder {{ ($history->jumlah_dibayar < $history->jumlah_bayar)?"text-danger":"text-success" }}"> {{ ($history->jumlah_dibayar < $history->jumlah_bayar)?"Belum Lunas":"Lunas" }}</p>
                <p>: {{ $history->siswa->nama}} </p>
                <p>: {{ $history->siswa->nisn}} </p>
                <p>: {{ $history->siswa->nis}} </p>
                <p>: {{ $history->siswa->kelas->nama_kelas}}</p>
                <p>: {{ $history->siswa->kelas->kompetensi_keahlian }}</p>
                <p>: {{ $history->bulan_dibayar." - ".$history->tahun_dibayar}}</p>
                <hr>
                <p>: {{ $history->jumlah_bayar }}</p>
                <p>: {{ $history->jumlah_dibayar }}</p>
                <p>: {{ ($history->jumlah_dibayar!=null)?$history->jumlah_dibayar - $history->jumlah_bayar : " - "}}</p>
                
            </div>
        </div>
    </div>
</div>
@endforeach
<div class="row">
    <div class="col-12 col-xl-12 col-md-12 col-sm-12">{{ $pembayaran_history->links('pagination::bootstrap-4') }}</div>
</div>
@endsection
