<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Services\Mail\CheckSentStatusService;

use JetBrains\PhpStorm\NoReturn;

class MailController extends Controller
{
    #[NoReturn] public function index()
    {

        $subscribers = Subscriber::all();

        $check = new CheckSentStatusService();

        foreach ($subscribers->chunk(3) as $subscriber) {
            $check->checkStatus($subscriber);
        }
    }
}
