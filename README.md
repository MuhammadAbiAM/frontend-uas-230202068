# UAS Frontend Laravel

Repositori ini merupakan hasil pengerjaan Ujian Akhir Semester (UAS) untuk pengembangan aplikasi berbasis web menggunakan Laravel.

## 🛠️ Persyaratan

Pastikan perangkat telah terinstall:

-   PHP >= 8.1
-   Composer
-   MySQL/MariaDB
-   Git

## 🚀 Membuat Project Laravel Baru

1. Buat folder project:

```
laravel new frontend-uas-230202068
# atau jika pakai Composer
composer create-project laravel/laravel frontend-uas-230202068

cd frontend-uas-230202068
```

2. Install dependensi PHP:

```
composer install
```

3. Salin file konfigurasi .env:

```
cp .env.example .env
```

4. Generate application key:

```
php artisan key:generate
```

## 🧪 Konfigurasi Database

Edit file .env dan ubah sesuai dengan konfigurasi database:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_rumahsakit_230202068
DB_USERNAME=root
DB_PASSWORD=
```

### 💻 Jalankan Server Lokal

```
php artisan serve
```

Aplikasi akan berjalan di http://localhost:8000
