<?php

namespace App\Http\Controllers;

use App\Services\SubscriptionService;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request, SubscriptionService $subscriptionService)
    {
        $email = $request->get('email');
        $websiteId = $request->get('websiteId');
        $subscriptionService->subscribe($email, $websiteId);
    }

}

