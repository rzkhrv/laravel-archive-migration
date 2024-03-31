<?php

namespace Rzkhrv\ArchiveMigration\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\ConfirmableTrait;
use Rzkhrv\LSM\Contracts\HandlerContract;

class SplitCommand extends Command
{
    use ConfirmableTrait;

    public $signature = 'migration:split {--rollback}';

    public $description = 'Split migration files';

    public function handle(): int
    {
        //-- Check if production mode
        if (! $this->confirmToProceed()) {
            //-- I think this package need only for dev
            return 1;
        }

        //-- Get handler
        $handler = !$this->option('rollback')
            ? config('lsm.handlers.split')
            : config('lsm.handlers.rollback');

        //-- Check the Handler implements HandlerContract
        $handler = app($handler);
        if (!$handler instanceof HandlerContract) {
            $this->error('Handler '.class_basename($handler).' should be implemented ' . HandlerContract::class);
            return self::FAILURE;
        }

        //-- If you have errors, print they
        $messages = app($handler)->handle();
        if (!empty($messages)) {
            foreach ($messages as $type => $message) {
                $this->{$type}($message);
            }
        }

        //-- If I don't have any message, don't print, and return success code.
        return self::SUCCESS;
    }
}
