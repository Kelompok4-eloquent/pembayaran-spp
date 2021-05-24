@extends('pages.partials.main.master')
@section('title')
Entry Pembayaran
@endsection
@section('content')
<div class="section-header">
    <h1>Settings for {{ auth()->user()->username }}</h1>
</div>
<div class="row">
    <div class="col-12 col-md-12 col-lg-12 col-xl-12 card p-2">
        @if ($message = Session::get('success'))
	  <div class="alert alert-success alert-block">
		<button type="button" class="close" data-dismiss="alert">×</button>	
		  <strong>{{ $message }}</strong>
	  </div>
	@endif

	@if ($message = Session::get('error'))
	  <div class="alert alert-danger alert-block">
	    <button type="button" class="close" data-dismiss="alert">×</button>	
		<strong>{{ $message }}</strong>
	  </div>
	@endif

        <form action="/settings/edit/{{ auth()->user()->id_petugas }}" method="POST">
            @csrf
        {{ csrf_field() }}
        {{ method_field('PUT') }}
            <div class="card-body">
                <div class="row">
                    <br>
                    <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label>Old Password : </label>
                            <input type="password" class="form-control" name="old_password"
                                value="{{old('old_password')}}">
                            @error('old_password')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label>New Password : </label>
                            <input type="password" class="form-control" name="new_password"
                                value="{{old('new_password')}}">
                            @error('new_password')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Confirm New Password: </label>
                            <input type="password" class="form-control" name="confirmed_password"
                                value="{{old('confirmed_password')}}">
                            @error('confirmed_password')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
