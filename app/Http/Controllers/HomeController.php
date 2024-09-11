<?php

namespace App\Http\Controllers;

use App\Models\BloodStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class HomeController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function home()
    {
        $gol_darahA = 'A';
        $totalStokA = BloodStock::where('gol_darah', $gol_darahA)->sum('jumlah');

        $gol_darahB = 'B';
        $totalStokB = BloodStock::where('gol_darah', $gol_darahB)->sum('jumlah');

        $gol_darahO = 'O';
        $totalStokO = BloodStock::where('gol_darah', $gol_darahO)->sum('jumlah');

        $gol_darahAB = 'AB';
        $totalStokAB = BloodStock::where('gol_darah', $gol_darahAB)->sum('jumlah');

        $total = BloodStock::sum('jumlah');
        $updated_at = BloodStock::max('updated_at');

        
        // Mengambil data unik dari kolom gol_darah
        $gol_darah = BloodStock::distinct()->pluck('gol_darah');
    
        // Mengambil data unik dari kolom jenis_darah
        $jenis = BloodStock::distinct()->pluck('jenis');


       return view('admin.home', compact('totalStokA','totalStokB','totalStokO','totalStokAB','total','updated_at','jenis','gol_darah'));
    }

    // halaman tabel stok darah ada di sini karena di stok darah udah penuh
    public function tablestok()
    {
        $total = BloodStock::sum('jumlah');

        // Mengambil data unik dari kolom gol_darah
        $gol_darah = BloodStock::distinct()->pluck('gol_darah');
    
        // Mengambil data unik dari kolom jenis_darah
        $jenis = BloodStock::distinct()->pluck('jenis');

        $updated_at = BloodStock::max('updated_at');
  
        // Mengirimkan data ke view dengan variabel golonganDarah dan jenisDarah
        return view('admin.tablestok', compact('total','gol_darah', 'jenis', 'updated_at'));
    }

}

