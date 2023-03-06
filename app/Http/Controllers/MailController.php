<?php

namespace App\Http\Controllers;

use App\Mail\DemoMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use JetBrains\PhpStorm\NoReturn;

class MailController extends Controller
{
    #[NoReturn] public function send()
    {
        Mail::to('your_email@gmail.com')->send(new DemoMail(''));

        dd("Email is sent successfully.");
    }
}
