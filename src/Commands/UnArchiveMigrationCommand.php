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

        $filesystem = app(Filesystem::class);
        $files = $filesystem->allFiles(database_path('migrations/archive'));

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

        foreach ($directories as $directory) {
            if (empty($filesystem->allFiles($directory))) {
                rmdir($directory);
            } else {
                $this->warn('Directory is not empty: '.$directory);
            }
        }

        return self::SUCCESS;
    }
}
