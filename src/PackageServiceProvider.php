<?php

namespace Rzkhrv\ArchiveMigration;

use Rzkhrv\ArchiveMigration\Commands\ArchiveMigrationCommand;
use Rzkhrv\ArchiveMigration\Commands\UnArchiveMigrationCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider as ServiceProvider;

class PackageServiceProvider extends ServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-archive-migration')
            ->publishesServiceProvider('ArchiveMigrationServiceProvider')
            ->hasConfigFile()
            ->hasCommands([
                ArchiveMigrationCommand::class,
                UnArchiveMigrationCommand::class,
            ]);
    }
}
