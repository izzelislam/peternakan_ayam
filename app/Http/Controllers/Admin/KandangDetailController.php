<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Kandang;
use App\Model\KandangDetail;
use App\Model\Kategori;
use App\Model\Suplier;
use RealRashid\SweetAlert\Facades\Alert;

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
    	$kandangs=Kandang::where('status','kosong')->get();
    	return view('admin.kandang_detail.create',compact('supliers','kategoris','kandangs'));
    }

    public function store(Request $request)
    {
        // dd($request['kandang_id']);
        Kandang::where('id',$request['kandang_id'])->update(['status'=>'terpakai']);
    	$request->merge(['status'=>'diternak']);
    	$this->model->create($request->all());
        Alert::success('Order', 'Berhasil Order !');

    	return redirect()->route('kandang_detail.index');
    }

    public function edit(Request $request,$id)
    {
    	$supliers=Suplier::all();
    	$kategoris=Kategori::all();
    	$kandangs=Kandang::where('status','kosong')->get();
    	$kandangdetails=$this->model->find($id);

    	return view('admin.kandang_detail.edit',compact('supliers','kategoris','kandangs','kandangdetails'));
    }

    public function update(Request $request,$id)
    {
        $data=$this->model->find($id);
        $kategori=Kategori::find($data->kategori_id);
        if ($request->status == 'terpanen') {
            $kandang=Kandang::where('id',$data['kandang_id'])->update(['status'=>'kosong']);

            if ($data->jumlah_akhir == 0) {
                $data->update(['jumlah_akhir'=>$data->jumlah_awal]);
            }      
            $kategori->update(['stok'=>$kategori->stok+$data->jumlah_akhir]);

        }elseif ($request->status == 'diternak') {
            $kandang=Kandang::where('id',$request['kandang_id'])->update(['status'=>'terpakai']);
            $kategori->update(['stok'=>$kategori->stok-$data->jumlah_akhir]);
        }
        $data->update($request->all());
        Alert::warning('Edit', 'Berhasil Edit !');

        return redirect()->route('kandang_detail.index');
    }

    public function destroy($id)
    {
        $data=$this->model->find($id);
        $kandang=Kandang::where('id',$data['kandang_id'])->update(['status'=>'kosong']);
        $data->delete();
        Alert::warning('Hapus', 'Data Berhasil Di hapus !');
        return redirect()->back();
    }
}
