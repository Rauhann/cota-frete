#!/bin/bash
set -eo pipefail

if [ ! -f ".env" ]
then
    cp .env.example .env

    if [ ! -f ".env" ]
    then
        echo "Error: .env not found."
        exit 1
    fi
fi

sleep 5s
sudo /usr/sbin/crond
composer install && php artisan config:cache && php artisan view:clear
php artisan l5-swagger:generate
php artisan migrate
php artisan serve --host=0.0.0.0 --port=80
