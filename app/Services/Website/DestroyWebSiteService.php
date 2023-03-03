<?php

namespace App\Services\Website;

use Illuminate\Support\Facades\DB;

class DestroyWebSiteService
{

    public function deleteWebsite($id): void
    {
        $tab = DB::table('sites')->where('id', '=', $id)->delete();
        if ($tab){
            echo "Message: Website successfully deleted";
        }else {
            echo "Message: something went wrong";
        }
    }


}
