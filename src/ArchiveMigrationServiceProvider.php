<?php

namespace Rzkhrv\ArchiveMigration;

use Rzkhrv\ArchiveMigration\Commands\ArchiveMigrationCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ArchiveMigrationServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-archive-migration')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-archive-migration_table')
            ->hasCommand(ArchiveMigrationCommand::class);
    }
}
