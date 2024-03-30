<?php

namespace Rzkhrv\ArchiveMigration;

use Rzkhrv\ArchiveMigration\Commands\ArchiveMigrationCommand;
use Rzkhrv\ArchiveMigration\Commands\UnArchiveMigrationCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ArchiveMigrationServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-archive-migration')
            ->hasConfigFile('archive-migration')
            ->hasCommands([
                ArchiveMigrationCommand::class,
                UnArchiveMigrationCommand::class,
            ]);
    }
}
