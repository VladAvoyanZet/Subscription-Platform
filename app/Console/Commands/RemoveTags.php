<?php

namespace App\Console\Commands;

use App\Http\Controllers\RemoveTagController;
use App\Services\RemoveTags\RemoveTagsService;
use Illuminate\Console\Command;

class RemoveTags extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send-r';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $removeTags = new RemoveTagController();
        $removeTags->removeTagsFromDB();
    }
}
