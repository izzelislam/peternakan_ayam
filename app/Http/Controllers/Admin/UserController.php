<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;
use RealRashid\SweetAlert\Facades\Alert;


class UserController extends Controller
{
   
    public function index()
    {
        $users=User::all();
        return view('admin.user.index',compact('users'));
    }

    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user=User::find($id);
        return view('admin.user.edit',compact('user'));
    }

   
    public function update(Request $request, $id)
    {   
        $user=User::find($id);
        if ($request->password == null) {
            $user->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'no_hp'=>$request->no_hp,
                'alamat'=>$request->alamat,
            ]);
        }else{
            $password=bcrypt($request->password);
            $user->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'no_hp'=>$request->no_hp,
                'password'=>$password,
                'alamat'=>$request->alamat,
            ]);
        }

        Alert::success('User', 'Berhasil Edit Order !');
        return redirect(route('user.index'));
    }

    
    public function destroy($id)
    {
        User::find($id)->delete();
        Alert::warning('User', 'Berhasil Hapus Order !');
        return redirect(route('user.index'));
    }
}
