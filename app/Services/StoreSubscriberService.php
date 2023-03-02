<?php

namespace App\Services;

use App\Models\Subscriber;

class StoreSubscriberService
{

    /**create Subscribers method
     * @param $subs
     * @return void
     */
    public function storeSubs($subs): void
    {
        echo  Subscriber::create([
            'email' => $subs['email']
        ]);
    }

}
