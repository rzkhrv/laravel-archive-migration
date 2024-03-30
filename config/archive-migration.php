<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Archive directory
    |--------------------------------------------------------------------------
    |
    | Specify the format of the directories that will be created for your migrations.
    | The format is specified based on the date, such as Y/m/d. This will create
    | directories for migration files and move them there if they exist.
    |
    | Example:
    | database/migrations/2014/10/12/2014_10_12_000000_create_users_table.php
    | database/migrations/2014/10/12/2014_10_12_100000_create_password_reset_tokens_table.php
    | database/migrations/2019/08/19/2019_08_19_000000_create_failed_jobs_table.php
    |
    */

    'archive_directory' => env('LAM_ARCHIVE_DIRECTORY', 'archive'),

    /*
    |--------------------------------------------------------------------------
    | Directory format
    |--------------------------------------------------------------------------
    |
    | Specify the format of the directories that will be created for your migrations.
    | The format is specified based on the date, such as Y/m/d. This will create
    | directories for migration files and move them there if they exist.
    |
    | Example:
    | database/migrations/2014/10/12/2014_10_12_000000_create_users_table.php
    | database/migrations/2014/10/12/2014_10_12_100000_create_password_reset_tokens_table.php
    | database/migrations/2019/08/19/2019_08_19_000000_create_failed_jobs_table.php
    |
    */

    'directory_format' => env('LAM_DIRECTORY_FORMAT', 'Y/m'),
];
