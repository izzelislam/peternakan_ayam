@extends('admin.layouts.app')
@section('title','User')
@section('page','Edit User')
@section('content')
	<div class="col-lg-12 equel-grid">
	  <div class="grid">
	    <div class="grid-body">
	      <div class="item-wrapper">
	        <form method="POST" action="{{ route('user.update',$user->id) }}">
	        @csrf
	        @method('PUT')
	          <div class="form-group">
	            <label for="inputEmail1">Nama</label>
	            <input type="text" name="name" class="form-control" id="inputEmail1" placeholder="Nama" value="{{ old('nama',$user->name) }}">
	          </div>
	          <div class="form-group">
	            <label for="inputPassword1">Email</label>
	            <input type="text" name="email" class="form-control" id="inputPassword1" placeholder="Email" value="{{ $user->email }}">
	          </div>
	          <div class="form-group">
	            <label for="inputPassword1">No Hp</label>
	            <input type="text" name="no_hp" class="form-control" id="inputPassword1" placeholder="No Hp" value="{{ $user->no_hp }}">
	          </div>
	          <div class="form-group">
	            <label for="inputPassword1">password</label>
	            <input type="text" name="no_hp" class="form-control" id="inputPassword1" placeholder="Password">
	          </div>
	          <div class="form-group">
	            <label for="inputPassword1">Alamat</label>
	            <div class="col-md-12 showcase_content_area">
	              <textarea class="form-control" name="alamat" id="inputType9" cols="12" rows="5">{{  old('alamat',$user->alamat)}}</textarea>
	            </div>
	          </div>
	          <button type="submit" class="btn btn-sm btn-primary">Update</button>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>
@endsection