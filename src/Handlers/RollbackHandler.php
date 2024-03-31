<?php

namespace Rzkhrv\LSM\Handlers;

use Illuminate\Filesystem\Filesystem;
use Mockery\Exception;
use Rzkhrv\LSM\Contracts\HandlerContract;

class RollbackHandler implements HandlerContract
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

    /**
     * This is a fully commented method, and you can build
     * own this method using my comments...
     *
     * @return array
     */
    public function handle(): array
    {
        //-- Build full path to the archive directory
        $archiveDirectory = config('lsm.archive_directory');
        $archiveDirectoryPath = $this->migrationsPath . '/'. $this->archiveDirectory;

        //-- Get the migration files
        $files = $this->filesystem->allFiles($archiveDirectoryPath);

        //-- Messages for powerful developers
        $messages = [];

        $directories = [];
        foreach ($files as $file) {
            //-- Here we assemble a new path for the migration file
            $fileName = $file->getBasename();
            $newPath = $this->migrationsPath . '/'.$fileName;

            try {
                //-- I think it's a simple and universal method for move file
                rename($file->getRealPath(), $newPath);
                //-- I'm not using @ here because I want the error message if there was one...
            } catch (\Throwable $e) {
                //-- If there are any errors
                $messages['error'][] = 'Failed to move file ' . $this->migrationsPath . 'Error: ' . $e->getMessage();
            }

            //-- Here I want to store the unique paths of the directories in which the migration files were located.
            $directory = $file->getPath();
            if (! in_array($directory, $directories)) {
                $directories[] = $file->getPath();
            }
        }

        //-- I'm using this solution because it's an easy way to solve my problem.
        $files = $this->filesystem->allFiles($archiveDirectoryPath);
        if (empty($files)) {
            //-- if any exception
            try {
                $this->filesystem->deleteDirectory($archiveDirectoryPath);
            } catch (\Throwable $e) {
                $messages['error'][] = "Can't delete directory: ".$e->getMessage();
            }
        } else {
            $messages['warn'][] = 'Directory is not empty: '.$archiveDirectoryPath;
        }

        return $messages;
    }
}
