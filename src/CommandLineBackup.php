<?php

namespace Devsfort\Backup;

use Exception;
use Illuminate\Console\Command;


class CommandLineBackup extends Command
{
    /** @var string */
    protected $signature = 'backup:make';

    /** @var string */
    protected $description = 'Run the backup.';

    public function handle()
    {
        $this->info("Starting Backup");



    }


}
