<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Models\BloodDonation; // tabel donor darah (blood_donations)
use App\Models\BloodStock; // tabel stok darah (blood_stocks)
use App\Models\Message; // tabel pesan (message)
use App\Models\Post; // tabel postingan (post)
use App\Models\Calender;
use PDF;

class UserDashboardController extends Controller
{
      // total seluruh stok
      public function index()
      {
        $totalseluruh = BloodStock::sum('jumlah');
 
             
        $updated = BloodStock::max('updated_at');
         
        //$section1 = Post::where('id', 1)->first();
        $section1 = Post::find(1);

        return view('welcome', compact('totalseluruh','updated','section1'));
      }

      // donor form
      public function donorForm()
      {
          return view('user.formdonor');
      }   
      public function store(Request $request)
      {
            $user = Auth::user();

            $validatedData = $request->validate([
              'nama' => 'required|string',
              'tempat_lahir' => 'required|string',
              'tgl_lahir' => 'required|date',
              'jenis_kelamin' => 'required|string',
              'alamat' => 'required|string',
              'telepon' => 'required|string',
              'ketersediaan' => 'required|string',
              'bb' => 'required|numeric',
              'gol_darah' => 'required|string',
              'donor_ke' => 'required|numeric',
          ]);
  
          $bloodDonor = new BloodDonation();
          $bloodDonor->nama = $request->nama;
          $bloodDonor->tempat_lahir = $request->tempat_lahir;
          $bloodDonor->tgl_lahir = $request->tgl_lahir;
          $bloodDonor->jenis_kelamin = $request->jenis_kelamin;
          $bloodDonor->alamat = $request->alamat;
          $bloodDonor->telepon = $request->telepon;
          $bloodDonor->ketersediaan = $request->ketersediaan;
          $bloodDonor->bb = $request->bb;
          $bloodDonor->gol_darah = $request->gol_darah;
          $bloodDonor->donor_ke = $request->donor_ke;
          $bloodDonor->user_id = $user->id;
          $bloodDonor->save();
  
          return redirect()->route('formDonor')->with('success_store', 'Data donor berhasil disimpan.');
      }

      // show donor data based user_id
      public function showDataDonor()
      {
            $user = Auth::user();
            $pendonor = BloodDonation::where('user_id', $user->id)->get();

            return view('/user/data_donor', compact('pendonor'));
      }

      // tampilan pesan
      public function hubungi()
      {
            return view('hubungi_kami');
      }

      public function hubungiCreate(Request $request)
      {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'about' => 'required',
                'message' => 'required',
            ]);

            $pesan = new Message();
            $pesan->name = $request->name;
            $pesan->email = $request->email;
            $pesan->about = $request->about;
            $pesan->message = $request->message;

            $pesan->save();

            return redirect()->route('hubungi')->with('success_hubungi','Pesan sudah dikirim. Terimakasih');

      }

      // jadwal donor
      public function JadwalDonor()
      {
          $calender = Calender::all();
          return view('/jadwal', compact('calender'));
      }

      // profil user login
      public function profil()
      {
          $profil = Auth::user();
  
          return view('user/profiluser', compact('profil'));
      }

      // edit profil user login
      public function edit()
      {
            $user = Auth::user();
            return view('/user/profiluser_edit', compact('user'));
      }

      // edit profil user action
      public function edit_action(Request $request)
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

        return redirect()->route('profilUser')->with('success_profil','Profile updated successfully');
      }
      // change password
      public function changePassword()
      {
          return view('/user/change_password');
      }
      public function changePassword_action(Request $request)
      {
        $user = Auth::user();

        // Validasi current password
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'Password lama tidak sesuai.');
        }

        // Validasi dan update kata sandi baru
        $request->validate([
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('profilUser')->with('success','Password berhasil direset!');
    }

    public function informasi1()
    {
        $section2 = Post::find(2); // untuk prosedur pengambilan stok darah.
        return view('/informasi/permintaandarah', compact('section2'));
    }

    public function informasi2()
    {  
        $section3 = Post::find(3); // untuk informasi kebutuhan stok darah.
        return view('/informasi/kebutuhandarah', compact('section3'));
    }

    public function informasi3()
    {
        $section4 = Post::find(4);
        return view('/informasi/syaratdonor', compact('section4'));
    }

}
