<?php

namespace App\Http\Controllers;


use App\Jobs\EmailJob;
use App\Models\Site;
use App\Models\Subscriber;
use JetBrains\PhpStorm\NoReturn;

class MailController extends Controller
{
    #[NoReturn] public function index()
    {
        $posts = Site::with('posts')->get();
        $subscribers = Subscriber::all()->toArray();

        $ids = [];
        foreach ($posts as $post) {
            $ids[] = $post;
        }

        foreach ($subscribers as $subscriber) {
            foreach ($ids as $id) {
                if ($subscriber['id'] == $id->subscriber_id && $id->posts->isNotEmpty()){
                    dispatch(new EmailJob($subscriber['email'], $id->posts));
                }
            };

        }
    }
}
