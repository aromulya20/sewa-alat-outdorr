@extends('layouts.layout')

@section('content')

<style>
    .page-title {
        font-size: 26px;
        font-weight: bold;
        color: #2c3e50;
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
    }

    .card-box {
        background: white;
        padding: 25px;
        border-radius: 15px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    }

    .btn-add {
        background: #3498db;
        border: none;
        transition: 0.3s;
        font-size: 25px;
    }

    .btn-add:hover {
        background: #217dbb;
    }

    table th {
        background: linear-gradient(90deg, #2980b9, #3498db);
        color: white;
        text-align: center;
        vertical-align: middle;
        font-size: 25px;
    }

    table td {
        vertical-align: middle;
        font-size: 25px;
    }

    table.table-hover tbody tr:hover {
        background: #f2f8ff;
    }

    .badge-warning {
        background: #f39c12;
        color: white;
        font-weight: 500;
    }

    .badge-success {
        background: #27ae60;
        color: white;
        font-weight: 500;
        font-size: 25px;
    }

    @media (max-width: 768px) {
        .table-responsive {
            font-size: 14px;
        }
    }
</style>

<h3 class="page-title">📋 Daftar Pemesanan Sewa</h3>

<div class="card-box">

    <a href="{{ route('sewa.create') }}" class="btn btn-add text-white mb-4 px-4 py-2">+ Tambah Pemesanan</a>

    <div class="table-responsive">
        <table class="table table-hover table-striped align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Penyewa</th>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Tanggal Sewa</th>
                    <th>Harga</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @foreach($data as $index => $row)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $row->nama_penyewa }}</td>
                    <td>{{ $row->nama_barang }}</td>
                    <td>{{ $row->jumlah }}</td>
                    <td>{{ \Carbon\Carbon::parse($row->tanggal_sewa)->format('d M Y') }}</td>
                    <td>Rp {{ number_format($row->harga, 0, ',', '.') }}</td>
                    <td>
                        @if($row->status == 'dipinjam')
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

@endsection
