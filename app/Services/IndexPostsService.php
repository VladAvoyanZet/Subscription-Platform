<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class IndexPostsService
{

    /** method for show all posts
     * @return void
     */
    public function posts()
    {
        $users = DB::select('select * from subscribers');
//        print_r($users);
        foreach ($users as $user) {
            print_r($user);
        }
    }

}
