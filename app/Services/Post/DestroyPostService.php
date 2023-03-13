<?php

namespace App\Services\Post;

use Illuminate\Support\Facades\DB;

class DestroyPostService
{
    public function destroyPost($id): void
    {
        $tab = DB::table('posts')->where('id', '=', $id)->delete();
        if ($tab) {
            echo "Message: Post successfully deleted";
        } else {
            echo "Message: something went wrong";
        }
    }
}
