<?php

namespace App\Services\RemoveTags;

use App\Models\Post;
use App\Models\Subscriber;
use Illuminate\Support\Facades\DB;

class RemoveTagsService
{

    public function remove($postId, $subscriberId)
    {
        $post = Post::find($postId->id);
        $subscriber = Subscriber::find($subscriberId->id);
        $post->is_post_sent = 0;
        $subscriber->is_sent = 0;
        $post->save();
        $subscriber->save();
    }

}
