<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Subscriber;
use App\Services\RemoveTags\RemoveTagsService;
use Illuminate\Http\Request;

class RemoveTagController extends Controller
{
    public function removeTagsFromDB( )
    {
        $rem = new RemoveTagsService();
        $posts = Post::all();
        $subscribers = Subscriber::all();

        foreach ($posts as $post) {
            foreach ($subscribers as $subscriber) {
                $rem->remove($post,$subscriber);
            }
         }
    }
}
