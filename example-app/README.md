## Консольные команды

### Миграция

В .env:

> DB_HOST=127.0.0.1

В терминале:

> `php artisan config:clear`
> `php artisan tinker`
> `migrate`

### Создать модель

> `php artisan make:model ModelName`

### Создать модель с миграцией

> `php artisan make:model ModelName -m`

### Создать контроллер

> `php artisan make:controller NameController`

### Создать Middleware

> `php artisan make:middleware NameMiddleware`
