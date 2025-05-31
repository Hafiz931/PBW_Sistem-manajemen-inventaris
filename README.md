# Aplikasi Manajemen Inventaris Sederhana

## Nama & NIM
- Nama: Teuku Hafiz Izham
- NIM: 2308107010056

## Deskripsi Singkat Aplikasi
Aplikasi ini adalah sistem manajemen inventaris sederhana yang dibangun menggunakan framework Laravel. Aplikasi memungkinkan pengguna untuk melakukan operasi CRUD (Create, Read, Update, Delete) pada data item inventaris. Setiap item memiliki nama, deskripsi, kuantitas, dan harga.

## Penjelasan Code Beserta User Interface

### Struktur Proyek Utama
- `app/Http/Controllers/ItemController.php`: Mengelola logika bisnis untuk entitas Item (CRUD).
- `app/Models/Item.php`: Model Eloquent yang merepresentasikan tabel `items` di database. Mengandung `$fillable` untuk mass assignment.
- `database/migrations/xxxx_xx_xx_xxxxxx_create_items_table.php`: Skema untuk tabel `items`.
- `database/seeders/ItemSeeder.php`: Untuk mengisi data awal (dummy data) ke tabel `items`.
- `routes/web.php`: Mendefinisikan rute web, termasuk `Route::resource('items', ItemController::class)` untuk CRUD.
- `resources/views/items/`: Folder berisi file Blade (template) untuk UI.
    - `index.blade.php`: Menampilkan daftar semua item dengan opsi Edit, Delete, dan link ke Show & Create.
    - `create.blade.php`: Form untuk menambah item baru.
    - `edit.blade.php`: Form untuk mengedit item yang ada.
    - `show.blade.php`: Menampilkan detail satu item.
    - `layouts/app.blade.php`: Layout utama yang digunakan oleh semua view, menyertakan Bootstrap 5 CDN.
- `public/`: Folder publik, tidak banyak diubah untuk proyek ini.
- `.env`: File konfigurasi environment (tidak di-commit, gunakan `.env.example` sebagai template).

### User Interface
- UI menggunakan Bootstrap 5 (via CDN) untuk styling dasar.
- **Halaman Utama (`/items`)**: Menampilkan tabel berisi daftar item, tombol "Create New Item", dan aksi "Show", "Edit", "Delete" per item. Ada paginasi jika item lebih dari 5.
- **Halaman Tambah Item (`/items/create`)**: Form untuk input nama, deskripsi, kuantitas, dan harga. Validasi error ditampilkan di bawah field yang relevan.
- **Halaman Edit Item (`/items/{id}/edit`)**: Sama seperti form tambah, tapi sudah terisi data item yang akan diedit.
- **Halaman Detail Item (`/items/{id}`)**: Menampilkan semua detail item.
- Pesan sukses (setelah create, update, delete) dan error validasi ditampilkan di bagian atas halaman.

## Cara Instalasi Aplikasi
1.  **Clone repository:**
    ```bash
    git clone https://github.com/Hafiz931/PBW_Sistem-manajemen-inventaris.git
    cd PBW_Sistem-manajemen-inventaris
    ```
2.  **Install dependencies Composer:**
    ```bash
    composer install
    ```
3.  **Buat file `.env`:**
    Salin file `.env.example` menjadi `.env`.
    ```bash
    cp .env.example .env
    ```
4.  **Generate application key:**
    ```bash
    php artisan key:generate
    ```
5.  **Konfigurasi database:**
    Buka file `.env` dan sesuaikan `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD` dengan konfigurasi database lokal Anda. Pastikan database sudah dibuat di server Anda.
    Contoh:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=db_inventory
    DB_USERNAME=root
    DB_PASSWORD=
    ```
6.  **Jalankan migrasi database:**
    Ini akan membuat tabel-tabel yang dibutuhkan aplikasi.
    ```bash
    php artisan migrate
    ```
7.  **Jalankan database seeder (opsional, untuk data awal):**
    Ini akan mengisi tabel `items` dengan data contoh.
    ```bash
    php artisan db:seed
    ```
    Atau jika ingin me-refresh migrasi dan seed:
    ```bash
    php artisan migrate:fresh --seed
    ```
8.  **Jalankan server pengembangan:**
    ```bash
    php artisan serve
    ```
9.  Buka aplikasi di browser Anda pada alamat `http://localhost:8000` (atau alamat yang ditampilkan oleh `php artisan serve`).
