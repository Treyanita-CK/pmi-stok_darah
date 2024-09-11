<?php
// app/Http/Controllers/Auth/ResetPasswordController.php

namespace App\Http\Controllers\Auth;

use App\Http\Models\User;
use Illuminate\Http\Request;
use App\Http\Models\UserRole;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{ 
    public function __construct()
    {
        $this->middleware('admin');
    }

   
    public function showResetForm()
    {
        return view('auth.password.reset');
    }

   
    public function resetPassword(Request $request)
    {
        $user = Auth::user();

        // Validasi current password
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'Current password is incorrect.');
        }

        // Validasi dan update kata sandi baru
        $request->validate([
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('home')->with(['success_reset' => 'Password changed successfuly']);
    }
}