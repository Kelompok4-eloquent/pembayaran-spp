@extends('pages.partials.main.master')
@section('title')
Entry Pembayaran
@endsection
@section('content')
<div class="section-header">
    <h1>Entry Pembayaran</h1>
</div>
<div class="row">
    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
        <form action="/pages/entry_pembayaran" method="get">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="nisn" placeholder="Search berdasarkan NISN">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="submit" id="button-addon2"><i
                            class="fa fa-search"></i></button>
                </div>
            </div>

        </form>
    </div>
    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
        <form action="/pages/entry_pembayaran" method="get">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="nama" placeholder="Search berdasarkan Nama">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="submit" id="button-addon2"><i
                            class="fa fa-search"></i></button>
                </div>
            </div>

        </form>
    </div>
    <div class="col-12 col-md-12 col-lg-12 col-xl-12 card p-2">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-5 col-lg-5 col-xl-5">
                    <p class="h5">Nama : Dzaki</p>
                </div> <div class="col-12 col-md-7 col-lg-7 col-xl-7">
                    <div class="ml-5"><img src="https://binomo-trader.com/p-assets/images/l34/reasons/r1-locales/r1-id-a8ad70f55953bab59931f3e83b390688.png" class="img-thumbnail ml-5" width="300px" alt="Cinque Terre"></div>
                </div>
            </div>
        </div>
    </div>
    @if (count($siswas)<=0) <center>
        <h1 class="text-align-center">Data Tak Di temukan</h1>
        </center>
        @else
        @foreach ($siswas as $siswa)
        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
            {{$siswa}}
        </div>
        @endforeach
        @endif
</div>
@endsection
