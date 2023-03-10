<?php

namespace App\Services\Mail;

use App\Models\Post;
use App\Models\Subscriber;

class DuplicateMailService
{
    public function checkDuplicate($subscriberId, $postId): void
    {

         if ($subscriberId == 1 && $postId == 0){
             $posts = Post::find($postId);
             $posts->is_post_sent= 1;
             $posts->save();
         }else {
             $posts = Post::find($postId);
             $subscriber = Subscriber::find($subscriberId);
             $posts->is_post_sent= 1;
             $subscriber->is_sent = 1;
             $posts->save();
             $subscriber->save();
         }
    }
}
