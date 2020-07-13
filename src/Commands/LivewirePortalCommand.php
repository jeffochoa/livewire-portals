<?php

namespace Jeffochoa\LivewirePortal\Commands;

use Illuminate\Console\Command;

class LivewirePortalCommand extends Command
{
    public $signature = 'LivewirePortal';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
