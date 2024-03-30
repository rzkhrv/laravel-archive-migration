<?php

namespace Rzkhrv\ArchiveMigration\Commands;

use Illuminate\Console\Command;

class ArchiveMigrationCommand extends Command
{
    public $signature = 'laravel-archive-migration';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
