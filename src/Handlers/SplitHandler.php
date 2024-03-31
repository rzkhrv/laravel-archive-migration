<?php

namespace Rzkhrv\LSM\Handlers;

use DateTimeImmutable;
use Illuminate\Filesystem\Filesystem;
use Rzkhrv\LSM\Contracts\HandlerContract;

class SplitHandler implements HandlerContract
{
    /**
     * @var Filesystem
     */
    private Filesystem $filesystem;

    /**
     * Base migration path
     *
     * @var string
     */
    private string $migrationsPath;

    /**
     * It's a base archive directory name
     *
     * @var string
     */
    private string $archiveDirectory;

    public function __construct()
    {
        $this->filesystem = app(Filesystem::class);
        $this->migrationsPath = database_path('migrations');
        $this->archiveDirectory = config('lsm.archive_directory');
    }

    public function handle(): array
    {
        $messages = [];

        $archiveDirectoryPath = $this->migrationsPath.'/'.$this->archiveDirectory;
        $archiveDirectoryFormat = config('archive-migration.directory_format');

        //-- Here we get the migration files
        $files = glob(database_path($this->migrationsPath .'/*.php'));

        //-- Then we need to move them to a new path
        foreach ($files as $file) {
            //-- Here I want to get the date from migration filepath
            preg_match('/\d{4}_\d{2}_\d{2}/', $file, $m);
            $migrationDate = DateTimeImmutable::createFromFormat('Y_m_d', $m[0]);

            //-- Here I build new filepath
            $newPath = $archiveDirectoryPath;
            $newPath .= '/'.$migrationDate->format($archiveDirectoryFormat);

            //-- If the directory doesn't exist, I need to create it
            if (! is_dir($newPath)) {
                mkdir($newPath, 0755, true);
            }

            //-- New full path for migration file
            $newPath .= '/'.basename($file);

            //-- I'm using the rename function because it's a simple way to
            //-- move a file to a new path using php.
            rename($file, $newPath);
        }

        return $messages;
    }
}
