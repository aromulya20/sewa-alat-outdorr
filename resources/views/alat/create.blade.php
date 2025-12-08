@extends('layouts.layout')

@section('content')
<h3>Tambah Alat Outdoor</h3>

<form action="{{ route('alat.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Nama Alat</label>
        <input type="text" name="nama_alat" class="form-control">
    </div>

    <div class="mb-3">
        <label>Stok</label>
        <input type="number" name="stok" class="form-control">
    </div>

    <div class="mb-3">
        <label>Harga Sewa</label>
        <input type="number" name="harga_sewa" class="form-control">
    </div>

    <div class="mb-3">
        <label>Foto Alat</label>
        <input type="file" name="foto" class="form-control">
    </div>

    <button class="btn btn-success">Simpan</button>
</form>
@endsection
