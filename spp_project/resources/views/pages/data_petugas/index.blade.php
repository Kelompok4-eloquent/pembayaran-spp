@extends('pages.partials.main.master')
@section('title')
Dashboard
@endsection
@section('content')
<div class="section-header">
    <h1>Data Petugas</h1>
</div>
<a href="{{ url('pages/data_petugas/tambah_petugas') }}" class="btn btn-success mb-4">[+] Tambah Data Petugas</a>
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
                <h2>Data Petugas</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                        <tbody>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Nama Petugas</th>
                                <th>Level</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($petugas as $nomor=>$user)
                                
                            
                            <tr>
                                <td>{{ $nomor+1 }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->nama_petugas }}</td>
                                <td>{{ $user->level }}</td>
                                <td>
                                    <a href="" class="m-2 btn btn-warning">Edit</a>
                                    <form action="/pages/data_petugas/hapus/{{ $user->id_petugas }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <input type="hidden" name="id_petugas" value="{{ $user->id_petugas }}">
                                        <button type="submit" class="btn btn-danger m-2">Delete</button>
                                    </form>
                                    </td>
                            </tr>@endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
