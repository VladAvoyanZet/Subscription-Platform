<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Mail\DemoMail;
use App\Models\Post;
use App\Services\Mail\SendNewPostsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
     public function getNewPost()
    {
        $getNewPosts = new SendNewPostsService();
        $getNewPosts->getNewPosts();
    }
}
