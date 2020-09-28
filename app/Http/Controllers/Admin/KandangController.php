<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Model\Kandang;
use DataTables;

class KandangController extends Controller
{
    public function index(Request $request)
    {
        $kandangs=Kandang::all();
    	return view('admin.kandang.index',compact('kandangs'));
    }

    public function create()
    {
        return view('admin.kandang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'=>'required',
            'kode'=>'required',
        ]);

        $request->merge(['status'=>'kosong']);
        Kandang::create($request->all());
        Alert::success('Kandang', 'Berhasil Tamgbah Kandang !');

        return redirect(route('kandang.index'));
    }

    public function edit($id)
    {
        $kandang=Kandang::find($id);
        return view('admin.kandang.edit',compact('kandang'));
    }

    public function update(Request $request,$id)
    {
         $request->validate([
            'nama'=>'required',
            'kode'=>'required',
        ]);
         
        $kandang=Kandang::find($id);
        $kandang->update([
            'nama'=>$request->nama,
            'kode'=>$request->kode,
        ]);

        Alert::success('Kandang', 'Berhasil Edit Kandang !');
        return redirect(route('kandang.index'));
    }

    public function destroy($id)
    {
        Kandang::find($id)->delete();
        Alert::warning('Kandang', 'Berhasil Hapus Kandang !');
        return redirect(route('kandang.index'));
    }

}
