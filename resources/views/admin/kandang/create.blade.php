@extends('admin.layouts.app')
@section('title','Kandang')
@section('page','Buat Kandang')
@section('content')
	<div class="col-lg-12 equel-grid">
	  <div class="grid">
	    <div class="grid-body">
	      <div class="item-wrapper">
	        <form method="POST" action="{{ route('kandang.store') }}">
	          @csrf
	          <div class="form-group">
	            <label for="inputEmail1">Nama</label>
	            <input type="text" class="form-control" id="inputEmail1" placeholder="Nama" name="nama">
	          </div>
	          <div class="form-group">
	            <label for="inputPassword1">Kode</label>
	            <input type="number" class="form-control" id="inputPassword1" placeholder="Enter your password" name="kode">
	          </div>
	          <button type="submit" class="btn btn-sm btn-primary">Buat</button>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>
@endsection