## Prasyarat
1. PHP 8.1 or higher.
2. XAMPP

## Instalasi

1. Clone or download the repository.
2. Update Composer.
```
composer install
composer update
```
3. Copy `.env` file.
```
cp .env.example .env
```
4. Set laravel app key.
```
php artisan key:migrate
```

## Lisensi

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
