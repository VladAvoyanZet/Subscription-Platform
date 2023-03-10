<?php

namespace App\Services\Mail;

use App\Jobs\EmailJob;
use App\Mail\DemoMail;
use App\Models\Post;
use App\Models\Site;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
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
        $duplicate = new DuplicateMailService();

        foreach ($subscribers as $subscriber) {
          foreach ($ids as $id) {
                 if ($subscriber['id'] === $id->subscriber_id && $id->posts->isNotEmpty()){
                     foreach ($id->posts as $post) {
                         if ($subscriber['is_sent'] == 0 && $post->is_sent_post == 0){
                             $duplicate->checkDuplicate($subscriber['id'], $post->id);
//                             EmailJob::dispatch($subscriber['email'], $id->posts)->onQueue('email');
                               }elseif ($subscriber['is_sent'] == 1 && $post->is_sent_post == 0){
                                  $duplicate->checkDuplicate($subscriber['id'], $post->id);
//                                  EmailJob::dispatch($subscriber['email'], $id->posts)->onQueue('email');


                         }else {
                             dd('Mail Already Sanded');
                         }
                     }
                }
            }
        }
    }
}
