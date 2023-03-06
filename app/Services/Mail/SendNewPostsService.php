<?php

namespace App\Services\Mail;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class SendNewPostsService
{
    public function getNewPosts()
    {
        $subs =  PostResource::collection(Post::all());
        $posts = [];
        foreach ($subs as $sub){
            $posts[] = [
                "websideid" => $sub['id'],
                "title" => $sub['title'],
                "description" => $sub['description'],
            ];
        }
        print_r($posts);
    }

//Mail::to('your_email@gmail.com')->send(new DemoMail(''));
//
//dd("Email is sent successfully.");

}
