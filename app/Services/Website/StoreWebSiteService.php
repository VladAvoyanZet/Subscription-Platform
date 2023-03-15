<?php

namespace App\Services\Website ;

use App\Models\Site;

class StoreWebSiteService
{
    public function storeSubscriberWebSite($request): \Illuminate\Http\JsonResponse
    {
        $response = Site::create([
            'domain' => $request['domain'],
            'subscriber_id' => $request['subscriber_id'],
        ]);

        if ($response) {
            echo 'Message: Website successfully created';
            return response()->json(['success'=>'Laravel ajax example is being processed.']);

        }else {
            echo "Message: something went wrong";
        }
    }
}
