<?php

namespace Rzkhrv\ArchiveMigration\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\ConfirmableTrait;
use Illuminate\Filesystem\Filesystem;

class UnArchiveMigrationCommand extends Command
{
    use ConfirmableTrait;

    public $signature = 'migration:unarchive';

    public $description = 'Unarchive migrations';

    public function handle(): int
    {
        if (! $this->confirmToProceed()) {
            return 1;
        }

        $archiveDirectory = config('archive-migration.archive_directory');
        $archiveDirectoryPath = database_path('migrations/'.$archiveDirectory);

        $filesystem = app(Filesystem::class);
        $files = $filesystem->allFiles($archiveDirectoryPath);

        $directories = [];
        foreach ($files as $file) {
            $fileName = $file->getBasename();
            $newPath = database_path('migrations/'.$fileName);
            rename($file->getRealPath(), $newPath);

            $directory = $file->getPath();
            if (! in_array($directory, $directories)) {
                $directories[] = $file->getPath();
            }
        }

        $files = $filesystem->allFiles($archiveDirectoryPath);
        if (empty($files)) {
            $filesystem->deleteDirectory($archiveDirectoryPath);
        } else {
            $this->warn('Directory is not empty: '.$archiveDirectoryPath);
        }

        return self::SUCCESS;
    }
}
