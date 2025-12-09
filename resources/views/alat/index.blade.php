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
    }

    .card-item {
        border-radius: 16px;
        overflow: hidden;
        background: #ffffff;
        transition: 0.25s;
        border: none;
        box-shadow: 0 4px 14px rgba(0,0,0,0.08);
    }

    .card-item:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 22px rgba(0,0,0,0.12);
    }

    .card-img-top {
        height: 280px;
        width: 100%;
        object-fit: cover;
    }

    .alat-title {
        font-size: 20px;
        font-weight: 700;
        color: #2d3436;
        margin-bottom: 8px;
    }

    .alat-info {
        font-size: 14px;
        color: #636e72;
        margin-bottom: 4px;
    }

    .btn-edit, .btn-delete {
        border-radius: 8px;
    }

    .btn-edit {
        background: #0984e3;
        border: none;
    }
    .btn-edit:hover {
        background: #0767b3;
    }

    .btn-delete {
        background: #d63031;
        border: none;
    }
    .btn-delete:hover {
        background: #b82020;
    }
</style>

<h3 class="page-title">📦 Daftar Alat Outdoor</h3>
<p class="text-muted mb-4">Temukan semua alat outdoor yang tersedia untuk disewa.</p>

<div class="d-flex justify-content-end mb-4">
    <a href="{{ route('alat.create') }}" class="btn btn-primary" 
       style="font-size: 16px; padding: 10px 20px; border-radius: 10px;">
        ➕ Tambah Alat Baru
    </a>
</div>

<div class="row">
    @foreach($data as $alat)
    <div class="col-md-4 mb-4">
        <div class="card card-item">

            @if($alat->foto)
                <img src="{{ asset('storage/' . $alat->foto) }}" class="card-img-top">
            @else
                <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top">
            @endif

            <div class="card-body">
                <h5 class="alat-title">{{ $alat->nama_alat }}</h5>

                <p class="alat-info">📦 Stok: <strong>{{ $alat->stok }}</strong></p>
                <p class="alat-info">💰 Harga: <strong>Rp {{ number_format($alat->harga_sewa) }}/hari</strong></p>

                <div class="mt-3 d-flex gap-2">
                    <a href="{{ route('alat.edit', $alat->id) }}" class="btn btn-edit text-white btn-sm px-3">
                        Edit
                    </a>

                    <form action="{{ route('alat.destroy', $alat->id) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-delete text-white btn-sm px-3">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    @endforeach
</div>

@endsection
