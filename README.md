## Prasyarat
1. PHP 8.1
2. XAMPP

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

## Repositori
1. Buat *branch* baru dengan nama anggota.
2. Commit ke `main` hanya bisa dengan *pull request* dari *branch* masing-masing.
3. Tulis deskripsi *commit* dengan jelas.

## Lisensi

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
