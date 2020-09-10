@extends('admin.layouts.app')
@section('title','Pelanggan')
@section('page','Buat Pelanggan')

@section('head-script')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" />
@endsection

@section('content')
	<div class="col-lg-12 equel-grid">
	  <div class="grid">
	    <div class="grid-body">
	      <div class="item-wrapper">
	        <form method="POST" action="{{ route('kandang_detail.upadte') }}">
	        @csrf
	        @method('PUT')
	          <div class="form-group">       
	        	<label>Suplier</label>
	              <select class="custom-select select-suplier" name="suplier_id">
	                @foreach ($supliers as $suplier)
	                	<option value="{{ $suplier->id }}">{{ $suplier->nama }}</option>
	                @endforeach
	              </select>
	          </div>

	          <div class="form-group">       
	        	<label>Kategori</label>
	              <select class="custom-select select-suplier" name="kategori_id">
	                @foreach ($kategoris as $kategori)
	                	<option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
	                @endforeach
	              </select>
	          </div>

	            <div class="form-group">       
	          	<label>kandang</label>
	                <select class="custom-select select-suplier" name="kandang_id">
	                  @foreach ($kandangs as $kandang)
	                  	<option value="{{ $kandang->id }}">{{ $kandang->nama }}</option>
	                  @endforeach
	                </select>
	            </div>

	          <div class="form-group">
	            <label for="inputPassword1">Jumlah</label>
	            <input type="number" name="jumlah_awal" class="form-control" id="inputPassword1" placeholder="Enter phone number">
	          </div>
	          <div class="form-group">
	            <label for="inputPassword1">Keterangan</label>
	            <div class="col-md-12 showcase_content_area">
	              <textarea class="form-control" name="keterangan" id="inputType9" cols="12" rows="5"></textarea>
	            </div>
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