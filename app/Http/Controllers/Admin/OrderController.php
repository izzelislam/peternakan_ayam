<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Kategori;
use App\Model\Pelanggan;
use App\Model\Order;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->model=new Order;
    }
    
    public function index()
    {
        $order=$this->model->orderBy('created_at','desc')->get();
        return view('admin.order.index',compact('order'));
    }

 
    public function create()
    {
        $kategori=Kategori::where('stok','>',0)->get();
        $pelanggan=Pelanggan::all();
        return view('admin.order.form',compact('kategori','pelanggan'));
    }

    
    public function store(Request $request)
    {
        $stok=Kategori::all();
        if ($stok->sum('stok') < array_sum($request->qty)) {
            return redirect()->back()->with('stok','stok yang tersedia tidak cukup');
        }else{

        $order=$this->model::create([
            'user_id'=>auth()->user()->id,
            'pelanggan_id'=>$request->pelanggan_id,
            'status'=>'proses',
            'total'=>$request->total,
        ]);

        for ($i=0; $i < count($request->kategori_id) ; $i++) { 
            $order->OrderDetail()->create([
                'kategori_id'=>$request->kategori_id[$i],
                'harga'=>$request->harga[$i],
                'qty'=>$request->qty[$i],
                'sub_total'=>$request->sub_total[$i],
            ]);
            $ctg=Kategori::find($request->kategori_id[$i]);

            if ($request->qty[$i] > $ctg->stok ) {
                return redirect()->back()->with('stok','stok yang tersedia tidak cukup');
            }else{
                $ctg->update(['stok'=>$ctg->stok - $request->qty[$i]]);
            }
        }
      }
        Alert::success('Order', 'Berhasil Order !');
        return redirect(route('order.index'));
    }

   
    public function show($id)
    {
        $order=$this->model->find($id);
        return view('admin.order.detail',compact('order'));
    }

 
    public function edit($id)
    {
        $order=Order::find($id);
        $pelanggan=Pelanggan::all();
        $kategori=Kategori::where('stok','>',0)->get();
        return view('admin.order.form',compact('order','pelanggan','kategori'));
    }

   
    public function update(Request $request, $id)
    {
        $stok=Kategori::all();

        if ($stok->sum('stok') < array_sum($request->qty)) {
            return redirect()->back()->with('stok','stok yang tersedia tidak cukup');
        }else{
            $order=Order::findOrFail($id);
            $order->OrderDetail()->delete();

            $order->update([
                'pelanggan_id'=>$request->pelanggan_id,
                'total'=>$request->total,
            ]);

            for ($i=0; $i < count($request->kategori_id) ; $i++) { 
                for ($i=0; $i < count($order->OrderDetail) ; $i++) { 
                    # code...
                }

                $order->OrderDetail()->create([
                    'kategori_id'=>$request->kategori_id[$i],
                    'harga'=>$request->harga[$i],
                    'qty'=>$request->qty[$i],
                    'sub_total'=>$request->sub_total[$i],
                ]);
                $ctg=Kategori::find($request->kategori_id[$i]);
                $ctg->update(['stok'=>$ctg->stok - $request->qty[$i]]);
            }
            Alert::success('Order', 'Berhasil Edit Order !');
            return redirect(route('order.index'));
        }


    }

   
    public function destroy($id)
    {
        $order=$this->model->find($id);
        $order->OrderDetail()->delete();
        $order->delete();
        Alert::warning('Hapus', 'Data Berhasil Di hapus !');
        return redirect(route('order.index'));
    }
}
