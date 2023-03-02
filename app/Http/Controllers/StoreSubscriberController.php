<?php

namespace App\Http\Controllers;

use App\Services\StoreSubscriberService;
use Illuminate\Http\Request;

class StoreSubscriberController extends Controller
{
    public function store(Request $request, StoreSubscriberService $subscriberService)
    {
        $email = $request->all();

        $subscriberService->storeSubs($email);
    }
}
