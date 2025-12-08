@extends('layouts.layout')

@section('content')

<style>
    .page-title {
        font-size: 24px;
        font-weight: bold;
        color: #2c3e50;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .form-card {
        background: white;
        padding: 25px;
        border-radius: 15px;
        box-shadow: 0 3px 12px rgba(0,0,0,0.08);
        border: none;
    }

    .form-label {
        font-weight: 600;
        color: #34495e;
    }

    .preview-img {
        width: 200px;
        height: 160px;
        object-fit: cover;
        border-radius: 10px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        margin-bottom: 10px;
    }

    .btn-primary-custom {
        background: #3498db;
        border: none;
    }

    .btn-primary-custom:hover {
        background: #217dbb;
    }

    .btn-secondary-custom {
        background: #7f8c8d;
        border: none;
    }

    .btn-secondary-custom:hover {
        background: #636e72;
    }
</style>

<h3 class="page-title">✏️ Edit Data Alat Outdoor</h3>
<p class="text-muted mb-4">Perbarui informasi alat outdoor sesuai kebutuhan.</p>

<div class="form-card">

    <form action="{{ route('alat.update', $alat->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- NAMA ALAT -->
        <div class="mb-3">
            <label class="form-label">Nama Alat</label>
            <input type="text" name="nama_alat" value="{{ $alat->nama_alat }}" class="form-control" required>
        </div>

        <!-- STOK -->
        <div class="mb-3">
            <label class="form-label">Stok</label>
            <input type="number" name="stok" value="{{ $alat->stok }}" class="form-control" required>
        </div>

        <!-- HARGA -->
        <div class="mb-3">
            <label class="form-label">Harga Sewa (per hari)</label>
            <input type="number" name="harga_sewa" value="{{ $alat->harga_sewa }}" class="form-control" required>
        </div>

        <!-- FOTO LAMA -->
        <div class="mb-3">
            <label class="form-label">Foto Saat Ini</label><br>

            @if($alat->foto)
                <img src="{{ asset('storage/' . $alat->foto) }}" class="preview-img">
            @else
                <p class="text-danger">Tidak ada foto</p>
            @endif
        </div>

        <!-- UPDATE FOTO -->
        <div class="mb-3">
            <label class="form-label">Ganti Foto (opsional)</label>
            <input type="file" name="foto" class="form-control">
        </div>

        <div class="mt-4">
            <button class="btn btn-primary-custom text-white px-4">💾 Update</button>
            <a href="{{ route('alat.index') }}" class="btn btn-secondary-custom text-white px-4">⬅ Kembali</a>
        </div>

    </form>

</div>

@endsection
