<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\BloodDonation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\App;

class PendonorController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $pendonor = BloodDonation::all();

        return view('admin.pendonor', compact('pendonor'));
    }

    
    public function destroy($id)
    {
        $pendonor = BloodDonation::findOrFail($id);
        $pendonor->delete();
        return redirect()->route('pendonor')->with('success_pendonor', 'Donor data deleted successfully');
    }       

    public function generatePDF()
    {
        $pendonor = BloodDonation::all(); // Ambil data pendonor dari database

        $pdf = App::make('dompdf.wrapper');
        $pdf = PDF::loadView('admin.pendonorpdf', compact('pendonor'));
        // Render the PDF
        $pdf->getDomPDF()->set_option("enable_php", true);

        return $pdf->download('daftar_pendonor.pdf');
    }
}
