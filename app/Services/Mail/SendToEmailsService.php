<?php

namespace App\Services\Mail;

use App\Http\Resources\PostResource;
use App\Mail\DemoMail;
use App\Models\Post;
use App\Models\Site;
use Illuminate\Support\Facades\Mail;

class SendToEmailsService
{
    public function sendEmails(): void
    {
        $websites = Site::all();
        foreach ($websites as $website){
            $posts[] = $website->email;
        }
        dd($posts);
        Mail::to($post['email'])->send(new DemoMail(''));
        dd("Email is sent successfully.");
        foreach ($posts as $post) {
            echo $post['email'];
        }

    }
}
