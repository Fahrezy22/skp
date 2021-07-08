<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use Session;
use App\Model\User;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
 
        if (Auth::attempt($credentials)) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
                $request->session()->put('full_name', Auth::user()->full_name,);
                return redirect()->route('dashboard');
 
        } else { // false
            // Session::flash('error', 'Username atau password salah');
            return redirect()->route('login')->with('error', 'Username atau password salah');
        }
    }

    public function register()
    {
        return view('auth.register');
    }
    public function register_p(Request $request)
    {
        $user = new User;
        $user->full_name = ($request->full_name);
        $user->username = ($request->username); 
        $user->password = Hash::make($request->password);
        $simpan = $user->save();
        return redirect()->route('login')->with('success', 'Register Berhasil Silahkan Login Untuk Mengakses Data');
    }

    public function setting(Request $request, $id)
    {
        $id = Session::get('user_id');
        $data = [
            'full_name'     => $request->full_name,
            'username'      => $request->username,
            'password'      => Hash::make($request->password),
            'level'         => $request->level

        ];
        User::where(['id'=> $id])->update($data);
        Auth::logout();
        return redirect()->route('login')->with('success', 'Akun Berhasil di Perbarui silahkan login kembali!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
