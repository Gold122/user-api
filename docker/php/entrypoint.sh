#!/bin/sh

cd /var/www/html
if [ ! -f ".env" ]; then
  composer install
  cp .env.example .env
  php artisan migrate --force
  php artisan storage:link
fi

exec php-fpm