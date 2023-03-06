<?php

namespace App\Services\Post;

use Illuminate\Support\Facades\DB;

class ShowPostService
{

    public function showPost($id)
    {
        $tab = DB::table('posts')->where('id', '=', $id)->get();
        echo $tab;
    }

}
