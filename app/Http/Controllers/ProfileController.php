<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function profil()
    {
        $profil = Auth::user();

        return view('admin.profil', compact('profil'));
    }

    public function profil_edit()
    {
        $user = Auth::user();
        return view('admin.profil_edit', compact('user'));
    }

    public function profil_update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name'              => 'nullable|string|max:255',
            'username'          => 'nullable|string|max:255',
            'email'             => 'nullable|string|email|max:255|',
        ]);

        $user->update([
            'name'              => $request->name ?? $user->name, 
            'username'          => $request->username ?? $user->username,
            'email'             => $request->email ?? $user->email,
        ]);

        return redirect()->route('profil')->with('success_profil','Profile updated successfully');
    } 

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        // Validasi kata sandi baru
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);

        // Update kata sandi pengguna
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back('profil')->withErrors('success_reset','Password changed successfully');
    }
}


