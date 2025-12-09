@extends('layouts.layout')

@section('content')

<h3 class="page-title">🛒 Form Pemesanan Barang Sewa (Multi-Produk)</h3>

<style>
    body { font-family: 'Nunito', sans-serif; background: #f4f6f9; font-size: 20px; }
    .page-title { font-size: 28px; font-weight: bold; color: #2c3e50; margin-bottom: 25px; }
    .form-card { background: #fff; padding: 25px; border-radius: 12px; box-shadow: 0 3px 12px rgba(0,0,0,0.1); }
    .form-control { font-size: 20px; }
    table th, table td { font-size: 20px; }
    .btn { font-size: 20px; }
    .badge-warning, .badge-success { font-size: 20px; padding: 0.5em 1em; }
    .input-group select, .input-group input { font-size: 20px; }
    #grandTotal { font-weight: bold; }
    .small-label { font-size: 16px; color: #555; margin-bottom: 6px; display:block; }
    .item-subtotal { width: 220px; margin-left: 12px; }
</style>

<div class="form-card">

    <form action="{{ route('sewa.store') }}" method="POST">
        @csrf

        <!-- NAMA PENYEWA -->
        <div class="mb-3">
            <label>Nama Penyewa</label>
            <input type="text" name="nama_penyewa" class="form-control" required>
        </div>

        <!-- PILIH BARANG DAN JUMLAH + SUBTOTAL ITEM (baru) -->
        <div class="mb-3">
            <label class="small-label">Tambah Barang (lihat Subtotal Item sebelum tambah)</label>

            <div class="d-flex align-items-center gap-2">
                <div style="flex:1">
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
                </div>

                <div style="width:120px">
                    <input type="number" id="jumlahInput" min="1" value="1" class="form-control">
                </div>

                <!-- Subtotal per item (terlihat sebelum add) -->
                <div class="item-subtotal">
                    <label class="small-label">Subtotal Item</label>
                    <input type="text" id="itemSubtotal" class="form-control" readonly value="Rp 0">
                    <div style="font-size:12px;color:#666;margin-top:6px;">(estimasi berdasarkan durasi)</div>
                </div>

                <div>
                    <button type="button" id="addBtn" class="btn btn-success">Tambah</button>
                </div>
            </div>
        </div>

        <!-- TABEL KERANJANG -->
        <div class="mb-3">
            <label>Keranjang Belanja</label>
            <div class="table-responsive">
                <table class="table table-bordered" id="keranjangTable">
                    <thead>
                        <tr>
                            <th>Barang</th>
                            <th>Harga Sewa/hari</th>
                            <th>Jumlah</th>
                            <th>Subtotal (per hari)</th>
                            <th>Total (durasi)</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- item akan ditambahkan disini -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- TOTAL HARGA KESELURUHAN -->
        <div class="mb-3">
            <label>Total Harga Keseluruhan</label>
            <input type="text" id="grandTotal" name="harga" class="form-control" readonly value="Rp 0">
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
/* Helper: format angka ke Rupiah */
function formatRupiah(num){
    if(num === null || num === undefined) return 'Rp 0';
    return 'Rp ' + Number(num).toLocaleString('id-ID');
}

/* Elements */
const barangSelect = document.getElementById('barangSelect');
const jumlahInput  = document.getElementById('jumlahInput');
const addBtn       = document.getElementById('addBtn');
const keranjangTbody = document.querySelector('#keranjangTable tbody');
const grandTotalInput = document.getElementById('grandTotal');
const itemSubtotalInput = document.getElementById('itemSubtotal');
const tglSewa = document.getElementById('tanggal_sewa');
const tglKembali = document.getElementById('tanggal_kembali');

let keranjang = [];

/* Hitung durasi (hari) minimal 1 */
function getDurasiHari(){
    if(!tglSewa.value || !tglKembali.value) return 1;
    const start = new Date(tglSewa.value);
    const end = new Date(tglKembali.value);
    if(end < start) return 1;
    const diff = Math.floor((end - start) / (1000*60*60*24)) + 1;
    return diff < 1 ? 1 : diff;
}

/* Hitung dan tampilkan subtotal item (estimasi berdasarkan durasi) */
function updateItemSubtotalDisplay(){
    const selected = barangSelect.options[barangSelect.selectedIndex];
    const harga = parseInt(selected?.getAttribute('data-harga') || 0);
    const jumlah = parseInt(jumlahInput.value) || 0;
    const durasi = getDurasiHari();

    const subtotalPerHari = harga * jumlah;
    const subtotalDurasi = subtotalPerHari * durasi;

    itemSubtotalInput.value = formatRupiah(subtotalDurasi) + ` (x ${durasi} hari)`;
}

/* Render keranjang dan update grand total */
function renderKeranjang(){
    keranjangTbody.innerHTML = '';
    let sumPerDay = 0; 

    keranjang.forEach((it, index) => {
        const subtotalPerDay = it.harga * it.jumlah;
        sumPerDay += subtotalPerDay;
        const durasi = getDurasiHari();
        const totalDurasi = subtotalPerDay * durasi;

        keranjangTbody.innerHTML += `
            <tr>
                <td>
                    ${it.nama}
                    <input type="hidden" name="barang_id[]" value="${it.id}">
                </td>
                <td>${formatRupiah(it.harga)}</td>
                <td>
                    <input type="hidden" name="jumlah[]" value="${it.jumlah}">
                    ${it.jumlah}
                </td>
                <td>${formatRupiah(subtotalPerDay)}</td>
                <td>${formatRupiah(totalDurasi)}</td>
                <td><button type="button" class="btn btn-danger btn-sm" onclick="hapusItem(${index})">Hapus</button></td>
            </tr>
        `;
    });

    // Grand total = sumPerDay * durasi
    const durasi = getDurasiHari();
    const grand = sumPerDay * durasi;
    grandTotalInput.value = formatRupiah(grand);
}

/* Tambah item ke keranjang */
addBtn.addEventListener('click', function(){
    const selected = barangSelect.options[barangSelect.selectedIndex];
    const id    = barangSelect.value;
    const nama  = selected.getAttribute('data-nama');
    const harga = parseInt(selected.getAttribute('data-harga'));
    const stok  = parseInt(selected.getAttribute('data-stok'));
    const jumlah = parseInt(jumlahInput.value);

    if(id === "" || id === null){
        alert('Pilih barang yang valid.');
        return;
    }
    if(jumlah < 1){
        alert('Jumlah minimal 1.');
        return;
    }
    // cek stok
    const existing = keranjang.find(i => i.id == id);
    const currentJumlah = existing ? existing.jumlah + jumlah : jumlah;
    if(currentJumlah > stok){
        alert('Jumlah melebihi stok.');
        return;
    }

    if(existing){
        existing.jumlah += jumlah;
    } else {
        keranjang.push({ id, nama, harga, jumlah });
    }

    // reset pilih dan jumlah
    barangSelect.selectedIndex = 0;
    jumlahInput.value = 1;
    itemSubtotalInput.value = formatRupiah(0);

    renderKeranjang();
});

/* Hapus item */
function hapusItem(index){
    keranjang.splice(index,1);
    renderKeranjang();
}

/* Update subtotal when user memilih barang, mengubah jumlah, atau mengubah tanggal */
barangSelect.addEventListener('change', updateItemSubtotalDisplay);
jumlahInput.addEventListener('input', updateItemSubtotalDisplay);
tglSewa.addEventListener('change', function(){
    if(tglSewa.value) tglKembali.min = tglSewa.value;
    updateItemSubtotalDisplay();
    renderKeranjang();
});
tglKembali.addEventListener('change', function(){
    updateItemSubtotalDisplay();
    renderKeranjang();
});

/* Inisialisasi */
updateItemSubtotalDisplay();
renderKeranjang();
</script>

@endsection
