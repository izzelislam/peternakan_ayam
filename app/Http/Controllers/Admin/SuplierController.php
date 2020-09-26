<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Suplier;
use RealRashid\SweetAlert\Facades\Alert;

class SuplierController extends Controller
{
	public function __construct ()
	{
		$this->model=new Suplier;
	}
    public function index()
    {
    	$supliers=Suplier::orderBy('id','desc')->paginate(10);
    	return view('admin.suplier.index',compact('supliers'));
    }

    public function create()
    {
    	return view('admin.suplier.create');
    }

    public function store(Request $request)
    {
    	$this->model->create($request->all());
        Alert::success('Suplier', 'Berhasil Tambah Suplier !');
    	return redirect()->route('suplier.index');
    }

    public function show($id)
    {
    	$suplier=$this->model->find($id);
    	return view('admin.suplier.show',compact('suplier'));
    }

	public function edit($id)
	{
	   $suplier=$this->model->find($id);
	   return view('admin.suplier.edit',compact('suplier'));
	}

	public function update(Request $request,$id)
	{
	   $this->model->find($id)->update($request->all());
       Alert::success('Suplier', 'Berhasil Edit Suplier !');
		return redirect()->route('suplier.index');
	}    

    public function destroy($id)
    {
    	$data=$this->model->find($id)->delete();
        Alert::Warning('Suplier', 'Berhasil Hapus Suplier !');
    	return redirect()->route('suplier.index');
    }
}
