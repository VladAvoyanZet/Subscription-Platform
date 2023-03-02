<?php

namespace App\Services;

use App\Models\Subscriber;

class StoreSubscriberService
{

    public function storeSubs($subs): void
    {
        echo  Subscriber::create([
            'email' => $subs['email']
        ]);
    }

}
