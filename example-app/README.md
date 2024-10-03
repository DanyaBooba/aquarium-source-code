## Миграция

В .env:

DB_HOST=127.0.0.1

В терминале:

php artisan config:clear
php artisan tinker
migrate
