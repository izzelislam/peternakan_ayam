@extends('admin.layouts.app')
@section('title','Dashboard')
@section('page','Dashboard')
@section('content')
	<div class="col-lg-12">
		<div class="row">
		  <div class="col-md-3 col-sm-6 col-6 equel-grid">
		    <div class="grid">
		      <div class="grid-body text-gray">
		        <div class="d-flex justify-content-between">
		          <p>{{ $pelanggan->count() }}&nbsp; Pelanggan</p>
		        </div>
		        <p class="text-black">Pelanggan</p>
		        <div class="wrapper w-50 mt-4">
		          <canvas height="45" id="stat-line_1"></canvas>
		        </div>
		      </div>
		    </div>
		  </div>
		  <div class="col-md-3 col-sm-6 col-6 equel-grid">
		    <div class="grid">
		      <div class="grid-body text-gray">
		        <div class="d-flex justify-content-between">
		          
		          	<p>{{ $kategoris->sum('stok') }}&nbsp; Ekor</p>
		          
		        </div>
		        <p class="text-black">Stok Ayam</p>
		        <div class="wrapper w-50 mt-4">
		          <canvas height="45" id="stat-line_2"></canvas>
		        </div>
		      </div>
		    </div>
		  </div>
		  <div class="col-md-3 col-sm-6 col-6 equel-grid">
		    <div class="grid">
		      <div class="grid-body text-gray">
		        <div class="d-flex justify-content-between">
		          <p>{{ $kandang_detail->count() }} &nbsp; Kandang</p>
		        </div>
		        <p class="text-black">Kandang Aktiv</p>
		        <div class="wrapper w-50 mt-4">
		          <canvas height="45" id="stat-line_3"></canvas>
		        </div>
		      </div>
		    </div>
		  </div>
		  <div class="col-md-3 col-sm-6 col-6 equel-grid">
		    <div class="grid">
		      <div class="grid-body text-gray">
		        <div class="d-flex justify-content-between">
		          <p>{{ $order->count() }}&nbsp;</p>
		        </div>
		        <p class="text-black">Order</p>
		        <div class="wrapper w-50 mt-4">
		          <canvas height="45" id="stat-line_4"></canvas>
		        </div>
		      </div>
		    </div>
		  </div>
		</div>

		<div class="row">
			<div class="col-md-8 equel-grid">
			  <div class="grid">
			    <div class="grid-body py-3">
			      <p class="card-title ml-n1">Order History</p>
			    </div>
			    <div class="table-responsive">
			      <table class="table table-hover table-sm">
			        <thead>
			          <tr class="solid-header">
			            <th colspan="2" class="pl-4">Pelanggan</th>
			            <th>No Hp</th>
			            <th>Tanggal</th>
			          </tr>
			        </thead>
			        <tbody>
			          
			          @foreach ($order as $ord)
			            <tr>
			            	<td class="pr-0 pl-4">
			            	  <img class="profile-img img-sm" src="{{  Avatar::create($ord->Pelanggan->nama)->toBase64()  }}" alt="profile image">
			            	</td>
			            	<td class="pl-md-0">
			            	  <small class="text-black font-weight-medium d-block">{{ $ord->pelanggan_id }}</small>
			            	  <span class="text-gray">
			            	    <span class="status-indicator rounded-indicator small bg-primary"></span>{{ $ord->status }}</span>
			            	</td>
			            	<td>
			            	  <small>{{ $ord->Pelanggan->no_hp }}</small>
			            	</td>
			            	<td> {{ $ord->created_at->format('d-m-Y') }} </td>
			            </tr>
			          @endforeach
			          
			        </tbody>
			      </table>
			      {{ $order->links() }}
			    </div>
			    <a class="border-top px-3 py-2 d-block text-gray" href="{{ route('order.index') }}">
			      <small class="font-weight-medium"><i class="mdi mdi-chevron-down mr-2"></i>View All Order History</small>
			    </a>
			  </div>
			</div>
			<div class="col-md-4 equel-grid">
			  <div class="grid">
			    <div class="grid-body">
			      <div class="split-header">
			        <p class="card-title">Kategori & Stok</p>
			        <div class="btn-group">
			          <button type="button" class="btn btn-trasnparent action-btn btn-xs component-flat pr-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			            <i class="mdi mdi-dots-vertical"></i>
			          </button>
			          <div class="dropdown-menu dropdown-menu-right">
			            <a class="dropdown-item" href="#">Expand View</a>
			            <a class="dropdown-item" href="#">Edit</a>
			          </div>
			        </div>
			      </div>
			      <div class="vertical-timeline-wrapper">
			        <div class="timeline-vertical dashboard-timeline">
			          @foreach ($kategoris as $kategori)
			          	<div class="activity-log">
			          	  <p class="log-name">{{ $kategori->nama }}</p>
			          	  <div class="log-details text-bold">{{ $kategori->stok }}&nbsp &nbsp Ekor</div>
			          	  <small class="log-time">
			          	  	@if ($kategori->stok == 20)
			          	  		<p class="badge badge-warning">Hampir Habis</p>
			          	  	@elseif($kategori->stok == 0)
			          	  		<p class="badge badge-danger"> habis</p>
			          	  	@else
			          	  		<p class="badge badge-success">Tersedia</p>
			          	  	@endif
			          	  </small>
			          	</div>
			          @endforeach
			        </div>
			      </div>
			    </div>
			  </div>
			</div>
		</div>
	</div>
@endsection
