<?php

namespace App\Http\Controllers;

use App\Models\Penyewaan;
use App\Models\Alat;
use Illuminate\Http\Request;

class PenyewaanController extends Controller
{
    // LIST PEMESANAN
    public function index()
    {
        $data = Penyewaan::orderBy('created_at', 'desc')->get();
        return view('sewa.index', compact('data'));
    }

    // FORM PEMESANAN
    public function create()
    {
        $alat = Alat::where('stok', '>', 0)->get();
        return view('sewa.create', compact('alat'));
    }

    public function store(Request $req)
    {
        $req->validate([
            'nama_penyewa' => 'required|string',
            'barang_id'    => 'required|array',
            'jumlah'       => 'required|array',
            'tanggal_sewa' => 'required|date',
            'tanggal_kembali' => 'required|date',
        ]);

        // HITUNG JUMLAH HARI
        $totalHari = (strtotime($req->tanggal_kembali) - strtotime($req->tanggal_sewa)) / 86400;
        $totalHari = $totalHari < 1 ? 1 : $totalHari; 

        foreach($req->barang_id as $index => $barangId){

            $alat = Alat::findOrFail($barangId);
            $jumlah = $req->jumlah[$index];

            // Cek stok
            if($jumlah > $alat->stok){
                return back()->with('error', "Jumlah melebihi stok untuk {$alat->nama_alat}");
            }

            // Kurangi stok
            $alat->stok -= $jumlah;
            $alat->save();

            // HITUNG TOTAL HARGA 
            $totalHarga = $alat->harga_sewa * $jumlah * $totalHari;

            // Simpan penyewaan
            Penyewaan::create([
                'nama_penyewa'    => $req->nama_penyewa,
                'nama_barang'     => $alat->nama_alat,
                'jumlah'          => $jumlah,
                'tanggal_sewa'    => $req->tanggal_sewa,
                'tanggal_kembali' => $req->tanggal_kembali,
                'harga'           => $totalHarga,   
                'status'          => 'dipinjam',
            ]);
        }

        return redirect()->route('sewa.index')->with('success', 'Pemesanan berhasil ditambahkan!');
    }

    // LIST PENGEMBALIAN
    public function pengembalian()
    {
        $data = Penyewaan::where('status', 'dipinjam')->get();
        return view('pengembalian.index', compact('data'));
    }

    // PROSES PENGEMBALIAN
    public function prosesPengembalian($id)
    {
        $item = Penyewaan::findOrFail($id);

        // Cari alat berdasarkan nama
        $alat = Alat::where('nama_alat', $item->nama_barang)->first();

        if($alat){
            $alat->stok += $item->jumlah; // tambah stok kembali
            $alat->save();
        }

        // Update status penyewaan
        $item->update([
            'tanggal_kembali' => now(),
            'status'          => 'kembali'
        ]);

        return back()->with('success', 'Barang berhasil dikembalikan!');
    }

}