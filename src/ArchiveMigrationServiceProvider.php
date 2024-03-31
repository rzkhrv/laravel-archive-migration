<?php

namespace Rzkhrv\ArchiveMigration;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\ServiceProvider;

class ArchiveMigrationServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadArchivedMigrations();
    }

    protected function loadArchivedMigrations(): void
    {
        if ($this->app->runningInConsole()) {
            $archiveDirectory = config('archive-migration.archive_directory');
            $archiveDirectoryPath = database_path('migrations/'.$archiveDirectory);

            if (is_dir($archiveDirectoryPath)) {
                $files = app(Filesystem::class)->allFiles($archiveDirectoryPath);

                $directories = [];
                foreach ($files as $file) {
                    $directory = $file->getPath();
                    if (!in_array($directory, $directories)) {
                        $directories[] = $file->getPath();
                    }
                }

                $this->loadMigrationsFrom($directories);
            }
        }
    }
}
