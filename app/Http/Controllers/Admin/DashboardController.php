<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\KandangDetail;
use App\Model\Kategori;
use App\Model\Order;
use App\Model\Pelanggan;
use App\Charts\OrderChart;


class DashboardController extends Controller
{
    public function index()
    {
    	$order=Order::all();
    	$pelanggan=Pelanggan::all();
    	$kandang_detail=KandangDetail::where('status','diternak');
    	$kategoris=Kategori::all();
    	return view('admin.dashboard.index',compact('kategoris','order','pelanggan','kandang_detail'));
    }
}
