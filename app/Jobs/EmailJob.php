<?php

namespace App\Jobs;

use App\Mail\DemoMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;

class EmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $emails;
    public $posts;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($emails, $posts)
    {
        $this->emails = $emails;
        $this->posts = $posts;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->emails)->send(new DemoMail($this->emails, $this->posts));
    }
}
