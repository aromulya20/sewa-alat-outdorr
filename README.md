<p align="center">
    <a href="#" target="_blank">
        <img src="public/image/ui.png" width="400" alt="App Logo">
    </a>
</p>

<p align="center">
<a href="#"><img src="https://img.shields.io/badge/Laravel-11.x-red?logo=laravel" alt="Laravel Version"></a>
<a href="#"><img src="https://img.shields.io/badge/PHP-8.2%2B-blue?logo=php" alt="PHP Version"></a>
<a href="#"><img src="https://img.shields.io/badge/Status-Active-success" alt="Status"></a>
<a href="#"><img src="https://img.shields.io/badge/License-MIT-green" alt="License"></a>
</p>

---

# 🏕️ Sewa Outdoor — Outdoor Equipment Rental System

**Sewa Outdoor** adalah aplikasi berbasis **Laravel 11** untuk mengelola penyewaan peralatan outdoor seperti:

- Tenda  
- Kompor portable  
- Matras  
- Sleeping bag  
- Senter  
- Dan berbagai perlengkapan outdoor lainnya  

Aplikasi ini hadir dengan tampilan modern, dashboard informatif, serta sistem penyewaan multi-produk yang mudah digunakan.

---

## 🚀 Fitur Utama

### 🎒 **1. Manajemen Alat**
- Tambah / Edit / Hapus alat
- Upload foto alat
- Stok otomatis berkurang dan bertambah
- Harga & deskripsi barang

---

### 🛒 **2. Pemesanan Multi-Produk**
- Pilih banyak alat sekaligus
- per-item subtotal calculation
- Perhitungan total otomatis berdasarkan **durasi hari (tanggal sewa – kembali)**
- Validasi stok otomatis

---

### 🔄 **3. Pengembalian Barang**
- Menampilkan list barang yang masih dipinjam
- Proses pengembalian → stok kembali bertambah
- Status otomatis berubah:  
  🔸 *Dipinjam* → ✔ *Kembali*

---

### 📊 **4. Dashboard Modern**
- Statistik total alat  
- Total penyewaan  
- Total pengembalian  
- Tampilan kartu statistik yang clean dan responsif

---

## 🖼️ UI Preview

> 🔧 Replace with your own screenshots

<p align="center">
    <img src="public/image/ui.png" width="600">
</p>

---

## 🔧 System Requirements

Pastikan sudah menginstall:

| Requirement | Version |
|------------|---------|
| PHP | 8.2+ |
| Laravel | 11 |
| Composer | Latest |
| MySQL / MariaDB | ✓ |
| Node.js | (optional) |

---

# 📦 Installation

### ✅ **1. Clone Repository**
```bash
git clone https://github.com/aromulya20/sewa-alat-outdorr.git
cd sewa-alat-outdorr
✅ 2. Install Dependencies
bash
Copy code
composer install
npm install
npm run build
✅ 3. Copy Environment File
bash
Copy code
cp .env.example .env
Edit .env:

makefile
Copy code
DB_DATABASE=db_sewa_outdoor
DB_USERNAME=root
DB_PASSWORD=
✅ 4. Generate App Key
bash
Copy code
php artisan key:generate
✅ 5. Migrate + Seed Database
bash
Copy code
php artisan migrate --seed
✅ 6. Run Local Server
bash
Copy code
php artisan serve
🌐 Buka aplikasi:
👉 http://localhost:8000

📘 Cara Menggunakan Aplikasi
Masuk ke halaman Data Alat

Tambahkan alat beserta gambar dan stok

Buka menu Penyewaan

Pilih produk → masukkan jumlah → tanggal sewa & kembali
➜ Total harga dihitung otomatis

Submit untuk menyimpan transaksi

Cek detail penyewaan di halaman Riwayat

Proses pengembalian di menu Pengembalian

📁 Project Structure
arduino
Copy code
app/
├── Http/Controllers/
database/
├── migrations/
└── seeders/
resources/
├── views/
│   ├── alat/
│   ├── sewa/
│   └── pengembalian/
public/
└── image/
🤝 Contributing
Kontribusi sangat dipersilakan!
Silakan open issue atau pull request.

🔐 License
Aplikasi ini menggunakan MIT License.

🧑‍💻 Author
Created by:

⭐ ARO MULYA PRATAMA
Feel free to connect, collaborate, or contribute!
