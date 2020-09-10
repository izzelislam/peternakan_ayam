@extends('admin.layouts.app')
@section('title','Kategori')
@section('page','Buat Kategori')
@section('content')
	<div class="col-lg-12 equel-grid">
	  <div class="grid">
	    <div class="grid-body">
	      <div class="item-wrapper">
	        <form method="POST" action="{{ route('kategori.store') }}">
	        @csrf
	          <div class="form-group">
	            <label for="inputEmail1">Nama</label>
	            <input type="text" name="nama" class="form-control" id="inputEmail1" placeholder="Enter your email">
	          </div>
	          <div class="form-group">
	            <label for="inputPassword1">Harga</label>
	            <input type="number" name="harga" class="form-control" id="inputPassword1" placeholder="Enter your password">
	          </div>
	          <button type="submit" class="btn btn-sm btn-primary">Buat</button>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>
@endsection