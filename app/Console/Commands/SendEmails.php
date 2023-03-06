<?php

namespace App\Console\Commands;

use App\Mail\DemoMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

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
    public function handle(): void
    {
        Mail::to('your_email@gmail.com')->send(new DemoMail(''));

        dd("Email is sent successfully.");
    }
}
