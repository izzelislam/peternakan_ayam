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
	              <th>Suplier</th>
	              <th>Jenis Ayam</th>
	              <th>Kandang</th>
	              <th>Jumlah Awal</th>
	              <th>Jumlah Akhir</th>
	              <th>status</th>
	              <th>Keterangan</th>
	              <th>action</th>
	            </tr>
	          </thead>
	          <tbody>
	          	@php
	          		$no=1;
	          	@endphp
	            @foreach ($kandangdetails as $kandangdetail)
	            	<tr>
	            	  <td>{{ $no++ }}</td>
	            	  <td>{{ $kandangdetail->Suplier->nama }}</td>
	            	  <td>{{ $kandangdetail->Kategori->nama }}</td>
	            	  <td>{{ $kandangdetail->kandang->nama }}</td>
	            	  <td>{{ $kandangdetail->jumlah_awal }}</td>
	            	  <td>{{ $kandangdetail->jumlah_akhir }}</td>
	            	  <td><p class="{{ $kandangdetail->status == 'diternak' ? 'badge badge-primary' : 'badge badge-success' }}">{{ $kandangdetail->status }}</p></td>
	            	  <td>{{ $kandangdetail->keterangan }}</td>
	            	  <td>
	            	  	<a href="{{ route('kandang_detail.edit',$kandangdetail->id) }}" class="btn btn-rounded social-icon-btn btn-primary"><i class="mdi mdi-pencil"></i></a>
	            	  	<form class="d-inline" method="POST" action="{{ route('kandang_detail.destroy',$kandangdetail->id) }}">
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
{{-- 	    {{ $kandangdetails->links() }} --}}
	  </div>
	</div>
@endsection