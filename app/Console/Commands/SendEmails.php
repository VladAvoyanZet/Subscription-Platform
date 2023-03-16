<?php

namespace App\Console\Commands;

use App\Http\Controllers\MailController;
use App\Http\Controllers\PostController;
use App\Http\Resources\PostResource;
use App\Jobs\EmailJob;
use App\Mail\DemoMail;
use App\Models\Post;
use App\Models\Site;
use App\Models\Subscriber;
use App\Models\Tag;
use App\Services\Mail\CheckSentStatusService;
use App\Services\StoreTagsService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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
     public function handle(): void
    {
        $checj = new CheckSentStatusService();
        $checj->sendPosts();

     }
}
