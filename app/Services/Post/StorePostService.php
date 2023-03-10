<?php

namespace App\Services\Post;


use App\Mail\DemoMail;
use App\Models\Post;
use App\Models\Site;
use Illuminate\Support\Facades\Mail;

class StorePostService
{
    public function storePost($request)
    {
        $data = [
            'site_id' => $request['site_id'],
            'title' => $request['title'],
            'description' => $request['description'],
            'is_post_sent' => $request['is_post_sent']
        ];
        $response = Post::create($data);

        if ($response) {
            echo 'Message: Post successfully created';
        }else {
            echo "Message: something went wrong";
        }
    }
}
