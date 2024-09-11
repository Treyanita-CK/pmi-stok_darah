<?php

namespace App\Http\Controllers;

use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\UserRole;
use App\Models\User;


class UserAuthController extends Controller
{

    public function index()
    {
        return view('user.dashboarduser');
    }

    // register
    public function register()
    {
        return view('auth.register');
    }
    public function register_action(Request $request)
    {
        // validasi
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:users|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        // insert data
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
    
        // berikan peran default 'admin' kepada pengguna baru
        $user->role_id = 2;
        $user->save();
    
        // respon berhasil
        return redirect()->route('user.login');
    }
    
    // login
    public function login()
    {
        return view('user/loginuser');
    }
    public function login_action(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
        // generate token
        $token = $user->createToken('user-login-token')->accessToken;

        return redirect()->route('formDonor')->with('success_login','Login sukses');
        } else {
            return redirect()->route('user.login')->with('error_login', 'Login gagal, periksa kembali!');
        }
    }

    public function deleteToken()
    {
        $user = Auth::user();
        $user->tokens()->delete();

        return redirect()->route('welcome');
    }
}
