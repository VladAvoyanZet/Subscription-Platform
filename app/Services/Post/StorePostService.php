<?php

namespace App\Services\Post;


use App\Models\Post;
use App\Models\Site;

class StorePostService
{
    public function storePost($request)
    {
        $response = Post::create([
            'websiteId' => $request['websiteId'],
            'title' => $request['title'],
            'description' => $request['description']
        ]);

        if ($response) {
            echo 'Message: Post successfully created';
        }else {
            echo "Message: something went wrong";
        }
    }



}
