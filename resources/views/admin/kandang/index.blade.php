@extends('admin.layouts.app')
@section('title','kandang')
@section('page','kandang')
@section('head-script')
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
	<div class="col-lg-12">
	  <div class="item-wrapper my-3">
	  	<a href="{{ route('kategori.create') }}" class="btn btn-sm btn-primary btn-rounded"><i class="mdi mdi-plus-circle mr-2"></i>Buat Kandang</a>
	  </div>
	  
	  <div class="grid">
	    <div class="item-wrapper">
	      <div class="table-responsive p-3">
	        <table  id="data-kandang" class="table info-table">
	          <thead>
	            <tr>
	              <th>No</th>
	              <th>Nama</th>
	              <th>Kode</th>
	              <th>Aksi</th>
	            </tr>
	          </thead>
	          <tbody>
	          </tbody>
	        </table>
	      </div>
	    </div>
	  </div>
	</div>
@endsection
@section('end-script')
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
	<script>
		$(document).ready(function(){
			$('#data-kandang').DataTable({
				processing:true,
				serverside:true,
				ajax:"{{ route('kandang.index') }}",
				columns:[
					{ data:'id'},
					{ data:'nama'},
					{ data:'kode'},
					{ data:'aksi', orderable: false},
				]
			});
		});
	</script>
@endsection