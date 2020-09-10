<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Pelanggan;

class PelangganController extends Controller
{
    public function __construct()
    {
    	$this->model=new Pelanggan;
    }

    public function index()
    {
    	$pelanggans=$this->model->orderBy('id','desc')->paginate(10);
    	return view('admin.pelanggan.index',compact('pelanggans'));
    }

    public function create()
    {
    	return view('admin.pelanggan.create');
    }

    public function store(Request $request)
    {
    	$request->validate([
    		'nama'=>'required',
    		'no_hp'=>'required',
    		'alamat'=>'required',
    	]);

    	$this->model->create($request->all());
    	return redirect()->route('pelanggan.index');
    }

    public function show($id)
    {
    	$pelanggan=$this->model->find($id);
    	return view('admin.pelanggan.show',compact('pelanggan'));
    }

    public function edit($id)
    {
    	$pelanggan=$this->model->find($id);
    	return view('admin.pelanggan.edit',compact('pelanggan'));
    }

    public function update(Request $request, $id)
    {
    	$this->model->find($id)->update($request->all());
    	return redirect()->route('pelanggan.index');
    }

    public function destroy($id)
    {
    	$this->model->find($id)->delete();
    	return redirect()->route('pelanggan.index');
    }
}
