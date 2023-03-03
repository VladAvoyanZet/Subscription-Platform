<?php

namespace App\Services\Website ;

use Illuminate\Support\Facades\DB;

class ShoWebSiteService
{

    public function showWebsite($id)
    {
        $tab = DB::table('sites')->where('id', '=', $id)->get();
        echo $tab;
    }

}
