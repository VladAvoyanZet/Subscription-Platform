<?php

namespace App\Services\Mail;

use App\Jobs\EmailJob;
use App\Mail\DemoMail;
use App\Models\Post;
use App\Models\Site;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use JetBrains\PhpStorm\NoReturn;

class CheckSentStatusService
{
    #[NoReturn] public function sendPosts()
    {
     Subscriber::with('sites')->chunk(3, function ($posts){
            foreach ($posts as $post) {
               echo $post->email;
              EmailJob::dispatch($post->email, $post->id, $post->site_id);
            }
            echo '//////';
        });


//         Post::with('sites')->where('site_id', 'LIKE', 1)->chunk(1, function ($posts){
//            foreach ($posts as $post) {
//                echo $post->site_id;
//                echo $post;
//
//            }
//            echo '//////';
//        });

//        foreach ($subscribers as $subscriber) {
//          foreach ($posts as $post) {
//                 if ($subscriber['id'] == $post->subscriber_id && $post->posts->isNotEmpty()){
//                     foreach ($post->posts as $post) {
//                         if ($subscriber['is_sent'] == 0){
//                             dispatch(new EmailJob($subscriber['email'], $post->posts));
//                              $duplicate->checkDuplicate($subscriber['id'], $post->id);
//                         }else {
//                             dd('Mail Already Sanded');
//                         }
//                     }
//                }
//            }
//        }
    }



}
