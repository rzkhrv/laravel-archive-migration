# laravel-archive-migration

[![Latest Version on Packagist](https://img.shields.io/packagist/v/rzkhrv/laravel-archive-migration.svg?style=flat-square)](https://packagist.org/packages/rzkhrv/laravel-archive-migration)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/rzkhrv/laravel-archive-migration/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/rzkhrv/laravel-archive-migration/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/rzkhrv/laravel-archive-migration/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/rzkhrv/laravel-archive-migration/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/rzkhrv/laravel-archive-migration.svg?style=flat-square)](https://packagist.org/packages/rzkhrv/laravel-archive-migration)

Simple package for split your migration files:

## Installation

You can install the package via composer:

```bash
composer require rzkhrv/laravel-archive-migration --dev
```

Publish the service provider:
```bash
php artisan vendor:publish --tag="archive-migration-config"
```

## Usage

```bash
php artisan migration:archive
```
This command move your migrations files to archive directory, for example:
```
database/migrations/archive/2014/10/2014_10_12_000000_create_users_table.php
database/migrations/archive/2014/10/2014_10_12_100000_create_password_reset_tokens_table.php
database/migrations/archive/2019/08/2019_08_19_000000_create_failed_jobs_table.php
```

This command will roll back archiving of files and return them to the base migration directory.
```bash
php artisan migration:unarchive
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
