<?php

namespace App\Console\Commands;

use App\Http\Controllers\MailController;
use Illuminate\Console\Command;
use JetBrains\PhpStorm\NoReturn;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to Subscriber';

    /**
     * Execute the console command.
     */
    #[NoReturn] public function handle(): void
    {
      $con = new MailController();
      $con->index();
    }
}
