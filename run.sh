#!/bin/bash

# install composer if not excisting
if [ ! -d "vendor" ]; then
  composer install
fi

# copy .env.example if .env not found
if [ ! -s ".env" ]; then
  cp .env.example .env
  php artisan key:generate
  echo ".env created"
fi

php artisan migrate

php artisan db:seed

php artisan serve
