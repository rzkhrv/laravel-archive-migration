# laravel-archive-migration

[![Latest Version on Packagist](https://img.shields.io/packagist/v/rzkhrv/laravel-archive-migration.svg?style=flat-square)](https://packagist.org/packages/rzkhrv/laravel-archive-migration)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/rzkhrv/laravel-archive-migration/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/rzkhrv/laravel-archive-migration/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/rzkhrv/laravel-archive-migration/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/rzkhrv/laravel-archive-migration/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/rzkhrv/laravel-archive-migration.svg?style=flat-square)](https://packagist.org/packages/rzkhrv/laravel-archive-migration)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/laravel-archive-migration.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/laravel-archive-migration)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require rzkhrv/laravel-archive-migration
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-archive-migration-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-archive-migration-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="laravel-archive-migration-views"
```

## Usage

```php
$laravelArchiveMigration = new Rzkhrv\LaravelArchiveMigration();
echo $laravelArchiveMigration->echoPhrase('Hello, Rzkhrv!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [rzkhrv](https://github.com/rzkhrv)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
