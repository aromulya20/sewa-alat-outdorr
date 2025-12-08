@extends('layouts.layout')

@section('content')

<style>
    body {
        font-family: 'Nunito', sans-serif;
        background: #f4f6f9;
    }

    .page-title {
        font-size: 32px;
        font-weight: bold;
        color: #2c3e50;
        margin-bottom: 30px;
    }

    .card-stats {
        border-radius: 15px;
        padding: 50px 20px;
        background: #fff;
        box-shadow: 0 6px 20px rgba(0,0,0,0.1);
        text-align: center;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .card-stats:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }

    .stats-title {
        font-size: 18px;
        color: #7f8c8d;
        margin-bottom: 10px;
    }

    .stats-value {
        font-size: 40px;
        font-weight: bold;
        color: #34495e;
    }

    .recent-box {
        background: #fff;
        padding: 25px;
        border-radius: 15px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    }

    table th {
        background: #16a085 !important;
        color: white;
        font-size: 25px;
    }

    table td {
        font-size: 25px;
    }

    .badge-warning {
        background: #f1c40f;
        font-size: 14px;
        padding: 5px 10px;
    }

    .badge-success {
        background: #2ecc71;
        font-size: 14px;
        padding: 5px 10px;
        font-size: 25px;
    }

    @media (max-width: 768px) {
        .card-stats {
            padding: 30px 15px;
        }

        .stats-value {
            font-size: 32px;
        }

        .stats-title {
            font-size: 16px;
        }
    }
</style>

<h3 class="page-title">📊 Dashboard Admin Penyewaan</h3>

<!-- ====== STATISTICS CARD ====== -->
<div class="row mb-4">
    <div class="col-md-3 col-sm-6 mb-3">
        <div class="card-stats">
            <div class="stats-title">Total Pemesanan</div>
            <div class="stats-value">{{ $totalPemesanan }}</div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-3">
        <div class="card-stats">
            <div class="stats-title">Total Pengembalian</div>
            <div class="stats-value">{{ $totalPengembalian }}</div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-3">
        <div class="card-stats">
            <div class="stats-title">Alat Tersedia</div>
            <div class="stats-value">{{ $alatAvailable }}</div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-3">
        <div class="card-stats">
            <div class="stats-title">Pendapatan Bulan Ini</div>
            <div class="stats-value">Rp {{ number_format($pendapatanBulanIni) }}</div>
        </div>
    </div>
</div>

<!-- ====== RECENT TABLE ====== -->
<div class="row">
    <div class="col-md-12">
        <div class="recent-box">
            <h5 class="mb-4">📝 Pemesanan Terbaru</h5>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nama Penyewa</th>
                        <th>Alat</th>
                        <th>Tanggal Sewa</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentPemesanan as $item)
                    <tr>
                        <td>{{ $item->nama_penyewa }}</td>
                        <td>{{ $item->alat?->nama_alat ?? $item->nama_barang }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_sewa)->format('d M Y') }}</td>
                        <td>
                            @if($item->status == 'dipinjam')
                                <span class="badge badge-warning">Dipinjam</span>
                            @else
                                <span class="badge badge-success">Kembali</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
