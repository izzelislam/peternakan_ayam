<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\AyamCek;
use App\Model\KandangDetail;
use RealRashid\SweetAlert\Facades\Alert;

class AyamCekController extends Controller
{
	public function __construct()
	{
		$this->model=new AyamCek;
	}

    public function index()
    {
    	$ayamceks=$this->model->all();
    	return view('admin.ayamcek.index',compact('ayamceks'));
    }

    public function create()
    {
    	$kandangdetails=KandangDetail::where('status','diternak')->get();
    	return view('admin.ayamcek.create',compact('kandangdetails'));
    }

    public function store (Request $request)
    {

        if ( ($request->ayam_sakit && $request->ayam_mati) >= 0 ) {
                $jumlah_awal=KandangDetail::find($request->kandang_detail_id);
                $ayam_masalah=$request->ayam_sakit+$request->ayam_mati;
    		if ($jumlah_awal->jumlah_akhir == null) {
                $jumlah_akhir=$jumlah_awal->jumlah_awal-$ayam_masalah;         
                DB::table('kandang_detail')->where('id',$request->kandang_detail_id)->update(['jumlah_akhir'=>$jumlah_akhir]);                  
            }else{
                $jumlah_final=$jumlah_awal->jumlah_akhir-$ayam_masalah;         
                DB::table('kandang_detail')->where('id',$request->kandang_detail_id)->update(['jumlah_akhir'=>$jumlah_final]);
            }	 		
    	}
        else{
            dd('gak ada');
        }

    	$request->merge(['user_id'=>auth()->user()->id]);
    	// dd($request);
    	$this->model->create($request->all());
        Alert::success('Cek AYam', 'Berhasil Tambah Data !');
    	return redirect()->route('ayam_cek.index');

    }

    public function edit($id)
    {
        $ayamcek=$this->model->find($id);
        return view('admin.ayamcek.edit',compact('ayamcek'));
    }

    public function update(Request $request , $id)
    {
        $data=$this->model->find($id);
        $data->update($request->all());

        $data_kd=KandangDetail::find($data->kandang_detail_id);
        $final=$data_kd->jumlah_awal-($data->ayam_mati+$data->ayam_sakit);
        $data_kd->update(['jumlah_akhir'=>$final]);
        Alert::success('Cek AYam', 'Berhasil Edit Data !');
        return redirect()->route('ayam_cek.index');
    }

    public function destroy($id)
    {
        $this->model->find($id)->delete();
        Alert::warning('Cek AYam', 'Berhasil Hapus Data !');
        return redirect()->route('ayam_cek.index');
    }
}
