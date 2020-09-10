@extends('admin.layouts.app')
@section('title','Pelanggan')
@section('page','Pelanggan')
@section('content')
	<div class="col-lg-12">
	  <div class="item-wrapper my-3">
	  	<a href="{{ route('pelanggan.create') }}" class="btn btn-sm btn-primary btn-rounded"><i class="mdi mdi-plus-circle mr-2"></i>Tambah Pelanggan</a>
	  </div>
	  <div class="grid">
	    <div class="item-wrapper">
	      <div class="table-responsive">
	        <table class="table info-table">
	          <thead>
	            <tr>
	              <th>No</th>
	              <th>Nama</th>
	              <th>No Hp</th>
	              <th>Action</th>
	            </tr>
	          </thead>
	          <tbody>
	          	@php
	          		$no=1;
	          	@endphp
	            @foreach ($pelanggans as $suplier)
	            	<tr>
	            	  <td>{{ $no++ }}</td>
	            	  <td>{{ $suplier->nama }}</td>
	            	  <td>{{ $suplier->no_hp }}</td>
	            	  <td>
	            	  	<a href="{{ route('pelanggan.show',$suplier->id) }}" class="btn btn-rounded social-icon-btn btn-success"><i class="mdi mdi-eye"></i></a>
	            	  	<a href="{{ route('pelanggan.edit',$suplier->id) }}" class="btn btn-rounded social-icon-btn btn-primary"><i class="mdi mdi-pencil"></i></a>
	            	  	<form class="d-inline" method="POST" action="{{ route('pelanggan.destroy',$suplier->id) }}">
	            	  		@csrf
	            	  		@method('DELETE')
	            	  		<button class="btn btn-rounded btn-danger social-icon-btn"><i class="mdi mdi-delete"></i></button>
	            	  	</form>
	            	  </td>
	            	</tr>
	            @endforeach
	          </tbody>
	        </table>
	      </div>
	    </div>
	    {{ $pelanggans->links() }}
	  </div>
	</div>
@endsection