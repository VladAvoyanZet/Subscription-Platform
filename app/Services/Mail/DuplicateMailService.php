<?php

namespace App\Services\Mail;

use App\Models\Post;
use App\Models\Subscriber;
use Illuminate\Support\Facades\DB;

class DuplicateMailService
{
    public function checkDuplicate($postId, $siteId)
    {
//        $subscribers =  Post::with('sites')->chunk(3, function ($subscriber){
//            foreach ($subscriber as $sub) {
//                dump($sub) ;
////              EmailJob::dispatch($site->description, $site->title, $site->id);
//            }
//            echo '//////';
//        });
//        dd($post);

        DB::table('tags')->insert([
            'post_id' => $postId,
            'subscriber_id' => $siteId,
        ]);

//        $posts = Post::find($postId);
//        $subscriber = Subscriber::find($subscriberId);
//
//        $posts->is_post_sent= 1;
//        $subscriber->is_sent = 1;
//        $posts->save();
//        $subscriber->save();
    }
}
