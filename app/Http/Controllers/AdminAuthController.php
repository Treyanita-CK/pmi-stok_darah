<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class AdminAuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
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
        $token = $user->createToken('login-token')->accessToken;

        // auth sukses, redirect ke admin.home
            return redirect()->route('home')->with('success_login','Login success');
        } else {
            return redirect()->route('login')->with('error_login', 'Login Failed. Please check your username or password!');
        }
    }

    public function logout()
    {
        $user = Auth::user();
       
        // hapus akses token dari database
        DB::table('personal_access_tokens')->where('tokenable_id', $user->id)->delete();

        Auth::logout();
        return redirect()->route('login');
    }
}
