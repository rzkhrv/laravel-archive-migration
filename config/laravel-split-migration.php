<?php

return [
    'autoload' => env("LSM_AUTOLOAD", true),

    'archive_directory' => env('LSM_ARCHIVE_DIRECTORY', 'archive'),

    'handlers' => [
        'split' => \Rzkhrv\LSM\Handlers\SplitHandler::class,
        'rollback' => \Rzkhrv\LSM\Handlers\RollbackHandler::class,
    ]
];
