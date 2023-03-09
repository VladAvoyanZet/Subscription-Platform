<?php

namespace App\Services\Mail;

use App\Jobs\EmailJob;
use App\Models\Post;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Validator;
use JetBrains\PhpStorm\NoReturn;

class CheckSentStatusService
{
    #[NoReturn] public function checkStatus($subscriberId, $postId): void
    {
        $posts = Post::find($postId);
        $subscriber = Subscriber::find($subscriberId);

        $posts->is_post_sent= 1;
        $subscriber->is_sent = 1;
        $posts->save();
        $subscriber->save();
    }
}
