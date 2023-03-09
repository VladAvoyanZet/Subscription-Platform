<?php

namespace App\Services\Post;

use App\Http\Resources\PostResource;
use App\Models\Post;

class IndexPostsService
{

    public function indexPosts(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {

      return PostResource::collection(Post::all());
    }

}
