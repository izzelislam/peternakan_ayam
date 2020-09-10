<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Kandang;
use DataTables;

class KandangController extends Controller
{
    public function index(Request $request)
    {
    	if ($request->ajax()) {
    		$kandang=Kandang::all();

    		return Datatables::of($kandang)->addColumn('aksi',function($kandang){
    			
    			return;
    			})->rawColumns(['aksi'])->make(true);
    	}
    	return view('admin.kandang.index');
    }

}
