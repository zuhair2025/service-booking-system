# Service Booking System (Laravel)

## Installation & Setup
1. git clone https://github.com/zuhair2025/service-booking-system.git
2. composer install

## Setup .env
DB_CONNECTION=sqlite 

## Run migrations
php artisan migrate

## Run Seeders
php artisan db::seed 

## Run the project
php artisan serve

# API Endpoints

## Register: /api/register
![register api](image.png)
## Login: /api/login
![login](image-1.png)
        
## Get All Services: /api/services
![all services](image-2.png)

## Add Booking: /api/bookings [method: POST]
![alt text](image-3.png)
