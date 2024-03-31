# laravel-split-migration

[![Latest Version on Packagist](https://img.shields.io/packagist/v/rzkhrv/laravel-archive-migration.svg?style=flat-square)](https://packagist.org/packages/rzkhrv/laravel-archive-migration)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/rzkhrv/laravel-archive-migration/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/rzkhrv/laravel-archive-migration/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/rzkhrv/laravel-archive-migration.svg?style=flat-square)](https://packagist.org/packages/rzkhrv/laravel-archive-migration)

Простой пакет для Laravel, который позволяет разделить ваши миграции по папкам. 
Идея этого пакета возникла при работе в проекте с большим количеством файлов миграции.

## Установка

Вы можете установить его используя composer:
```bash
composer require rzkhrv/laravel-archive-migration --dev
```

> Хорошей практикой будет считаться использование только в dev окружении.

Опубликуйте конфигурацию:
```bash
php artisan vendor:publish --tag="archive-migration-config"
```

Она содержит:
```php
'directory' => env('LAM_ARCHIVE_DIRECTORY', 'archive'),
'directory_format' => env('LAM_DIRECTORY_FORMAT', 'Y/m'),
```

## Usage

```bash
php artisan migration:split
```
Эта команда переместит ваши файлы миграций в поддиректории, например:
```
database/migrations/archive/2014/10/2014_10_12_000000_create_users_table.php
database/migrations/archive/2014/10/2014_10_12_100000_create_password_reset_tokens_table.php
database/migrations/archive/2019/08/2019_08_19_000000_create_failed_jobs_table.php
```

Эта команда вернет файлы миграций в базовую директорию:
```bash
php artisan migration:split --rollback
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
