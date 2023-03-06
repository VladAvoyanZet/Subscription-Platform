<?php

namespace App\Services\Subscribers;

use Illuminate\Support\Facades\DB;

class DeleteSubscriberService
{
    public function deleteSubscriber($id)
    {
        $tab = DB::table('subscribers')->where('id', '=', $id)->delete();
        if ($tab){
            echo "Message: Post successfully deleted";
        }else {
            echo "Message: something went wrong";
        }
    }
}
