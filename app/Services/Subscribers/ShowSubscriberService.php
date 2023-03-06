<?php

namespace App\Services\Subscribers;

use Illuminate\Support\Facades\DB;

class ShowSubscriberService
{

    public function showSubscriber($id)
    {
        $tab = DB::table('posts')->where('id', '=', $id)->get();
        echo $tab;
    }

}
