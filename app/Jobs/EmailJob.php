<?php

namespace App\Jobs;

use App\Mail\DemoMail;
use App\Models\Post;
use App\Models\Subscriber;
use App\Services\Mail\CheckSentStatusService;
use App\Services\Mail\DuplicateMailService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class EmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $email;
    public $subId;
    public $siteId;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $subId, $siteId)
    {
        $this->email = $email;
        $this->subId = $subId;
        $this->siteId = $siteId;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
//        $sa = new CheckSentStatusService();
//        $sa->sendPosts();

        Post::with('sites')->where('site_id', 'LIKE', $this->siteId)->chunk(1, function ($posts){
            foreach ($posts as $post) {
                echo $post->title;
                Mail::to($this->email)->send(new DemoMail($post->title, $post->description));
                $tag = new DuplicateMailService();
                $tag->checkDuplicate($this->subId,  $this->siteId);
            }
            echo '//////';
        });
    }
}
