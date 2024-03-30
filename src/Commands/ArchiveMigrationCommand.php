<?php

namespace Rzkhrv\ArchiveMigration\Commands;

use DateTimeImmutable;
use Illuminate\Console\Command;
use Illuminate\Console\ConfirmableTrait;

class ArchiveMigrationCommand extends Command
{
    use ConfirmableTrait;

    public $signature = 'migration:archive';

    public $description = 'Archive migration files';

    public function handle(): int
    {
        if (! $this->confirmToProceed()) {
            return 1;
        }

        $files = glob(database_path('migrations/*.php'));

        $archiveDirectory = config('archive-migration.archive_directory');
        $archiveDirectoryPath = database_path('migrations/'.$archiveDirectory);
        $archiveDirectoryFormat = config('archive-migration.directory_format');

        foreach ($files as $file) {
            preg_match('/\d{4}_\d{2}_\d{2}/', $file, $m);
            $migrationDate = DateTimeImmutable::createFromFormat('Y_m_d', $m[0]);

            $newPath = $archiveDirectoryPath;
            $newPath .= '/'.$migrationDate->format($archiveDirectoryFormat);
            if (! is_dir($newPath)) {
                mkdir($newPath, 0755, true);
            }
            $newPath .= '/'.basename($file);

            rename($file, $newPath);
        }

        return self::SUCCESS;
    }
}
