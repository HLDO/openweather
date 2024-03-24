#!/bin/sh

cd /var/www
ln -sf ./env/dev.env .env
composer install
php artisan migrate
