@extends('pages.partials.main.master')
@section('title')
Dashboard
@endsection
@section('content')
<div class="section-header">
    <h1>Data SPP Tahunan</h1>
</div>
<a href="{{ url('/pages/spp_tahunan/tambah_spp_tahunan') }}" class="btn btn-success mb-4">[+] Tambah Data SPP Tahunan</a>
<div class="row">
    <div class="col-12 col-md-6 col-lg-12 col-xl-12">
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
                <h2>Data SPP Tahunan</h2> 
            </div>
            <div class="card-body">
                <span>Harap berhati hati dalam menghapus</span>
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                        <tbody>
                            <tr>
                                <th>No</th>
                                <th>Tahun</th>
                                <th>Nominal SPP</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($SPP as $nomor=>$spp)
                                
                            
                            <tr>
                                <td>{{ $nomor+1 }}</td>
                                <td>{{ $spp->tahun }}</td>
                                <td>{{ $spp->nominal }}</td>
                                <td><a href="/pages/data_tahun_masuk/edit/{{ $spp->id_spp }}" class="m-2 btn btn-warning">Edit</a><form action="/pages/data_tahun_masuk/hapus/{{ $spp->id_spp }}" onsubmit="return confirm('PERINGATAN!, Sebelum menghapus pastikan tahun masuk yang di hapus tak di gunakan oleh siswa!')" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <input type="hidden" name="id_spp" value="{{ $spp->id_spp }}">
                                    <button type="submit" class="btn btn-danger m-2">Delete</button>
                                </form></td>
                            </tr>@endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
