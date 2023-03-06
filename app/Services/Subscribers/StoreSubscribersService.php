<?php

namespace App\Services\Subscribers;


use App\Models\Subscribers;

class StoreSubscribersService
{

    public function storeSubscriber($request)
    {
        $response = Subscribers::create([
            'email' => $request['email'],
            'websiteId' => $request['websiteId'],
        ]);

        if ($response) {
            echo 'Message: Subscriber successfully created';
        }else {
            echo "Message: something went wrong";
        }

    }

}
