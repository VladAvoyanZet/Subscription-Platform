<?php

namespace App\Services;

use App\Models\Subscriber;

class StoreSubscriberService
{

    /**  create Subscribers method  */

    public function storeSubs($request)
    {
       return Subscriber::create([
            'email' => $request['email']
        ]);
    }

}
