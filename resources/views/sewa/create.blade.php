@extends('layouts.layout')

@section('content')

<h3 class="page-title">🛒 Form Pemesanan Barang Sewa (Multi-Produk)</h3>

<style>
    body {
        font-family: 'Nunito', sans-serif;
        background: #f4f6f9;
        font-size: 20px;
    }

    .page-title {
        font-size: 28px;
        font-weight: bold;
        color: #2c3e50;
        margin-bottom: 25px;
    }

    .form-card {
        background: #fff;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 3px 12px rgba(0,0,0,0.1);
    }

    .form-control {
        font-size: 20px;
    }

    table th, table td {
        font-size: 20px;
    }

    .btn {
        font-size: 20px;
    }

    .badge-warning, .badge-success {
        font-size: 20px;
        padding: 0.5em 1em;
    }

    .input-group select, .input-group input {
        font-size: 20px;
    }

    #grandTotal {
        font-weight: bold;
    }
</style>

<div class="form-card">

    <form action="{{ route('sewa.store') }}" method="POST">
        @csrf

        <!-- NAMA PENYEWA -->
        <div class="mb-3">
            <label>Nama Penyewa</label>
            <input type="text" name="nama_penyewa" class="form-control" required>
        </div>

        <!-- PILIH BARANG DAN JUMLAH -->
        <div class="mb-3">
            <label>Tambah Barang</label>
            <div class="input-group mb-2">
                <select id="barangSelect" class="form-control">
                    <option value="">-- Pilih Barang --</option>
                    @foreach ($alat as $a)
                        <option 
                            value="{{ $a->id }}" 
                            data-nama="{{ $a->nama_alat }}"
                            data-harga="{{ $a->harga_sewa }}"
                            data-stok="{{ $a->stok }}"
                        >
                            {{ $a->nama_alat }} (Stok: {{ $a->stok }}) - Rp {{ number_format($a->harga_sewa) }}
                        </option>
                    @endforeach
                </select>
                <input type="number" id="jumlahInput" min="1" value="1" class="form-control" style="max-width: 100px;">
                <button type="button" id="addBtn" class="btn btn-success">Tambah</button>
            </div>
        </div>

        <!-- TABEL KERANJANG -->
        <div class="mb-3">
            <label>Keranjang Belanja</label>
            <table class="table table-bordered table-hover" id="keranjangTable">
                <thead>
                    <tr>
                        <th>Barang</th>
                        <th>Harga Sewa</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- item akan ditambahkan disini -->
                </tbody>
            </table>
        </div>

        <!-- TOTAL HARGA KESELURUHAN -->
        <div class="mb-3">
            <label>Total Harga Keseluruhan</label>
            <input type="text" id="grandTotal" class="form-control" readonly value="0">
        </div>

        <!-- TANGGAL SEWA -->
        <div class="mb-3">
            <label>Tanggal Sewa</label>
            <input type="date" name="tanggal_sewa" id="tanggal_sewa" class="form-control" required>
        </div>

        <!-- TANGGAL KEMBALI -->
        <div class="mb-3">
            <label>Tanggal Kembali</label>
            <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Pemesanan</button>
    </form>

</div>

<script>
const barangSelect = document.getElementById('barangSelect');
const jumlahInput  = document.getElementById('jumlahInput');
const addBtn       = document.getElementById('addBtn');
const keranjangTbody = document.querySelector('#keranjangTable tbody');
const grandTotalInput = document.getElementById('grandTotal');

let keranjang = [];

// Tambah barang ke keranjang
addBtn.addEventListener('click', function() {
    const selected = barangSelect.options[barangSelect.selectedIndex];
    const id    = selected.value;
    const nama  = selected.getAttribute('data-nama');
    const harga = parseInt(selected.getAttribute('data-harga'));
    const stok  = parseInt(selected.getAttribute('data-stok'));
    const jumlah = parseInt(jumlahInput.value);

    if(!id || jumlah < 1 || jumlah > stok) {
        alert('Pilih barang yang valid dan jumlah sesuai stok.');
        return;
    }

    // cek jika sudah ada di keranjang
    let itemIndex = keranjang.findIndex(i => i.id == id);
    if(itemIndex >= 0){
        if(keranjang[itemIndex].jumlah + jumlah > stok){
            alert('Jumlah melebihi stok.');
            return;
        }
        keranjang[itemIndex].jumlah += jumlah;
    } else {
        keranjang.push({id, nama, harga, jumlah});
    }

    renderKeranjang();
});

// Render keranjang dan hitung total
function renderKeranjang() {
    keranjangTbody.innerHTML = '';
    let grandTotal = 0;

    keranjang.forEach((item, index) => {
        const total = item.harga * item.jumlah;
        grandTotal += total;

        keranjangTbody.innerHTML += `
            <tr>
                <td>${item.nama}<input type="hidden" name="barang_id[]" value="${item.id}"></td>
                <td>${item.harga}</td>
                <td><input type="hidden" name="jumlah[]" value="${item.jumlah}">${item.jumlah}</td>
                <td>${total}</td>
                <td><button type="button" class="btn btn-danger btn-sm" onclick="hapusItem(${index})">Hapus</button></td>
            </tr>
        `;
    });

    grandTotalInput.value = grandTotal;
}

// Hapus item dari keranjang
function hapusItem(index){
    keranjang.splice(index, 1);
    renderKeranjang();
}

// Atur tanggal kembali minimal sama dengan tanggal sewa
const tglSewa = document.getElementById('tanggal_sewa');
const tglKembali = document.getElementById('tanggal_kembali');

tglSewa.addEventListener('change', () => {
    if(tglKembali.value && tglKembali.value < tglSewa.value){
        tglKembali.value = tglSewa.value;
    }
    tglKembali.min = tglSewa.value;
});
</script>

@endsection
