<?php

namespace App\Services\Subscribers;


use App\Models\Subscriber;

class StoreSubscribersService
{

    public function storeSubscriber($request)
    {
        $response = Subscriber::create([
            'email' => $request['email'],
            'is_sent' => $request['is_sent'],
        ]);

        if ($response) {
            echo 'Message: Subscriber successfully created';
        } else {
            echo "Message: something went wrong";
        }

    }

}
