<?php

namespace App\Services\Subscribers;

use Illuminate\Support\Facades\DB;

class DestroySubscriberService
{

    public function deleteSubscriber($id)
    {
      return  DB::table('subscribers')->where('id', '=', $id)->delete();
    }

}
