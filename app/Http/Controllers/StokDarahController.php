<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\BloodStock;
use App\Models\BloodStockHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\App;

class StokDarahController extends Controller
{
        public function __construct()
        {   
            $this->middleware('admin');
        }

        // ambil seluruh stok darah
        public function index()
        {
            $stokDarah = BloodStock::all();

            return view('admin.stokdarah', compact('stokDarah'));
        }

        // export as pdf di rincian stok darah
        public function exportPDF()
        {
            /*$stokDarah = BloodStock::all();
            
            // Render Blade view to HTML
            $html = PDF::loadView('admin.cetakPdf', compact('stokDarah'))->render();
            //$pdf = PDF::loadView('admin.cetakPdf', compact('stokDarah'));

            // Generate PDF using dompdf
            $pdf = PDF::loadHTML($html);
    
            // Download PDF
            return $pdf->download('laporan_stok_darah.pdf');*/
            $stokDarah = BloodStock::all();

            $html = '<html><head><title>Laporan Stok Darah</title>';
            $html .= '<style>
                body {
                    font-family: Arial, sans-serif;
                }
                h3 {
                    text-align: center;
                    margin-bottom: 20px;
                }
                table {
                    width: 100%;
                    border-collapse: collapse;
                }
                th, td {
                    border: 1px solid black;
                    padding: 8px;
                    text-align: left;
                }
                th {
                    background-color: #f2f2f2;
                }
                p{
                    text-align:right;
                }
            </style></head><body>';
            $html .= '<h3>Laporan Stok Darah' .date('Y-m-d').'</h3>';
            $html .= '<table>';
            $html .= '<thead><tr><th>ID</th><th>Golongan Darah</th><th>Jenis</th><th>Jumlah</th><th>Updated At</th></tr></thead>';
            $html .= '<tbody>';
            
            foreach ($stokDarah as $item) {
                $html .= '<tr>';
                $html .= '<td>' . $item->id . '</td>';
                $html .= '<td>' . $item->gol_darah . '</td>';
                $html .= '<td>' . $item->jenis . '</td>';
                $html .= '<td>' . $item->jumlah . '</td>';
                $html .= '<td>' . $item->updated_at . '</td>';
                $html .= '</tr>';
            }
            
            $html .= '</tbody></table>';
            $html .= '<br>';
            $html .= '<p class="text-right">Cirebon, '.date('Y-m-d').' </p>';
            $html .= '<p class="text-right">Kepala Unit Donor Darah</p>';
            $html .= '<br><br><br><br>';
            $html .= '<p class="text-right">_____________________</p>';            
            $html .= '</body></html>';
    
            // Generate PDF using dompdf
            $pdf = PDF::loadHTML($html);
    
            // Download PDF
            return $pdf->download('laporan_stok_darah_'.date('Y-m-d').'.pdf');
        }

        // edit data stok darah di rincian stok darah
        public function edit($id)
        {
            $stokDarah = BloodStock::findOrFail($id);

            return view('admin.stokdarah_edit', compact('stokDarah'));
        }
        public function update(Request $request, $id)
        {
            $stokDarah               = BloodStock::findOrFail($id);
            // simpan perubahan
            $stokDarah->gol_darah    = $request->gol_darah;
            $stokDarah->jenis        = $request->jenis;
            $stokDarah->jumlah       = $request->jumlah;
            $stokDarah->updated_at   = Carbon::now();
            $stokDarah->save();

            // simpan riwayat perubahan ke data tabel blood_stock_histories
            BloodStockHistory::create([
                'blood_stock_id' => $stokDarah->id,
                'gol_darah' => $stokDarah->gol_darah,
                'jenis' => $stokDarah->jenis,
                'jumlah' => $stokDarah->jumlah,
                'updated_at' => Carbon::now(),
            ]);

            $dataToUpdate = $request->except(['_token', '_method']);

            $stokDarah->update($dataToUpdate);

            return redirect()->route('stokdarah')->with('success_edit', 'Blood stock data updated successfully');
        }

        // hapus stok darah di rinican stok darah
        public function destroy($id)
        {
            $stokDarah = BloodStock::findOrFail($id);
            $stokDarah->delete();
            return redirect()->route('stokdarah')->with('success_delete', 'Blood stock data deleted successfully');
        }

        // create stok darah di rincian stok darah
        public function create(Request $request)
        {
            return view('/admin/stokcreate');
        }
        public function create_action(Request $request)
        {
            $request->validate([
                'gol_darah' => 'required|string|max:255',
                'jenis' => 'required|string|max:255',
                'jumlah' => 'required|integer|min:0',
            ]);

            $data               = new BloodStock();
            $data->gol_darah    = $request->gol_darah;
            $data->jenis        = $request->jenis;
            $data->jumlah       = $request->jumlah;

            $data->save();

            return redirect()->route('stokdarah')->with('success_store','Data added successfully!');
        }

        // membuat histori dari data edit di rincian stok darah
        public function histori_index(Request $request)
        {
            $tanggal = $request->input('tanggal');
            $bulan = $request->input('bulan');
            $tahun = $request->input('tahun');
            $query = BloodStockHistory::query();

            if ($tanggal) {
                $query->whereDate('updated_at', $tanggal);
            } elseif ($bulan) {
                $query->whereMonth('updated_at', $bulan);
            }  elseif ($tahun) {
                $query->whereYear('updated_at', $tahun);
            }

            // melakukan query
            if ($tanggal || $bulan || $tahun) {
                $history = $query->orderBy('updated_at','desc')->get();
            } else {
                $history = collect(); // data kosong saat tidak ada parameter pencarian
            }

            //$history = $query->orderBy('updated_at', 'desc')->get();

            return view('admin.stokdarah_histori', compact('history','tanggal','bulan','tahun'));
        }

        // export as PDF
        public function export(Request $request)
        {
            $tanggal = $request->input('tanggal');
            $bulan = $request->input('bulan');
            $tahun = $request->input('tahun');
            $query = BloodStockHistory::query();

            if ($tanggal) {
                $query->whereDate('updated_at', $tanggal);
            } elseif ($bulan) {
                $query->whereMonth('updated_at', $bulan); 
            } elseif ($tahun) {
                $query->whereYear('updated_at', $tahun);
            }
    
            $history = $query->orderBy('updated_at', 'desc')->get();
    
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadView('admin.stokdarah_histori_pdf', compact('history', 'tanggal', 'bulan','tahun'));
    
            // Render the PDF
            $pdf->getDomPDF()->set_option("enable_php", true);
            
            return $pdf->download('histori_stok_darah.pdf');
        }
        

}
