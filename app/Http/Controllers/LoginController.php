<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Auth;
class LoginController extends Controller
{
    function regis(Request $req){
      $nama = $req->name_user;
      return $nama;
    }

    function login(Request $request){
      $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }else {
          return back()->with('sukses','Email atau Password Salah!');
        }
    }

}
