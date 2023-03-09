<?php

namespace App\Services\Website ;

use App\Models\Site;

class StoreWebSiteService
{
    public function storeSubscriberWebSite($request): void
    {
        $response = Site::create([
            'domain' => $request['domain'],
            'subscriber_id' => $request['subscriber_id']
        ]);

        if ($response) {
            echo 'Message: Website successfully created';
        }else {
            echo "Message: something went wrong";
        }
    }

    public function storePostSiteTable(): void
    {

    }

}
