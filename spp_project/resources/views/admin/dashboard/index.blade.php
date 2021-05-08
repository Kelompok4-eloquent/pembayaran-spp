@extends('admin.partials.main.master')
@section('title')
Dashboard
@endsection
@section('content')
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
            <div class="card-body pt-5 pb-5 pl-5">
                <h1 class="display-4">1200</h1>
                <a href="#" class="text-muted h5 pl-1">Data Siswa > </a>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
            <div class="card-body pt-5 pb-5 pl-5">
                <h1 class="display-4">2</h1>
                <a href="#" class="text-muted h5 pl-1">Petugas > </a>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
            <div class="card-body pt-5 pb-5 pl-5">
                <h1 class="display-4">12</h1>
                <a href="#" class="text-muted h5 pl-1">Kelas ></a>
            </div>
        </div>
    </div>
</div>
@foreach ($pembayaran_history as $history)
    

<div class="card">
    <div class="card-body">
        <div class="row">

            <div class="col-12 col-md-2 col-lg-2 col-xl-2">
                <p>Nama </p>
                <p>Nisn </p>
                <p>Nis </p>
                <p>Kelas </p>
                <p>Kompetensi Keahlian </p>
                <hr>
                <p>Total Bayar</p>
                <p>Total Yang Di Bayar</p>
                <p>Kembalian</p>
                <p><sub>Tanggal Di Bayar : {{ date("j F , Y - H : m"),strtotime($history->tanggal_bayar) }}</sub></p>
                <p class="text-white rounded-pill text-center {{ ($history->jumlah_dibayar==NULL)?"bg-danger":"bg-success" }}">{{ ($history->jumlah_dibayar==NULL)?"Belum Di bayar":"Sudah Di bayar" }}</p>
            </div>
            <div class="col-12 col-md-10 col-lg-10 col-xl-10 text-dark font-weight-bold">
                <p>: {{ $history->siswa->nama}} </p>
                <p>: {{ $history->siswa->nisn}} </p>
                <p>: {{ $history->siswa->nis}} </p>
                <p>: {{ $history->siswa->kelas->nama_kelas}}</p>
                <p>: {{ $history->siswa->kelas->kompetensi_keahlian }}</p>
                <hr>
                <p>: {{ $history->jumlah_bayar }}</p>
                <p>: {{ $history->jumlah_dibayar }}</p>
                <p>: {{ ($history->jumlah_dibayar!=null)?$history->jumlah_dibayar - $history->jumlah_bayar : " - "}}</p>
                
            </div>
        </div>
    </div>
</div>
@endforeach
{{ $pembayaran_history->links() }}
@endsection
