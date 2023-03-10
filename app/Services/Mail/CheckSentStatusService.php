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
        $posts->chunk(4, function ($po){
        });

        foreach ($posts as $post) {
            $ids[] = $post;
        };
        $duplicate = new DuplicateMailService();

        foreach ($subscribers as $subscriber) {
          foreach ($ids as $id) {
                 if ($subscriber['id'] == $id->subscriber_id && $id->posts->isNotEmpty()){
                     foreach ($id->posts as $post) {
                         if ($subscriber['is_sent'] == 0){
                             dispatch(new EmailJob($subscriber['email'], $id->posts));
                              $duplicate->checkDuplicate($subscriber['id'], $post->id);
                         }else {
                             dd('Mail Already Sanded');
                         }
                     }
                }
            }
        }
    }
}
