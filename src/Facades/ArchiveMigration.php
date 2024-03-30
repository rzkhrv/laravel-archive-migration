<?php

namespace Rzkhrv\ArchiveMigration\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Rzkhrv\ArchiveMigration\ArchiveMigration
 */
class ArchiveMigration extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Rzkhrv\ArchiveMigration\ArchiveMigration::class;
    }
}
