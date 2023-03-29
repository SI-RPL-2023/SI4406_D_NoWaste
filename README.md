## Prasyarat
1. PHP 8.1
2. XAMPP
3. Node.js (https://nodejs.org/en/download)

## Instalasi

1. *Clone* atau unduh repository.
2. Jalankan `composer update`.
```
composer install
composer update
```
3. Salin file `.env.example` dan ubah menjadi `.env`.
```
cp .env.example .env
```
4. Buat app key laravel.
```
php artisan key:generate
```
5. Migrasi *database*.
```
php artisan migrate
```
6. Jalankan `npm install`.
7. Jalankan `npm run build`.
8. Jalankan aplikasi laravel.
```
php artisan serve
```

## Repositori
1. Buat *branch* baru dengan nama anggota.
2. Commit ke `main` hanya bisa dengan *pull request* dari *branch* masing-masing.
3. Tulis deskripsi *commit* dengan jelas dan bahasa yang tepat.

## Lisensi

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
