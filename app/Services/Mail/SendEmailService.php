<?php

namespace App\Services\Mail;

use App\Mail\DemoMail;
use App\Models\Post;
use App\Models\Site;
use App\Models\Subscribers;
use Illuminate\Support\Facades\Mail;

class SendEmailService
{

    public function emailsend()
    {
//        $subscribers = Subscribers::all()->toArray();
//
//        $arr = [];
//        foreach ($posts as $post) {
//            $arr[] = [$post['title'],$post['description'], $subscriber['email'] ] ;
//            foreach ($subscribers as $subscriber) {
//            }
//        }
//        foreach ($arr as $item) {
//            dd($item);
//        }
        $posts = Post::all()->toArray();
        $subscribers = Subscribers::all()->toArray();
        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber['email'])->send(new DemoMail($posts));
        }
    }
}
