# NoWaste
NoWaste is a website dedicated to helping individuals and businesses tackle the issue of food waste. It provides a platform where registered culinary merchants can sell their surplus food stock, thereby contributing to the reduction of wasted food. By offering these excess food items to the public, NoWaste enables them to be utilized instead of being thrown away. This initiative not only benefits the environment by minimizing food waste but also offers a practical solution for merchants to manage their inventory effectively. Through NoWaste, both merchants and consumers can actively participate in the fight against food waste, fostering a more sustainable and responsible approach to food consumption.

## About us
| Name | NIM | Role |
|-----------------|-----------------|-----------------|
| Muhammad Adam Nugraha  | 120220        | `Project Manger` |
| Riky Indra Sakti       | 120220        | `Analyst`        |
| Row 3 Data             | 120220        | `Analyst`        |
| Ikram Zaidan Wicaksono | 1202202204216 | `Programmer`     |
| Row 5 Data             | 120220        | `Programmer`     |
| Row 6 Data             | 120220        | `Programmer`     |
| Row 7 Data             | 120220        | `Programmer`     |

# Instalation
## Prerequisite
1. PHP 8.1
2. XAMPP
3. Node.js LTS (https://nodejs.org/en/download)

## Serve the application

1. Clone or download this repository.
2. Install or update composer.
```
composer install
composer update
```
3. Copy `.env.example` file and rename to `.env`.
```
cp .env.example .env
```
4. Generate laravel app key.
```
php artisan key:generate
```
5. Migrate *database*.
```
php artisan migrate --seed
```
6. Link *storage* path to *public* path
```
php artisan storage:link
```
7. Install *node* package.
```
npm install
```
8. Run *node package manager* for production.
```
npm run build
```
9. Serve the app.
```
php artisan serve
```

# License
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
