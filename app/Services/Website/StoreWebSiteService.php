<?php

namespace App\Services\Website ;

use App\Models\PostSite;
use App\Models\Site;

class StoreWebSiteService
{
    public function storeSubscriberWebSite($request): void
    {
        $response = Site::create([
            'email' => $request['email'],
            'url' => $request['url']
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
