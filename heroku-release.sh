#!/usr/bin/env bash

echo "php artisan migrate --force"
php artisan migrate --force
php artisan cache:clear
php artisan clear-compiled
php artisan view:clear
php artisan config:clear
php artisan optimize:clear

