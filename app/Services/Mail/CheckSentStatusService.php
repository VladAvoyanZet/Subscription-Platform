<?php

namespace App\Services\Mail;

use App\Jobs\EmailJob;
use App\Models\Post;
use App\Models\Site;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Validator;
use JetBrains\PhpStorm\NoReturn;

class CheckSentStatusService
{
    #[NoReturn] public function checkStatus($subscribers): void
    {
        $posts = Site::with('posts')->get();
        $ids = [];
        foreach ($posts as $post) {
            $ids[] = $post;
        };

        foreach ($subscribers as $subscriber) {
        foreach ($ids as $id) {
            if ($subscriber['id'] == $id->subscriber_id && $id->posts->isNotEmpty()){
                dd($subscriber['is_sent'],$id->posts['is_post_sent']);
                print_r($subscriber);
                    dispatch(new EmailJob($subscriber['email'], $id->posts, $id->domain));
                 }
            }
        }
    }
}
