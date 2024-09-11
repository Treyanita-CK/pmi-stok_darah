<?php

namespace App\Http\Controllers;

use App\Models\BloodStock;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BloodStockController extends Controller
{
    // get all
    public function index()
    {
        $blood_stocks = BloodStock::all();
        //return response()->json(['data' => $blood_stocks]);

        $groupedData = [];

        foreach($blood_stocks as $stock) {
            $date = $stock->tanggal;
            $monthYear = date('Y-m', strtotime($date));

        // jika kunci bulan belum ada di array belum ada
        if (! isset($groupedData[$monthYear])) {
            $groupedData[$monthYear] = [];
        }

        // tambahkan data stok darah ke dalam array kelompok berdasarkan bulan
        $groupedData[$monthYear][] = [
            'id'         => $stock->id,
            'gol_darah'  => $stock->gol_darah,
            'jenis'      => $stock->jenis,
            'jumlah'     => $stock->jumlah,
            'created_at' => $stock->created_at,
            ];
        }
        return response()->json($groupedData);
    }

    // create data
    public function store(Request $request)
    {
        // definisikan validasi
        $request->validate([
            'gol_darah' => 'required|string|max:255',
            'jenis'     => 'required|string|max:255',
            'jumlah'    => 'required|integer|min:0',
        ]);
        
        // buat blood stocks baru
        $blood_stocks = new BloodStock();
        $blood_stocks->gol_darah = $request->gol_darah;
        $blood_stocks->jenis = $request->jenis;
        $blood_stocks->jumlah = $request->jumlah;

        $blood_stocks->save();

        // check data
        return response()->json(['message' => 'Data added succesfully!','blood_stocks' => $blood_stocks],201);

    }

    // update
    public function edit(Request $request, $id)
    {
        $blood_stocks = BloodStock::whereId($id)->first();
        return view('edit')->with('blood_stocks',$blood_stocks);

        return response()->json(['message' => 'Data matched!','blood_stocks'=>$blood_stocks],200);
    }

    public function update(Request $request, $id)
    {
        $blood_stocks               = BloodStock::findOrFail($id);
        $blood_stocks->gol_darah    = $request->gol_darah;
        $blood_stocks->jenis        = $request->jenis;
        $blood_stocks->jumlah       = $request->jumlah;
        $blood_stocks->save();

        return response()->json(['message' => 'Data updated successfully','blood_stocks'=>$blood_stocks],201);
    }

    // get by id
    public function show($id)
    {
        $blood_stocks = BloodStock::findOrFail($id);
        return response()->json(['data' => $blood_stocks]);
    }
    
    // delete data
    public function delete($id) 
    {
        // find data
        $blood_stocks = BloodStock::findOrFail($id);
        $blood_stocks->delete();

        // return pesan error
        return response()->json(['message' => 'Data deleted successfully!','blood_stocks' => $blood_stocks],200);
    }

    // total stok darah berdasarkan gol_darah, rhesus, jenis(tampilan data get untuk user)
    public function totalstok()
    {
        $totalstok = DB::table('blood_stocks')
            ->select('gol_darah','jenis', DB::raw('SUM(jumlah) as total_stok'))
            ->groupBy('gol_darah','jenis')
            ->get();
        
        return response()->json($totalstok);
    }

    // total seluruh stok
    public function totalall()
    {
        $totalseluruh = BloodStock::sum('jumlah');
        return response()->json(['total_seluruh' => $totalseluruh]);
    }
}


