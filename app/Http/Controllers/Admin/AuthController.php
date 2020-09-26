<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
    	$this->middleware('guest')->except('logout');
    	$this->middleware('auth')->only('logout');
    	$this->model=new User;
    }

    public function index()
    {
    	return view('admin.auth.login');
    }

    public function loginProses(Request $request)
    {
    	$data=$request->only('email','password');
    	$berhasil=Auth::attempt($data);

    	if ($berhasil) {
    		return redirect()->route('admin');
    	}else{
    		return redirect()->back();
    	}
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect()->route('login');
    }
}
