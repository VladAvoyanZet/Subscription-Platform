<?php

namespace App\Http\Controllers;


use App\Jobs\EmailJob;
use App\Models\Post;
use App\Models\Site;
use App\Models\Subscriber;
use App\Services\Mail\CheckSentStatusService;
use JetBrains\PhpStorm\NoReturn;

class MailController extends Controller
{
    #[NoReturn] public function index( )
    {
        $posts = Site::with('posts')->get();
        $subscribers = Subscriber::all()->toArray();
        $ids = [];
        foreach ($posts as $post) {
            $ids[] = $post;
        }

        $check = new CheckSentStatusService();

        foreach ($subscribers as $subscriber) {
            foreach ($ids as $id) {
                if ($subscriber['id'] == $id->subscriber_id && $id->posts->isNotEmpty()){
                    foreach ($id->posts as $post) {
                        if ($subscriber['is_sent'] == 0 && $post->is_post_sent ==  0){
                            dispatch(new EmailJob($subscriber['email'], $id->posts, $id->domain));
                            $check->checkStatus($subscriber['id'], $post->id);
                        }else {
                            dd('arden uxarkvac a');
                        }

                    }
//                    $check->checkStatus($subscriber['is_sent']);
//                    dd($subscriber['is_sent']);

                }
            };

        }
    }
}
