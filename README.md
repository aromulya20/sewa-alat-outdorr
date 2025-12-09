<p align="center">
    <a href="#" target="_blank">
        <img src="public/image/ui.png" width="400" alt="App Logo">
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

![UI Preview](public/image/ui.png)

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