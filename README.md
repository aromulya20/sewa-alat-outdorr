<p align="center">
    <a href="#" target="_blank">
        <img src="public/images/preview-ui.png" width="400" alt="App Logo">
    </a>
</p>

<p align="center">
<a href="#"><img src="https://img.shields.io/badge/Laravel-10.x-red?logo=laravel" alt="Laravel Version"></a>
<a href="#"><img src="https://img.shields.io/badge/PHP-8.1%2B-blue?logo=php" alt="PHP Version"></a>
<a href="#"><img src="https://img.shields.io/badge/Status-Active-success" alt="Status"></a>
<a href="#"><img src="https://img.shields.io/badge/License-MIT-green" alt="License"></a>
</p>

---

## 📦 About the Project

This project is a **Rice Seedling Sales Management System** built with **Laravel 10**, designed to simplify the process of managing products, customers, sales transactions, and order summaries.

The system provides a clean, responsive interface and easy workflows for:

- Managing rice seedling products  
- Uploading product photos  
- Creating sales transactions  
- Automatic price calculation  
- Customer registration and validation  
- Viewing all transaction history  
- Database seeding for quick initialization  

---

## 🚀 Features

- ✔️ Product CRUD (name, price, stock, description, image)  
- ✔️ Customer CRUD  
- ✔️ Order creation + automatic total price calculation  
- ✔️ Product image upload & preview  
- ✔️ Dashboard with clean UI  
- ✔️ Database seeder for quick setup  
- ✔️ Laravel Blade + Bootstrap UI  

---

## 📸 UI Preview

> Replace these images with your own screenshots

![UI Preview](public/images/preview-ui.png)

---

## 📂 Installation

### 1️⃣ Clone Repository
```bash
git clone https://github.com/your-username/your-repo.git
cd your-repo

2️⃣ Install Dependencies
composer install
npm install
npm run build

3️⃣ Create Environment File
cp .env.example .env


Set your database credentials:

DB_DATABASE=bibit_padi
DB_USERNAME=root
DB_PASSWORD=

4️⃣ Generate Key
php artisan key:generate

5️⃣ Run Migrations + Seeder
php artisan migrate --seed

6️⃣ Start Development Server
php artisan serve


Open the app:
👉 http://localhost:8000

🌱 Example Seeder
public function run(): void
{
    DB::table('products')->insert([
        [
            'name' => 'Bibit Padi IR64',
            'price' => 3500,
            'stock' => 100,
            'description' => 'Bibit padi unggul, produktivitas tinggi.',
            'image' => 'ir64.jpg'
        ],
        [
            'name' => 'Bibit Padi Ciherang',
            'price' => 4000,
            'stock' => 80,
            'description' => 'Tahan hama dan penyakit.',
            'image' => 'ciherang.jpg'
        ],
        [
            'name' => 'Bibit Padi Inpari 32',
            'price' => 5000,
            'stock' => 60,
            'description' => 'Hasil panen tinggi, kualitas sangat baik.',
            'image' => 'inpari32.jpg'
        ],
    ]);
}

📘 How to Use

Add products from the product menu

Upload product images

Create a purchase order

Select product → enter quantity → total auto-calculated

Submit order

View history in the transaction page

🤝 Contributing

Contributions are welcome!
Feel free to submit a pull request or open an issue.

🔐 License

This project is open-sourced under the MIT License.


---

# 🔥 Mau saya tambahkan?

Jika mau, saya siap buat versi:

✅ Bahasa Indonesia  
✅ Ada lebih banyak screenshot  
✅ Ada tabel fitur  
✅ Ada dokumentasi API  
✅ Ada flowchart atau ERD dalam README  

Tinggal bilang!

You said:
buatkan full kode readme nya
ChatGPT said:

Siap! Berikut FULL kode README.md lengkap, versi English, berformat profesional seperti Laravel, sudah ada:

✔ Logo
✔ Badges (Laravel, PHP, Status, License)
✔ Preview UI
✔ Installation steps
✔ Usage guide
✔ Seeder example
✔ Features
✔ License

📌 FULL README.md (Copy–Paste)

Tinggal salin ke file README.md di GitHub-mu.

<p align="center">
    <a href="#" target="_blank">
        <img src="public/images/preview-ui.png" width="350" alt="App Logo">
    </a>
</p>

<p align="center">
<a href="#"><img src="https://img.shields.io/badge/Laravel-10.x-red?logo=laravel" alt="Laravel Version"></a>
<a href="#"><img src="https://img.shields.io/badge/PHP-8.1%2B-blue?logo=php" alt="PHP Version"></a>
<a href="#"><img src="https://img.shields.io/badge/Status-Active-success" alt="Status"></a>
<a href="#"><img src="https://img.shields.io/badge/License-MIT-green" alt="License"></a>
</p>

---

# 🌾 Rice Seedling Sales Management System

A clean and modern **Laravel 10** web application for managing rice seedling sales, customers, products, and transactions. Designed for simplicity, efficiency, and ease of use.

This system helps users:

- Manage product stock
- View product details with images
- Create rental/sales transactions
- Automatically calculate total prices
- Track customers and order history

---

## 🚀 Features

- ✔ Product CRUD (name, price, stock, image, description)  
- ✔ Customer CRUD  
- ✔ Sales/Order creation  
- ✔ Automatic total price calculation  
- ✔ Upload & preview product images  
- ✔ Dashboard with clean UI  
- ✔ Database seeder ready  
- ✔ Laravel Blade template  
- ✔ Bootstrap clean styling  

---

## 📸 UI Preview

> Replace the image with your own screenshot  


public/images/preview-ui.png


Example:

![Preview](public/images/preview-ui.png)

---

## 📂 Installation Guide

### 🔧 1. Clone Repository

```bash
git clone https://github.com/your-username/your-repo-name.git
cd your-repo-name

📦 2. Install Dependencies
composer install
npm install
npm run build

⚙ 3. Create Environment File
cp .env.example .env


Update .env with your database info:

DB_DATABASE=sewa_outdoor
DB_USERNAME=root
DB_PASSWORD=

🔑 4. Generate App Key
php artisan key:generate

🗂 5. Run Migrations + Seeder
php artisan migrate --seed

▶ 6. Run Server
php artisan serve


Open your app in browser:
👉 http://localhost:8000

🌱 Database Seeder Example

Seeder for product list:

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlatSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('alats')->insert([
            [
                'nama_alat' => 'Tenda 4 Orang',
                'harga' => 50000,
                'stok' => 10,
                'foto' => 'tenda4.jpg'
            ],
            [
                'nama_alat' => 'Kompor Portable',
                'harga' => 30000,
                'stok' => 15,
                'foto' => 'kompor.jpg'
            ],
            [
                'nama_alat' => 'Sleeping Bag',
                'harga' => 20000,
                'stok' => 25,
                'foto' => 'sb.jpg'
            ]
        ]);
    }
}

📘 How to Use the System

Go to Dashboard

Add products and their images

Go to Create Transaction

Choose tools/products

Enter quantity

Total price updates automatically

Click Submit to save the transaction

View history in the List Penyewaan page

🧩 Project Structure
app/
├── Http/
│   ├── Controllers/
│   └── Middleware/
database/
├── migrations/
└── seeders/
resources/
├── views/
│   ├── alat/
│   ├── sewa/
│   └── pengembalian/
public/
└── images/

🤝 Contributing

Pull requests are welcome!
For major changes, please open an issue first.

🔐 License

This project is licensed under the MIT License.

📝 Author

Created by Your Name
Feel free to connect or contribute!