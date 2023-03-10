<?php

namespace App\Services\Mail;

use App\Models\Post;
use App\Models\Subscriber;

class DuplicateMailService
{
    public function checkDuplicate($subscriberId, $postId)
    {
        $posts = Post::find($postId);
        $subscriber = Subscriber::find($subscriberId);

        $posts->is_post_sent= 1;
        $subscriber->is_sent = 1;
        $posts->save();
        $subscriber->save();
    }
}
