<?php

namespace App\Services\Website ;

use Illuminate\Support\Facades\DB;

class ShoWebSiteService
{

    public function showWebsite($id): void
    {
        $tab = DB::table('sites')->where('id', '=', $id)->get();
        echo $tab;
    }

}
