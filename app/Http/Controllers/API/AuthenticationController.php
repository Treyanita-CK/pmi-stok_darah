<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{

    // login
    public function login(Request $request)
    {
        // cek data required
        $user = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
    
        // cari user berdasarkan email
        $user = User::where('username', $request->username)->first();

        if($user) {
            // verifikasi password hash
            if (Hash::check($request->password, $user->password)) {

                // berhasil login, buat token pengguna
                $token = $user->createToken('AuthToken')->plainTextToken;

                return response()->json(['message' => 'Login success','token' =>$token], 201);
            }
        }
        
        // gagal login
        return response()->json(['message' => 'Login failed'], 401);
    }

    // register
     public function register(Request $request)
     {
             // validasi
         $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:users|max:255',
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        ]);

        // insert data
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        // berikan peran default 'admin' kepada pengguna baru
        $defaultRole = 'user';
        $userRole = UserRole::where('role_name', $defaultRole)->first();
        if($userRole) {
            $user->role_id = $userRole->id === 2;
        }
        // save data
        $user->save();

        // respon berhasil
        return response()->json(['message' => 'Registration success', 'users' => $user],201);
     }
 
     // logout
     public function logout(Request $request)
     {
        // request token untuk logout
        $request->user()->currentAccessToken()->delete();
        // return pesan 200 OK sukses logout
        return ('Logout Success');
     }

     // change password
     public function changePassword(Request $request)
     {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|different:current_password|confirmed',
        ]);

        $user = $request->user();

        // verifikasi password 
        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json(['message' => 'Current password is incorrect!'], 401);
        }

        // update password baru dengan hash
        $user->password = Hash::make($request->new_password);
        $user->save();

        return response()->json(['message' => 'Password successfully updated.']);
     }

     // mengecek akun yang sedang terotentikasi
     public function me(Request $request)
     {
        return response()->json([Auth::user()]);
     }
 }