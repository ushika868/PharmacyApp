<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Pharmacy Application

This is a Laravel application for managing customers and medications.

### Getting Started

To get started with this application, follow these steps:

### Prerequisites

- **PHP 8.1**
- **Composer**


### Installation
1. Clone repository

        git clone https://github.com/your-username/your-project.git

2. Navigate to the project directory:

        cd your-project

3. Install PHP dependencies:

        composer install

4. Copy the .env.example file to .env:

        cp .env.example .env
5. Generate an application key:

        php artisan key:generate

6. Set up your database in the .env file:
   DB_CONNECTION=sqlite
   DB_HOST=127.0.0.1
   DB_PORT=3306

7. Migrate the database:

        php artisan migrate

### Useage

To run the application locally, use the following command:

    php artisan serve

### License
This project is licensed under the MIT License - see the LICENSE file for details.
