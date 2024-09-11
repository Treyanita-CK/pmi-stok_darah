<?php

namespace App\Http\Controllers;

use App\Models\BloodStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class TotalStokController extends Controller
{
     // total seluruh stok
     public function total()
     {
            $totalseluruh = BloodStock::sum('jumlah');

            
            $updated = BloodStock::max('updated_at');
        
            return view('welcome', ['totalseluruh' => $totalseluruh, 'updated' => $updated]);
     }

     public function index()
     {
            // Mengambil data unik dari kolom gol_darah
            $golonganDarah = BloodStock::distinct()->pluck('gol_darah');
    
            // Mengambil data unik dari kolom jenis_darah
            $jenisDarah = BloodStock::distinct()->pluck('jenis');

            $stokDarah = BloodStock::all();

            $updated = BloodStock::max('updated_at');

            // Mengirimkan data ke view dengan variabel golonganDarah dan jenisDarah
            return view('stokdarah', compact('golonganDarah', 'jenisDarah','stokDarah','updated'));
     }
}
