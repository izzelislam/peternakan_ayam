@extends('admin.layouts.app')
@section('title','Ayam Cek')
@section('page','Buat Ayam Cek')

@section('head-script')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" />
@endsection

@section('content')
	<div class="col-lg-12 equel-grid">
	  <div class="grid">
	    <div class="grid-body">
	      <div class="item-wrapper">
	        <form method="POST" action="{{ route('ayam_cek.store') }}">
	        @csrf
	        
	          <div class="form-group">       


	            <div class="form-group">       
	          	<label>kandang</label>
	                <select class="custom-select select-suplier" name="kandang_detail_id">
	                  @foreach ($kandangdetails as $kandang)
	                  	<option value="{{ $kandang->id }}">{{ $kandang->Kandang->nama }}</option>
	                  @endforeach
	                </select>
	            </div>

	          <div class="form-group">
	            <label for="inputPassword1">Ayam Mati</label>
	            <input type="number" name="ayam_mati" class="form-control" id="inputPassword1" placeholder="Enter phone number">
	          </div>

	          <div class="form-group">
	            <label for="inputPassword1">Ayam Sakit</label>
	            <input type="number" name="ayam_sakit" class="form-control" id="inputPassword1" placeholder="Enter phone number">
	          </div>

	          <button type="submit" class="btn btn-sm btn-primary">Buat</button>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>
@endsection
@section('end-script')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous"></script>
	<script src="https://cdn.ckeditor.com/ckeditor5/21.0.0/classic/ckeditor.js"></script>

	<script type="text/javascript">
      $(document).ready(function () {
          $(".select-suplier").select2({
            tags: true
          });
      });
  </script>
@endsection