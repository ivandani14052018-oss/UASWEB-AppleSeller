# 🍎 AppleSeller

## Deskripsi

AppleSeller adalah aplikasi penjualan produk Apple berbasis web yang dikembangkan menggunakan Laravel 13. Aplikasi ini memiliki fitur manajemen produk, kategori, transaksi, autentikasi pengguna, dashboard, export data, dan REST API.

---

## Fitur

- ✅ Login & Register
- ✅ Dashboard
- ✅ CRUD Kategori
- ✅ CRUD Produk
- ✅ CRUD Transaksi
- ✅ Role Admin & User
- ✅ Export Excel
- ✅ Export PDF
- ✅ REST API
- ✅ Responsive Design

---

## Teknologi

- Laravel 13
- PHP 8.4
- MySQL
- Tailwind CSS
- Laravel Breeze
- Laravel Excel
- DomPDF

---

## Instalasi

Clone project

```bash
git clone https://github.com/username/AppleSeller.git
```

Masuk ke folder project

```bash
cd AppleSeller
```

Install dependency

```bash
composer install
```

Copy file environment

```bash
cp .env.example .env
```

Generate application key

```bash
php artisan key:generate
```

Import database kemudian jalankan:

```bash
php artisan migrate
```

Jalankan server

```bash
php artisan serve
```

Aplikasi dapat diakses melalui:

```
http://127.0.0.1:8000
```

---

## REST API

### Produk

| Method | Endpoint |
|---------|----------|
| GET | /api/products |
| GET | /api/products/{id} |
| POST | /api/products |
| PUT | /api/products/{id} |
| DELETE | /api/products/{id} |

### Kategori

| Method | Endpoint |
|---------|----------|
| GET | /api/categories |
| GET | /api/categories/{id} |
| POST | /api/categories |
| PUT | /api/categories/{id} |
| DELETE | /api/categories/{id} |

### Transaksi

| Method | Endpoint |
|---------|----------|
| GET | /api/transactions |
| GET | /api/transactions/{id} |
| POST | /api/transactions |
| PUT | /api/transactions/{id} |
| DELETE | /api/transactions/{id} |

---

## Screenshot

Tambahkan screenshot aplikasi di folder:

```
public/screenshots/
```

Contoh:

- Login
- Dashboard
- Data Produk
- Data Kategori
- Data Transaksi

---

## Developer

**Muhammad Fatiha Assyfa**

Universitas Malikussaleh

Mata Kuliah : Pemrograman Web Lanjut (UAS)

Project : AppleSeller