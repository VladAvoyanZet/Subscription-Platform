<?php

namespace App\Http\Controllers;

use App\Jobs\EmailJob;
use App\Models\Post;
use App\Models\Site;
use App\Models\Subscriber;
use App\Services\Mail\CheckSentStatusService;
use App\Services\StoreTagsService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use JetBrains\PhpStorm\NoReturn;

class MailController extends Controller
{
    #[NoReturn] public function index($response)
    {

    }
}
