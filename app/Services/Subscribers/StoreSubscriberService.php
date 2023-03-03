<?php

namespace App\Services\Subscribers;

use App\Models\Subscriber;

class StoreSubscriberService
{

    /**  create Subscribers method  */

    public function storeSubs($request)
    {
       $respons =  Subscriber::create([
            'email' => $request['email']
        ]);

       if ($respons) {
           echo 'Message: subscriber successfully created';
       }else {
           echo "Message: something went wrong";
       }
    }

}
