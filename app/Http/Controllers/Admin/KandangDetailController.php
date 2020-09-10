<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Kandang;
use App\Model\KandangDetail;
use App\Model\Kategori;
use App\Model\Suplier;

class KandangDetailController extends Controller
{
	public function __construct ()
	{
		$this->model=new KandangDetail;
	}
    public function index()
    {
    	$kandangdetails=$this->model->all();
    	return view('admin.kandang_detail.index',compact('kandangdetails'));
    }

    public function create()
    {
    	$supliers=Suplier::all();
    	$kategoris=Kategori::all();
    	$kandangs=Kandang::all();
    	return view('admin.kandang_detail.create',compact('supliers','kategoris','kandangs'));
    }

    public function store(Request $request)
    {
    	$request->merge(['status'=>'diternak']);
    	$this->model->create($request->all());

    	return redirect()->route('kandang_detail.index');
    }

    public function edit(Request $request,$id)
    {
    	$supliers=Suplier::all();
    	$kategoris=Kategori::all();
    	$kandangs=Kandang::all();
    	$kandangdetails=$this->model->find($id);

    	return view('admin.kandang_detail.edit',compact('supliers','kategoris','kandangs','kandangdetails'));
    }
}
