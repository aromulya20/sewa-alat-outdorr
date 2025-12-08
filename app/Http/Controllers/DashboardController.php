<?php

namespace App\Http\Controllers;

use App\Models\Penyewaan;
use App\Models\Alat;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPemesanan     = Penyewaan::count();
        $totalPengembalian  = Penyewaan::where('status', 'kembali')->count();
        $alatAvailable      = Alat::sum('stok');
        $pendapatanBulanIni = Penyewaan::whereMonth('tanggal_sewa', now()->month)
                                        ->sum('harga');

        $bulan = [];
        $grafikPemesanan = [];
        $grafikPengembalian = [];

        for ($i = 1; $i <= 12; $i++) {
            $bulan[] = Carbon::create()->month($i)->format('M');
            $grafikPemesanan[] = Penyewaan::whereMonth('tanggal_sewa', $i)->count();
            $grafikPengembalian[] = Penyewaan::whereMonth('tanggal_kembali', $i)->count();
        }

        $recentPemesanan = Penyewaan::latest()->take(5)->get();

        return view('alat.dashboard', compact(
            'totalPemesanan',
            'totalPengembalian',
            'alatAvailable',
            'pendapatanBulanIni',
            'bulan',
            'grafikPemesanan',
            'grafikPengembalian',
            'recentPemesanan'
        ));
    }
}
