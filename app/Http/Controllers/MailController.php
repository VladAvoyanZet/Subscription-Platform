<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Mail\DemoMail;
use App\Models\Post;
use App\Models\Site;
use App\Models\Subscribers;
use App\Services\Mail\SendEmailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use JetBrains\PhpStorm\NoReturn;

class MailController extends Controller
{
     #[NoReturn] public function index()
    {
        $subscribers = Subscribers::all();

        foreach ($subscribers as $subscriber) {
         $websites = Site::where('id', 'LIKE', '%'. $subscriber['websiteId'])->with('posts')->get();
         ;
        }
         dd($websites);

//        foreach ($subscribers as $subscriber) {
//            echo $subscriber['email'];
//            }

//        Mail::to($email['websiteId'])->send(new DemoMail(''));
//        $websites = Site::whereHas('posts')->with('posts')->get();//////////////
     }
}
