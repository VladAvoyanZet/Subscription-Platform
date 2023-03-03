<?php

namespace App\Services\Subscribers;

use Illuminate\Support\Facades\DB;

class ShowSubscriberService
{

    public function showSubscriber($id)
    {
        $tab = DB::table('subscribers')->where('id', '=', $id)->get();
        echo $tab;
    }

}
