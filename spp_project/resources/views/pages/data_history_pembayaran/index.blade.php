@extends('pages.partials.main.master')
@section('title')
Dashboard
@endsection
@section('content')
<div class="section-header">
    <h1>History Pembayaran</h1>
</div>
@foreach ($lunash as $history)
    

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
@endsection