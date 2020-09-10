<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Kategori;

class KategoriController extends Controller
{
	public function __construct()
	{
		$this->model=new Kategori;
	}

    public function index()
    {
        $kategoris=$this->model->all();
    	return view('admin.kategori.index',compact('kategoris'));
    }

    public function create()
    {
    	return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'=>'required',
            'harga'=>'required',
        ]);

        $this->model->create($request->all());
        return redirect()->route('kategori.index');
    }

    public function edit($id)
    {
        $kategori=$this->model->find($id);
        return view('admin.kategori.edit',compact('kategori'));
    }

    public function update(Request $request,$id)
    {
        $this->model->find($id)->update($request->all());
        return redirect()->route('kategori.index');
    }

    public function destroy($id)
    {
        $this->model->find($id)->delete();
        return redirect()->route('kategori.index');
    }
}
