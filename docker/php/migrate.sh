#!/bin/sh

cd /var/www
composer install
php artisan migrate
