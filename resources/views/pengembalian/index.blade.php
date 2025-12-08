@extends('layouts.layout')

@section('content')

<style>
    h3.page-title {
        font-size: 26px;
        font-weight: bold;
        color: #2c3e50;
        margin-bottom: 20px;
    }

    .card-box {
        background: white;
        padding: 25px;
        border-radius: 15px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    }

    table th {
        background: linear-gradient(90deg, #16a085, #1abc9c);
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
        background: #eafaf1;
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

    .btn-proses {
        background: #2980b9;
        color: white;
        border: none;
        transition: 0.3s;
    }

    .btn-proses:hover {
        background: #1c5980;
    }

    @media (max-width: 768px) {
        .table-responsive {
            font-size: 14px;
        }
    }
</style>

<h3 class="page-title">🔄 Daftar Pengembalian Alat</h3>

<div class="card-box">
    <div class="table-responsive">
        <table class="table table-hover table-striped align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Penyewa</th>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Tanggal Sewa</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th>Aksi</th>
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
                    <td>{{ $row->tanggal_kembali ? \Carbon\Carbon::parse($row->tanggal_kembali)->format('d M Y') : '-' }}</td>
                    <td>
                        @if($row->status == 'dipinjam')
                            <span class="badge badge-warning">Dipinjam</span>
                        @else
                            <span class="badge badge-success">Kembali</span>
                        @endif
                    </td>
                    <td>
                        @if($row->status == 'dipinjam')
                        <form action="{{ route('pengembalian.proses', $row->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-proses btn-sm"
                                onclick="return confirm('Proses pengembalian?')">
                                Proses
                            </button>
                        </form>
                        @else
                            ✔ Selesai
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>

@endsection
