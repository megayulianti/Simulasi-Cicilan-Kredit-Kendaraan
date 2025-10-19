<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Simulasi;
use Barryvdh\DomPDF\Facade\Pdf;

class SimulasiController extends Controller
{
    // 🔹 Menampilkan form simulasi
    public function index()
    {
        return view('simulasi.index');
    }

    // 🔹 Menghitung cicilan dan menampilkan hasil
    public function hitung(Request $request)
    {
        // Validasi input
        $request->validate([
            'otr' => 'required|numeric|min:1000000',
            'dp_percent' => 'required|numeric|min:0|max:100',
            'tenor' => 'required|integer|min:1',
            'bunga' => 'required|numeric|min:0',
        ]);

        // Ambil data dari form
        $otr = $request->otr;
        $dpPercent = $request->dp_percent;
        $tenor = $request->tenor;
        $bungaTahunan = $request->bunga;

        // Hitung nominal DP
        $dpNominal = $otr * ($dpPercent / 100);

        // Pokok pinjaman = OTR - DP
        $pokokPinjaman = $otr - $dpNominal;

        // Bunga per bulan
        $bungaPerBulan = ($bungaTahunan / 12) / 100;

        // Hitung angsuran per bulan (rumus anuitas)
        $angsuranPerBulan = $pokokPinjaman * ($bungaPerBulan * pow(1 + $bungaPerBulan, $tenor)) / (pow(1 + $bungaPerBulan, $tenor) - 1);

        // Total bunga dan total pembayaran
        $totalPembayaran = $angsuranPerBulan * $tenor;
        $totalBunga = $totalPembayaran - $pokokPinjaman;

        // Simpan ke database (opsional)
        $sim = Simulasi::create([
            'otr' => $otr,
            'dp_percent' => $dpPercent,
            'dp_nominal' => $dpNominal,
            'pokok_pinjaman' => $pokokPinjaman,
            'tenor' => $tenor,
            'bunga_tahun' => $bungaTahunan,
            'angsuran_per_bulan' => $angsuranPerBulan,
            'total_bunga' => $totalBunga,
            'total_pembayaran' => $totalPembayaran,
        ]);

        // Kirim data ke view hasil
        return view('simulasi.hasil', compact(
            'sim', 'otr', 'dpPercent', 'dpNominal', 'pokokPinjaman',
            'tenor', 'bungaTahunan', 'angsuranPerBulan',
            'totalBunga', 'totalPembayaran'
        ));
    }

    // 🔹 Download hasil simulasi sebagai PDF
    public function downloadPdf($id)
    {
        $sim = Simulasi::findOrFail($id);

        $pdf = Pdf::loadView('simulasi.pdf', ['sim' => $sim]);
        return $pdf->download('Simulasi-Cicilan-' . $sim->id . '.pdf');
    }
}
