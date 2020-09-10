@extends('admin.layouts.app')
@section('title','Kategori')
@section('page','Buat Kategori')
@section('content')
	<div class="col-lg-12 equel-grid">
	  <div class="grid">
	    <div class="grid-body">
	      <div class="item-wrapper">
	        <form method="POST" action="{{ route('suplier.update',$suplier->id) }}">
	        @csrf
	        @method('PUT')
	          <div class="form-group">
	            <label for="inputEmail1">Nama</label>
	            <input type="text" name="nama" class="form-control" id="inputEmail1" placeholder="Enter your email" value="{{ old('nama',$suplier->nama) }}">
	          </div>
	          <div class="form-group">
	            <label for="inputPassword1">No Hp</label>
	            <input type="text" name="no_hp" class="form-control" id="inputPassword1" placeholder="Enter phone number" value="{{ $suplier->no_hp }}">
	          </div>
	          <div class="form-group">
	            <label for="inputPassword1">Alamat</label>
	            <div class="col-md-12 showcase_content_area">
	              <textarea class="form-control" name="alamat" id="inputType9" cols="12" rows="5">{{  old('alamat',$suplier->alamat)}}</textarea>
	            </div>
	          </div>
	          <button type="submit" class="btn btn-sm btn-primary">Update</button>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>
@endsection