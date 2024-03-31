<?php

namespace Rzkhrv\ArchiveMigration;

use Rzkhrv\ArchiveMigration\Commands\SplitCommand;
use Rzkhrv\ArchiveMigration\Commands\UnArchiveMigrationCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider as ServiceProvider;

class PackageServiceProvider extends ServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-archive-migration')
            ->hasConfigFile()
            ->hasCommands([
                SplitCommand::class,
                UnArchiveMigrationCommand::class,
            ]);
    }
}
