<?php

namespace App\Services\Website ;

use App\Models\Site;

class StoreWebSiteService
{
    public function storeWebSite($request)
    {
        $response = Site::create([
            'title' => $request['title'],
            'description' => $request['description']
        ]);

        if ($response) {
            echo 'Message: Website successfully created';
        }else {
            echo "Message: something went wrong";
        }
    }

}
