<?php

namespace App\Services\Website ;

use App\Models\Site;

class StoreWebSiteService
{
    public function storeSubscriberWebSite($request)
    {
        $response = Site::create([
            'domain' => $request['domain'],
            'subscriber_id' => $request['subscriber_id'],
        ]);

        if ($response) {
            return response()->json(['success'=>"Message: Subscribed successfully"]);

        }else {
            return response()->json(['success'=>"Message: something went wrong"]);
        }
    }
}
